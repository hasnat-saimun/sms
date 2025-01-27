<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function videoPage(){
        return view('frontend.gallery.video');
    }

    public function imagePage(){
        return view('frontend.gallery.image');
    }
}
