@extends("layouts.app")


@section("content")

<div class="card">
    <div class="card-header">

        @if(isset($tag))
        <h6> Update tag</h6>
        @else
        <h6> New tag</h6>

        @endif
    </div>

<div class="container">
    @include("Partialviews.error")
</div>

    <div class="card-body">
        <form action="{{isset($tag) ? route("tag.update",$tag->id) : route('tag.store')}}" method="POST">
@csrf
@if(isset($tag))
@method("PUT")
@endif
            <div class="form-group">
                <input type="text" class="form-control" name="name" value="@if(isset($tag))  {{$tag->name}} 
                @endif">
            </div>
            @csrf
            
            <div class="form-group">
              @if(isset($tag))
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