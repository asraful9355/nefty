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
        <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">SubSubCategory Details</h6>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered">
             <tr>
                <td>Category Name(En)</td>
                <td>{{ $subsubcategory->category->category_name_en ?? 'NULL' }}</td>
             </tr>
             <tr>
                <td>Category Name(Bn)</td>
                <td>{{ $subsubcategory->category->category_name_bn ?? 'NULL' }}</td>
             </tr>
             <tr>
                <td>SubCategory Name(En)</td>
                <td>{{ $subsubcategory->subcategory->subcategory_name_en ?? 'NULL' }}</td>
             </tr>
             <tr>
                <td>SubCategory Name(Bn)</td>
                <td>{{ $subsubcategory->subcategory->subcategory_name_bn ?? 'NULL' }}</td>
             </tr>
             <tr>
                <td>SubSubCategory Name(En)</td>
                <td>{{ $subsubcategory->sub_subcategory_name_en ?? 'NULL' }}</td>
             </tr>
             <tr>
                <td>SubSubCategory Name(Bn)</td>
                <td>{{ $subsubcategory->sub_subcategory_name_bn ?? 'NULL' }}</td>
             </tr>
             <td>Status</td>
                <td>
                    @if ($subsubcategory->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Disable</span>
                    @endif

                </td>
             </tr>
          </table>
          {{-- <a href="https://demo.websolutionus.com/findestate/admin/order-delete/149" class="btn btn-danger">Delete</a> --}}
       </div>
    </div>
 </div>
 </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>

<!-- category Image Show -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.subsubcategory_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.subsubcategory_showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
