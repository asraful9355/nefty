@extends('layouts.frontend')
@section('content-frontend')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        @if (session()->get('language') == 'bangla')
                            <h3 class="breadcrumb-title pe-3">অর্ডার</h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">Order</h3>
                        @endif
                        <div class="ms-auto">
                            <nav aria-label="breadcrumb">
                                @if (session()->get('language') == 'bangla')
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                    class="bx bx-home-alt"></i>হোম</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="/product/shop">দোকান</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.orders.index') }}">অর্ডার তালিকা </a>
                                            </li>
                                    </ol>
                                @else
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                    class="bx bx-home-alt"></i>
                                                Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="/product/shop">Shop</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('user.orders.index') }}">Order List</a>
                                        </li>
                                    </ol>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <section class="py-4">
                <div class="container">
                    <div class="invoice invoice-content invoice-3">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="invoice-inner">
                                        <div class="invoice-info" id="invoice_wrapper">
                                            <div class="invoice-header">
                                                <div class="row">
                                                    <div class="col-sm-6">

                                                    </div>
                                                    <div class="col-sm-6  text-end">
                                                        <div class="invoice-numb">
                                                            <h4 class="invoice-header-1 mb-10 mt-20">Invoice No:<span
                                                                    class="text-heading">{{ $order->invoice_no }}</span>
                                                            </h4>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="invoice-top">
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="invoice-number">
                                                            <h4 class="invoice-title-1 mb-10">Invoice To</h4>
                                                            <p class="invoice-addr-1 text-capitalize">
                                                                <strong>{{ get_setting('business_name')->value ?? 'Null' }}</strong>
                                                                <br />
                                                                {{ get_setting('business_address')->value ?? 'Null' }}<br>
                                                                <strong title="Phone">Phone:</strong>
                                                                {{ get_setting('phone')->value ?? 'Null' }}<br>
                                                                <strong title="Email">Email:
                                                                </strong>{{ get_setting('email')->value ?? 'Null' }}<br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="invoice-number">
                                                            <h4 class="invoice-title-1 mb-10">Bill To</h4>
                                                            <p class="invoice-addr-1 text-capitalize">
                                                                <strong>{{ $order->user->name ?? 'NULL' }}</strong> <br />
                                                                {{ $order->address ?? 'NULL' }}<br>
                                                                {{ $order->upazilla->state_name ?? 'NULL' }},
                                                                {{ $order->district->district_name ?? 'NULL' }},
                                                                {{ $order->division->division_name ?? 'NULL' }}<br>
                                                                <strong title="Phone">Phone:</strong>
                                                                {{ $order->user->phone ?? 'NULL' }}<br>
                                                                <strong title="Email">Email:
                                                                </strong>{{ $order->user->email }}<br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-6">
                                                        <div class="invoice-number">
                                                            <h4 class="invoice-title-1 mb-10">Overview</h4>
                                                            <p class="invoice-addr-1 text-capitalize ">
                                                                <strong>Invoice Data:</strong>
                                                                {{ \Carbon\Carbon::parse($order->date)->isoFormat('MMM Do YYYY') }}<br />
                                                                <strong>Payment Method:</strong>
                                                                {{ $order->payment_method }}<br />
                                                                <strong>Status:</strong> <span
                                                                    class="text-brand">{{ $order->delivery_status }}</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="invoice-center">
                                                <div class="table-responsive">
                                                    <table class="table table-striped invoice-table">
                                                        <thead class="bg-active">
                                                            <tr>
                                                                <th>Item Item</th>
                                                                <th class="text-center">Unit Price</th>
                                                                <th class="text-center">Quantity</th>
                                                                <th class="text-right">Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($order->order_details as $order_detail)
                                                                <tr>
                                                                    <td>
                                                                        <div class="item-desc-1">
                                                                            <span>{{ $order_detail->product->name_en ?? 'NULL' }}</span>
                                                                            <span>
                                                                                @if ($order_detail->is_varient && count(json_decode($order_detail->variation)) > 0)
                                                                                    @foreach (json_decode($order_detail->variation) as $varient)
                                                                                        <span>{{ $varient->attribute_name }}
                                                                                            : <span
                                                                                                class="d-inline-block fw-normal ms-1">{{ $varient->attribute_value }}</span></span>
                                                                                    @endforeach
                                                                                @endif
                                                                            </span>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        ৳{{ $order_detail->price ?? 'NULL' }}
                                                                    </td>
                                                                    <td class="text-center">
                                                                        {{ $order_detail->qty ?? 'NULL' }}
                                                                    </td>
                                                                    <td class="text-right">
                                                                        ৳{{ $order_detail->price ?? 'Null' }} *
                                                                        {{ $order_detail->qty }}</td>
                                                                </tr>
                                                            @endforeach
                                                            <tr>
                                                                <td colspan="3" class="text-end f-w-600">SubTotal:</td>
                                                                <td class="text-right">৳{{ $order->grand_total ?? 'NULL' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="3" class="text-end f-w-600">Grand Total:
                                                                </td>
                                                                <td class="text-right f-w-600">
                                                                    ৳{{ $order->grand_total ?? 'NULL' }}</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="invoice-bottom">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div>
                                                            <h3 class="invoice-title-1">Important Note</h3>
                                                            <ul class="important-notes-list-1">
                                                                <li>All amounts shown on this invoice are in BDT</li>
                                                                <li>finance charge of 1.5% will be made on unpaid balances
                                                                    after 30 days.</li>
                                                                <li>Once order done, money can't refund</li>
                                                                <li>Delivery might delay due to some external dependency
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-offsite">
                                                        <div class="text-end">
                                                            <p class="mb-0 text-13">Thank you for your business</p>
                                                            <p><strong>{{ get_setting('business_name')->value ?? 'Null' }}</strong>
                                                            </p>
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
            </section>
        </div>
    </div>
@endsection
