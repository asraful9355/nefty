@extends('layouts.app2')
@section('slider_create') active @endsection
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
            <a href="{{ route('slider.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Slider </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('slider.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Slider Create</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_en">Title (English): <span class="text-danger">*</span></label>
                                <input type="text" name="title_en" value="" id="title_en" class="form-control" placeholder="Write Slider Title English">
                                @error('title_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_bn">Title (Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="title_bn" value="" id="title_bn" class="form-control" placeholder="Write Slider Title Bangla">
                                @error('title_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="slider_url"> Slider Url: <span class="text-danger">*</span></label>
                                <input type="text" name="slider_url" value="" id="slider_url" class="form-control" placeholder="Write Slider Url">
                                @error('slider_url')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="description_en">Description (English):
                                    <span class="text-danger">*</span>
                                  </label>
                                  <textarea class="summernote" id="description_en" name="description_en"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="description_bn">Description (Bangla):
                                    <span class="text-danger">*</span>
                                  </label>
                                  <textarea class="summernote" id="description_bn" name="description_bn"></textarea>
                              </div>
                           </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="slider_img">Slider Image</label>
                                <span class="text-danger">*</span>
                                <span class="text-danger">Image Size 600x600</span>
                                @error('slider_img')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-2">
                                  <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="No Image" width="100px" height="80px;">
                                </div>
                                <div class="input-group">
                                  <div class="custom-file">
                                    <input type="file" class="custom-file-input image" name="slider_img" id="slider_img">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                  </div>
                                  <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                  </div>
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
