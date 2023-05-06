@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
          <a href="{{ route('vendor.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Vendor </a>
        </h1>
         <!-- DataTales Example -->
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                            <form method="post" action="{{ route('vendor.store') }}" enctype="multipart/form-data"> @csrf
                              <div class="mb-4">
                                <label for="shop_name" class="col-form-label col-md-4" style="font-weight: bold;"> Shop Name :</label>
                                  <input class="form-control" id="shop_name" type="text" name="shop_name" placeholder="Write vendor shop name" required="" value="">
                              </div>

                              <div class="mb-4">
                                <label for="phone" class="col-form-label col-md-4" style="font-weight: bold;"> Phone :</label>
                                  <input class="form-control" id="phone" type="text" name="phone" placeholder="Write vendor phone number" required="" value="">
                              </div>

                                <div class="mb-4">
                                  <label for="email" class="col-form-label col-md-4" style="font-weight: bold;"> Email :</label>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Write vendor email address" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="fb_url" class="col-form-label col-md-4" style="font-weight: bold;">Facebool URL :</label>
                                  <input class="form-control" id="fb_url" type="text" name="fb_url" placeholder="Write  fb_url " required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="bank_account" class="col-form-label col-md-4" style="font-weight: bold;"> Bank Account :</label>
                                    <input class="form-control" id="bank_account" type="text" name="bank_account" placeholder="Write vendor bank account" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="bank_name" class="col-form-label col-md-4" style="font-weight: bold;"> Bank Name :</label>
                                    <input class="form-control" id="bank_name" type="text" name="bank_name" placeholder="Write vendor bank name" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="holder_name" class="col-form-label col-md-4" style="font-weight: bold;"> Holder Name :</label>
                                    <input class="form-control" id="holder_name" type="text" name="holder_name" placeholder="Write vendor holder name" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="branch_name" class="col-form-label col-md-4" style="font-weight: bold;"> Branch Name :</label>
                                    <input class="form-control" id="branch_name" type="text" name="branch_name" placeholder="Write vendor branch name" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="routing_name" class="col-form-label col-md-4" style="font-weight: bold;">Routing :</label>
                                    <input class="form-control" id="routing_name" type="text" name="routing_name" placeholder="Write vendor branch name" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="address" class="col-form-label col-md-4" style="font-weight: bold;">Address :</label>
                                    <input class="form-control" id="address" type="text" name="address" placeholder="Write vendor address" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="commission" class="col-form-label col-md-4" style="font-weight: bold;">Commission (Optional) :</label>
                                    <input class="form-control" id="commission" type="text" name="commission" placeholder="Write vendor commission" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="description" class="col-form-label col-md-4" style="font-weight: bold;">Description :</label>
                                    <textarea name="description" id="description" cols="5" placeholder="Write vendor description" class="form-control "></textarea>
                                </div>

                                <div class="row">
                                  

                                  <div class="col-md-6">
                                    <div class="mb-4">
                                      <img id="showImage1" class="rounded avatar-lg showImage1" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                                    </div>
                                    <div class="mb-4">
                                      <label for="image1" class="col-form-label" style="font-weight: bold;">Shop Profile::</label>
                                        <input name="shop_profile" class="form-control image1" type="file" required="" id="image1">
                                    </div>
                                  </div>


                                  <div class="col-md-6">
                                    <div class="mb-4">
                                      <img id="showImage2" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                                    </div>
                                    <div class="mb-4">
                                      <label for="image2" class="col-form-label" style="font-weight: bold;">Shop Cover Photo:</label>
                                        <input name="shop_cover" class="form-control" type="file" required="" id="image2">
                                    </div>
                                  </div>

                                </div>

                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="mb-4">
                                      <img id="showImage3" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                                    </div>
                                    <div class="mb-4">
                                      <label for="image3" class="col-form-label" style="font-weight: bold;">Nid Card:</label>
                                        <input name="nid" class="form-control" type="file" id="image3" required="">
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <div class="mb-4">
                                      <img id="showImage4" class="rounded avatar-lg" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                                    </div>
                                    <div class="mb-4">
                                      <label for="image4" class="col-form-label" style="font-weight: bold;">Trade license:</label>
                                        <input name="trade_license" class="form-control" type="file" id="image4" required="">
                                    </div>
                                  </div>
                                </div>

                                <div class="mb-4">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked="" value="1">
                                      <label class="form-check-label cursor" for="status">Status</label>
                                  </div>
                                </div>

                                <div class="row mb-4 justify-content-sm-end">
                                  <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                     <input type="submit" class="btn btn-primary" value="Submit">
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                      <!-- .row // -->
                  </div>
                  <!-- card body .// -->
              </div>
              <!-- card .// -->
            </div>
          </div>




      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
