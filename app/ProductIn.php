<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductIn extends Model
{
    protected $table = 'product_in';
    protected $guarded = [];

    public function product() {
    	return $this->belongsTo(Product::class);
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'qty' => 'required',
            'price_total' => 'required',
            'date' => 'required',
            'detail' => 'nullable',
        ];
    }
    
}
