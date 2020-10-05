<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProdukCategory;
use App\ProdukMasuk;
use App\ProdukKeluar;
use App\TransaksiTemporary;
use App\Transaksi;
use App\TransaksiDetail;

class Produk extends Model
{
    protected $table = 'produk';

    protected $guarded = [];

    public function denganKategori() {
    	return $this->belongsTo(ProdukCategory::class, 'produk_kategori_id', 'id');
    }

    public function transaksiTemp() {
    	return $this->hasOne(TransaksiTemporary::class);
    }
    
    public function transaksi() {
    	return $this->hasManyThrough(Transaksi::class, TransactionDetail::class);
    }

    public function produkMasuk()
    {
        return $this->hasMany(ProdukMasuk::class);
    }

    public function produkKeluar()
    {
        return $this->hasMany(ProdukKeluar::class);
    }

}
