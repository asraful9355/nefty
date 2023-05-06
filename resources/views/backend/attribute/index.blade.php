@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right">
                <a href="{{ route('attribute.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">Attribute List</h6>
                   <span class="badge badge-success rounded-pill " style="font-size: 18px;"> {{ count($attributes) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                              <th width="5%">Sl</th>
                              <th width="8%">Name</th>
                              <th width="25%">Value</th>
                              <th width="5%">Status</th>
                              <th width="5%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($attributes as $key => $attribute)
                            <tr>
                              <td> {{ $key+1}} </td>
                              <td>{{ $attribute->name ?? 'NULL' }}</td>
                              <td>
                                @foreach($attribute->attribute_values as $value)
                                  {{ $value->value ?? 'NULL' }} ,
                                @endforeach
                              </td>
                              <td>

                                @if($attribute->status == 1)
                                <a href="{{ route('attribute_value.active',['id'=>$attribute->id]) }}" class="badge badge-success">Active</a>
                                @else
                                  <a href="{{ route('attribute_value.in_active',['id'=>$attribute->id]) }}" class="badge badge-danger">Disable</a>
                                @endif
                              </td>
                              <td>
                                <a href="{{ route('attribute.show',$attribute->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                <a href="{{ route('attribute.edit',$attribute->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                <a href="{{ route('attribute.delete',$attribute->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
