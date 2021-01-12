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
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{route('addpost')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>About Post</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea class="form-control" rows="5" required name="description"></textarea>
                          </div>
                        </div>
                        <div class="field">
      			              <div>
      			                @error('description')
      			                  {{$message}}
      			                @enderror
      			              </div>
			                   </div>
                      </div>
                      <div class="col-md-6">
                        <div class="grid-x grid-padding-x">
                          <div class="small-10 small-offset-1 medium-8 medium-offset-2 cell">
                            
                           <!-- <form action="upload_file.php" id="img-upload-form" method="post" enctype="multipart/form-data">-->
                              <p>
                                <label for="upload_imgs" class="button hollow">Select Your Images +</label>
                                <input class="show-for-sr" type="file" id="upload_imgs" name="filenames[]" multiple/>
                              </p>
                              <div class="quote-imgs-thumbs quote-imgs-thumbs--hidden" id="img_preview" aria-live="polite"></div>
                              
                           <!-- </form>-->
                          </div>
                        </div>
                      </div>
                    </div>
                    <input type="submit" class="btn btn-primary pull-right" value="Add"/>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
   		 </div>
@endsection

  @extends('dashboardlayout.sidebar')
  @extends('dashboardlayout.header')
@endauth
