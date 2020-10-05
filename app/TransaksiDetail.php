<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;
use App\Transaksi;

class TransaksiDetail extends Model
{
    protected $table = 'transaksi_detail';
    protected $guarded = [];

    public function transaksi() {
    	return $this->belongsTo(Transaksi::class);
    }

    public function produk() {
    	return $this->belongsTo(Produk::class);
    }
}
