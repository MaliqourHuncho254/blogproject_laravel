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
//this is for show_post which is located in the admin page
public function show_post()
{
    $post =     post::all();
    // Get all the posts from the database
    return view('admin.show_post', compact('post'));
}
// this is for delete_post
public function delete_post($id)
{
    $post = post::find($id);

    $post -> delete();

    return redirect()->back()->with('success', 'Post deleted successfully!');
}

public function edit_page($id)
{
    $post = Post::find($id);

    return view ('admin.edit_page', compact('post'));
}

public function update_post(Request $request, $id)
{
    $data = post::find($id);
    //Title
    $data->title= $request->title;
    //Description 
    $data->description =$request->description; 
    //image
    $image= $request->image;
    if ($image)
    {
        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('postimage', $imagename);

        $data->image = $imagename;
    }
    //Save  image if it exists
    $data->save();
    //return
    return redirect()->back()->with('success', 'Post Updated Successfully');
}

}
