<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Http\Requests\StoreTransaction;
use App\Http\Requests\AuthTransaction;
use App\User;
use Uuid;

class APITransaction extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaction $request)
    {
        try {
            $user = User::find($request['id']);
            if(!is_null($user)) {
                $data = $request->only('berat', 'harga_pengali');
                $data['harga_total'] = (float)$request['berat'] * (float)$request['harga_pengali'];
                $data['id_user'] = $user->id;
                $data = Transaction::create($data);
                $token = utf8_encode((string) Uuid::generate());
                return response()->json([
                    'message' => 'Data successfully created'
                ]);
            } else {
                return response()->json([
                    'message' => 'ID is not valid'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function login(AuthTransaction $request) {
        try {
            $user = User::where('id', $request['id'])->where('pin', $request['pin'])->first();
            if (!is_null($user)) {
                $token = utf8_encode((string) Uuid::generate());
                $user->update([ 'token' => $token ]);
                return response()->json([
                    'nama' => $user->name,
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'message' => 'User not valid'
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 404);
        }
    }
}
