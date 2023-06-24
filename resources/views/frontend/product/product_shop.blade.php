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
                            <h3 class="breadcrumb-title pe-3">প্রোডাক্ট শপ</h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">Prodduct Shop</h3>
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
                        <div class="col-12 col-xl-3">
                            <div class="btn-mobile-filter d-xl-none"><i class='bx bx-slider-alt'></i>
                            </div>
                            <div class="filter-sidebar d-none d-xl-flex">
                                <div class="card rounded-0 w-100">
                                    <div class="card-body">
                                        <div class="align-items-center d-flex d-xl-none">
                                            <h6 class="text-uppercase mb-0">Filter</h6>
                                            <div class="btn-mobile-filter-close btn-close ms-auto cursor-pointer"></div>
                                        </div>
                                        <div class="product-brands">
                                            <h6 class="text-uppercase mb-3">Categories</h6>
                                            <ul class="list-unstyled mb-0 categories-list">
                                                @foreach ($featured_category as $category)
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="{{ $category->id }}">
                                                            <label class="form-check-label"
                                                                for="{{ $category->id }}">{{ $category->category_name_en ?? 'NULL' }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="product-brands">
                                            <h6 class="text-uppercase mb-3">Brands</h6>
                                            <ul class="list-unstyled mb-0 categories-list">
                                                @foreach ($brands as $brand)
                                                    <li>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox" value=""
                                                                id="{{ $brand->id }}">
                                                            <label class="form-check-label"
                                                                for="{{ $brand->id }}">{{ $brand->brand_name_en ?? 'NULL' }}</label>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <hr>
                                        <div class="price-range">
                                            <h6 class="text-uppercase mb-3">Price</h6>
                                            <div class="my-4" id="slider"></div>
                                            <div class="d-flex align-items-center">
                                                <button type="button"
                                                    class="btn btn-white btn-sm text-uppercase rounded-0 font-13 fw-500">Filter</button>
                                                <div class="ms-auto">
                                                    <p class="mb-0">Price: $200.00 - $900.00</p>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach ($products_attr as $product)
                                            <div class="product-colors">
                                                @if ($product->is_varient)
                                                    @php $i=0; @endphp
                                                    @foreach (json_decode($product->attribute_values) as $attribute)
                                                        @php
                                                            $attr = get_attribute_by_id($attribute->attribute_id);
                                                            $i++;
                                                        @endphp
                                                        <h6 class="text-uppercase mb-3">{{ $attr->name }}</h6>
                                                        <ul class="list-unstyled mb-0 categories-list">
                                                            @foreach ($attribute->values as $value)
                                                                <li>
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="checkbox"
                                                                            value="" id="{{ $value }}">
                                                                        <label class="form-check-label"
                                                                            for="{{ $value }}">{{ $value }}</label>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endforeach
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xl-9">
                            <div class="product-wrapper">

                                <div class="toolbox d-flex align-items-center mb-3 gap-2">
                                    <div class="d-flex flex-wrap flex-grow-1 gap-1">
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <p class="mb-0 font-13 text-nowrap text-white">Sort By:</p>
                                            <select class="form-select ms-3 rounded-0">
                                                <option value="menu_order" selected="selected">Default sorting</option>
                                                <option value="popularity">Sort by popularity</option>
                                                <option value="rating">Sort by average rating</option>
                                                <option value="date">Sort by newness</option>
                                                <option value="price">Sort by price: low to high</option>
                                                <option value="price-desc">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-wrap">
                                        <div class="d-flex align-items-center flex-nowrap">
                                            <p class="mb-0 font-13 text-nowrap text-white">Show:</p>
                                            <select class="form-select ms-3 rounded-0">
                                                <option>9</option>
                                                <option>12</option>
                                                <option>16</option>
                                                <option>20</option>
                                                <option>50</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-white rounded-0">
                                            <i class='bx bxs-grid me-0'></i>
                                        </a>
                                    </div>
                                    <div>
                                        <a href="#" class="btn btn-light rounded-0">
                                            <i class='bx bx-list-ul me-0'></i>
                                        </a>
                                    </div>
                                </div>



                                <div class="product-grid">
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-3">
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
                                                    <a href="{{ route('product.details', $product->slug) }}"><img
                                                            src="{{ asset($product->product_thumbnail) }}"
                                                            class="card-img-top" alt="..."
                                                            style="object-fit: cover;"></a>
                                                    <div class="card-body">
                                                        <div class="product-info">
                                                            <a
                                                                href="{{ route('product.childcategory', $product->subsubcategory->slug) }}">
                                                                <p class="product-catergory font-13 mb-1">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        {{ $product->subsubcategory->sub_subcategory_name_bn ?? 'NULL' }}
                                                                    @else
                                                                        {{ $product->subsubcategory->sub_subcategory_name_en }}
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
                                                                    $price_after_discount = $product->discount_price;
                                                                } elseif ($product->discount_type == 2) {
                                                                    $discount_amount = ($product->discount_price / 100) * $product->regular_price;
                                                                    $price_after_discount = $product->regular_price - $discount_amount;
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
                                                                        <input type="hidden" id="pfrom"
                                                                            value="direct">
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


                                {{-- <div class="product-grid">
                                    @forelse($products as $product)
                                        <div class="card rounded-0 product-card">
                                            <div class="d-flex align-items-center justify-content-end gap-3 position-absolute end-0 top-0 m-3">

                                                <a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})">
                                                    <div class="product-compare"><span><i class='bx bx-git-compare'></i>
                                                            Compare</span>
                                                    </div>
                                                </a>
                                                <a style="cursor: pointer;" id="{{ $product->id }}" onclick="addToWishList(this.id)">
                                                    <div class="product-wishlist"> <i class="bx bx-heart"></i>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="row g-0">
                                                <div class="col-md-4">
                                                    <a href="{{ route('product.details', $product->slug) }}"><img
                                                        src="{{ asset($product->product_thumbnail) }}"
                                                        class="card-img-top" alt="..."
                                                        style="object-fit: cover;"></a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body">
                                                        <div class="product-info">

                                                            <a
                                                                href="{{ route('product.childcategory', $product->subsubcategory->slug) }}">
                                                                <p class="product-catergory font-13 mb-1">
                                                                    @if (session()->get('language') == 'bangla')
                                                                        {{ $product->subsubcategory->sub_subcategory_name_bn ?? 'NULL' }}
                                                                    @else
                                                                        {{ $product->subsubcategory->sub_subcategory_name_en }}
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

                                                            <p class="card-text">
                                                                @if (session()->get('language') == 'bangla')
                                                                    {!! $product->short_description_bn !!}
                                                                    @else
                                                                        {!! $product->short_description_en !!}
                                                                    @endif
                                                            </p>
                                                            <div class="d-flex align-items-center">
                                                                @php
                                                                if ($product->discount_type == 1) {
                                                                    $price_after_discount = $product->discount_price;
                                                                } elseif ($product->discount_type == 2) {
                                                                    $discount_amount = ($product->discount_price / 100) * $product->regular_price;
                                                                    $price_after_discount = $product->regular_price - $discount_amount;
                                                                }
                                                            @endphp
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
                                                                        <input type="hidden" id="pfrom"
                                                                            value="direct">
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
                                        </div>
                                        <div class="border-top my-3"></div>
                                    @empty
                                        @if (session()->get('language') == 'bangla')
                                            <h5 class="text-danger">এখানে কোন পণ্য খুঁজে পাওয়া যায়নি!</h5>
                                        @else
                                            <h5 class="text-danger">No products were found here!</h5>
                                        @endif
                                    @endforelse

                                </div> --}}


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
