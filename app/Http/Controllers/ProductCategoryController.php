<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(ProductCategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ProductCategory::updateOrCreate(
            ['id' => $request->id],
            ['name' => $request->name]
        );
        return response()->json(['status' => true]);
    }

    public function destroy($id)
    {
        ProductCategory::findorFail($id)->delete();
        return response()->json(['status' => true]);
    }
}
