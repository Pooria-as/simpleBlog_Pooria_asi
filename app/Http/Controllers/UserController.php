<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        return view("users.index")->with("users",User::all());
    }

    public function MakeAdmin($id)
    {
    //    $user->role="Admin";

    //     $user->save();
    
    DB::table('users')->where("id",$id)->update(["role"=>"Admin"]);
  

        session()->flash("success","User Admin Successfully");


        return redirect(route("users.index"));
    }


    public function Profile()
    {
        return view("profile.index")->with("user",auth()->user());
    }

    public function updateProfile(ProfileRequest $request)

    {
        $user = auth()->user();
        

        
        $user->update([
            "name"=>$request->name,
            "About"=>$request->About
        ]);
        
        
      
        
        session()->flash("success","User updaetd Successfully");


        return redirect(route("profile"));
    }
}
