@extends("layouts.app")



@section("content")


@if($comments->count() >0)
<br>

@include("Partialviews.success")

<br>

<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>
            Writer
        </th>
        <th>
            Email
        </th>
        <th>
            Status
        </th>
        <th>
            Action
        </th>
        <th>
            Delete
        </th>
    </tr>
</thead>


<tbody>
    @php
        $id=1;
    @endphp
    @foreach ($comments as $item)
        <tr>
            <td>
                <?= $id++;  ?>
            </td>
            <td>
                {{$item->name}}
            </td>
            <td>
                {{$item->post->title}}
            </td>
            <td>
                {{$item->email}}
            </td>
            <td>
                @if($item->status!="Approve")
                <form action="{{route("comments.Approve",$item->id)}}" method="POST">
                    @csrf
                    @method("put")
                    <button class="btn btn-success">Approve</button>
                </form>
                @else
                <form action="{{route('comments.UnApprove',$item->id)}}" method="POST">
                    @csrf
                    @method("put")

                    <button class="btn btn-danger">UnApprove</button>
                </form>
               @endif
            </td>
            <td>
                <form action="{{route("comments.destroy",$item->id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit"
                    onclick="return confirm('do you want delete this comment?');"
                    >Delete</button>


                </form>
            </td>
        </tr>
    @endforeach
</tbody>
@else
<h1 class="text text-center">not found</h1>
@endif



</table>







@endsection