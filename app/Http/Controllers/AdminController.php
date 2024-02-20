<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // This method is for displaying the add post page
    public function post_page()
    {
        return view('admin.post_page');
    }

    // This method is for adding a new post
    public function add_post(Request $request)
{
    // Validate the request data if needed
    $request->validate([
        'title' => 'required',
        'description' => 'required',
    ]);
    $user=Auth()->user();

    $userid = $user->id;

    $name = $user-> name;

    $usertype = $user->usertype;


    // Create a new post instance
    $post = new Post;
    // Set the title and description from the request
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    //this is for post status
    $post->post_status = 'active';
    //this is for user_id
    $post->user_id = $userid;
    //this is for name
    $post->name= $name;
    //this is for usertype
    $post->usertype = $usertype;



    //We are putting the image which will received in the file
    $image = $request->image;

    if($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('postimage', $imagename);

        $post->image = $imagename;  
    }
     
    // Save the post to the database
    $post->save();

    // Redirect back after adding the post
    return redirect()->back()->with('success', 'Post added successfully!');
}

}
