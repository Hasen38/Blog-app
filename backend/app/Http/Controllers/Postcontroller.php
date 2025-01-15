<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\StoreblogsRequest;
// use App\Http\Requests\UpdateblogsRequest;


class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post= Post::latest()->paginate(7);
        return response()->json($post,200);
    }


public function store(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'title' => 'required|max:50',
        'body' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
         // Validate image if uploaded
    ]);

    // Check if the request has an image file
    if ($request->has('image')) {
       $imagepath= request()->file('image')->store('images','public');
       // Try to create a new post
           $post = Post::create([
               'title' => $request->title,
               'body' => $request->body,
               'user_id' => Auth::id(),
               'image' => $imagepath, // Store the relative path of the image in the database
           ]);
           return response()->json($post);
    }
}
    
 


    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {

        // Return the post along with the associated user
        return response()->json($post,
    
          // You can access the user like this
);
    }


    
    
    public function update(Request $request, Post $post)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image'=> 'image|mimes:jpeg,png,jpg,|max:2048'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $post->title = $request->title;
        $post->body = $request->content;
        $post->save();
        return response()->json($post,200);

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Blog deleted successfully'],204);
    }        
    }

