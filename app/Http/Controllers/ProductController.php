<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\URL;
use App\Helper;
use Illuminate\Support\Str;
use DB;

class ProductController extends Controller
{
    // rules //
    /* 
    $validator = Validator::make($request->all(),$test->rules);
    if ($validator->fails()) {
        return view('test')->withErrors($validator)
    }
    */
    public function getAllProduk()
    {
        return response()->json( DB::table('product')->where('is_deleted', 0)->get() ); 
    }
    public function getTrashProduk()
    {
        return response()->json( DB::table('product')->where('is_deleted', 1)->get() ); 
    }

    public function store(Request $request)
    {
        $qrcode = new Helper;
        $product = new Product;
        $url = URL::current();
        $nameFile = Str::random(32); 
        $path = 'qr/product/';
        $data = [
            'product_category_id' => '1',
            'name' => 'Vans Black V Neck',
            'price' => '150000',
            // 'sub_price' => '',
            'stock' => '100',
            // 'image' => 'nullable',
            'qrcode' => $nameFile.'.png',
            'product_code' => 'BP-112',
            'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis nam rem ipsum cum error impedit voluptatibus illum distinctio. Velit eius veniam expedita minus nisi quis accusamus omnis totam, reprehenderit eos?',
            // 'gallery' => 'nullable',
            'status' => 'On Sale',
        ];
        $validator = Validator::make($data, $product->rules());
        if( $validator->fails() )
        {
            return response()->json([ 'status'=> false, 'message' => $validator->messages() ]);
        } else {
            $qrcode->generateQRcode( $url.'/'.$path.$nameFile , $nameFile, $path );
            $product::create($data);
            return response()->json([ 'status'=> true, 'message' => 'Product Saved' ]);
        }

    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = [
            'product_category_id' => '1',
            'name' => 'Vans Black V Neck',
            'price' => '150000',
            // 'sub_price' => '',
            'stock' => '100',
            // 'image' => 'nullable',
            'qrcode' => $product->qrcode,
            'product_code' => 'BP-112',
            'desc' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Blanditiis nam rem ipsum cum error impedit voluptatibus illum distinctio. Velit eius veniam expedita minus nisi quis accusamus omnis totam, reprehenderit eos?',
            // 'gallery' => 'nullable',
            'status' => 'On Hold',
        ];
        $rules = $product->rules();
        $rules['product_code'] = $rules['product_code']  . ',id,' . $id;
        $validator = Validator::make($data, $rules);
        if( $validator->fails() )
        {
            return response()->json([ 'status'=> false, 'message' => $validator->messages() ]);
        } else {
            $product->update($data);
            return response()->json([ 'status'=> true, 'message' => 'Product Updated' ]);
        }
    }

    public function trashOrRestore($id)
    {
        $product = Product::findOrFail($id);
        $product->is_deleted = ($product->is_deleted == 0) ? 1 : 0;
        $product->save();
        return response()->json(['status' => true, 'message' => 'Product Updated']);
    }

    public function restoreAll()
    {
        $product = Product::where('is_deleted', 1 );  
        $product->is_deleted = 0; 
        $product->save();
        return response()->json(['status' => true, 'message' => 'All Products Was Restored']);
    }

    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['status' => true, 'message' => 'Product Deleted']);
    }
    
}
