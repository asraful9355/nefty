@extends('layouts.frontend')
@section('content-frontend')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        <h3 class="breadcrumb-title pe-3">Checkout</h3>
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="bx bx-home-alt"></i>
                                            Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop cart-->
            <section class="py-4">
                <div class="container">
                    <div class="shop-cart">
                        <form class="row g-3" action="{{ route('checkout.payment') }}" method="post">
                            @csrf
                            <div class="row">


                                <div class="col-12 col-xl-7">
                                    <div class="checkout-details">

                                        <div class="card rounded-0">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <div class="">
                                                        <img src="{{ asset('frontend/assets/images/avatars/avatar-1.png ') }}"
                                                            width="90" alt="" class="rounded-circle p-1 border">
                                                    </div>
                                                    <div class="ms-2">
                                                        <h6 class="mb-0">Shamim</h6>
                                                        <p class="mb-0">shamim@gmail.com</p>
                                                    </div>
                                                    <div class="ms-auto"> <a href="javascript:;"
                                                            class="btn btn-light btn-ecomm"><i class='bx bx-edit'></i> Edit
                                                            Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card rounded-0">
                                            <div class="card-body">
                                                <div class="border p-3">
                                                    <h2 class="h5 mb-0">Shipping Address</h2>
                                                    <div class="my-3 border-bottom"></div>
                                                    <div class="form-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Name:</label>
                                                                <input type="text" name="name"
                                                                    value="{{ Auth::user()->name ?? '' }}"
                                                                    class="form-control rounded-0">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label">Phone:</label>
                                                                <input type="text" name="phone"
                                                                    value="{{ Auth::user()->phone ?? '' }}"
                                                                    class="form-control rounded-0">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label">Email:</label>
                                                                <input type="email" name="email"
                                                                    value="{{ Auth::user()->email ?? '' }}"
                                                                    class="form-control rounded-0">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label"
                                                                    for="division_id">Division:</label>
                                                                <select name="division_id" id="division_id"
                                                                    class="form-select rounded-0" required="">
                                                                    <option value="">Select Division</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{ $division->id }}">
                                                                            {{ ucwords($division->division_name) }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label class="form-label"
                                                                    for="district_id">District:</label>
                                                                <select name="district_id" id="distr"
                                                                    class="form-select rounded-0" required="">
                                                                    <option selected="" value="">Select District
                                                                    </option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label class="form-label"
                                                                    for="upazilla_id">Upazilla:</label>
                                                                <select name="upazilla_id" id="upazilla_id"
                                                                    class="form-select rounded-0" required="">
                                                                    <option selected="" value="">Select Upazilla
                                                                    </option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <label class="form-label">Address:</label>
                                                                <textarea class="form-control rounded-0" name="address"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="my-3 border-bottom"></div>
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="gridCheck" checked>
                                                                    <label class="form-check-label" for="gridCheck">Same
                                                                        as
                                                                        shipping address</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="d-grid">
                                                                    <a href="{{ route('cart.show') }}"
                                                                        class="btn btn-light btn-ecomm">
                                                                        <i class='bx bx-chevron-left'></i>Back to Cart
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="d-grid">
                                                                    <button type="submit"
                                                                        class="btn btn-white btn-ecomm">Proceed to
                                                                        Checkout<i
                                                                            class='bx bx-chevron-right'></i></button>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-xl-5">
                                    <div class="order-summary">
                                        <div class="card rounded-0">
                                            <div class="card-body">
                                                <div class="card rounded-0 border bg-transparent shadow-none">
                                                    <div class="card-body">
                                                        <p class="fs-5 text-white">Order summary:</p>
                                                        @forelse($carts as $item)
                                                            <div class="my-3 border-top"></div>
                                                            <div class="d-flex align-items-center">
                                                                <a class="d-block flex-shrink-0" href="javascript:;">
                                                                    <img src="{{ asset($item->options->image) }}"
                                                                        width="75" alt="item">
                                                                </a>
                                                                <div class="ps-2">
                                                                    <h6 class="mb-1">
                                                                        <a href="#">
                                                                            {{ $item->name }}
                                                                        </a>
                                                                    </h6>
                                                                    <div class="widget-item-meta">
                                                                        <span class="me-2">৳
                                                                            <small>{{ $item->price }}</small>
                                                                        </span>
                                                                        <span class="">x {{ $item->qty }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @empty
                                                            <span class="text-white text-center">
                                                                Your Cart empty!
                                                            </span>
                                                        @endforelse
                                                    </div>
                                                </div>
                                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                                    <div class="card-body">
                                                        @if (Session::has('coupon'))
                                                            <p class="mb-2">Total:
                                                                <span class="float-end">
                                                                    ৳{{ $cartTotal }}
                                                                </span>
                                                            </p>
                                                            <p class="mb-2">Subtotal:
                                                                <span class="float-end">
                                                                    ৳{{ $cartTotal }}
                                                                </span>
                                                            </p>
                                                            <div class="my-3 border-top"></div>
                                                            <p class="mb-2">Coupon Name & Percent :
                                                                <span class="float-end">
                                                                    {{ session()->get('coupon')['coupon_name'] }}
                                                                    (
                                                                    {{ session()->get('coupon')['coupon_discount'] }}
                                                                    % )
                                                                </span>
                                                            </p>
                                                            <p class="mb-2">Coupon Discount:
                                                                <span class="float-end">
                                                                    ৳{{ session()->get('coupon')['discount_amount'] }}
                                                                </span>
                                                            </p>
                                                            <div class="my-3 border-top"></div>
                                                            <h5 class="mb-0">Order Total:
                                                                <span class="float-end">
                                                                    ৳{{ session()->get('coupon')['total_amount'] ?? '0.00' }}
                                                                </span>
                                                            </h5>
                                                        @else
                                                            <p class="mb-2">Total:
                                                                <span class="float-end">৳{{ $cartTotal }}</span>
                                                            </p>
                                                            <p class="mb-2">Subtotal:
                                                                <span class="float-end"
                                                                    id="subtotal">৳{{ $cartTotal }}</span>
                                                            </p>
                                                            <p class="mb-2">Total Shipping:
                                                                <span class="float-end"
                                                                    id="ship_charge">0.00<strong>Tk</strong></span>
                                                            </p>
                                                            <h5 class="mb-0" id="gtotal">Order Total:
                                                                <span class="float-end">
                                                                    ৳{{ $cartTotal }}
                                                                </span>
                                                            </h5>
                                                        @endif
                                                    </div>
                                                </div>

                                                <style type="text/css">
                                                    .aiz-megabox>input:checked~.aiz-megabox-elem,
                                                    .aiz-megabox>input:checked~.aiz-megabox-elem {
                                                        border-color: #e62e04;
                                                    }

                                                    .aiz-megabox .aiz-megabox-elem {
                                                        border: 1px solid #6ce2b1;
                                                        border-radius: 0.25rem;
                                                        -webkit-transition: all 0.3s ease;
                                                        transition: all 0.3s ease;
                                                        border-radius: 0.25rem;
                                                    }

                                                    .p-3 {
                                                        padding: 1rem !important;
                                                    }

                                                    .d-block {
                                                        display: block !important;
                                                    }

                                                    [type='radio'] {
                                                        display: none;
                                                    }
                                                </style>

                                                <div class="card rounded-0 border bg-transparent mb-0 mt-4 ">
                                                    <div class="card-body">
                                                        <h5 class="text-white p-2">Select a payment option:</h5>
                                                        <div class="my-0 border-top"></div>
                                                        <div class="row mt-3">
                                                            <div class="col-xxl-8 col-xl-12">
                                                                <div class="row gutters-10">
                                                                    <div class="col-6 col-md-6">
                                                                        <label class="aiz-megabox d-block mb-3">
                                                                            <input value="bkash" class="online_payment"
                                                                                type="radio" name="payment_option"
                                                                                checked>
                                                                            <span class="d-block aiz-megabox-elem p-3">
                                                                                <img src="{{ asset('frontend/payment/bkash.png') }}"
                                                                                    class="img-fluid mb-2">
                                                                                <span class="d-block text-center">
                                                                                    <span
                                                                                        class="d-block fw-600 fs-15">Bkash
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-6 col-md-6">
                                                                        <label class="aiz-megabox d-block mb-3">
                                                                            <input value="nagad" class="online_payment"
                                                                                type="radio" name="payment_option"
                                                                                checked>
                                                                            <span class="d-block aiz-megabox-elem p-3">
                                                                                <img src="{{ asset('frontend/payment/nagad.png') }}"
                                                                                    class="img-fluid mb-2">
                                                                                <span class="d-block text-center">
                                                                                    <span
                                                                                        class="d-block fw-600 fs-15">Nagad
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-6 col-md-6">
                                                                        <label class="aiz-megabox d-block mb-3">
                                                                            <input value="sslcommerz"
                                                                                class="online_payment" type="radio"
                                                                                name="payment_option" checked>
                                                                            <span class="d-block aiz-megabox-elem p-3">
                                                                                <img src="{{ asset('frontend/payment/sslcommerz.png') }}"
                                                                                    class="img-fluid mb-2">
                                                                                <span class="d-block text-center">
                                                                                    <span
                                                                                        class="d-block fw-600 fs-15">sslcommerz
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                    <div class="col-6 col-md-6">
                                                                        <label class="aiz-megabox d-block mb-3">
                                                                            <input value="cash_on_delivery"
                                                                                class="online_payment" type="radio"
                                                                                name="payment_option" checked>
                                                                            <span class="d-block aiz-megabox-elem p-3">
                                                                                <img src="{{ asset('frontend/payment/cod.png') }}"
                                                                                    class="img-fluid mb-2">
                                                                                <span class="d-block text-center">
                                                                                    <span class="d-block fw-600 fs-15">Cash
                                                                                        On
                                                                                        Delivery
                                                                                    </span>
                                                                                </span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!--end row-->
                    </div>
                </div>
            </section>
            <!--end shop cart-->
        </div>
    </div>
    <!--end page wrapper -->

    @push('footer-script')
        <!--===============  Start Division To District Show Ajax ===============-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="division_id"]').on('change', function() {
                    var division_id = $(this).val();
                    if (division_id) {
                        $.ajax({
                            url: "{{ url('/division-district/ajax') }}/" + division_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                $('select[name="district_id"]').html(
                                    '<option value="" selected="" disabled="">Select District</option>'
                                );
                                $.each(data, function(key, value) {
                                    $('select[name="district_id"]').append(
                                        '<option value="' + value.id + '">' +
                                        capitalizeFirstLetter(value.district_name) +
                                        '</option>');
                                });
                                $('select[name="upazilla_id"]').html(
                                    '<option value="" selected="" disabled="">Select District</option>'
                                );
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });

                function capitalizeFirstLetter(string) {
                    return string.charAt(0).toUpperCase() + string.slice(1);
                }
                distr

            });
        </script>
        <!--===============  End Division To District Show Ajax ===============-->

        <!--===============  Start  District To Upazilla Show Ajax ===============-->
        <script type="text/javascript">
            $(document).ready(function() {
                $('select[name="district_id"]').on('change', function() {
                    var district_id = $(this).val();
                    if (district_id) {
                        $.ajax({
                            url: "{{ url('/district-upazilla/ajax') }}/" + district_id,
                            type: "GET",
                            dataType: "json",
                            success: function(data) {
                                var d = $('select[name="upazilla_id"]').empty();
                                $.each(data, function(key, value) {
                                    $('select[name="upazilla_id"]').append(
                                        '<option value="' + value.id + '">' + value
                                        .state_name + '</option>');
                                });
                            },
                        });
                    } else {
                        alert('danger');
                    }
                });
            });
        </script>
        <!--===============  End  District To Upazilla Show Ajax ===============-->

        <!--===============  Start  Shipping Charge  ===============-->
        <script type="text/javascript">
            // $(document).on('change', '#distr', function(e) {
            //     let shipping_charge = 0;

            //     if ($("select[name='district_id']").val() == '18') {
            //         let charge = "80";
            //         shipping_charge += parseInt(charge);
            //     } else {
            //         let charge = "110";
            //         shipping_charge += parseInt(charge);
            //     }

            //     let subtotal = $('#subtotal').text();
            //     // let coupon   = $('span#coupon').text();

            //     let rep_subtotal = subtotal.replace(',', '');
            //     // let rep_coupon   = coupon.replace(',', '');

            //     let total = (parseInt(rep_subtotal) + shipping_charge);
            //     $('#ship_charge').text(number_format(shipping_charge, 2, '.', ','));
            //     $('#total').text(number_format(total, 2, '.', ','));
            //     $('#gtotal').val(total);
            //     // console.log(gtotal);
            // });


            $(document).on('change', '#distr', function(e) {
                let shipping_charge = 0;

                if ($("select[name='district_id']").val() == '18') {
                    let charge = "80";
                    shipping_charge += parseInt(charge);
                } else {
                    let charge = "110";
                    shipping_charge += parseInt(charge);
                }

                let subtotal = $('#subtotal').text();
                // let coupon   = $('span#coupon').text();

                let rep_subtotal = subtotal.replace(',', '');
                // let rep_coupon   = coupon.replace(',', '');

                let total = (parseInt(rep_subtotal) + shipping_charge);
                $('#ship_charge').text(number_format(shipping_charge, 2, '.', ','));
                $('#total').text(number_format(total, 2, '.', ','));
                $('#gtotal').val(total);
                // console.log(gtotal);
            });

            function number_format(number, decimals, dec_point, thousands_sep) {
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    toFixedFix = function(n, prec) {
                        // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                        var k = Math.pow(10, prec);
                        return Math.round(n * k) / k;
                    },
                    s = (prec ? toFixedFix(n, prec) : Math.round(n)).toString().split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
        </script>
    @endpush
@endsection
