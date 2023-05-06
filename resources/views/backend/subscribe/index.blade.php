@extends('layouts.app2')
@section('subscribe')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">Subscribe List</h6>
                   <span class="badge badge-success rounded-pill" style="font-size: 18px;"> {{ count($subscribes) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="10%">Email</th>
                               <th width="10%">Date </th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($subscribes as $key => $subscribe)
                            <tr>
                               <td> {{ $key+1}} </td>


                               <td> {{ $subscribe->email ?? 'NULL' }} </td>
                               <td>{{ $subscribe->created_at->format('d/m/Y') }} </td>


                               <td>
                                  <a href="{{ route('subscribe.delete',$subscribe->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
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
