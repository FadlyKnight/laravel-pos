<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ProductCategory;
use App\ProductIn;
use App\ProductOut;
use App\TransactionTemporary;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\Validator;

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

    public function rules()
    {
        return [
            'product_category_id' => 'required',
            'name' => 'required|max:255',
            'price' => 'required',
            'sub_price' => 'nullable',
            'stock' => 'required',
            'image' => 'nullable',
            'qrcode' => 'required',
            'product_code' => 'required|unique:product',
            'desc' => 'nullable',
            'gallery' => 'nullable',
            'status' => 'required',
        ];
    }

    public function validation($data, $rules)
    {
        return Validator::make($data, $rules);
    }
    
}
