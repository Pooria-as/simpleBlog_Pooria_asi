@extends("theme.layout.master")
@section("title","Blog")


@section("Header")
<header class="header text-white h-fullscreen pb-80" style="background-image: url(/storage/{{$post->image}});" data-overlay="9">
    <div class="container text-center">

      <div class="row h-100">
        <div class="col-lg-8 mx-auto align-self-center">

          <p class="opacity-70 text-uppercase small ls-1">{{$post->category->name}}</p>
          <h1 class="display-4 mt-7 mb-8">{{$post->title}}</h1>
          <p><span class="opacity-70 mr-1">By</span> <a class="text-white" href="#">
       
            {{$post->user->name}}
          </a></p>
          <p><img class="avatar avatar-sm" src="{{ Gravatar::src($post->user->email) }}" alt="..."></p>

        </div>

        <div class="col-12 align-self-end text-center">
          <a class="scroll-down-1 scroll-down-white" href="#section-content"><span></span></a>
        </div>

      </div>

    </div>
  </header>
@endsection

@section("content")
<main class="main-content">


    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Blog content
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section" id="section-content">
      <div class="container">

        {!!$post->content!!}


        <div class="row">
          <div class="col-lg-8 mx-auto">

         
            <div class="gap-xy-2 mt-6">
                @foreach ($post->tags as $item)
                    
              <a class="badge badge-pill badge-secondary" href="#">
                  {{$item->name}}
              </a>
              @endforeach
              
            </div>

          </div>
        </div>


      </div>
    </div>



    <!--
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    | Comments
    |‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒‒
    !-->
    <div class="section bg-gray">
      <div class="container">

        <div class="row">
          <div class="col-lg-8 mx-auto">

            <div class="media-list">


              @foreach ($approve as $comment)
              <div class="media">
                {{-- <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="..."> --}}

                <div class="media-body">
                  <div class="small-1">
                    <strong>
                      {{$comment->name}}
                    </strong>
                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">
                      {{$comment->created_at->diffForHumans()}}
                    </time>
                  </div>
                  <p class="small-2 mb-0">
                    {{$comment->content}}
                  </p>
                </div>
              </div>

              @endforeach

             



            </div>


            <hr>


            <br>
           @include("layouts.success")
            <br>
            <form action="{{route("comments.create",$post->id)}}" method="POST">
              @csrf
            
              <div class="row">
                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="text" placeholder="Name" name="name">
                </div>

                <div class="form-group col-12 col-md-6">
                  <input class="form-control" type="text" placeholder="Email" name="email">
                </div>
              </div>

              <div class="form-group">
                <textarea class="form-control" placeholder="Comment" name="content" rows="4"></textarea>
              </div>

              <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
            </form>

          </div>
        </div>

      </div>
    </div>



  </main>
@endsection














