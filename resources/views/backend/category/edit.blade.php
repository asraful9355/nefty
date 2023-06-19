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
            <a href="{{ route('category.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Category </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('category.update',['id'=>$category->id]) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-12">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Category Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_en">Category Name (English): <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_en" id="category_name_bn" class="form-control"  value="{{ $category->category_name_en }}">
                                @error('category_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_bn">Category Name (Bangla) <span class="text-danger">*</span></label>
                                <input type="text" name="category_name_bn"  id="category_name_bn" class="form-control" value="{{ $category->category_name_bn }}">
                                @error('category_name_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label for="category_image">Category Image</label>
                              <span class="text-danger">*</span>
                              <span class="">Image Size 180x180</span>
                              @error('category_image')
                                  <span class="text-danger">{{ $message }}</span>
                              @enderror
                              <div class="mb-2">
                                <img id="showImage" class="rounded avatar-lg showImage" src="{{ asset($category->category_image) }}" alt="No Image" width="100px" height="80px;">
                              </div>
                              <div class="input-group">
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input image" name="category_image" id="category_image">
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
                                  @if($category->status == 1)
                                  <option value="1" selected>Active</option>
                                  <option value="0">Disable</option>
                                  @else
                                  <option value="1" >Active</option>
                                  <option value="0" selected>Disable</option>
                                  @endif

                              </select>
                            </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">

                                <fieldset>
                                    <input type="checkbox" id="featured_category" name="featured_category" value="1" {{ ($category->featured_category == 1) ? 'checked': ''}}>
                                    <label for="featured">Featured Category</label>
                                </fieldset>

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
