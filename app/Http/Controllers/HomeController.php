<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // This method is called in the web.php file as a GET route:
    public function index()
    {
        if (Auth::check()) {
            $userType = Auth::user()->usertype; 

            if ($userType === 'user') {
                return view('dashboard');
            } elseif ($userType === 'admin') {
                return view('admin.adminhome');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect()->route('login');
        }
    }

    // This method is not correctly placed inside the HomeController class:
    //I was just using this to call post.blade.php file in the view folder
   /* public function post()
    {
        return view("post");
    } */
    

}
 