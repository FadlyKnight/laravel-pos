<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelQRCode\Facades\QRCode;
use Illuminate\Support\Facades\URL;

class Helper extends Model
{
    public function generateQRcode($data, $nameFile, $path )
    {
        $file = $nameFile.'.png';

        return filter_var($data, FILTER_VALIDATE_URL) ? 
        QRcode::url($data)
        ->setoutfile($path.$file)->setSize(10)
        ->setMargin(2)->png() 
        : 
        QRCode::text($data)
        ->setoutfile($path.$file)->setSize(10)
        ->setMargin(2)->png()
        ;  
        
    }

}
