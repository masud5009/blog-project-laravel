<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        //HEADER POST
        $header_posts = Post::orderBy('created_at', 'DESC')->take(5)->get();
        $first_header = $header_posts->splice(0, 2);
        $second_header = $header_posts->splice(0, 1);
        $last_header = $header_posts->splice(0);
        //FOOTER POST
        $footer_post = Post::inRandomOrder()->take(4)->get();
        $first_footer = $footer_post->splice(0, 1);
        $second_footer = $footer_post->splice(0, 2);
        $last_footer = $footer_post->splice(0, 1);
        //RECENT POST
        $recentPosts = Post::orderBy('created_at', 'DESC')->paginate(9);
        //USER
        $user = auth()->User();
        $setting = Setting::find(1);
        $category = Category::all();
        $data = compact('setting','category', 'header_posts', 'first_header', 'second_header', 'last_header', 'recentPosts', 'footer_post', 'first_footer', 'second_footer', 'last_footer');
        return view('welcome')->with($data);
    }
    public function post($slug)
    {
        $post = Post::all()->where('slug', $slug)->first();
        $popular_post = Post::inRandomOrder()->limit(3)->get();
        //RELATED POST
        $relatedPost = Post::orderBy('category_id', 'DESC')->inRandomOrder()->take(4)->get();
        $firstPost = $relatedPost->splice(0, 1);
        $secondPost = $relatedPost->splice(0, 1);
        $lastPost = $relatedPost->splice(0, 2);

        $user = auth()->User();
        $category = Category::all();
        $tags = Tag::all();
        if ($post) {
            return view('post', compact('user', 'post', 'popular_post', 'category', 'tags', 'relatedPost', 'firstPost', 'secondPost', 'lastPost'));
        } else {
            return redirect('/');
        }
    }

    public function category($slug)
    {
        $categroy = Category::where('slug', $slug)->first();
        if ($categroy) {
            $posts = Post::where('category_id', $categroy->id)->paginate(9);
            $data = compact('categroy', 'posts');
            return view('category')->with($data);
        } else {
            return redirect()->route('index');
        }
    }
}
