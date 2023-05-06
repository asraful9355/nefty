@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="container-fluid">
        	<div class="content-header">
		        <div>
		            <h2 class="content-title card-title">Order List</h2>
		        </div>
		    </div>
		    <div class="row">
		        <div class="col-md-12">
		            <div class="card mb-4">
		                <!-- card-header end// -->
		                <div class="card-body">
		                    <form class="" action="" method="GET">
		                    <div class="form-group row mb-3">
		                        <div class="col-md-2">
		                            <label class="col-form-label"><span>All Orders :</span></label>
		                        </div>
		                        <div class="col-md-2 mt-2">
		                            <div class="custom_select">
		                                <select class="form-select d-inline-block select-active select2 mb-lg-0 mr-5 mw-200" name="delivery_status" id="delivery_status">
		                                    <option value="" selected="">Delivery Status</option>
		                                    <option value="pending" @if ($delivery_status == 'pending') selected @endif>Pending</option>
		                                    <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>Confirmed</option>
		                                    <option value="shipped" @if ($delivery_status == 'shipped') selected @endif>Shipped</option>
		                                    <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>Picked Up</option>
		                                    <option value="on_the_way" @if ($delivery_status =='on_the_way') selected @endif>On The Way</option>
		                                    <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>Delivered</option>
		                                    <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>Cancel</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-2 mt-2">
		                            <div class="custom_select">
		                               <select class=" select-active select2 form-select d-inline-block mb-lg-0 mr-5 mw-200" name="payment_status" id="payment_status">
		                                    <option value="" selected="">Payment Status</option>
		                                    <option value="0" @if ($payment_status == '0') selected @endif>Unpaid</option>
		                                    <option value="1" @if ($payment_status == '1') selected @endif>Paid</option>
		                                </select>
		                            </div>
		                        </div>
		                        <div class="col-md-2 mt-2">
		                            <div class="custom_select">
		                                <input type="text"   id="reportrange" class="form-control"  name="date" placeholder="Filter by date" data-format="DD-MM-Y" value="Filter by date" data-separator=" - " autocomplete="off">
		                            </div>
		                        </div>
		                        <div class="col-md-2 mt-2">
		                            <button class="btn btn-success" type="submit">Filter</button>
		                        </div>
		                    </div>
		                    <div class="table-responsive-sm">
		                        <table  class="table table-bordered table-hover" width="100%" id="dataTable">
		                            <thead>
		                                <tr>
		                                    <th>Order Code</th>
		                                    <!-- <th>Num. Of Products</th> -->
		                                    <th>Customer name</th>
		                                    <th>Amount</th>
		                                    <th>Delivery Status</th>
		                                    <th>Payment Status</th>
		                                    <th class="text-end">Options</th>
		                                </tr>
		                            </thead>
		                            <tbody>
		                            	@foreach ($orders as $key => $order)
		                                <tr>
		                                    <td>{{ $order->invoice_no }}</td>
		                                    <td><b>{{ $order->user->name }}</b></td>
		                                    <td>{{ $order->grand_total }}</td>
		                                    <td>
		                                    	@php
					                                $status = $order->delivery_status;
					                                if($order->delivery_status == 'cancelled') {
					                                    $status = '<span class="badge badge-danger">Received</span>';
					                                }

					                            @endphp
					                            <span class="badge badge-success">{!! $status !!}</span>
		                                    </td>
		                                    <td>
		                                    	@if ($order->payment_status == '1')
						                            <span class="badge badge-success">Paid</span>
						                            @else
						                            <span class="badge badge-danger">Un-Paid</span>
						                        @endif
		                                    </td>
		                                    <td class="text-end">
					                            <a  class="btn btn-primary btn btn-success btn-sm" href="{{route('order.show',$order->id) }}">
					                                <i class="fa-solid fa-eye"></i>
					                            </a>
					                            <a class="btn btn-primary btn-icon btn btn-primary btn-sm" href="{{ route('invoice.download', $order->id) }}">
					                                <i class="fa-solid fa-download"></i>
					                            </a>
					                            <a href="{{ route('order.delete', $order->id) }}" id="delete" class="btn btn-primary btn-icon btn btn-danger btn-sm" data-href="#" >
					                                <i class="fa-solid fa-trash"></i>
					                            </a>
					                        </td>
		                                </tr>
		                                @endforeach
		                            </tbody>
		                        </table>
		                        <div class="pagination-area mt-25 mb-50">
		                            <nav aria-label="Page navigation example">
		                                <ul class="pagination justify-content-end">
		                                    {{ $orders->links() }}
		                                </ul>
		                            </nav>
		                        </div>
		                    </div>
		                    </form>
		                    <!-- table-responsive //end -->
		                </div>
		                <!-- card-body end// -->
		            </div>
		            <!-- card end// -->
		        </div>
		    </div>
        </div>
    </div>
</div>
@endsection

@push('footer-script')



<script type="text/javascript">
$(function() {

    $('input[name="date"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });

  $('input[name="date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('MM/DD/YYYY') + ' - ' + picker.endDate.format('MM/DD/YYYY'));
  });


    var start = moment().subtract(29, 'days');
    var end = moment();



    $('input[name="date"]').daterangepicker({
      autoUpdateInput: false,
      locale: {
          cancelLabel: 'Clear'
      }
  });
    
    function cb(start, end) {
        $('#reportrange').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
    }

    $('#reportrange').daterangepicker({

        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);

});
</script>


@endpush