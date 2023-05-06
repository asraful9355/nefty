@extends('layouts.app2')
@section('content')
<div class="content-wrapper">
   <!-- Main content -->
   <div class="content">
      <div class="container-fluied">
         <div class="row mt-3">
            <div class="col-12">
               <div class="card py-3">
                  <div class="d-flex justify-content-between align-items-center" style="padding:15px">
                     <h3 class="card-title pl-3">Password Update</h3>
                  </div>
                  <div class="container mt-3 pl-5">
                     <form action="{{ route('user.password.update')}}" method="post">
                        {{ csrf_field() }}
                        <div class="form-group">
                           <h5>Current Password <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="password" id="current_password" name="oldpassword" class="form-control"  value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>New Password <span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="password" name="password" id="password" class="form-control"  value="" required>
                           </div>
                        </div>
                        <div class="form-group">
                           <h5>Confirm Password User<span class="text-danger">*</span></h5>
                           <div class="controls">
                              <input type="password" name="password_confirmation " id="password_confirmation" class="form-control"  value="" required>
                           </div>
                        </div>
                        <div class="text-xs-right">
                           <input type="submit" class="btn btn-rounded btn-success mb-5" value="Update">
                        </div>
                     </form>
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
@endsection
