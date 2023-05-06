@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right">
                <a href="{{ route('subcategory.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">SubCategory List</h6>
                   <span class="badge badge-success rounded-pill" style="font-size: 18px;"> {{ count($subcategories) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="10%">Category(En)</th>
                               <th width="10%">SubCategory(En)</th>
                               <th width="15%">SubCategory(Bn)</th>
                               <th width="10%">Status</th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($subcategories as $key => $item)
                            <tr>
                               <td> {{ $key+1}} </td>
                               <td>{{  $item->category->category_name_en ?? 'NULL' }}</td>
                               <td> {{ $item->subcategory_name_en ?? 'NULL' }} </td>
                               <td> {{ $item->subcategory_name_bn ?? 'NULL' }} </td>

                               <td>

                                @if($item->status == 1)
                                <a href="{{ route('subcategory.in_active',['id'=>$item->id]) }}" class="badge badge-success">Active</a>
                                @else
                                  <a href="{{ route('subcategory.active',['id'=>$item->id]) }}" class="badge badge-danger">Disable</a>
                                @endif
                               </td>
                               <td>
                                  <a href="{{ route('subcategory.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                  <a href="{{ route('subcategory.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                  <a href="{{ route('subcategory.delete',$item->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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

