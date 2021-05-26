<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{

 


    public function showRelatedCategoryPost(Category $category)
    {   
        return view("theme.blog.categoryBlog")->with("category",$category)
        ->with("posts",$category->posts()->paginate(2))
        ->with("tags",Tag::all());

    }

    public function showRelatedTagPost(Tag $tag)
    {

        return view("theme.blog.TagBlog")->with("tag",$tag)
        ->with("posts",$tag->posts()->paginate(2))
        ->with("tags",Tag::all());

    }




    public function index(Request $request)
    {
        $searchQuery=$request->query("search");
        if($searchQuery)
        {
           $posts=Post::where("title","LIKE","%{$searchQuery}%")->paginate(2);
        }
        else
        {
         $posts= Post::paginate(2);
        }


        return view("theme.welcome")
        ->with("posts",$posts)
        ->with("categories",Category::all())
        ->with("tags",Tag::all());
    }
}
