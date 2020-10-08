<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductIn;
use App\ProductOut;

class InventoryController extends Controller
{
    public function storeProductIn()
    {
        $productIn = new ProductIn;
        $productIn->rules();
        // ProductIn::all()
        // ProductIn::create($request)
    }
    public function storeProductOut()
    {
        // ProductOut::all()
        // ProductOut::create($request)
    }
}
