<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Method for displaying the add post page
    public function post_page()
    {
        return view('admin.post_page');
    }

    // Method for adding a new post
    public function add_post(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Retrieve current user details
        $user = Auth()->user();
        $userId = $user->id;
        $name = $user->name;
        $userType = $user->usertype;

        // Create a new post instance
        $post = new Post;
        
        // Set the post details from the request
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        $post->post_status = 'active';
        $post->user_id = $userId;
        $post->name = $name;
        $post->usertype = $userType;

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
            $post->image = $imageName;
        }

        // Save the post to the database
        $post->save();

        // Redirect back after adding the post
        return redirect()->back()->with('success', 'Post added successfully!');
    }

    // Method for displaying all posts
    public function show_post()
    {
        $posts = Post::all();
        return view('admin.show_post', compact('posts'));
    }

    // Method for deleting a post
    public function delete_post($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->back()->with('success', 'Post deleted successfully!');
    }

    // Method for displaying the edit page for a post
    public function edit_page($id)
    {
        $post = Post::find($id);
        return view('admin.edit_page', compact('post'));
    }

    // Method for updating a post
    public function update_post(Request $request, $id)
    {
        $data = Post::find($id);
        $data->title = $request->title;
        $data->description = $request->description;

        // Handle image update
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move('postimage', $imageName);
            $data->image = $imageName;
        }

        // Save the updated post
        $data->save();

        return redirect()->back()->with('success', 'Post updated successfully');
    }
}
