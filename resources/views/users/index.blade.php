@extends("layouts.app")


@section("content")



<div class="card">
    <div class="card-header">
        <h6>
           User
        </h6>

        @include("Partialviews.error")

    


      
    </div>
    <div class="card-body">
      @if($users->count() > 0)
      <table class="table table-striped table-condensed table-bordered">
        <thead>
          <tr>
             <th>#</th>
             <th>
                 image
             </th>
             <th>
                 Name
             </th>
             <th>
                 email
             </th>
             <th>
                 avalablity
             </th>
          </tr>
        </thead>
        <tbody>
            @php
                $id=1;
            @endphp
           @foreach ($users as $user)
               <tr>
                   <td>
                     @php
                      echo $id++;
                     @endphp
                   </td>
                   <td>
                    <img src="{{ Gravatar::src($user->email) }}" width="50" class="img img-thumbnail">
                   </td>
                   <td>
                       {{$user->name}}
                   </td>
                   <td>
                     {{$user->email}}
                   </td>
                   <td>
                     @if(!$user->Admin())
                     <form action="{{route("makeAdmin",$user->id)}}" method="POST">
                       @csrf
                        @method("PUT")
                       <button class="btn btn-success btn-block" type="submit">Make Admin</button>
                     </form>
               
                     @else
                     <button class="btn btn-block btn-primary">Admin</button>
                     @endif
                     
                   </td>
               </tr>
           
             
           @endforeach
        </tbody>
    </table>
      @else
      <h3 class="text text-center">not found</h3>
      @endif
    </div>
</div>





@endsection



