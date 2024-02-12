<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //This is the one that is been called in the file of web.php as a get:
    public function index()
    {
        if(Auth::iid()){
            $usertype=Auth()->user()->usertype; 

            if($usertype=='user'){
                return view('dashboard');
            }
            else if($usertype=='admin'){
                return view('dashboard');
            }
        }
    }
}
