<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\TransaksiDetail;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $guarded = [];

    public function user() {
    	return $this->belongsTo(User::class, 'users_id');
    }

    public function transaksiDetail() {
        return $this->hasOne(TransaksiDetail::class);
    }

}
