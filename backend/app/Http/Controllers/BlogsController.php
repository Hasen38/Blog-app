<?php

namespace App\Http\Controllers;

use App\Models\blogs;
use Illuminate\Http\Request;
use App\Http\Requests\StoreblogsRequest;
use App\Http\Requests\UpdateblogsRequest;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            "title"=> "required|string",
            "body"=> "required|string",
        ]);

        if ($validated->fails()) {
            return response()->json($validated->errors(), 403);
        }
            try {
            $blogs = new blogs();
            $blogs->title = $request->title;
            $blogs->body = $request->body;
            $blogs->save();
                        
            return response()->json([
                "status"=> "true",
                "message"=> "The blog has been created succesfuly"
            ],200);
            } catch (\Exception $th) {
                return response()->json(['error'=>$th->getMessage()],403);
            }
        }    
    

    /**
     * Display the specified resource.
     */
    public function show(blogs $blogs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(blogs $blogs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateblogsRequest $request, blogs $blogs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(blogs $blogs)
    {
        //
    }
}
