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
          <a href="{{ route('subsubcategory.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All subsubcategory </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('subsubcategory.udate',$subsubcategory->id) }}">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>SubSubCategory Edit</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_en">Select Category: <span class="text-danger">*</span></label>
                                <select name="category_id" required="" class="form-control" aria-invalid="false">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ ($category->id == $subsubcategory->category_id) ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                                    @endforeach

                                </select>
                                @error('category_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="brand_name_bn">SubCategory Select: <span class="text-danger">*</span></label>
                                <select name="subcategory_id" required="" class="form-control" aria-invalid="false">
                                    @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}" {{ ($subcategory->id == $subsubcategory->subcategory_id) ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                                    @endforeach
                                </select>
                                @error('subcategory_id')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                            <div class="form-group">
                              <label for="title_en">subsubcategory Name (English): <span class="text-danger">*</span></label>
                              <input type="text" name="sub_subcategory_name_en" value="{{ $subsubcategory->sub_subcategory_name_en }}" id="sub_subcategory_name_bn" class="form-control" placeholder="Write subsubcategory name english">
                              @error('sub_subcategory_name_en')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                         </div>
                         <div class="col-md-12">
                            <div class="form-group">
                              <label for="title_bn">subsubcategory Name (Bangla) <span class="text-danger">*</span></label>
                              <input type="text" name="sub_subcategory_name_bn" value="{{ $subsubcategory->sub_subcategory_name_bn }}" id="sub_subcategory_name_bn" class="form-control" placeholder="Write subsubcategory name bangla">
                              @error('sub_subcategory_name_bn')
                                <span class="text-danger">{{ $message }}</span>
                              @enderror
                            </div>
                         </div>
                         <div class="col-md-12">
                            <div class="form-group">
                                <label for="status">Status</label>
                                 <span class="text-danger">*</span>

                                <select name="status" id="status" class="form-control">
                                  @if ($subsubcategory->status == 1)
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
<!-- Category Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('admin/subcategory/category-subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                     var d =$('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value){
                            $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                        });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
</script>
@endsection
