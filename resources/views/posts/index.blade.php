@extends("layouts.app")
@section("content")


<a href="{{route("posts.create")}}" class="btn btn-success m-2">
New Post</a>

<div class="card">
    <div class="card-header">
       Post
        
    </div>
    <div class="card-body">
      @if($Posts->count() > 0)
      <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>
                    #
                </th>
                <th>
                    title
                </th>
                <th>
                    image
                </th>
                <th>
                    description
                </th>
                <th>
                    created_at
                </th>
                <th>

                </th>
            </tr>
        </thead>
        <tbody>
            @php
                $id=1;
            @endphp
            @foreach ($Posts as $post)
                <tr>
                    <td>
                        <?= $id++; ?>
                    </td>
                    <td>
                        {{$post->title}}
                    </td>
                    <td>
                        <img src="/storage/{{$post->image}}" class="img" width="50" alt="">
                    </td>
                    <td>
                        {{$post->description}}
                    </td>
                    <td>
                        {{$post->created_at}}
                    </td>
                    <td>
                        @if(!$post->trashed())
                        <a href="{{route("posts.edit",$post->id)}}" class="btn btn-primary">edit</a>

                        @else

                        @endif
                        <form action="{{route("posts.destroy",$post->id)}}" method="POST">
                        @csrf
                        @method("DELETE")
                            <button class="btn btn-danger" type="submit">
                               {{$post->trashed() ? "Delete" : "Trash"}}

                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
      @else
      <h3 class="text text-center">
          not found
      </h3>
      @endif
    </div>

</div>










@endsection