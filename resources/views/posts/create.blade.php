@extends("layouts.app")
@section("content")

<div class="card">
    <div class="card-header">
     Posts
    </div>
    <div class="card-body">
        <form action="{{route("posts.store")}}" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title">
        </div>

        <div class="form-group">
            <label for="description">description</label>
            <textarea name="description" id="description" cols="10" rows="10" class="form-control"></textarea>
        </div>
    

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control" name="image" id="image">
        </div>
    @csrf

        <div class="form-group">
            <label for="content">Content</label>
            <input id="content" type="hidden" name="content">
            <trix-editor input="content"></trix-editor>
        </div>
    

        <div class="form-group">
            <lable for="published_at">Published At</lable>
            <input type="text" name="published_at" id="published_at" class="form-control">
        </div>

        <div class="form-group">
            <button class="btn btn-success btn-block">  Create    </button>
        </div>
    </form>
    </div>
</div>






<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.3/flatpickr.min.js"></script>

<script>

flatpickr("#published_at", {
   
enableTime : true
}
);


</script>





@endsection






