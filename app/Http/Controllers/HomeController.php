<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Withdraw;
use Carbon;
use Mail;
use Kreait\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


class HomeController extends Controller
{
    public function index(Request $req) {
        $user = Auth::user();
        $hari_ini = Carbon::now()->dayOfWeek - 1;
        $startDate = Carbon::now()->addDays('-' . $hari_ini);
        $endDate = Carbon::now()->addDays(6 - $hari_ini);
        
        $data = $user ? Transaction::where('id_user', $user->id)
            // ->whereBetween('tanggal', [$startDate, $endDate])
            // ->where('status','SELESAI')
            ->get() : [];

        $error = $req->session()->has('error') ? $req->session()->get('error') : "";

        return view('welcome', [
            'user' => $user,
            'error' => $error,
            'data' => $data,
        ]);
    }

    public function cairkan(Request $req) {
        try {
            $saldo = getSaldo();
            if($req['jumlah'] <= $saldo) {
                Withdraw::create([
                    'user_id' => Auth::user()->id,
                    'total_pencairan' => $req['jumlah'],
                ]);
                
                $path = realpath(__DIR__ . '/../../../kunci.json');
                $serviceAccount = ServiceAccount::fromJsonFile($path);
                $firebase = (new Factory)
                ->withServiceAccount($serviceAccount)
                ->withDatabaseUri('https://banksampahtari.firebaseio.com/')
                ->create();
                $database = $firebase->getDatabase();
                $database->getReference('notifikasi')->push(['tipe' => 'pencairan']);

                return response()->json([
                    'success' => true
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Saldo kamu tidak mencukupi.'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi error, silahkan hubungi pengepul.'
            ]);
        }
    }

    public function create(Request $req) {
        $user = new User;
        $id = 0;
        $pin = 0;
        while(true) {
            $id = rand(1,4) . rand(1,4) . rand(1,4) . rand(1,4);
            $pin = rand(1,4) . rand(1,4) . rand(1,4) . rand(1,4);
            if(count(User::where('id', $id)->where('pin', $pin)->get()) == 0) break;
        }
        try {
            $user->id = $id;
            $user->name = $req['name'];
            $user->email = $req['email'];
            $user->no_telephone = $req['no_telephone'];
            $user->alamat = $req['alamat'];
            $user->password = bcrypt($req['password']);
            $user->pin = $pin;

            $save = $user->save();
            if($save) {
                Mail::send('email', ['user' => $user], function($message) use($req) {
                    $message->to($req['email'], $req['name'])->subject('Pin Akun Jual-Beli Logam');
                    $message->from('taripramanik21@gmail.com','Admin Jual-Beli Logam');
                });
                $route = route('home') . '/#masuk';
                $req->session()->flash('error', 'Akun berhasil dibuat, silahkan masuk !');
                return redirect($route);
            }
        } catch (\Exception $e) {
            $req->session()->flash('error', 'Email sudah terdaftar !');
            $route = route('home') . '/#daftar';
            return redirect($route);
        }
    }

    public function login(Request $req) {
        $credentials = $req->only('email','password');
        if (Auth::attempt($credentials)) {
            $route = route('home') . '/#login';
            return redirect($route);
        } else {
            $req->session()->flash('error', 'Username atau password salah !');
            $route = route('home') . '/#masuk';
            return redirect($route);
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route("home");
    }
}
