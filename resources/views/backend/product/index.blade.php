@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right">
                <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">product List</h6>
                   <span class="badge badge-success rounded-pill" style="font-size: 18px;"> {{ count($products) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="10%">Product Image</th>
                               <th width="10%">Name (English)</th>
                               <th width="10%">Name (Bangla)</th>
                               <th width="0%">Category</th>
                               <th width="10%">Product Price</th>
                               <th width="10%">Quantity</th>
                               <th width="10%">Discount</th>
                               <th width="10%">Status</th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($products as $key => $item)
                            <tr>
                              <td> {{ $key+1}} </td>
                              <td>
                                <img src="{{ asset($item->product_thumbnail) }}" class="img-sm" alt="Product Image" style="width: 80px; height: 70px;">
                              </td>
                              <td> {{ $item->name_en ?? 'NULL' }} </td>
                              <td> {{ $item->name_bn ?? 'NULL' }} </td>
                              <td> {{ $item->category->category_name_en  ?? 'NULL'}} </td>
                              <td> {{ $item->regular_price ?? 'NULL' }} </td>
                              <td>
                                @if($item->is_varient)
                                    Varient Product
                                @else
                                    {{ $item->stock_qty ?? 'NULL' }}
                                @endif
                              </td>
                              <td>
                                @if($item->discount_price > 0)
                                    @if($item->discount_type == 1)
                                        <span class="badge rounded-pill bg-info text-white">৳{{ $item->discount_price }} off</span>
                                    @elseif($item->discount_type == 2)
                                        <span class="badge rounded-pill bg-success text-white">{{ $item->discount_price }}% off</span>
                                    @endif
                                @else
                                  <span class="badge rounded-pill bg-danger text-white">No Discount</span>
                                @endif
                              </td>

                              <td>
                                @if($item->status == 1)
                                <a href="{{ route('product.in_active',['id'=>$item->id]) }}" class="badge badge-success">Active</a>
                                @else
                                  <a href="{{ route('product.active',['id'=>$item->id]) }}" class="badge badge-danger">Disable</a>
                                @endif
                              </td>
                              <td class="col-4">
                                <a href="{{ route('product.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a href="{{ route('product.delete',$item->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                              </td>
                            </tr>
                            @endforeach
                         </tbody>
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

