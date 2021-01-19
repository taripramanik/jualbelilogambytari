<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = "transaction";

    protected $fillable = [
        'berat', 'id_user', 'harga_pengali', 'harga_total'
    ];

    public function user() {
        return $this->hasOne('App\User','id', 'id_user');
    }
}
