@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800 text-right">
                <a href="{{ route('coupon.create') }}" class="btn btn-primary"><i class="fas fa-plus" aria-hidden="true"></i> Create</a>
            </h1>
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex">
                   <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">Coupon List</h6>
                   <span class="badge badge-success rounded-pill " style="font-size: 18px;"> {{ count($coupon) }} </span>
                </div>
                <div class="card-body">
                   <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="15%">Coupon Name</th>
                               <th width="5%">Coupon Discount</th>
                               <th width="15%">Coupon Validity</th>
                               <th width="5%">Valid </th>
                               <th width="10%">Status</th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($coupon as $key => $item)
                            <tr>
                              <td>{{ $key+1}} </td>
                              <td>{{ $item->coupon_name }}</td>
                              <td>{{ $item->coupon_discount }}%</td>
                              <td width="20%">
                                {{ Carbon\Carbon::parse($item->coupon_validity)->format('D,d F Y')}}
                              </td>
                              <td>
                                @if($item->coupon_validity  >= Carbon\Carbon::now()->format('Y-m-d'))
                                  <a href="#" class="badge badge-pill badge-success">Valid</a>
                                @else
                                  <a href="#" class="badge badge-pill badge-danger">Invalid</a>
                                @endif
                              </td>

                              <td>

                               @if($item->status == 1)
                                <a href="{{ route('coupon.in_active',['id'=>$item->id]) }}" class="badge badge-success">Active</a>
                                @else
                                  <a href="{{ route('coupon.active',['id'=>$item->id]) }}" class="badge badge-danger">Disable</a>
                                @endif
                               </td>
                               <td>
                                  <a href="{{ route('coupon.view',$item->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>

                                  <a href="{{ route('coupon.edit',$item->id) }}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                  <a href="{{ route('coupon.delete',$item->id) }}"class="btn btn-danger btn-sm" title="Delete Data" id="delete"><i class="fa fa-trash"></i></a>
                               </td>
                            </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                </div>
            </div>
            <script>
                function deleteData(id){
                    $("#deleteForm").attr("action",'https://demo.websolutionus.com/findestate/admin/property'+"/"+id)
                }

                function propertyStatus(id){
                    // project demo mode check
                    var isDemo="0"
                    var demoNotify="You can not change data in demo mode"
                    if(isDemo==0){
                        toastr.error(demoNotify);
                        return;
                    }
                    // end
                    $.ajax({
                        type:"get",
                        url:"https://demo.websolutionus.com/findestate/admin/property-status"+"/"+id,
                        success:function(response){
                           toastr.success(response)
                        },
                        error:function(err){
                            console.log(err);

                        }
                    })
                }
            </script>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
</div>
@endsection
