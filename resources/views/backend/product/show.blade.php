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
            <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Product List </a>
         </h1>
         <!-- DataTales Example -->
         <!-- DataTales Example -->
         <div class="card shadow-lg mb-4">
            <div class="card-header py-3 badge-success">
               <h6 class="m-0 font-weight-bold text-white">Product Details</h6>
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <tr>
                        <td width="40%">Product Name (En):</td>
                        <td>{{ $product->name_en ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Name (Bn):</td>
                        <td>{{ $product->name_bn ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Image</td>
                        <td><img src="{{ asset($product->product_thumbnail
                           ) }}" alt="" style="height:70px; width:80px;"></td>
                     </tr>
                     <tr>
                        <td width="40%">Product Regular Price:</td>
                        <td>{{ $product->regular_price ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Purchase Price:</td>
                        <td>{{ $product->purchase_price ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product WholeSell Price:</td>
                        <td>{{ $product->wholesell_price ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product WholeSell Quntity:</td>
                        <td>{{ $product->wholesell_minimum_qty ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Discount Price:</td>
                        <td>
                           @if($product->discount_price > 0)
                              @if($product->discount_type == 1)
                                 <span class="badge rounded-pill bg-info text-white">৳{{ $product->discount_price }} off</span>
                              @elseif($product->discount_type == 2)
                                 <span class="badge rounded-pill bg-success text-white">{{ $product->discount_price }}% off</span>
                              @endif
                           @else
                              <span class="badge rounded-pill bg-danger text-white">No Discount</span>
                           @endif
                        </td>
                     </tr>
                     <tr>
                        <td width="40%">Product Quntity:</td>
                        <td>{{ $product->minimum_bye_qty ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Stock Quntity:</td>
                        <td>{{ $product->stock_qty ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Category:</td>
                        <td>{{ $product->category->category_name_en ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product SubCategory:</td>
                        <td>{{ $product->subcategory->subcategory_name_en ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product ChildCategory:</td>
                        <td>{{ $product->subsubcategory->sub_subcategory_name_en ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Brand:</td>
                        <td>{{ $product->brand->brand_name_en ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Tags:</td>
                        <td>{{ $product->tags ?? 'NULL' }}</td>
                     </tr>
                     <tr>
                        <td width="40%">Product Attribute:</td>
                        <td>{{ $product->attribute_values->value ?? 'NULL' }}</td>
                     </tr>
                     <td>Status</td>
                     <td>
                        @if ($product->status == 1)
                        <span class="badge badge-success">Active</span>
                        @else
                        <span class="badge badge-danger">Disable</span>
                        @endif
                     </td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection