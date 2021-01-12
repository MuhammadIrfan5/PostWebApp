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
            <div class="col-md-12">
              <!--<a href="{{route('addpost')}}" style="margin-left: 20px;font-weight: bold;font-size: 25px;">Add Post</a>-->
              <div class="card">
                @if($posts->count() != 0)
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Posts</h4></br>
                  <p class="card-category"> Here are some posts</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          S.no
                        </th>
                        <th>
                          Description
                        </th>
                        <th>
                          Posted On
                        </th>
                        <th>
                          Post By
                        </th>
                        <th>
                          Like/Unlike
                        </th>
                      </thead>
                      @foreach($posts as $post)
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            {{$post->description}}
                          </td>
                          <td>
                            {{$post->created_at->diffForHumans()}}
                          </td>
                          <td>
                            <!--here user is a method or relatioship we created in post model with user model-->
                            {{$post->user->username}}
                          </td>
                          <td>
                            hello
                          </td>
                        </tr>
                      </tbody>
                      @endforeach
                    </table>
                  </div>
                  <div div class="col-sm-3">{{ $posts->links() }}</div>
                </div>
                @else
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Posts</h4></br>
                  <p class="card-category"> No Posts Available</p>
                </div>
                @endif
              </div>
            </div>

    </div>


@endsection

  @extends('dashboardlayout.sidebar')
  @extends('dashboardlayout.header')
@endauth
