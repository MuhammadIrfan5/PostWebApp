@guest()
   @php
        header("Location: " . URL::to('/login'), true, 302);
        exit();
    @endphp
@endguest

@auth()
  @include('sweet::alert')
  @extends('dashboardlayout.footer')
  @extends('dashboardlayout.body')

@section('content')


<div class="row">
    @if ($message = Session::get('status'))
        <div>
            {{ route('alert',$message)}}
        </div>
    @endif
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Product</h4>
                  <p class="card-category">Add Product information</p>
                </div>
                <div class="card-body" >
                  <form enctype="multipart/form-data" method="POST" action="{{route('addproduct')}}">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product Name</label>
                          <input type="text" class="form-control" name="productname">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Slug</label>
                          <input type="text" class="form-control" name="slug">
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Shipping cost</label>
                          <input type="text" class="form-control" name="shipping_cost"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Product cost</label>
                          <input type="text" class="form-control" name="price">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Details</label>
                          <input type="text" class="form-control" name="details">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Product Description</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> Lamborghini Mercy, Your chick she so thirsty, I'm in that two seat Lambo.</label>
                            <textarea class="form-control" rows="5" name="description"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="input-field input-images-2">
					        <label class="active">Photos</label>
					        <div class="input-images-2" style="padding-top: .5rem;">
					        	<input class="input-images-2 show-for-sr btn btn-primary" type="file" id="upload_imgs" name="image_path[]" multiple />
					        </div>
					    </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Add Product</button>
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
<script type="text/javascript">
@{{	
$('.input-images-2').imageUploader({
    preloaded: preloaded,
    imagesInputName: 'photos',
    preloadedInputName: 'old'
});
}}
</script>