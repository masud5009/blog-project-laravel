<?php

namespace App\Http\Controllers;

use App\Models\Admin;
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
}
