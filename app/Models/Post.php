<?php

namespace App\Models;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
USE Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
   protected $fillable=['title',"description","content","image","published_at"];
   use SoftDeletes;


  
public function deletImage()
{
   Storage::delete($this->image);

}


}
