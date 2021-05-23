@extends("layouts.app")
@section("content")

<div class="card">
    <div class="card-header">
     
@if(isset($post))

Edit Post
@else
Post
@endif

    </div>
    <div class="card-body">
        <form action="{{ isset($post) ? route("posts.update",$post->id) : route("posts.store") }}" method="POST" enctype="multipart/form-data">

            @if(isset($post))

            @method("PUT")

            @endif
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" 
            value="{{isset($post) ? $post->title : ''}}"> 
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <textarea name="description" id="description" cols="10" rows="10" class="form-control">

            {{isset($post) ? $post->description : ''}}
            </textarea>
        </div>
        
        @if(isset($post))
        <div class="form-group">
            <img src="/storage/{{$post->image}}" class="img" width="100" alt="">
        </div>
        @endif

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
    @csrf

        <div class="form-group">
            <label for="content">Content</label>
            <input id="content" type="hidden" name="content" value="{{isset($post) ? $post->content : "" }}">
            <trix-editor input="content"></trix-editor>
        </div>
    

        <div class="form-group">
            <lable for="published_at">Published At</lable>
            <input type="text" name="published_at" id="published_at" class="form-control" value="{{isset($post) ? $post->published_at : "" }}">
        </div>

        <div class="form-group">
            @if(!isset($post))
            <button class="btn btn-success btn-block" type="submit">Create</button>
            @else
            <button class="btn btn-primary btn-block" type="submit">update</button>

            @endif
        </div>
    </form>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>

<script>

flatpickr("#published_at", {enableTime : true}
);

</script>

@endsection






