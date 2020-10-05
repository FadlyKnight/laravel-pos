<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Support\Facades\URL;
use App\Produk;
use App\ProdukCategory;
use Illuminate\Support\Str;

class DevController extends Controller
{
    public function generateQRcode()
    {
        QRcode::url(URL::current())
        ->setoutfile('url.png')
        ->setSize(8)
        ->setMargin(2)
        ->png();
        return 'cool';
    }
    
    public function testRelasi()
    {
        $pCategory = Produk::find(1)->denganKategori()->first()->nama;
        
        $pcat = ProdukCategory::find(1)->produk()->create([
            'nama' => "Barang Bagus",
            'harga' => 100000,
            'sub_harga' => 100000,
            'stok' => 20,
            'image' => Str::random(30),
            'qrcode' => Str::random(30)
        ]);

        dd($pCategory, $pcat);
    }
    
}
