<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReplyController extends Controller
{
    public function store(Request $request)
    {
        if(Auth::check()){
            $reply = new Reply();
            $reply->user_id = auth()->user()->id;
            $reply->comment_id = $request->commentId;
            $reply->reply = $request->reply_body;
            $reply->save();
            return redirect()->back();
        }else{
            return redirect('/login');
        }
    }
}
