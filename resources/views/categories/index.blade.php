@extends("layouts.app")


@section("content")


<div class="d-fles justify-content-end mb-2">
    <a href="{{route("category.create")}}" class="btn btn-success">Add Category</a>
</div>
<div class="card">
    <div class="card-header">
        categorys
    </div>
</div>


@endsection