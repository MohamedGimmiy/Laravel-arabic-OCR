<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use thiagoalessio\TesseractOCR\TesseractOCR;

class Image extends Model
{
    use HasFactory;
    public static function ocr($image_path){
        // process our file and return text
        try{

            $tesseract = new TesseractOCR($image_path);
            $tesseract->lang('ara');
            $text = $tesseract->run();
        } catch(Exception $e){
            $text = "";
        }
        // DELETE image after extracting info from it
        unlink($image_path);
        return $text;
    }
}
