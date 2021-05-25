<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(Post $post)
    {
       $approve= Comment::where("status",'Approve')->get();

        return view("theme.blog.blog")->with("post",$post)->with("approve",$approve);
    }
    


}
