<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class ProductCategory extends Model
{
    protected $table = 'product_category';

    protected $guarded = [];

    public function product() {
    	return $this->hasMany(Product::class, 'product_category_id', 'id');
    }
}
