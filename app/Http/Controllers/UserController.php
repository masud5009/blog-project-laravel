<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Edditor redirect which part are not allow for him
     */
    public function __construct()
    {
        $this->middleware('edditor');
    }
    /**
     * All users and edditor are showing
     */
    public function users()
    {
        $users = User::orderBy('created_at','DESC')->get();
        return view('admin.users.index')->with(compact('users'));
    }
}
