@extends('layouts.app2')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h4>Product Edit</h4>
        <h1 class="h3 mb-2 text-gray-800 text-right">
          <a href="{{ route('product.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Product List </a>
        </h1>
        <!-- DataTales Example -->
        <div class="row mt-3">
          <div class="col-md-10 offset-1">
            <form method="post" action="{{ route('product.update',$product->id) }}" enctype="multipart/form-data">
              @csrf
              <!-- start card -->
              <div class="card shadow-lg">
                <div class="card-header bg-success text-white">
                  <h3>Basic Info</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                      <div class="col-md-6 mb-4">
                          <label for="name_en" class="col-form-label" style="font-weight: bold;">Product Name (En):</label>
                          <input class="form-control" id="name_en" type="text" name="name_en" placeholder="Write product name english" required="" value="{{ $product->name_en }}">
                          @error('name_en')
                              <p class="text-danger">{{$message}}</p>
                          @enderror
                      </div>
                      <div class="col-md-6 mb-4">
                            <label for="name_bn" class="col-form-label" style="font-weight: bold;">Product Name (Bn):</label>
                            <input class="form-control" id="name_bn" type="text" name="name_bn" placeholder="Write product name bangla" value="{{ $product->name_bn }}">
                      </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6 mb-4 d-none">
                      <label for="product_code" class="col-form-label" style="font-weight: bold;">Product Code:</label>
                      <input class="form-control" id="product_code" type="text" name="product_code" placeholder="Write product code">
                    </div>

                    <div class="col-md-6 mb-4">
                        <label for="category_id" class="col-form-label" style="font-weight: bold;">Category:</label>
                        <a style="background-color: #3BB77E; float: right; "class="btn btn-sm float-end" data-toggle="modal" data-target="#exampleModal"><i class="fa-solid fa-plus text-white"></i></a>
                        <div class="custom_select">
                          <select name="category_id" id="category_id" class="form-control select2" aria-invalid="false">
                            <option value="" selected disabled>---Select Category---</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>{{ $category->category_name_en }}</option>
                            @endforeach
                          </select>
                        </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <label for="subcategory_id" class="col-form-label" style="font-weight: bold;">SubCategory:</label>
                      <a style="background-color: #3BB77E; float: right;"class="btn btn-sm float-end" data-toggle="modal" data-target="#exampleModal1"><i class="fa-solid fa-plus text-white"></i></a>
                      <div class="custom_select">
                        <select name="subcategory_id" id="subcategory_id" class="form-control select2" aria-invalid="false">
                          <option value=""  >---Select SubCategory---</option>
                          @foreach ($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}" {{ $subcategory->id == $product->subcategory_id ? 'selected' : '' }}>{{ $subcategory->subcategory_name_en }}</option>
                          @endforeach
                          @error('subcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <label for="subsubcategory_id" class="col-form-label" style="font-weight: bold;">Sub->SubCategory:</label>
                      <a style="background-color: #3BB77E; float: right;"class="btn btn-sm float-end" data-toggle="modal" data-target="#exampleModal2"><i class="fa-solid fa-plus text-white"></i></a>
                      <div class="custom_select">
                        <select name="subsubcategory_id" id="subsubcategory_id" class="form-control select2" aria-invalid="false">
                          <option value=""  >---Select SubSubCategory---</option>
                          @foreach ($subsubcategories as $subsubcategory)
                            <option value="{{ $subsubcategory->id }}" {{ $subsubcategory->id == $product->subsubcategory_id ? 'selected' : '' }}>{{ $subsubcategory->sub_subcategory_name_en }}</option>
                          @endforeach
                          @error('subsubcategory_id')
                            <span class="text-danger">{{ $message }}</span>
                          @enderror
                        </select>
                      </div>
                    </div>
                  
                    <div class="col-md-6 mb-4">
                       <label for="brand_id" class="col-form-label" style="font-weight: bold;">Brand:</label>
                       <a style="background-color: #3BB77E; float: right;" type="button" class="btn btn-sm float-end" id="closeModal1" data-toggle="modal" data-target="#exampleModal3"><i class="fa-solid fa-plus text-white"></i></a>
                        <div class="custom_select">
                          <select name="brand_id" id="brand_id" class="form-control select2" aria-invalid="false">
                              <option value="" selected disabled>---Select Brand---</option>
                              @foreach ($brands as $brand)
                              <option value="{{ $brand->id }}" {{ $brand->id == $product->brand_id ? 'selected' : '' }}>{{ $brand->brand_name_en }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                  
                    <div class="col-md-6 mb-4">
                      <label for="vendor_id" class="col-form-label" style="font-weight: bold;">Vendor:</label>
                        <div class="custom_select">
                          <select name="vendor_id" id="vendor_id" class="form-control select2" aria-invalid="false">
                              <option value="" selected disabled>---Select Vendor---</option>
                              @foreach ($vendors as $vendor)
                              <option value="{{ $vendor->id }}" {{ $vendor->id == $product->vendor_id ? 'selected' : '' }}>{{ $vendor->shop_name }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    
                    <div class="col-md-6 mb-4">
                      <label for="supplier_id" class="col-form-label" style="font-weight: bold;">Supplier:</label>
                      <div class="custom_select">
                        <select name="supplier_id" id="supplier_id" class="form-control select2" aria-invalid="false">
                              <option value="" selected disabled>---Select Supplier---</option>
                              @foreach ($suppliers as $supplier)
                              <option value="{{ $supplier->id }}" {{ $supplier->id == $product->supplier_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                              @endforeach
                          </select>
                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <label for="campaing_id" class="col-form-label" style="font-weight: bold;">Campaing:</label>
                      <div class="custom_select">
                        <select class="form-control select-active w-100 form-select select-nice select2" name="campaing_id" id="campaing_id">
                          <option selected="">---Select Campaing---</option>
                          @foreach ($campaings as $campaing)
                            <option value="{{ $campaing->id }}" {{ $campaing->id == $product->campaing_id ? 'selected' : '' }}>{{ $campaing->name_en }}</option>
                          @endforeach
                        </select>

                      </div>
                    </div>

                    <div class="col-md-6 mb-4">
                      <label for="tags" class="col-form-label" style="font-weight: bold;">Tags:</label>
                      <input class="form-control tags-input" type="text"name="tags[]" placeholder="Type and hit enter to add a tag" value="{{ $product->tags }}">
                      <small class="text-muted d-block">This is used for search. </small>
                    </div>
                  </div>
                  <!-- row //-->
                </div>
                <!-- card body .// -->
              </div>
              <!-- end card -->

              <!-- start card -->
              <div class="card shadow-lg mt-4">
                <div class="card-header bg-success text-white">
                  <h3>Product Variation</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <!-- Variation Start -->
                    <div class="col-md-6 mb-4">
                      <div class="custom_select cit-multi-select">
                        <label for="choice_attributes" class="col-form-label" style="font-weight: bold;">Attributes:</label>
                        <select class="form-control select-active w-100 form-select select-nice select2" name="choice_attributes[]" id="choice_attributes" multiple="multiple" data-placeholder="Choose Attributes">
                          @foreach($attributes as $attribute)
                            @if($product->is_varient==1 && count(json_decode($product->attributes)) > 0)
                              <option @if(in_array($attribute->id, json_decode($product->attributes))) selected @endif value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @else
                              <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endif
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12 mb-4">
                      <div class="customer_choice_options" id="customer_choice_options">
                        <div class="mb-4">
                          @foreach ($attributes as $attribute)
                            @if($product->is_varient==1 && count(json_decode($product->attributes)) > 0)

                              @if(in_array($attribute->id, json_decode($product->attributes)))
                                @php
                                  $attr_values = array();
                                  foreach(json_decode($product->attribute_values) as $attribute_value){
                                    if($attribute_value->attribute_id == $attribute->id){
                                      $attr_values = $attribute_value->values;
                                    }
                                  } 
                                @endphp
                                <div class="custom_select cit-multi-select mb-4">
                                  <label for="choice_attributes" class="col-form-label" style="font-weight: bold;">{{$attribute->name}} :</label>
                                    <select class="form-control form-select js-example-basic-multiple select2" name="choice_options{{$attribute->id}}[]" id="choice_options{{$attribute->id}}" onchange="makeCombinationTable(this)" multiple data-placeholder="Nothing selected">
                                        @foreach($attribute->attribute_values as $value)
                                          <option @if(in_array($value->value, $attr_values)) selected @endif value="{{ $value->value }}">{{ $value->value }}</option>
                                        @endforeach
                                      </select>
                                </div>
                              @endif
                            @endif
                          @endforeach
                        </div>
                        <script>
                          $(document).ready(function() {
                              $('.js-example-basic-multiple').select2();
                          });
                        </script>
                      </div>
                    </div>
                    <!-- Variation End -->
                  </div>
                </div>
              </div>
              <!-- end card -->

              <!-- start card -->
              <div class="card card shadow-lg mt-4">
                <div class="card-header bg-success text-white">
                  <h3>Pricing</h3>
                </div>
                 <div class="card-body">
                    <div class="row">
                       <div class="col-md-12 mb-4">
                          <label for="purchase_price" class="col-form-label" style="font-weight: bold;">Product Buying Price:</label>
                          <input class="form-control" id="purchase_price" type="number" name="purchase_price" placeholder="Write product bying price" required value="{{ $product->purchase_price }}">
                          @error('purchase_price')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                       </div>
                       <div class="col-md-6 mb-4">
                          <label for="whole_sell_price" class="col-form-label" style="font-weight: bold;">Whole Sell Price:</label>
                          <input class="form-control" id="whole_sell_price" type="number" name="wholesell_price" placeholder="Write product whole sell price" value="{{ $product->wholesell_price }}">
                       </div>
                       <div class="col-md-6 mb-4">
                          <label for="whole_sell_qty" class="col-form-label" style="font-weight: bold;">Whole Sell Minimum Quantity:</label>
                          <input class="form-control" id="whole_sell_qty" type="number" name="wholesell_minimum_qty" placeholder="Write product whole sell qty" value="{{ $product->wholesell_minimum_qty }}">
                       </div>
                    </div>
                    <!-- Row //-->
                    <div class="row">
                       <div class="col-md-4 mb-4">
                          <label for="regular_price" class="col-form-label" style="font-weight: bold;">Regular Price:</label>
                          <input class="form-control" id="regular_price" type="number" name="regular_price" placeholder="Write product regular price" min="0" value="{{ $product->regular_price }}" >
                          @error('regular_price')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                       </div>
                       <div class="col-md-4 mb-4">
                          <label for="discount_price" class="col-form-label" style="font-weight: bold;">Discount Price:</label>
                          <input class="form-control" id="discount_price" type="number" name="discount_price" placeholder="Write product discount price" value="{{ $product->discount_price }}" >
                       </div>
                       <div class="col-md-4 mb-4">
                          <label for="discount_type" class="col-form-label" style="font-weight: bold;">Discount Type:</label>
                          <div class="custom_select">
                             <select class="form-control select-active w-100 form-select select-nice select2" name="discount_type" id="discount_type">
                              <option value="" selected disabled>---Select Discount---</option>
                                <option value="1" <?php if ($product->discount_type == '1') echo "selected"; ?>>Flat</option>
                                <option value="2" <?php if ($product->discount_type == '2') echo "selected"; ?>>Parcent %</option>
                             </select>
                          </div>
                       </div>
                       <div class="col-md-4 mb-4">
                          <label for="product_qty" class="col-form-label" style="font-weight: bold;">Minimum Buy Quantity:</label>
                          <input class="form-control" id="product_qty" type="number" name="minimum_buy_qty" placeholder="Write product qty" value="1" min="1" required value="{{ $product->minimum_buy_qty }}">
                          @error('product_qty')
                          <p class="text-danger">{{$message}}</p>
                          @enderror
                       </div>
                       <div class="col-md-6 mb-4">
                          <label for="stock_qty" class="col-form-label" style="font-weight: bold;">Stock Quantity:</label>
                          <input class="form-control" id="stock_qty" type="number" name="stock_qty" value="0" min="0" placeholder="Write product stock  qty" value="{{ $product->stock_qty }}">
                       </div>
                      <!-- Product Attribute Price combination Starts -->
                      <div class="col-12 mt-2 mb-2" id="variation_wrapper">
                        <label for="" class="col-form-label" style="font-weight: bold;">Price Variation:</label>
                        <input type="hidden" id="is_variation_changed" name="is_variation_changed" value="0">
                        <table class="table table-active table-success table-bordered" id="combination_table">
                          <thead>
                            <tr>
                              <th>Variant</th>
                              <th>Price</th>
                              <th>SKU</th>
                              <th>Quantity</th>
                              <th>Photo</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($product->stocks as $stock)
                              <tr>
                                <td>{{ $stock->varient }}
                                  <input type="hidden" name="{{ $stock->id }}_variant" class="form-control" value="{{ $stock->varient }}" required>
                                </td>
                                <td>
                                  <input type="text" name="{{ $stock->id }}_price" class="form-control vdp" value="{{ $stock->price }}" required>
                                </td>
                                <td>
                                  <input type="text" name="{{ $stock->id }}_sku" class="form-control" required value="{{ $stock->sku }}">
                                </td>
                                <td>
                                  <input type="text" name="{{ $stock->id }}_qty" class="form-control" value="{{ $stock->qty }}" required>
                                </td>
                                <td>
                                  <img src="{{ asset($stock->image) }}" alt="{{ $stock->varient }}-image" style="width: 15%; float: left;">
                                  <input type="file" name="{{ $stock->id }}_image" class="form-control" style="width: 80%; float: left; margin-left: 5%;">
                                </td>
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- Product Attribute Price combination Ends -->
                    </div>
                    <!-- Row //-->
                 </div>
              </div>
              <!-- end card -->

              <!-- start card -->
              <div class="card shadow-lg mt-4">
                <div class="card-header bg-success text-white">
                  <h3>Description</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                       <!-- Description Start -->
                       <div class="col-md-6 mb-4">
                          <label for="long_descp_en" class="col-form-label" style="font-weight: bold;">Description (En):</label>
                          <textarea name="description_en" rows="2" cols="2" class="form-control summernote" placeholder="Write Long Description English">{{ $product->description_en }}</textarea> 
                       </div>
                       <div class="col-md-6 mb-4">
                          <label for="long_descp_bn" class="col-form-label" style="font-weight: bold;">Description (Bn):</label>
                          <textarea name="description_bn" id="long_descp_bn" rows="2" cols="2" class="form-control summernote" placeholder="Write Long Description Bangla">{{ $product->description_bn }}</textarea> 
                       </div>
                       <!-- Description End -->
                    </div>
                </div>
              </div>
              <!-- end card -->

              <!-- start card -->
             <!--  <div class="card card shadow-lg mt-4">
                <div class="card-header bg-success text-white">
                   <h3>Product Meta</h3>
                </div>
                <div class="card-body">
                   <div class="row">
                      <div class="col-md-12 mb-4">
                         <label for="product_meta" class="col-form-label" style="font-weight: bold;">Meta Title</label>
                         <input class="form-control" id="product_meta" type="text" name="product_meta" placeholder="Write product meta" >
                      </div>
                   </div>
                </div>
              </div> -->
              <!-- end card -->

              <!-- start card -->
              <div class="card card shadow-lg mt-4">
                <div class="card-header bg-success text-white">
                  <h3>Product Image</h3>
                </div>
                <div class="card-body">
                    <!-- Porduct Image Start -->
                    <div class="mb-4">
                       <label for="product_thumbnail" class="col-form-label" style="font-weight: bold;">Product Image:</label>
                       <input type="file" name="product_thumbnail" class="form-control" id="product_thumbnail" onChange="mainThamUrl(this)" required>
                       <img src="{{ asset($product->product_thumbnail) }}" width="100" height="100" class="p-2" id="mainThmb">
                    </div><br><br>
                    <div class="col-md-12 mb-3">
                      <div class="box-header mb-3 d-flex">
                          <h4 class="box-title" style="font-weight: bold;">Product Gallery Image <strong>Update:</strong></h4>
                      </div>
                      <div class="box bt-3 border-info">
                        <div class="row row-sm">
                          @foreach($multiImgs as $img)
                            <div class="col-md-3">
                               <div class="card">
                                  <img src="{{ asset($img->photo_name) }}" class="showImage{{$img->id}}" style="height: 130px; width: 280px;">
                                    <div class="card-body">
                                     <h5 class="card-title">
                                        <a id="{{ $img->id }}" onclick="productRemove(this.id)" class="btn btn-sm btn-danger" title="Delete Data">Delete</a>
                                     </h5>
                                  </div>
                               </div>
                            </div>
                            <!--  end col md 3     -->  
                            @endforeach
                            <div class="mb-4">
                              <div class="row  p-2" id="preview_img">
                                
                              </div>
                              <label for="multiImg" class="col-form-label" style="font-weight: bold;">Add More:</label>
                              <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg" >
                            </div>
                          </div>
                        </div>
                    </div>
                    <!-- Porduct Image End -->
                    <!-- Checkbox Start -->
                    <div class="mb-4">
                       <div class="row">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" class="form-check-input me-2 cursor" name="is_deals" id="is_deals" {{ $product->is_deals == 1 ? 'checked': '' }} value="1">
                             <label class="form-check-label cursor" for="is_deals">Today's Deal</label>
                          </div>
                       </div>
                       <div class="row">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" class="form-check-input me-2 cursor" name="is_digital" id="is_digital" {{ $product->is_digital == 1 ? 'checked': '' }} value="1">
                             <label class="form-check-label cursor" for="is_digital">Digital</label>
                          </div>
                       </div>
                       <div class="row">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" class="form-check-input me-2 cursor" name="is_featured" id="is_featured" {{ $product->is_featured == 1 ? 'checked': '' }} value="1">
                             <label class="form-check-label cursor" for="is_featured">Featured</label>
                          </div>
                       </div>
                       <div class="row">
                          <div class="custom-control custom-switch">
                             <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" {{ $product->status == 1 ? 'checked': '' }} value="1">
                             <label class="form-check-label cursor" for="status">Status</label>
                          </div>
                       </div>
                    </div>
                    <!-- Checkbox End -->
                </div>
              </div>
              <!-- end card -->

              <div class="form-control row mb-4 mt-4 text-right">
                 <input type="submit" class="btn btn-primary" value="Product Update">
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>

<!-- Cateory Store Ajax Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Category Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" enctype="multipart/form-data" id="category_store">
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="title_en">Category Name (English): <span class="text-danger">*</span></label>
                      <input type="text" name="category_name_en" value="" id="category_name_en" class="form-control" placeholder="Write category name english">
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_bn">Category Name (Bangla) <span class="text-danger">*</span></label>
                    <input type="text" name="category_name_bn" value="" id="category_name_bn" class="form-control" placeholder="Write category name bangla">
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
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- SubCateory Store Ajax Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SubCategory Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" enctype="multipart/form-data" id="subcategory_store">
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="('category_id')">Select Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control " aria-invalid="false">
                        <option value="" selected disabled>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                        @endforeach

                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title_en">SubCategory Name (English): <span class="text-danger">*</span></label>
                  <input type="text" name="subcategory_name_en" value="" id="subcategory_name_bn" class="form-control" placeholder="Write subcategory name english">
                  @error('subcategory_name_en')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
               <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_bn">SubCategory Name (Bangla) <span class="text-danger">*</span></label>
                    <input type="text" name="subcategory_name_bn" value="" id="subcategory_name_bn" class="form-control" placeholder="Write subcategory name bangla">
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
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- SubSubCategory Stroe Ajax Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Sub->SubCategory Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" enctype="multipart/form-data" id="subsubcategory_store">
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <div class="modal-body">
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="('category_id')">Select Category <span class="text-danger">*</span></label>
                    <select name="category_id" id="category_id" class="form-control " aria-invalid="false">
                        <option value="" selected disabled>Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->category_name_en }}</option>
                        @endforeach

                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="form-group">
                    <label for="subcategory_id">Select SubCategory <span class="text-danger">*</span></label>
                    <select name="subcategory_id" id="subcategory_id" class="form-control " aria-invalid="false">
                        <option value="" selected disabled>Select SubCategory</option>                       =

                    </select>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="title_en">SubSubCategory Name (English): <span class="text-danger">*</span></label>
                  <input type="text" name="sub_subcategory_name_en" value="" id="sub_subcategory_name_bn" class="form-control" placeholder="Write subcategory name english">
                  @error('sub_subcategory_name_en')
                    <span class="text-danger">{{ $message }}</span>
                  @enderror
                </div>
              </div>
               <div class="col-md-12">
                  <div class="form-group">
                    <label for="title_bn">SubSubCategory Name (Bangla) <span class="text-danger">*</span></label>
                    <input type="text" name="sub_subcategory_name_bn" value="" id="sub_subcategory_name_bn" class="form-control" placeholder="Write subcategory name bangla">
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
                        <option value="1">Active</option>
                        <option value="0">Disable</option>
                      </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- Brand Store Ajax Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Brand Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="#" enctype="multipart/form-data" id="brand_store">
        <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
          <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label for="brand_name_en">Brand Name (English): <span class="text-danger">*</span></label>
                      <input type="text" name="brand_name_en" value="" id="brand_name_en" class="form-control" placeholder="Write Brand Title English">
                      @error('brand_name_en')
                        <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="brand_name_bn">Brand Name (Bangla): <span class="text-danger">*</span></label>
                    <input type="text" name="brand_name_bn" value="" id="brand_name_bn" class="form-control" placeholder="Write Brand Title Bangla">
                    @error('brand_name_bn')
                      <span class="text-danger">{{ $message }}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <img id="showImage" class="rounded avatar-lg showImage" src="{{ (!empty($editData->profile_image))? url('upload/admin_images/'.$editData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap" width="100px" height="80px;">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="image" class="col-form-label" style="font-weight: bold;">Image:</label>
                    <input name="brand_image" class="form-control brand_image" type="file">
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
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save changes</button>
          </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('footer-script')

<script type="text/javascript">
  function makeCombinationTable(el) {
    $.ajax({
      url: '{{ route('admin.api.attributes.index') }}',
      type: 'get',
      dataType: 'json',
      processData: true,
      data: $(el).closest('form').serializeArray().filter(function (field) {
          return field.name.includes('choice');
      }),
      success: function (response) {
      //console.log(response);
      if (!response.success) {
        return;
      }

        if(Object.keys(response.data).length > 0) {
          let price = $('#regular_price').val();
          let qty = $('#stock_qty').val();
          $('#combination_table tbody').html($.map(response.data, function (item, index) {
            return `<tr>
                  <td>${index}<input type="hidden" name="vnames[]" class="form-control" value="${index}" required></td>
                  <td><input type="text" name="vprices[]" class="form-control vdp" value="`+price+`" required></td>
                  <td><input type="text" name="vskus[]" class="form-control" required value="sku-${index}"></td>
                  <td><input type="text" name="vqtys[]" class="form-control" value="10" required></td>
                  <td><input type="file" name="vimages[]" class="form-control" required></td>
                </tr>`;
          }).join());
          $('#variation_wrapper').show();
          $('#is_variation_changed').val(1);
        }else{
          $('#combination_table tbody').html();
        }
      }
    });
  }
</script>
<!-- Attribute -->
<script type="text/javascript">
  function add_more_customer_choice_option(i, name){
        $.ajax({
            type:"POST",
            url:'{{ route('products.add-more-choice-option') }}',
            data:{
               attribute_ids: i,
               _token:  "{{ csrf_token() }}"
            },
            success: function(data) {
                $('#customer_choice_options').append(data);
           }
       });
    }

  $('#choice_attributes').on('change', function() {
        $('#customer_choice_options').html(null);
     
      $('#choice_attributes').val();
      add_more_customer_choice_option($(this).val(), $(this).text());
    });

    $('#regular_price').on('keyup', function() {
      var price = $('#regular_price').val();
      $('.vdp').val(price);
    }); 
</script>

<!-- Attribute end -->

<!-- Product Image -->
<script type="text/javascript">
  function mainThamUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainThmb').attr('src',e.target.result).width(100).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>

<!-- Product MultiImg -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#variation_wrapper').hide();
    var stockSize = {{ count($product->stocks) }};
    if(stockSize > 0){
      $('#variation_wrapper').show();
    }

    $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data
           
          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(100)
                  .height(80); //create image element 
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });
</script>
<!-- Malti Tags  -->
<script type="text/javascript">
  $(document).ready(function(){        
    var tagInputEle = $('.tags-input');
    tagInputEle.tagsinput();

  });
</script>

<!-- Category with subcategory show Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="category_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('admin/products/category-subcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="subcategory_id"]').html('<option value="" selected="" disabled="">---Select SubCategory---</option>');
                    $.each(data, function(key, value){
                        $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name_en + '</option>');
                    });
                    $('select[name="subsubcategory_id"]').html('<option value="" selected="" disabled="">---Select SubSubCategory---</option>');
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
</script>

