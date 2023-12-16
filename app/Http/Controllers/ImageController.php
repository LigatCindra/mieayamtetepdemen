<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    public function index()
{
    $image = Image::all(); 
    return view('index', compact('image'));
}
}
