@guest()
   @php
        header("Location: " . URL::to('/login'), true, 302);
        exit();
    @endphp
@endguest

@auth()
  @extends('dashboardlayout.footer')
  @extends('dashboardlayout.body')

@section('content')
         
        <div class="row">
          @if($posts->count() > 0)
          @foreach($posts as $post)
            <div class="col-md-12 flex-container" style="height: 250px;overflow: scroll;display: flex">
              <div id="mdb-lightbox-ui"></div>
                <div class="mdb-lightbox no-margin ">
                  <?php foreach(json_decode($post->filenames) as $images){ ?>
                  <figure class="col-md-4" style="float: left; vertical-align: baseline; flex: 1">
                    <a class="black-text" href="{{ URL::to('../public/PostImages/'.$images)}}"
                      data-size="1600x1067">
                      <img alt="picture" src="{{ URL::to('../public/PostImages/'.$images)}}"
                        class="img-thumbnail" style="height: 200px;margin-left: 2px;padding-left: 0px;">
                    </a>
                  </figure>
                  <?php } ?>
                </div>
              </div>
          @endforeach()
        </div>
        <div class="row">
          @foreach($posts as $post)
          <div class="col-md-4">
            <div class="card" style="width: 18rem;">
              <div class="card-body">
                <h5 class="card-title">Card title : Posts no {{$post->id}}</h5>
                <p class="card-text">Description: {{$post->description}}</p>
                <p class="card-text">{{$post->deescription}}</p>
                <p class="card-text">Posted By: {{$post->user->username}}</p>
                <p class="card-text">Posted On: {{$post->created_at->diffForHumans()}}</p>
                <p class="card-text">Total Likes:{{$post->like->count()}} {{Str::plural('like',$post->like->count())}} </p>
                @if(!$post->likedBy(auth()->user()))
                <form action="{{route('posts.likes',$post)}}" method="post">
                  @csrf
                  <button class="btn btn-success">Like</button> 
                </form>
                @else
                <form action="{{route('posts.likes',$post)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-success">Unlike</button>
                </form>
                @endif
                @if($post->user_id == auth()->user()->id)
                  <form action="{{route('deletepost',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-success">Delete</button>
                  </form>
                @endif
              </div>
            </div>
          </div>
          @endforeach()
            <div class="col-md-4 flex-container" style="height: 60px; overflow:scroll; display: flex">
                {{ $posts->links() }}
            </div>
          @endif
        </div>

@endsection

  @extends('dashboardlayout.sidebar')
  @extends('dashboardlayout.header')
@endauth

