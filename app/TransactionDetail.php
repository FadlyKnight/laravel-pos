<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Transaction;

class TransactionDetail extends Model
{
    protected $table = 'transaction_detail';
    protected $guarded = [];

    public function transaction() {
    	return $this->belongsTo(Transaction::class);
    }

    public function product() {
    	return $this->belongsTo(Product::class);
    }

    public function rules()
    {
        return [
            'transaction_id'  => 'required',
            'product_id'  => 'required',
            'qty'  => 'required',
            'subtotal'  => 'required',
        ];
    }
}
