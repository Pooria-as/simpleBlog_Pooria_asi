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
                  </tr>
              @endforeach
           </tbody>
       </table>
    </div>
</div>


@endsection