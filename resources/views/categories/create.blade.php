@extends("layouts.app")


@section("content")

<div class="card">
    <div class="card-header">

        @if(isset($category))
        <h6> Update Category</h6>
        @else
        <h6> New Category</h6>

        @endif
    </div>

<div class="container">
    @include("Partialviews.error")
</div>

    <div class="card-body">
        <form action="{{isset($category) ? route("category.update",$category->id) : route('category.store')}}" method="POST">
@csrf
@if(isset($category))
@method("PUT")
@endif
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="@if(isset($category)) {{$category->name}}
                @endif">
            </div>
            @csrf
            
            <div class="form-group">
              @if(isset($category))
              <button class="btn btn-primary" type="submit">
                Update
            </button>
              @else
              <button class="btn btn-success" type="submit">
                Create
            </button>
              @endif
            </div>
        </form>
    </div>
</div>


@endsection