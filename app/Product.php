<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
use App\ProductIn;
use App\ProductOut;
use App\TransactionTemporary;
use App\Transaction;
use App\TransactionDetail;

class Product extends Model
{
    protected $table = 'product';

    protected $guarded = [];

    public function withCategory() {
    	return $this->belongsTo(ProductCategory::class, 'product_category_id', 'id');
    }

    public function transactionTemp() {
    	return $this->hasOne(TransactionTemporary::class);
    }
    
    public function transaction() {
    	return $this->hasManyThrough(Transaction::class, TransactionDetail::class);
    }

    public function ProductIn()
    {
        return $this->hasMany(ProductIn::class);
    }

    public function ProductOut()
    {
        return $this->hasMany(ProductOut::class);
    }

}
