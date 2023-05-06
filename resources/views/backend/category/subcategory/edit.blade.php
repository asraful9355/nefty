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
            <a href="{{ route('subcategory.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All subcategory </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('subcategory.update',['id'=>$subcategory->id]) }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-12 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Subcategory Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                            <h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="category_id" required="" class="form-control" aria-invalid="false">
										@foreach($categories as $category)
										<option value="{{ $category->id }}" {{ ($category->id == $subcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
										@endforeach
									</select>
								<div class="help-block"></div></div>
								@error('category_id')
									<p class="text-danger">{{ $message  }}</p>
								@enderror
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_en">Subcategory Name (English): <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_en" id="subcategory_name_bn" class="form-control"  value="{{ $subcategory->subcategory_name_en }}">
                                @error('subcategory_name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="title_bn">Subcategory Name (Bangla) <span class="text-danger">*</span></label>
                                <input type="text" name="subcategory_name_bn"  id="subcategory_name_bn" class="form-control" value="{{ $subcategory->subcategory_name_bn }}">
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
                                  @if($subcategory->status == 1)
                                  <option value="1" selected>Active</option>
                                  <option value="0">Disable</option>
                                  @else
                                  <option value="1" >Active</option>
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
