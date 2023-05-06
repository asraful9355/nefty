@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">Compare</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('home') }}">
                                        <i class="bx bx-home-alt"></i> Home
                                    </a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    <a href="{{ route('compare.reset') }}"> Compare</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
        <!--end breadcrumb-->
        <section class="mb-5 mt-5">
            <div class="container text-left">
                <div class="shadow-lg rounded" style="background-color:#005f7d;">
                    <div class="p-3 border-bottom d-flex justify-content-between align-items-center">
                        <div class="fs-15 fw-600 text-white">Comparison</div>
                        <a href="{{ route('compare.reset') }}" style="text-decoration: none;" class="btn btn-danger btn-sm fw-600">Reset Compare List</a>
                    </div>
                    @if(Session::has('compare'))
                        @if(count(Session::get('compare')) > 0)
                            <div class="p-3">
                                <table class="table table-responsive table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width:16%" class="font-weight-bold">
                                                Product Name
                                            </th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                <th scope="col" style="width:28%" class="font-weight-bold">
                                                    <a class="text-reset fs-15" href="{{ route('product.details', \App\Models\Product::find($item)->slug) }}">{{ \App\Models\Product::find($item)->name_en }}</a>
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Product Image</th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                <td>
                                                    <img loading="lazy" src="{{ asset(\App\Models\Product::find($item)->product_thumbnail) }}" alt="Product Image" class="img-fluid py-4">
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Product Price</th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                @php
                                                    $product = \App\Models\Product::find($item);
                                                @endphp

                                                @php
                                                    if($product->discount_type == 1){
                                                        $price_after_discount = $product->regular_price - $product->discount_price;
                                                    }elseif($product->discount_type == 2){
                                                        $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price / 100);
                                                    }
                                                @endphp
                                                <td>
                                                   @if ($product->discount_price > 0)
                                                        <div class="mb-1 product-price">
                                                            <span class="text-white fs-5">৳{{ $price_after_discount }}</span>
                                                            <span class="me-1 text-decoration-line-through">৳ {{ $product->regular_price }}</span>
                                                        </div>
                                                    @else
                                                        <div class="mb-1 product-price">
                                                            <span class="text-white fs-5">৳{{ $product->regular_price }}</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Product Brand</th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                <td>
                                                    @if (\App\Models\Product::find($item)->brand != null)
                                                        {{ \App\Models\Product::find($item)->brand->brand_name_en }}
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row">Product Category</th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                <td>
                                                    @if (\App\Models\Product::find($item)->category != null)
                                                        {{ \App\Models\Product::find($item)->category->category_name_en }}
                                                    @endif  
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <th scope="row"></th>
                                            @foreach (Session::get('compare') as $key => $item)
                                                <td class="text-center py-4">
                                                   <div class="d-grid gap-2">
                                                        @if($product->is_varient == 1)
                                                            <a href="#" id="{{ $product->id }}" onclick="productView(this.id)"  class="btn btn-light btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                                        @else

                                                        <input type="hidden" id="pfrom" value="direct">
                                                        <input type="hidden" id="product_product_id" value="{{ $product->id }}"  min="1">
                                                        <input type="hidden" id="{{ $product->id }}-product_pname" value="{{ $product->name_en }}">

                                                            <a onclick="addToCartDirect({{ $product->id }})"  class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a>
                                                        @endif
                                                    </div>
                                                </td>
                                            @endforeach
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    @else
                        <div class="text-center p-4">
                            <p class="fs-17 text-white" style="font-size: 25px;">Your comparison list is empty</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    </div>
</div>
@endsection
