@extends('layouts.app2')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
   <div class="container">
      <div class="main-body">
         <div class="row">
            <div class="col-lg-4">
               <div class="card shadow mb-4">
                  <div class="card-body">
                     <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                        <div class="mt-3">
                           <h4>{{ $adminData->name }}</h4>
                           <p class="text-secondary mb-1">{{ $adminData->email }}</p>
                           <p class="text-muted font-size-sm">{{ $adminData->address }}</p>
                        </div>
                     </div>
                     <hr class="my-4" />
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                              <i class="fa-brands fa-facebook" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->facebook }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                              <i class="fa-brands fa-linkedin" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->linkedin }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                           	<i class="fa-brands fa-twitter" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->twitter }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                              <i class="fa-brands fa-square-whatsapp" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->whatsapp }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                              <i class="fa-brands fa-youtube" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->whatsapp }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                           <h6 class="mb-0">
                           	<i class="fa-solid fa-star" style="font-size: 22px;"></i>
                           </h6>
                           <span class="text-secondary">{{ $adminData->website }}</span>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
            <div class="col-lg-8">
               <div class="card shadow mb-4">
                  <div class="card-body">
                    <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data" >
                        @csrf
                        <div class="row mb-3">
                           <div class="col-sm-3">
                               <label class="mb-0" for="name">Name</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" class="form-control" name="name" id="name" value="{{ $adminData->name }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                                <label class="mb-0" for="username">Username</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="username" class="form-control" id="username" value="{{ $adminData->username }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                                <label class="mb-0" for="email">Email</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="email" name="email" class="form-control" id="email" value="{{ $adminData->email }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="phone">Phone</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="phone" class="form-control" id="phone" value="{{ $adminData->phone }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="address">Address</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           	<textarea name="address" cols="3" rows="3" id="address" class="form-control">{{ $adminData->address }}</textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="facebook">Facebook</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $adminData->facebook }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="twitter">Twitter</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $adminData->twitter }}" />
                           </div>
                        </div>
                         <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="linkedin">LinkedIn</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="linkedin" class="form-control" id="linkedin" value="{{ $adminData->linkedin }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="whatsapp">Whatsapp</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="whatsapp" class="form-control" id="whatsapp" value="{{ $adminData->whatsapp }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="youtube">Youtube</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="youtube" class="form-control" id="youtube" value="{{ $adminData->youtube }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="website">Website</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="text" name="website" class="form-control" id="website" value="{{ $adminData->website }}" />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <label class="mb-0" for="about_us">About Us</label>
                           </div>
                           <div class="col-sm-9 text-secondary">
                           	<textarea name="about_us" cols="3" rows="3" id="about_us" class="form-control">{{ $adminData->about_us }}</textarea>
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <h6 class="mb-0">Photo</h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <input type="file" name="photo" class="form-control"  id="image"   />
                           </div>
                        </div>
                        <div class="row mb-3">
                           <div class="col-sm-3">
                              <h6 class="mb-0"> </h6>
                           </div>
                           <div class="col-sm-9 text-secondary">
                              <img id="showImage" name="photo" src="{{ (!empty($adminData->photo)) ? url('upload/admin_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="Admin" style="width:100px; height: 100px;"  >
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-sm-3"></div>
                           <div class="col-sm-9 text-secondary text-right">
                              <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                           </div>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#showImage').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});


</script>
@endsection