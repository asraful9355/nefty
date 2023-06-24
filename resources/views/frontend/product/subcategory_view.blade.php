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
                            <h3 class="breadcrumb-title pe-3">সাব ক্যাটাগরি প্রোডাক্ট</h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">Product SubCategories</h3>
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
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="{{ route('product.category', $subcategory->category->slug) }}"">
                                                {{ $subcategory->category->category_name_bn }}</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            <a href="{{ route('product.subcategory', $subcategory->slug) }}">
                                                {{ $subcategory->subcategory_name_bn }}</a></li>
                                    </ol>
                                @else
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                    class="bx bx-home-alt"></i>
                                                Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="/product/shop">Shop</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.category', $subcategory->category->slug) }}"">
                                            {{ $subcategory->category->category_name_en }}</a></li>

                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.subcategory', $subcategory->slug) }}">
                                            {{ $subcategory->subcategory_name_en }}</a></li>
                                    </ol>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->
            <!--start shop area-->
            <section class="py-4">
                <div class="container">
                    <div class="row">
                        <!-- catgoy sidebar -->
                        <div class="col-12 col-xl-12">
                            <div class="product-wrapper">
                                <div class="product-grid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 row-cols-xl-4">
                                        @forelse($products as $product)
                                            <div class="col">
                                                <div class="card rounded-0 product-card">
                                                    <div class="card-header bg-transparent border-bottom-0">
                                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                                            <a style="cursor: pointer;"
                                                                onclick="addToCompare({{ $product->id }})">
                                                                <div class="product-compare"><span><i
                                                                            class='bx bx-git-compare'></i> Compare</span>
                                                                </div>
                                                            </a>
                                                            <a style="cursor:pointer;" id="{{ $product->id }}"
                                                                onclick="addToWishList(this.id)">
                                                                <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                    <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top"
                                                        alt="..." style="object-fit: cover;"></a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a
                                                                href="{{ route('product.subcategory', $subcategory->slug) }}">
                                                                <p class="product-catergory font-13 mb-1">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        {{ $subcategory->subcategory_name_bn }}
                                                                    @else
                                                                        {{ $subcategory->subcategory_name_en }}
                                                                    @endif
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('product.details', $product->slug) }}">
                                                                <h6 class="product-name mb-2">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        {{ $product->name_bn }}
                                                                    @else
                                                                        {{ $product->name_en }}
                                                                    @endif
                                                                </h6>
                                                            </a>
                                                            @php
                                                                if ($product->discount_type == 1) {
                                                                    $price_after_discount = $product->regular_price - $product->discount_price;
                                                                } elseif ($product->discount_type == 2) {
                                                                    $price_after_discount = $product->regular_price - ($product->regular_price * $product->discount_price) / 100;
                                                                }
                                                            @endphp
                                                            <div class="d-flex align-items-center">
                                                                @if ($product->discount_price > 0)
                                                                    <div class="mb-1 product-price">
                                                                        <span
                                                                            class="text-white fs-5">৳{{ $price_after_discount }}</span>
                                                                        <span class="me-1 text-decoration-line-through">৳
                                                                            {{ $product->regular_price }}</span>
                                                                    </div>
                                                                @else
                                                                    <div class="mb-1 product-price">
                                                                        <span
                                                                            class="text-white fs-5">৳{{ $product->regular_price }}</span>
                                                                    </div>
                                                                @endif
                                                                <div class="cursor-pointer ms-auto"> <i
                                                                        class="bx bxs-star text-white"></i>
                                                                    <i class="bx bxs-star text-white"></i>
                                                                    <i class="bx bxs-star text-white"></i>
                                                                    <i class="bx bxs-star text-white"></i>
                                                                    <i class="bx bxs-star text-white"></i>
                                                                </div>
                                                            </div>
                                                            <div class="product-action mt-2">
                                                                <div class="d-grid gap-2">
                                                                    @if ($product->is_varient == 1)
                                                                        <a href="#" id="{{ $product->id }}"
                                                                            onclick="productView(this.id)"
                                                                            class="btn btn-light btn-ecomm"
                                                                            data-bs-toggle="modal"
                                                                            data-bs-target="#QuickViewProduct"> <i
                                                                                class='bx bxs-cart-add'></i>Add to Cart</a>
                                                                    @else
                                                                        <input type="hidden" id="pfrom" value="direct">
                                                                        <input type="hidden" id="product_product_id"
                                                                            value="{{ $product->id }}" min="1">
                                                                        <input type="hidden"
                                                                            id="{{ $product->id }}-product_pname"
                                                                            value="{{ $product->name_en }}">

                                                                        <a onclick="addToCartDirect({{ $product->id }})"
                                                                            class="btn btn-light btn-ecomm"> <i
                                                                                class='bx bxs-cart-add'></i>Add to Cart</a>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            @if (session()->get('language') == 'bangla')
                                                <h5 class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</h5>
                                            @else
                                                <h5 class="text-danger">No products were found here!</h5>
                                            @endif
                                        @endforelse
                                    </div>
                                    <!--end row-->
                                </div>
                                <hr>
                                <nav class="d-flex justify-content-center" aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{ $products->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end shop area-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
