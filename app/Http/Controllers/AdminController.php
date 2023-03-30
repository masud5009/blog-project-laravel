<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    /**
     * redirect for admin login page
     */
    public function redirect_admin()
    {
        return redirect('/admin/dashboard');
    }

    /**
     * dashboard index page
     */
    public function index()
    {
        return view('admin.index');
    }

    public function profile($user)
    {
        $user = User::find($user);
        return view('admin.profile.index')->with(compact('user'));
    }
    public function update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->description = $request->description;

        if($request->hasFile('image')){
            $file = $request->file('image');
            $filname = time().'.'.$file->getClientOriginalExtension();
            $file->move('public/storage/user',$filname);
            $user->image = $filname;
        }
        $user->save();
        session()->flash('success','profile created successfully');
        return redirect()->back();
    }
    public function users()
    {
        $users = User::orderBy('created_at','DESC')->get();
        return view('admin.users.index')->with(compact('users'));
    }
}
