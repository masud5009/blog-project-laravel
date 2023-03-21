<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}