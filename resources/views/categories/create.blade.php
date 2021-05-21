@extends("layouts.app")


@section("content")

<div class="card">
    <div class="card-header">
       <h6> New Category</h6>
    </div>

<div class="container">
    @include("Partialviews.error")
</div>

    <div class="card-body">
        <form action="{{route("category.store")}}" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" name="name">
            </div>
            @csrf
            
            <div class="form-group">
               <button class="btn btn-success" type="submit">
                   Create
               </button>
            </div>
        </form>
    </div>
</div>


@endsection