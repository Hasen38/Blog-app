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
use App\Http\Resources\PostResource;
use Symfony\Component\Console\Input\Input;

// use Illuminate\Support\Facades\Log;
// use Illuminate\Support\Facades\Validator;
// use App\Http\Requests\StoreblogsRequest;
// use App\Http\Requests\UpdateblogsRequest;


class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Post::with('user');

        // Filter by category if provided
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        $posts = $query->latest()->paginate(10);
        return response()->json([
            'posts' => $posts,

        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'user_id' => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $imagePath = Storage::url($imagePath);
        }

        Post::create([
            'title' => $validated['title'],
            'body' => $validated['body'],
            'image' => $imagePath,
            'category_id' => $validated['category_id'] ?? null,
            'user_id' => $validated['user_id'],
        ]);

        return response('', 200);
    }



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return new PostResource($post);
    }




    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|max:50',
            'body' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,bmp,gif,svg,webp|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($post->image) {
                $oldPath = str_replace('/storage', '/public', $post->image);
                Storage::delete($oldPath);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $validated['image'] = Storage::url($imagePath);
        }

        $post->update($validated);
        return new PostResource($post);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return response()->json(['message' => 'Blog deleted successfully'], 204);
    }
}
