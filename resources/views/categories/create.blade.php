@extends("layouts.app")


@section("content")

<div class="card">
    <div class="card-header">
       <h6> New Category</h6>
    </div>
    <div class="card-body">
        <form action="">
            <div class="form-group">
                <input type="text" class="form-control" name="name">
            </div>

            
            <div class="form-group">
               <button class="btn btn-success" type="submit">
                   Create
               </button>
            </div>
        </form>
    </div>
</div>


@endsection