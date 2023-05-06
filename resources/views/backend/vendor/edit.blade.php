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
          <a href="{{ route('vendor.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All vendor </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('vendor.update',$vendor->id)}}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>vendor Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_en"> Shop Name : <span class="text-danger">*</span></label>
                                <input type="text" name="shop_name" value="{{ $vendor->shop_name }}" id="brand_name_en" class="form-control">
                                @error('shop_name')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn"> Phone : <span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $vendor->phone }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn"> Email : <span class="text-danger">*</span></label>
                                <input type="email" name="email" value="{{ $vendor->email }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Facebool URL : <span class="text-danger">*</span></label>
                                <input type="text" name="fb_url" value="{{ $vendor->fb_url }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Bank Account : <span class="text-danger">*</span></label>
                                <input type="text" name="bank_account" value="{{ $vendor->bank_account }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Bank Name : <span class="text-danger">*</span></label>
                                <input type="text" name="bank_name" value="{{ $vendor->bank_name }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Holder Name : <span class="text-danger">*</span></label>
                                <input type="text" name="holder_name" value="{{ $vendor->holder_name }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Branch Name : <span class="text-danger">*</span></label>
                                <input type="text" name="branch_name" value="{{ $vendor->branch_name }}" id="brand_name_bn" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="routing_name">Routing : <span class="text-danger">*</span></label>
                                <input type="text" name="routing_name" value="{{ $vendor->routing_name }}" id="routing_name" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="address">Address : <span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ $vendor->address }}" id="address" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="address">Commission (Optional) : <span class="text-danger">*</span></label>
                                <input type="text" name="commission" value="{{ $vendor->commission }}" id="commission" class="form-control">
                              </div>
                           </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">Description : <span class="text-danger">*</span></label>
                                <textarea name="description" id="description" cols="5"  class="form-control ">{{ $vendor->description }}</textarea>
                              </div>
                           </div>



                            <div class="col-md-12">

                              <div class="row">
                                
                                <div class="col-md-6">
                                  <div class="mb-4">
                                    <img id="showImage1" class="rounded avatar-lg showImage1" src="{{ asset($vendor->shop_profile) }}" alt="Card image cap" width="100px" height="80px;">
                                  </div>
                                  <div class="mb-4">
                                    <label for="image1" class="col-form-label" style="font-weight: bold;">Shop Profile::</label>
                                      <input name="shop_profile" class="form-control image1" type="file" id="image1">
                                  </div>
                                </div>


                                <div class="col-md-6">
                                  <div class="mb-4">
                                    <img id="showImage2" class="rounded avatar-lg" src="{{ asset($vendor->shop_cover) }}" alt="Card image cap" width="100px" height="80px;">
                                  </div>
                                  <div class="mb-4">
                                    <label for="image2" class="col-form-label" style="font-weight: bold;">Shop Cover Photo:</label>
                                      <input name="shop_cover" class="form-control" type="file" id="image2">
                                  </div>
                                </div>

                              </div>

                              <div class="row">
                                <div class="col-md-6">
                                  <div class="mb-4">
                                    <img id="showImage3" class="rounded avatar-lg" src="{{ asset($vendor->nid) }}" alt="Card image cap" width="100px" height="80px;">
                                  </div>
                                  <div class="mb-4">
                                    <label for="image3" class="col-form-label" style="font-weight: bold;">Nid Card:</label>
                                      <input name="nid" class="form-control" type="file" id="image3">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="mb-4">
                                    <img id="showImage4" class="rounded avatar-lg" src="{{ asset($vendor->trade_license) }}" alt="Card image cap" width="100px" height="80px;">
                                  </div>
                                  <div class="mb-4">
                                    <label for="image4" class="col-form-label" style="font-weight: bold;">Trade license:</label>
                                      <input name="trade_license" class="form-control" type="file" id="image4">
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                     <span class="text-danger">*</span>

                                    <select name="status" id="status" class="form-control">
                                      @if ($vendor->status == 1)
                                      <option value="1" selected>Active</option>
                                      <option value="0">Disable</option>
                                      @else
                                      <option value="1">Active</option>
                                      <option value="0" selected>Disable</option>
                                      @endif

                                  </select>
                                </div>
                             </div>
                           <div class="col-md-12 text-right">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit">Update</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
