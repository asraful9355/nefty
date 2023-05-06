@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right">
                <a href="{{ route('campaing.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Campaign Create</a>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">Campaign list</h6>
                   <span class="badge badge-success rounded-pill " style="font-size: 18px;"> {{ count($campaings) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="10%">Campaign Photo</th>
                               <th width="10%">Name (English)</th>
                               <th width="15%">Name (Bangla)</th>
                               <th width="10%">Status</th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($campaings as $key => $campaing)
                            <tr>
                               <td> {{ $key+1}} </td>
                               <td>
                                    <img src="{{ asset($campaing->campaing_image) }}" width="70px" height="70px;" class="img-sm img-avatar" alt="No Image">
                               </td>
                               <td> {{ $campaing->name_en ?? 'NULL' }} </td>
                               <td> {{ $campaing->name_bn ?? 'NULL' }} </td>

                               <td>

                                @if($campaing->status == 1)
                                <a href="{{ route('campaing.in_active',['id'=>$campaing->id]) }}" class="badge badge-success">Active</a>
                                @else
                                  <a href="{{ route('campaing.active',['id'=>$campaing->id]) }}" class="badge badge-danger">Disable</a>
                                @endif
                               </td>
                               <td>
                                  <a href="#" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                  <a href="{{ route('campaing.edit',$campaing->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                  <a href="{{ route('campaing.delete',$campaing->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
