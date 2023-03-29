<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $guarded =[
        'sitename',
        'image',
        'twitter',
        'facebook',
        'instagram',
        'email',
        'address',
        'phone',
        'copyright',
        'reddit',
        'about',
        'created_at',
        'updated_at'
    ];
}
