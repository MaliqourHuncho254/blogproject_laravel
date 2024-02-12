<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    //This is the one that is been called in the file of web.php as a get:
    public function index()
    {
        if(Auth::id()){
            $usertype=Auth()->user()->usertype; 

            if($usertype=='user'){
                return view('dashboard');
            }
            //I think this is the one that is going to call admin home 
            else if($usertype=='admin'){
                return view('admin.adminhome');
            }
            else{
                return redirect()->back();
            }
        }
    }
}
