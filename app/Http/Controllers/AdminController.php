<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use Carbon;
use App\Withdraw;
use Mail;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function cairkan(Request $request) {
        try {
            $data = Withdraw::find($request['id']);
            $data->status = 'DICAIRKAN';
            $data->save();
            $x = $data->user;

            Mail::send('email_pencairan', ['user' => $x, 'total_pencairan' => $data->total_pencairan], function($message) use($x) {
                $message->to($x->email, $x->name)->subject('Bukti Pencairan Saldo');
                $message->from('taripramanik21@gmail.com','Admin Jual-Beli Logam');
            });
            
            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'WOY'
            ]);
        }
    }

    public function index() {
        $data = Withdraw::where('status', 'DIAJUKAN')->get();
        return view('admin.transaction', [
            'data' => $data
        ]);
    }

    public function history() {
        $data = Withdraw::where('status', 'DICAIRKAN')->get();
        return view('admin.history', [
            'data' => $data
        ]);
    }

    public function timbang($id) {
        $data = json_decode(base64_decode($id), true);
        return view('admin.timbang',[
            'data' => $data,
            'id' => $id
        ]);
    }

    public function timbangSave(Request $request) {
        $secretData = json_decode(base64_decode($request['data']), true);
        if($secretData) {
            $create = Transaction::create([
                'petugas' => $request['petugas'],
                'lokasi' => $request['lokasi'],
                'tanggal' => Carbon::now(),
                'berat' => $secretData['berat'],
                'source' => $secretData['source'],
                'id_user' => Auth::user()->id
            ]);
        } 
        return redirect()->route('admin.index');
    }

    public function pencairan() {
        return view('admin.pencairan.list');
    }
}
