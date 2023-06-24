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
                            <h3 class="breadcrumb-title pe-3">সার্চ প্রোডাক্ট</h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">Search Product</h3>
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
                                    </ol>
                                @else
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="{{ route('home') }}"><i
                                                    class="bx bx-home-alt"></i>
                                                Home</a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="/product/shop">Shop</a>
                                        </li>
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
                        <div class="col-12 col-xl-12">
                            <div class="product-wrapper">
                                <div class="product-grid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4">
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
                                                    <img src="{{ asset($product->product_thumbnail) }}" class="card-img-top"
                                                        alt="...">
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a href="javascript:;">
                                                                <p class="product-catergory font-13 mb-1">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        {{ $product->category->category_name_bn ?? 'NULL' }}
                                                                    @else
                                                                        {{ $product->category->category_name_en ?? 'NULL' }}
                                                                    @endif
                                                                </p>
                                                            </a>
                                                            <a href="{{ route('product.details', $product->slug) }}">
                                                                <h6 class="product-name mb-2">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                                                                        {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                                                                    @else
                                                                        <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                                                                        {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
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
                                                                @if ($product->discount_price == 0)
                                                                    <div class="mb-1 product-price">
                                                                        <span class="text-white fs-5">
                                                                            ৳{{ $price_after_discount }}
                                                                        </span>
                                                                        <span class="me-1 text-decoration-line-through">
                                                                            ৳{{ $product->regular_price }}
                                                                        </span>
                                                                    </div>
                                                                @else
                                                                    <div class="mb-1 product-price">
                                                                        <span class="text-white fs-5">
                                                                            ৳{{ $product->regular_price }}
                                                                        </span>
                                                                    </div>
                                                                @endif
                                                                <div class="cursor-pointer ms-auto">
                                                                    <i class="bx bxs-star text-white"></i>
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
                                                <P class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</P>
                                            @else
                                                <P class="text-danger">No products were found here!</P>
                                            @endif
                                        @endforelse
                                    </div>
                                    <!--end row-->
                                </div>
                                <!-- <hr> -->
                                <!-- <nav class="d-flex justify-content-between" aria-label="Page navigation">
            <ul class="pagination">
             <li class="page-item"><a class="page-link" href="javascript:;"><i class='bx bx-chevron-left'></i> Prev</a>
             </li>
            </ul>
            <ul class="pagination">
             <li class="page-item active d-none d-sm-block" aria-current="page"><span class="page-link">1<span class="visually-hidden">(current)</span></span>
             </li>
             <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">2</a>
             </li>
             <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">3</a>
             </li>
             <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">4</a>
             </li>
             <li class="page-item d-none d-sm-block"><a class="page-link" href="javascript:;">5</a>
             </li>
            </ul>
            <ul class="pagination">
             <li class="page-item"><a class="page-link" href="javascript:;" aria-label="Next">Next <i class='bx bx-chevron-right'></i></a>
             </li>
            </ul>
           </nav> -->
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
