<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class EdditorController extends Controller
{
    public function index($id)
    {
        $posts = Post::where('user_id',$id)->orderBy('created_at', 'DESC')->get();
        return view('admin.post.index', compact('posts'));
    }
}
