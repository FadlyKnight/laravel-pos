<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;

class ProdukKeluar extends Model
{
    protected $table = 'produk_keluar';

    protected $guarded = [];
    
    public function produk() {
    	return $this->belongsTo(Produk::class);
    }
}
