<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

   protected $fillable=['title',"description","content","image","published_at","category_id","user_id"];

   
   use SoftDeletes;


  
public function deletImage()
{
   Storage::delete($this->image);

}

public function category()
{
   return $this->belongsTo(Category::class);
}

public function tags()
{
    return $this->belongsToMany(Tag::class);
}


public function hasTag($tag_id)
{
return in_array($tag_id,$this->tags->pluck('id')->toArray());
}

public function user()
{
   return $this->belongsTo(User::class);
}
public function comments()
{
   return $this->hasMany(Comment::class);
}


}