<!-- Sub Category with subsubcategory show Ajax -->
<script type="text/javascript">
    $(document).ready(function() {
      $('select[name="subcategory_id"]').on('change', function(){
          var category_id = $(this).val();
          if(category_id) {
              $.ajax({
                  url: "{{  url('admin/products/subcategory-subsubcategory/ajax') }}/"+category_id,
                  type:"GET",
                  dataType:"json",
                  success:function(data) {
                    $('select[name="subsubcategory_id"]').html('<option value="" selected="" disabled="">---Select SubSubCategory---</option>');
                    $.each(data, function(key, value){
                        $('select[name="subsubcategory_id"]').append('<option value="'+ value.id +'">' + value.sub_subcategory_name_en + '</option>');
                    });
                  },
              });
          } else {
              alert('danger');
          }
      });
  });
</script>

<!-- Category Store  Ajax -->
<script type="text/javascript">
  $(document).ready(function (e) {
    
      $('#category_store').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

      $.ajax({
        type:'POST',
        url: "{{ route('product.category.store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {

          $('select[name="category_id"]').html('<option value="" selected="" disabled="">Select Category</option>');
          $.each(data.categories, function(key, value){
              $('select[name="category_id"]').append('<option value="'+ value.id +'">' + value.category_name_en + '</option>');
          });

          // console.log(data);
          $('#exampleModal' ).modal('hide');
          this.reset();
          // Start Message 
          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
              })
          if ($.isEmptyObject(data.error)) {
              Toast.fire({
                  type: 'success',
                  title: data.success
              })
          }else{
              Swal.fire({
            icon: 'error',
            title: data.error,
          })
        }
          // End Message
          // alert('Image has been uploaded using jQuery ajax successfully');
        },
        error: function(data){
          console.log(data);
        }
      });
    });
  });
