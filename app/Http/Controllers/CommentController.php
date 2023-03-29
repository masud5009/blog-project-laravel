<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()){
            $validator = Validator::make($request->all(),[
                'comment_body' => 'required|string',
            ]);
            if($validator->fails()){
                redirect()->back();
            }
            $post = Post::where('slug',$request->post_slug)->first();
            if($post){
                Comment::create([
                    'post_id' =>$post->id,
                    'user_id' => auth()->user()->id,
                    'comment_body' => $request->comment_body,
                ]);
                return redirect()->back();
            }
        }else{
            redirect()->back();
        }
    }
}
