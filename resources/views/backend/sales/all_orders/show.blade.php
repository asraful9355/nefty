@extends('layouts.app2')
@section('admin')
<style type="text/css">
    table, tbody, tfoot, thead, tr, th, td{
        border: 1px solid #dee2e6 !important;
    }
    th{
        font-weight: bolder !important;
    }
</style>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
  <!-- Main Content -->
  <div id="content">
    <div class="container-fluid">
      <div class="content-header">
        <div>
            <h2 class="content-title card-title">Order detail</h2>
            <p>Details for Order ID: {{ $order->invoice_no?? 'Null'}}</p>
        </div>
      </div>
      <div class="card shadow-lg">
        <header class="card-header bg-success text-white">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-8 mb-lg-0 mb-15">
                    <span class="text-white"> <i class="material-icons md-calendar_today"></i>
                    <b>
                      {{ \Carbon\Carbon::parse($order->date)->isoFormat('MMM Do YYYY')}}
                    </b> </span> <br />
                    <small class="text-white">Order ID: {{ $order->invoice_no?? 'Null'}}</small>
                </div>
                @php
                    $payment_status = $order->payment_status;
                    $delivery_status = $order->delivery_status;
                @endphp
                <div class="col-lg-4 col-md-4 ms-auto text-md-end">
                    <select class="form-select d-inline-block select2 mb-lg-0 mr-5 mw-200" id="update_payment_status">
                        <option value="0" @if ($payment_status == '0') selected @endif>Unpaid</option>
                        <option value="1" @if ($payment_status == '1') selected @endif>Paid</option>
                    </select>
                    @if($delivery_status != 'delivered' && $delivery_status != 'cancelled')
                    <select class="form-select d-inline-block select2 mb-lg-0 mr-5 mw-200" id="update_delivery_status">
                        <option value="pending" @if ($delivery_status == 'pending') selected @endif>Pending</option>
                        <option value="confirmed" @if ($delivery_status == 'confirmed') selected @endif>Confirmed</option>
                        <option value="shipped" @if ($delivery_status == 'shipped') selected @endif>Shipped</option>
                        <option value="picked_up" @if ($delivery_status == 'picked_up') selected @endif>Picked Up</option>
                        <option value="on_the_way" @if ($delivery_status =='on_the_way') selected @endif>On The Way</option>
                        <option value="delivered" @if ($delivery_status == 'delivered') selected @endif>Delivered</option>
                        <option value="cancelled" @if ($delivery_status == 'cancelled') selected @endif>Cancel</option>
                    </select>
                    @else
                        <input type="text" class="form-control d-inline-block mb-lg-0 mr-5 mw-200" value="{{ $delivery_status }}" disabled>
                    @endif
                    
                    <!-- <a class="btn btn-primary" href="#">Save</a> -->
                    <a class="btn btn-danger print ms-2" href="#" onclick="window.print();"><i class="fa fa-print"></i></a>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="row mb-50 mt-20 order-info-wrap">
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-person"></i>
                        </span>

                       
                        <div class="text">
                            <h6 class="mb-1">Customer info</h6>
                            <p class="mb-1">
                                {{ $order->user->name ?? 'Null'}} <br />
                                {{ $order->user->email ?? 'Null'}} <br />
                                {{ $order->user->phone ?? 'Null'}}
                            </p>
                        </div>
                    </article>
                </div>
                <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-local_shipping"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Order info</h6>
                            <p class="mb-1">
                                Order Id: {{ $order->invoice_no?? 'Null'}} </br>
                                Shipping: Pickup <br />
                                Pay method: Cash <br />
                                Status: @php
                                            $status = $order->delivery_status;
                                            if($order->delivery_status == 'cancelled') {
                                                $status = 'Received';
                                            }

                                        @endphp
                                        {!! $status !!}
                            </p>
                        </div>
                    </article>
                </div>
                <!-- col// -->
                <div class="col-md-4">
                    <article class="icontext align-items-start">
                        <span class="icon icon-sm rounded-circle bg-primary-light">
                            <i class="text-primary material-icons md-place"></i>
                        </span>
                        <div class="text">
                            <h6 class="mb-1">Deliver to</h6>
                            <p class="mb-1">
                                City: {{ ucwords($order->upazilla->name_en ?? 'Null' ) }}, <br />{{ ucwords($order->district->district_name_en ?? 'Null') }},<br />
                                {{ ucwords($order->division->division_name_en ?? 'Null') }}
                            </p>
                        </div>
                    </article>
                </div>
                <!-- col// -->
                <div class="col-md-12 mt-60">
                    <table class="table table-bordered">
                        <form action="{{ route('admin.orders.update',$order->id) }}" method="post">
                            @csrf
                            <tbody>
                                <tr>
                                    <th>Invoice No</th>
                                    <td>{{ $order->invoice_no?? 'Null'}}</td>
                                    <th>Email</th>
                                    <td><input type="" class="form-control" name="email" value="{{ $order->user->email ?? 'Null'}}"></td>
                                </tr>
                                <tr>
                                    <th class="col-2">Shipping Address</th>
                                    <td>
                                        <label for="division_id" class="fw-bold text-black"><span class="text-danger">*</span> Division</label>
                                        <select class="form-control select-active select2"  name="division_id" id="division_id" required>
                                            <option value="">Select Division</option>

                                            @foreach(get_divisions($order->division_id) as $division)
                                              <option value="{{ $division->id }}" {{ $division->id == $order->division_id ? 'selected': '' }}>{{ ucwords($division->division_name_en) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <label for="district_id" class="fw-bold text-black"><span class="text-danger">*</span> District</label>
                                        <select class="form-control select-active select2" name="district_id" id="district_id" required>
                                            <option selected=""  value="">Select District</option>
                                            @foreach(get_district_by_division_id($order->division_id) as $district)
                                                <option value="{{ $district->id }}" {{ $district->id == $order->district_id ? 'selected': '' }}>{{ ucwords($district->district_name_en) }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <label for="upazilla_id" class="fw-bold text-black"><span class="text-danger">*</span> Upazilla</label>
                                        <select class="form-control select-active select2" name="upazilla_id" id="upazilla_id" required>
                                            <option selected=""  value="">Select Upazilla</option>
                                            @foreach(get_upazilla_by_district_id($order->district_id) as $upazilla)
                                                <option value="{{ $upazilla->id }}" {{ $upazilla->id == $order->upazilla_id ? 'selected': '' }}>{{ ucwords($upazilla->name_en) }}</option>
                                            @endforeach

                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>
                                        <select class="form-control select-active select2" name="payment_method" id="payment_method"> orders
                                            @php
                                              $payment_method = $order->payment_method;
                                            @endphp
                                            <option selected=""  value="" >Select Payment Method</option>
                                                <option value="cash" 
                                                @if ($payment_method =='cash_on_delivery') selected @endif>Cash</option>
                                                <option value="bikash"
                                                @if ($payment_method =='bkash') selected @endif>Bikash</option>
                                                <option value="nagad"
                                                @if ($payment_method =='nagad') selected @endif>Nagad</option>
                                        </select>
                                    </td>
                                    <th>Shipping Method</th>
                                    <td>
                                        <select class="form-control select-active select2" name="shipping_type" id="shipping_type" >
                                            <option selected=""  value="" >Select Shipping Method</option>
                                                <option value="cash" 
                                                @if ($payment_method =='cash_on_delivery') selected @endif>Cash</option>
                                                <option value="bikash"
                                                @if ($payment_method =='bkash') selected @endif>Bikash</option>
                                                <option value="nagad"
                                                @if ($payment_method =='nagad') selected @endif>Nagad</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Shipping Charge</th>
                                    <td><input type="" class="form-control" name="shipping_cost" value="80"></td>
                                    <th>Discount</th>
                                    <td><input type="" class="form-control" name="discount" value="0.00"></td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>
                                        @php
                                            $status = $order->delivery_status;
                                            if($order->delivery_status == 'cancelled') {
                                                $status = 'Received';
                                            }

                                        @endphp
                                        <span class="badge badge-success text-white
                                        ">{!! $status !!}</span>
                                    </td>
                                    <th>Payment Date</th>
                                    <td>{{ date_format($order->created_at,"Y/m/d") ?? 'Null'}}</td>
                                </tr>
                                <tr>
                                    <th>Total</th>
                                    <td>{{ $order->grand_total ?? 'Null'}} <strong>Tk</strong></td>
                                    <th>Sub Total</th>
                                    <td>{{ $order->grand_total ?? 'Null'}} <strong>Tk</strong></td>
                                </tr>
                            </tbody>
                    </table>
                </div>
                <!-- col// -->
            </div>
            <!-- row // -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="h-25 pt-4">
                        <div class="mb-3">
                            <label>Notes:</label>
                            <textarea class="form-control" name="notes" id="notes" placeholder="Type some note"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success" style="float: right;">Update Orders</button>
                      </div>
                    </form>
                </div>
                <!-- col// -->
            </div>
        </div>
        <!-- card-body end// -->
      </div>
    <!-- card end// -->
    </div>
  </div>
</div>
@endsection


@push('footer-script')

<script type="text/javascript">

    /* ============ Update Payment Status =========== */
    $('#update_payment_status').on('change', function(){
        var order_id = {{ $order->id }};
        var status = $('#update_payment_status').val();
        $.post('{{ route('orders.update_payment_status') }}', {_token:'{{ @csrf_token() }}',order_id:order_id,status:status}, function(data){
            // console.log(data);
            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 1000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message 
        });
    });

    /* ============ Update Delivery Status =========== */
    $('#update_delivery_status').on('change', function(){
        var order_id = {{ $order->id }};
        var status = $('#update_delivery_status').val();
        $.post('{{ route('orders.update_delivery_status') }}', {
            _token:'{{ @csrf_token() }}',
            order_id:order_id,
            status:status
        }, function(data){
            // console.log(data);
            // Start Message 
            const Toast = Swal.mixin({
                  toast: true,
                  position: 'top-end',
                  
                  showConfirmButton: false,
                  timer: 1000
                })
            if ($.isEmptyObject(data.error)) {
                Toast.fire({
                    type: 'success',
                    icon: 'success',
                    title: data.success
                })
            }else{
                Toast.fire({
                    type: 'error',
                    icon: 'error',
                    title: data.error
                })
            }
            // End Message 
        });
    });
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!--  Division To District Show Ajax -->
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="division_id"]').on('change', function(){
        var division_id = $(this).val();
        if(division_id) {
            $.ajax({
                url: "{{  url('/division-district/ajax') }}/"+division_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                    $('select[name="district_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                      $.each(data, function(key, value){
                        // console.log(value);
                          $('select[name="district_id"]').append('<option value="'+ value.id +'">' + capitalizeFirstLetter(value.district_name_en) + '</option>');
                    });
                    $('select[name="upazilla_id"]').html('<option value="" selected="" disabled="">Select District</option>');
                },
            });
        } else {
           alert('danger');
        }
    });
    function capitalizeFirstLetter(string) {
      return string.charAt(0).toUpperCase() + string.slice(1);
    }
});
</script>

<!--  District To Upazilla Show Ajax -->
<script type="text/javascript">
  $(document).ready(function() {
    $('select[name="district_id"]').on('change', function(){
        var district_id = $(this).val();
        if(district_id) {
            $.ajax({
                url: "{{  url('/district-upazilla/ajax') }}/"+district_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="upazilla_id"]').empty();
                      $.each(data, function(key, value){
                          $('select[name="upazilla_id"]').append('<option value="'+ value.id +'">' + value.name_en + '</option>');
                          $('select[name="upazilla_id"]').append('<option  class="d-none" value="'+ value.id +'">' + value.name_en + '</option>');
                      });
                },
            });
        } else {
            alert('danger');
        }
    });
});
</script>
@endpush
