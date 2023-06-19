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
            <a href="{{ route('subcategory.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All SubCategory </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Subcategory Create</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="('category_id')">Select Category <span class="text-danger">*</span></label>
                                <select name="category_id" id="category_id" required="" class="form-control select2" aria-invalid="false">
                                    <option value="" selected disabled>Select Category</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label for="title_en">SubCategory Name (English): </label>
                              <input type="text" name="subcategory_name_en" value="{{ old('subcategory_name_en') }}" id="subcategory_name_bn" class="form-control" placeholder="Write subcategory name english">
                              @error('subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                         </div>
                         <div class="col-md-12">
                            <div class="form-group">
                              <label for="title_bn">SubCategory Name (Bangla) <span class="text-danger">*</span></label>
                              <input type="text" name="subcategory_name_bn" value="{{ old('subcategory_name_bn') }}" id="subcategory_name_bn" class="form-control" placeholder="Write subcategory name bangla">
                              @error('subcategory_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
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
