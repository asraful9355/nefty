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
          <a href="{{ route('banner.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Banner List </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('banner.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Banner Create</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="banner_title_en">Banner Title (English): <span class="text-danger">*</span></label>
                                <input type="text" name="banner_title_en" value="" id="banner_title_en" class="form-control" placeholder="Write banner Title English">
                                @error('banner_title_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="banner_title_bn">Banner Title (Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="banner_title_bn" value="" id="banner_title_bn" class="form-control" placeholder="Write banner Title Bangla">
                                @error('banner_title_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="banner_description_en">Banner Description (en): <span class="text-danger">*</span></label>
                                <input type="text" name="banner_description_en" value="" id="banner_description_en" class="form-control" placeholder="Write Banner Description En">
                                @error('banner_description_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="banner_description_bn">Banner Description (Bn): <span class="text-danger">*</span></label>
                                <input type="text" name="banner_description_bn" value="" id="banner_description_bn" class="form-control" placeholder="Write Banner Description Bn">
                                @error('banner_description_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="button_name_en">Button Name(en): <span class="text-danger">*</span></label>
                                <input type="text" name="button_name_en" value="" id="button_name_en" class="form-control" placeholder="Write Button Name En">
                                @error('banner_description_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="button_name_bn">Butoton Name (Bn): <span class="text-danger">*</span></label>
                                <input type="text" name="button_name_bn" value="" id="button_name_bn" class="form-control" placeholder="Write Button Name Bn">
                                @error('button_name_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="button_url">Butoton URL : <span class="text-danger">*</span></label>
                                <input type="text" name="button_url" value="" id="button_url" class="form-control" placeholder="Write Button Name Bn">
                                @error('button_url')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="banner_image">Banner Image</label>
                                <span class="text-danger">*</span>
                                <span class="">Image Size 180x180</span>

                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input image" name="banner_image" id="banner_image">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
                                </div>
                                @error('banner_image')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            <div class="mb-2">
                              <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                            </div>
                              </div>
                            </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="status">Status</label>
                                   <span class="text-danger">*</span>
                                  <select name="status" id="status" class="form-control">
                                      <option value="1">Active</option>
                                      <option value="0">Disable</option>
                                  </select>
                              </div>
                           </div>
                           <div class="col-md-12 text-right">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
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
