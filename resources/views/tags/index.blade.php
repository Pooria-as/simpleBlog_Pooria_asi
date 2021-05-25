@extends("layouts.app")


@section("content")


<div class="d-fles justify-content-end mb-2">
    <a href="{{route("tag.create")}}" class="btn btn-success">Add Tag</a>
</div>
<div class="card">
    <div class="card-header">
        <h6>
            All tags
        </h6>

        @include("Partialviews.error")

    


      
    </div>
    <div class="card-body">
      @if($tags->count() > 0)
      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
             <th>#</th>
             <th>
                 Name
             </th>
             <th>
               Post Count
             </th>
             <th></th>
          </tr>
        </thead>
        <tbody>
            @php
                $id=1;
            @endphp
           @foreach ($tags as $tag)
               <tr>
                   <td>
                     @php
                      echo $id++;
                     @endphp
                   </td>
                   <td>
                       {{$tag->name}}
                   </td>
                   <td>
                    {{$tag->posts->count()}}
                   </td>
                   <td>
                       <a href="{{route("tag.edit",$tag->id)}}" class="btn btn-primary btn-sm">
                         Edit
                     </a>
                   
                     <button class="btn btn-danger btn-sm" onclick="handleDelete({{$tag->id}})">
                         Delete
                     </button>
                   </td>
               </tr>
               <div class="modal fade" id="DeleteModal" tabindex="-1" role="dialog" aria-labelledby="DeleteModalLabel" aria-hidden="true">
                 <div class="modal-dialog" role="document">
                   <form action="{{route("tag.destroy",$tag->id)}}" method="POST" id="DeleteForm">
                     @csrf
                     @method("DELETE")
             
                     <div class="modal-content">
                         <div class="modal-header">
                           <h5 class="modal-title" id="DeleteModalLabel">Delete Tag</h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                           </button>
                         </div>
                         <div class="modal-body">
                           <h6>
                               Are you sure to delete Tag?
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
             
           @endforeach
        </tbody>
    </table>
      @else
      <h3 class="text text-center">not found</h3>
      @endif
    </div>
</div>



  <!-- Modal -->


@endsection


@section("script")

<script>
    function handleDelete(id)
    {
    //    var form=document.getElementById("DeleteForm");
    //    form.action='/Tag' + id;

        $("#DeleteModal").modal("show");

    }
</script>

@endsection