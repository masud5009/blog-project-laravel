<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('edditor');
    }
    public function users()
    {
        $users = User::orderBy('created_at','DESC')->get();
        return view('admin.users.index')->with(compact('users'));
    }
}