</script>

<!-- SubCategory Store  Ajax -->
<script type="text/javascript">
  $(document).ready(function (e) {
    
      $('#subcategory_store').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

      $.ajax({
        type:'POST',
        url: "{{ route('product.subcategory.store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          // console.log(data);
          $('#exampleModal1' ).modal('hide');
          this.reset();
          // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Swal.fire({
              icon: 'error',
              title: data.error,
            })
          }
          // End Message
          // alert('Image has been uploaded using jQuery ajax successfully');
        },
        error: function(data){
          console.log(data);
        }
      });
    });
  });
</script>

<!-- SubSubCategory Store  Ajax -->
<script type="text/javascript">
  $(document).ready(function (e) {
    
      $('#subsubcategory_store').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

      $.ajax({
        type:'POST',
        url: "{{ route('product.subsubcategory.store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          // console.log(data);
          $('#exampleModal2' ).modal('hide');
          this.reset();
          // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  icon: 'success',
                  showConfirmButton: false,
                  timer: 2000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    title: data.success
                })
            }else{
                Swal.fire({
              icon: 'error',
              title: data.error,
            })
          }
          // End Message
          // alert('Image has been uploaded using jQuery ajax successfully');
        },
        error: function(data){
          console.log(data);
        }
      });
    });
  });
