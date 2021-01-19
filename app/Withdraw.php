<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    protected $fillable = [
        'user_id', 'total_pencairan', 'status'
    ];

    protected $attributes = [
        'status' => 'DIAJUKAN'
    ];

    public function user() {
        return $this->hasOne('App\User', 'id', 'user_id');
    }
}