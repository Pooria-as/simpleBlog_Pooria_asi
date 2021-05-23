<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Posts=Post::all();
        return view("posts.index")->with("Posts",$Posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        //uploading file or image
       $image=$request->image->store("post");
       //create post

        Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "content"=>$request->content,
            "image"=>$image,
            "published_at"=>$request->published_at
        ]);


            session()->flash("success","Post Created Successfully");


            return redirect(route("posts.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view("posts.create",compact("post"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
        //uploading new image

       if($request->hasFile("image"))
          {
             $img= $request->image->store("post");
                //deleting old image
               $post->deletImage();
          }
        //update post
          $post->update([
            "title"=>$request->title,
            "description"=>$request->description,
            "content"=>$request->content,
            "image"=>$img,
            "published_at"=>$request->published_at
          ]);
        //message
        session()->flash("success","Post updated Successfully");
        //redirecting
        return redirect(route("posts.index"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post=Post::withTrashed()->where("id",$id)->firstOrFail();
        if($post->trashed())
        {
            Storage::delete($post->image);
            $post->forceDelete();
        }
        else{
            $post->delete();

        }

        session()->flash("success","Post Deleted Successfully");
  
        return redirect(route("posts.index"));
    }



    public function trash()
    {
        $trashed=Post::onlyTrashed()->get();

        return view("posts.index")->with("Posts",$trashed);
    }

    public function retore($id)
    {
        
        $post=Post::withTrashed()->where("id",$id)->firstOrFail();
        $post->restore();

        session()->flash("success","Post Restore Successfully");
  
        return redirect(route("posts.index"));

    }


 
}
