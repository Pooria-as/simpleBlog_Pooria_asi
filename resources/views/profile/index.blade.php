@extends("layouts.app")
@section("content")

@include("Partialviews.error")
<br>

<form action="{{route("Updateprofile")}}" method="POST">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label for="name">name</label>
        <input type="text" name="name" class="form-control" value="{{$user->name}}">
    </div>
    
    <div class="form-group">
        <label for="About">content</label>
    <textarea name="About" id="content" cols="10" rows="10" class="form-control">
        {{$user->About}}
    </textarea>
    </div>
    

    <div class="from-group">
        <button class="btn btn-success" type="submit">Update Profile</button>
    </div>


</form>


@endsection