<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductKeluar extends Model
{
    protected $table = 'product_out';

    protected $guarded = [];
    
    public function product() {
    	return $this->belongsTo(Product::class);
    }
}
