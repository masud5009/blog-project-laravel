<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        // $category = Category::orderBy('created_at','DESC')->take(5)->get();
        $category = Category::all();
        $data = compact('category');
        return view('welcome')->with($data);
    }
}
