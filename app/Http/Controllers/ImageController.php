<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{

    public function index(){
        return view('welcome');
    }
    //1. processing image
   //2. convert text to image
   public function ocr(Request $request){
    $request->validate([
        "image" => "required|mimes:png,jpg,jpeg|max:10000"
    ]);
        if($request->hasFile('image')){
            // process the image now

            $image = $request->file('image');

            $image_path = Storage::disk('public')->putFile('images', $image);

            $text = Image::ocr(public_path('storage/'.$image_path));

            return view('welcome',compact('text'));
        }
   }
}
