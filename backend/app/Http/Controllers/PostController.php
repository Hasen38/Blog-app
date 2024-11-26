<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
// use App\Http\Requests\StorepostRequest;
// use App\Http\Requests\UpdatepostRequest;
// use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
          $poster = post::latest()->paginate(6);

          return view("posts.index",['poster' => $poster
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create( $request){
        return view('posts.create');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        $fields = $request->validate([
            'title'=> ['required','string','max:20'],
            'body'=> ['required','max:255'],
              ]);

            //   dd($request->$fields);

              Auth::user()->Posts()->create($fields);
              return redirect()->route('dashboard')->with('succes','The Post was created succesfully');

    }
    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show',['post'=> $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        Gate::authorize('modify', $post);
        return view('posts.edit',['post'=> $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, post $post)
    {
         $fields = $request->validate([
            'title' => ['required','max:20'],
            'body'=> ['required','string','max:255'],
        ]);
         $post->update ($fields);
         return redirect()->route('dashboard')->with('succes','Updated Succesfuly');
        }

        /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        Gate::authorize('destroy', $post);
        $post->delete();
        return redirect()->route('dashboard')->with('delete','Your Post is succesfully deleted');
    }
}
