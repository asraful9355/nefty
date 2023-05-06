@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Account</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Account</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <!--start shop cart-->
        <section class="py-4">
            <div class="container">
                <h3 class="d-none">Account</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    @include('frontend.common.usersidebar')
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <form class="row g-3" method="post" action="{{ route('user.profile.store') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="col-sm-6">
                                                <label for="inputFirstName" class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" id="inputFirstName" placeholder="Write Name" value="{{ $adminData->name }}">
                                                @error('name')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                              <label for="inputLastName" class="form-label">User Name</label>
                                              <input type="text" name="username" class="form-control" id="inputLastName" placeholder="Write UserName" value="{{ $adminData->username }}" >
                                              @error('username')
                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="col-sm-6">
                                              <label for="inputEmailAddress" class="form-label">Email Address</label>
                                              <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Write Email" value="{{ $adminData->email }}">
                                              @error('email')
                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="col-sm-6">
                                              <label for="phone" class="form-label">Phone</label>
                                              <input type="number" name="phone" class="form-control" id="phone" placeholder="Write Number" value="{{ $adminData->phone }}">
                                              @error('phone')
                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="col-sm-6">
                                              <label for="address" class="form-label">Address</label>
                                              <input type="text" name="address" class="form-control" id="address" placeholder="Write Address" value="{{ $adminData->address }}">
                                              @error('address')
                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                              @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="facebook" class="form-label">Facebook</label>
                                                <input type="text" name="facebook" class="form-control" id="facebook" placeholder="Write facebook link" value="{{ $adminData->facebook }}">
                                                @error('facebook')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="twitter" class="form-label">Twitter</label>
                                                <input type="text" name="twitter" class="form-control" id="twitter" placeholder="Write twitter link" value="{{ $adminData->twitter }}">
                                                @error('twitter')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="linkedin" class="form-label">LinkedIn</label>
                                                <input type="text" name="linkedin" class="form-control" id="linkedin" placeholder="Write linkedin link" value="{{ $adminData->linkedin }}">
                                                @error('linkedin')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="whatsapp" class="form-label">Whatsapp</label>
                                                <input type="text" name="whatsapp" class="form-control" id="whatsapp" placeholder="Write whatsapp link" value="{{ $adminData->whatsapp }}">
                                                @error('whatsapp')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-6">
                                                <label for="youtube" class="form-label">Youtube</label>
                                                <input type="text" name="youtube" class="form-control" id="youtube" placeholder="Write youtube link" value="{{ $adminData->youtube }}">
                                                @error('youtube')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="website" class="form-label">Website</label>
                                                <input type="text" name="website" class="form-control" id="website" placeholder="Write website link" value="{{ $adminData->website }}">
                                                @error('website')
                                                  <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12">
                                                <label for="about_us" class="form-label">About Us</label>
                                                <textarea name="about_us" cols="3" rows="3" id="about_us" class="form-control">{{ $adminData->about_us }}</textarea>
                                            </div>
                                            <div class="col-sm-12">
                                              <label for="photo" class="form-label">Photo</label>
                                               <input type="file" name="photo" class="form-control"  id="image"   />
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-sm-12 text-secondary">
                                                  <img id="showImage" name="photo" src="{{ (!empty($adminData->photo)) ? url('upload/user_images/'.$adminData->photo):url('upload/no_image.jpg') }}" alt="User" style="width:80px; height: 80px;"  >
                                                </div>
                                            </div>
                                            <div class="col-sm-12 text-secondary">
                                              <input type="submit" class="btn btn-light btn-ecomm" style="float: right;" value="Save Changes" />
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
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
