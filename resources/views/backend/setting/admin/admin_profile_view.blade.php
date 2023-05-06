@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
   <!-- Main content -->
   <div class="content">
      <div class="container-fluied">
         <div class="row mt-3">
            <div class="col-12">
               <div class="card py-3">
                  <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                     <h3 class="card-title pl-3">My Profile</h3>
                     <a data-toggle="modal" data-target="#viewModal" href="" class="btn btn-success col-2 fileinput-button dz-clickable"><i class="fas fa-plus mr-2"></i>Edit Profile</a>
                     <!-- modal -->
                     <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-md modal-dialog-scrollable text-left">
                           <div class="modal-content">
                              <div class="modal-header bg-success">
                                 <h4 class="modal-title text-center" id="myModalLabel">Edit Profile</h4>
                                 <button type="button" class="btn btn-default btn-simple" data-dismiss="modal">Close</button>
                              </div>
                              <div class="modal-body">
                                 <form action="{{  route('update.profile',['id'=>$users->id]) }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                       <label for="title">Name</label>
                                       <input type="text" name="name" class="form-control" value="{{ $users->name }}">
                                    </div>
                                    @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="featured">Email</label>
                                       <input type="email" name="email" class="form-control"  value="{{ $users->email }}">
                                    </div>
                                    @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="title">Mobaile</label>
                                       <input type="number" name="mobaile" class="form-control"  value="{{ $users->mobaile }}">
                                    </div>
                                    @error('mobaile')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                    <div class="form-group mt-3">
                                       <label for="profile_photo_path">My Profile Picture</label>
                                       <input type="file" name="profile_photo_path"  class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <img id="logo_showImage" class="rounded avatar-lg" src="{{ asset($users->profile_photo_path) }}" alt="logo image" width="100px" height="80px;">
                                   </div>
                                    <div class="row mb-4 justify-content-sm-end">
                                       <input type="submit" class="btn btn-success btn-rounded" value="Update Now">
                                    </div>
                              </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="container py-5">
                     <div class="row">
                        <div class="col-lg-4">
                           <div class="card mb-4 bg-white text-light ">
                              <div class="card-body text-center">
                                 <img src="{{ asset($users->profile_photo_path) }}" alt="avatar"
                                    class="rounded-circle img-fluid ms-5" style="width: 150px;">
                                 <h5 class="my-3"></h5>
                              </div>
                           </div>
                           <div class="card mb-4 mb-lg-0">
                           </div>
                        </div>
                        <div class="col-lg-8">
                           <div class="card mb-4">
                              <div class="card-body">
                                 <div class="row">
                                    <p class="mb-0">Full Name : {{ $users->name }}</p>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Email: {{ $users->email }}</p>
                                 </div>
                                 <hr>
                                 <hr>
                                 <div class="row">
                                    <p class="mb-0">Mobile : {{ $users->mobaile }}</p>
                                 </div>
                                 <hr>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
<!-- /.content -->
</div>
<!-- Services Image Show -->
<script type="text/javascript">
   $(document).ready(function(){
       $('#user_image').change(function(e){
           var reader = new FileReader();
           reader.onload = function(e){
               $('#user_showImage').attr('src',e.target.result);
           }
           reader.readAsDataURL(e.target.files['0']);
       });
   });
</script>
@endsection
