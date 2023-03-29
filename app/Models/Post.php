<?php

namespace App\Models;

use App\Models\Tag;
use App\Models\User;
use App\Models\Reply;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $guarded = ['created_at','updated_at'];
    protected $dates = [
        'published_at',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function tag(){
        return $this->belongsToMany(Tag::class);
    }
    public static function postCount($id)
    {
        return Post::where('category_id',$id)->count();
    }
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}
