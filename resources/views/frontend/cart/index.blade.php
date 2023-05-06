@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Shop Cart</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:;">Shop</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Shop Cart</li>
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
                    <div class="row">
                        <div class="col-12 col-xl-8">
                            <div class="shop-cart-list mb-3 p-3">
                                <!-- Start Cart Page Product Show -->
                                <div class="row align-items-center g-3" id="cartPage">
                                    
                                </div>
                                <!-- End Cart Page Product Show -->

                                <!-- Start Coupon Apply Show -->
                                <div class="card rounded-0 mt-5" id="couponField">
                                    <div class="card-header">
                                        <span class="estimate-title">Coupon Discount:</span>
                                        <p>Enter your coupon name if you have one...</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <input type="text" class="form-control unicase-form-control text-input" placeholder="You Coupon.." id="coupon_name">
                                        </div>
                                        <div class="clearfix pull-right mt-2" style="float: right;">
                                            <button type="submit" class="btn btn-light btn-ecomm" onclick="applyCoupon()">APPLY COUPON</button>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Coupon Apply Show -->

                                <div class="my-4 border-top"></div>

                                <div class="d-lg-flex align-items-center gap-2">
                                    <a href="{{ route('home') }}" class="btn btn-light btn-ecomm">
                                        <i class='bx bx-shopping-bag'></i> Continue Shoping</a>
                                    <a href="{{ route('cart.remove.all') }}" id="delete" class="btn btn-light btn-ecomm ms-auto"><i class='bx bx-x-circle'></i> Clear Cart</a>
                                   <!--  <a href="#" class="btn btn-white btn-ecomm"><i class='bx bx-refresh'></i> Update Cart</a> -->
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-4">
                            <div class="checkout-form p-3 bg-dark-1">
                                <div class="card rounded-0 border bg-transparent mb-0 shadow-none">
                                    <div class="card-body">
                                        <!-- Start Coupon Calculation Show -->
                                        <div id="couponCalField">
                                            
                                        </div>
                                        <!-- End Coupon Calculation Show -->
                                        <div class="my-4"></div>
                                        <div class="d-grid"> <a href="{{ route('checkout')}}" class="btn btn-white btn-ecomm">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>
@endsection
