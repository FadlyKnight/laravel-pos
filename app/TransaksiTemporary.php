<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;
class TransaksiTemporary extends Model
{
    protected $table = 'transaksi_temporari';
    protected $guarded = [];

    public function produk() {
    	return $this->belongsTo(Produk::class);
    }
}
