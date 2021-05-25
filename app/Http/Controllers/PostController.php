<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{




    public function __construct()
    {
        return $this->middleware("checkCategory")->only("create");
    }









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
        return view("posts.create")->with("categories",Category::all())->with("tags",Tag::all());
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
       

      $post=  Post::create([
            "title"=>$request->title,
            "description"=>$request->description,
            "content"=>$request->content,
            "image"=>$image,
            "published_at"=>$request->published_at,
            "category_id"=>$request->category,
            "user_id"=>Auth::user()->id
        ]);
        

        if($post->tags)
        {
            $post->tags()->attach($request->tags);
        }


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
        $categories=DB::table('categories')->get();
        $tags=DB::table('tags')->get();
        return view("posts.create",compact("post","categories","tags"));
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

        $data=$request->only(["title","content","description","published_at"]);

       if($request->hasFile("image"))
          {
             $image= $request->image->store("post");
                //deleting old image
               $post->deletImage();

               $data["image"]=$image;
          }
        //update post
        $post->update($data);

        if($request->tags)
        {
            $post->tags()->sync($request->tags);
        }
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
