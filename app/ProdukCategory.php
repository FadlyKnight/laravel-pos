<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Produk;

class ProdukCategory extends Model
{
    protected $table = 'produk_kategori';

    protected $guarded = [];

    public function produk() {
    	return $this->hasMany(Produk::class, 'produk_kategori_id', 'id');
    }
}
