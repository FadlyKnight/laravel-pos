<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class TransactionTemporary extends Model
{
    protected $table = 'transaction_temporary';
    protected $guarded = [];

    public function product() {
    	return $this->belongsTo(Product::class);
    }
    
    public function rules()
    {
        return [
            'product_id'  => 'required',
            'qty'  => 'required',
        ];
    }

}
