<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;

class ProdukMasuk extends Model
{
    protected $table = 'produk_masuk';
    protected $guarded = [];

    public function produk() {
    	return $this->belongsTo(Produk::class);
    }
}
