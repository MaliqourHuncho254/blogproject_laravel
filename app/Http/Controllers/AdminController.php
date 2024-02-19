<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //This is for the add post 
    public function post_page()
    {
        return view('admin.post_page');
    }
}