</script>

<!-- Brand Store  Ajax -->
<script type="text/javascript">
  $(document).ready(function (e) {
    
      $('#brand_store').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);

      $.ajax({
        type:'POST',
        url: "{{ route('product.brand.store') }}",
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: (data) => {
          $('select[name="brand_id"]').html('<option value="" selected="" disabled="">Select Brand</option>');
          $.each(data.brands, function(key, value){
              $('select[name="brand_id"]').append('<option value="'+ value.id +'">' + value.brand_name_en + '</option>');
          });

          $( '#exampleModal3' ).modal('hide');
          $('.showImage').remove();
          this.reset();
          // Start Message 
          const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                icon: 'success',
                showConfirmButton: false,
                timer: 2000
              })
          if ($.isEmptyObject(data.error)) {
              Toast.fire({
                  type: 'success',
                  title: data.success
              })
          }else{
              Swal.fire({
              icon: 'error',
              title: data.error,
            })
          }
          // End Message

          // alert('Image has been uploaded using jQuery ajax successfully');
        },
        
        error: function(data){
          console.log(data);
        }
      });
    });
  });
</script>

<!-- modal brand show image  -->
<script type="text/javascript">
    $(document).ready(function(){
        $('.brand_image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('.showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

<!-- ==================== Start Gallery Image Remove =============== -->
<script type="text/javascript">
  function productRemove(id){
    $.ajax({
       type:'GET',
       url:"/admin/products/multiimg/delete/"+id,
       dataType: 'json',
       success:function(data){

        console.log(data);
        location.reload();
        // Start Message 
        const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              icon: 'success',
              showConfirmButton: false,
              timer: 2000
            })
        if ($.isEmptyObject(data.error)) {
            Toast.fire({
                type: 'success',
                title: data.success
            })
        }else{
            Toast.fire({
                type: 'error',
                title: data.error
            })
        }
        // End Message
       }
    });
  }
</script>
<!-- ==================== End Gallery Image Remove =============== -->

@endpush