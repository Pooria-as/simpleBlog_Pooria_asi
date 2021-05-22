@extends("layouts.app")


@section("content")


<div class="d-fles justify-content-end mb-2">
    <a href="{{route("category.create")}}" class="btn btn-success">Add Category</a>
</div>
<div class="card">
    <div class="card-header">
        <h6>
            All Categories
        </h6>

        @include("Partialviews.error")

        <br>



       <table class="table table-striped table-condensed table-bordered">
           <thead>
             <tr>
                <th>#</th>
                <th>
                    Name
                </th>
                <th></th>
             </tr>
           </thead>
           <tbody>
               @php
                   $id=1;
               @endphp
              @foreach ($categories as $category)
                  <tr>
                      <td>
                        @php
                         echo $id++;
                        @endphp
                      </td>
                      <td>
                          {{$category->name}}
                      </td>
                      <td>
                          <a href="{{route("category.edit",$category->id)}}" class="btn btn-primary btn-sm">
                            Edit
                        </a>
                      
                        <button class="btn btn-danger btn-sm" onclick="handleDelete({{$category->id}})">
                            Delete
                        </button>
                      </td>
                  </tr>
              @endforeach
           </tbody>
       </table>
    </div>
</div>



  <!-- Modal -->
  <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <form action="{{route("category.destroy",$category->id)}}" method="POST" id="DeleteForm">
        @csrf
        @method("DELETE")

        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="DeleteModalLabel">Delete Category</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h6>
                  Are you sure to delete Category?
              </h6>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No Thanks</button>
              <button  class="btn btn-danger"  type="submit">Delete</button>
            </div>
          </div>

      </form>

    </div>
  </div>


@endsection


@section("script")

<script>
    function handleDelete(id)
    {
    //    var form=document.getElementById("DeleteForm");
    //    form.action='/category' + id;

        $("#DeleteModal").modal("show");

    }
</script>

@endsection