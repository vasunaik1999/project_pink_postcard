<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostcardController extends Controller
{
    public function index()
    {
        return view('frontend.postcard.postcards');
    }

    public function preview()
    {
        return view('frontend.postcard.previewPostcard');
    }
}
