<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{



    public function index()
    {
        return view("comments.index")->with("comments",Comment::all());
    }
    

    public function Approve($id)
    {
      DB::table('comments')->where("id",$id)->update(['status'=>"Approve"]);
      return back();

    }

    
    public function UnApprove($id)
    {
        DB::table('comments')->where("id",$id)->update(['status'=>"UnApprove"]);
        return back();
    }


    public function destroy($id)
    {
        DB::table('comments')->where("id",$id)->delete();
        return back()->with("success","Comment Deleted Successfully");
    }


    public function create(CommentRequest $request,Post $post)
    {
        Comment::create([
            "name"=>$request->name,
            "content"=>$request->content,
            "post_id"=>$post->id,
            "email"=>$request->email
        ]);
     
        

        return back()->with("success","your commnt added wait for accept it from admin");


    }
}
