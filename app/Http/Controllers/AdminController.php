<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

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

    // Create a new post instance
    $post = new Post;
    // Set the title and description from the request
    $post->title = $request->input('title');
    $post->description = $request->input('description');
    //We are putting the image which will received in the file
    $image = $request->image;
     
    $imagename=time().'.'.$image->getClientOriginalExtension();

    $request->image->move('postimage', $imagename);

    $post->image = $imagename;

    // Save the post to the database
    $post->save();

    // Redirect back after adding the post
    return redirect()->back()->with('success', 'Post added successfully!');
}

}
