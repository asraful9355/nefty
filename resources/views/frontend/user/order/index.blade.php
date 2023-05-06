@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Orders</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Orders</li>
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
                <h3 class="d-none">Account</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card shadow-none mb-3 mb-lg-0">
                                    @include('frontend.common.usersidebar')
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead class="table-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Actions</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if($orders->count() > 0)
                                                                @foreach($orders as $order)
                                                                <tr>
                                                                    <td>{{ $order->invoice_no }}</td>
                                                                    <td>
                                                                        {{ \Carbon\Carbon::parse($order->date)->isoFormat('MMM Do YYYY')}}
                                                                    </td>
                                                                    <td>
                                                                        <div class="badge rounded-pill bg-success w-100">
                                                                        {{$order->delivery_status }}
                                                                        </div>
                                                                    </td>
                                                                    <td>৳{{ $order->grand_total }}</td>
                                                                    <td>
                                                                        <div class="d-flex gap-2"><a href="{{ route('order.view',$order->invoice_no) }}" class="btn btn-light btn-sm rounded-0">View</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="3"></td>
                                                                    <td>
                                                                        <span class="text-center text-white">Your Order Empty!</span>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection
