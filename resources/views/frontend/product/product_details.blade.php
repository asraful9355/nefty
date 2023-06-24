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
                            <h3 class="breadcrumb-title pe-3">প্রোডাক্ট ডিটেলস</h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">Product Details</h3>
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
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.childcategory', $product->subsubcategory->slug) }}">{{ $product->subsubcategory->sub_subcategory_name_bn ?? 'NULL' }}</a>
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
                                        <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('product.childcategory', $product->subsubcategory->slug) }}">{{ $product->subsubcategory->sub_subcategory_name_en ?? 'NULL' }}</a>
                                            </li>
                                    </ol>
                                @endif
                            </nav>
                        </div>
                    </div>
                </div>
            </section>
            <!--end breadcrumb-->

            <!--start product detail-->
            <section class="py-4">
                <div class="container">
                    <div class="product-detail-card">
                        <div class="product-detail-body">
                            <div class="row g-0">

                                <div class="col-12 col-lg-5">
                                    <div class="image-zoom-section">
                                        <div class="product-gallery owl-carousel owl-theme border mb-3 p-3"
                                            data-slider-id="1">
                                            @foreach ($product->multi_imgs as $img)
                                                <div class="item">
                                                    <img src="{{ asset($img->photo_name) }}" class="img-fluid"
                                                        alt="" style="object-fit: cover;">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="owl-thumbs d-flex justify-content-center" data-slider-id="1">
                                            @foreach ($product->multi_imgs as $img)
                                                <button class="owl-thumb-item" data-slider-id="1">
                                                    <img src="{{ asset($img->photo_name) }}" class="" alt=""
                                                        style="object-fit: cover;">
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-lg-7">
                                    <div class="product-info-section p-3">
                                        <h3 class="mt-3 mt-lg-0 mb-0">
                                            @if (session()->get('language') == 'bangla')
                                                {{ $product->name_bn ?? 'NULL' }}
                                            @else
                                                {{ $product->name_en ?? 'NULL' }}
                                            @endif
                                        </h3>
                                        <div class="product-rating d-flex align-items-center mt-2">
                                            <div class="rates cursor-pointer font-13"> <i
                                                    class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-warning"></i>
                                                <i class="bx bxs-star text-light-4"></i>
                                            </div>
                                            <div class="ms-1">
                                                <p class="mb-0">(24 Ratings)</p>
                                            </div>
                                        </div>
                                        @php
                                            $discount = 0;
                                            $amount = $product->regular_price;

                                            if ($product->discount_price > 0) {
                                                if ($product->discount_type == 1) {
                                                    $discount = $product->discount_price;
                                                    $amount = $product->regular_price - $discount;
                                                } elseif ($product->discount_type == 2) {
                                                    $discount = ($product->regular_price * $product->discount_price) / 100;
                                                    $amount = $product->regular_price - $discount;
                                                } else {
                                                    $amount = $product->regular_price;
                                                }
                                            }

                                        @endphp

                                        @if ($product->discount_price <= 0)
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                <h4 class="mb-0">৳{{ $product->regular_price }}</h4>
                                            </div>
                                        @else
                                            <div class="d-flex align-items-center mt-3 gap-2">
                                                <span class="text-white fs-5">৳{{ $amount }}</span>
                                                @if ($product->discount_type == 1)
                                                    <span class="save-price font-md color3 ml-15"> ৳{{ $discount }} Off
                                                    </span>
                                                @elseif ($product->discount_type == 2)
                                                    <span class="save-price font-md color3 ml-15">{{ $discount }}%
                                                        Off</span>
                                                @endif
                                                <h5 class="mb-0 text-decoration-line-through text-light-3">
                                                    ৳{{ $product->regular_price }}</h5>
                                            </div>
                                        @endif

                                        <div class="mt-3">
                                            <h6>Discription :</h6>
                                            <p class="mb-0">
                                                @if (session()->get('language') == 'bangla')
                                                    {!! $product->short_description_bn ?? 'No Short Decsription' !!}
                                                @else
                                                    {!! $product->short_description_en ?? 'No Short Decsription' !!}
                                                @endif
                                            </p>
                                        </div>
                                        <dl class="row mt-3">
                                            <dt class="col-sm-3">Product Code:</dt>
                                            <dd class="col-sm-9">{{ $product->product_code ?? 'NULL' }}</dd>
                                            <dt class="col-sm-3">Category:</dt>
                                            <dd class="col-sm-9">
                                                {{ $product->subsubcategory->sub_subcategory_name_en ?? 'NULL' }}</dd>
                                            <dt class="col-sm-3">Brand:</dt>
                                            <dd class="col-sm-9">{{ $product->brand->brand_name_en ?? 'NULL' }}</dd>
                                            <dt class="col-sm-3">Regular Price:</dt>
                                            <dd class="col-sm-9">{{ $product->regular_price ?? 'NULL' }}</dd>
                                            <dt class="col-sm-3">Product Stock (Qty):</dt>
                                            <dd class="col-sm-9">{{ $product->stock_qty ?? 'NULL' }}</dd>
                                        </dl>
                                        <div class="row row-cols-auto align-items-center mt-3">
                                            <div class="col">
                                                <label class="form-label">Quantity</label>
                                                <input type="number" name="quantity" class="qty-val form-control"
                                                    value="1" min="1" id="qty">
                                            </div>
                                            @if ($product->is_varient)
                                                <div class="col">
                                                    @php $i=0; @endphp
                                                    @foreach (json_decode($product->attribute_values) as $attribute)
                                                        @php
                                                            $attr = get_attribute_by_id($attribute->attribute_id);
                                                            $i++;
                                                        @endphp
                                                        <label class="form-label">{{ $attr->name }}</label>
                                                        <select class="form-select form-select-sm">
                                                            @foreach ($attribute->values as $value)
                                                                <option>{{ $value }}</option>
                                                            @endforeach
                                                        </select>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
                                        <!--end row-->
                                        <div class="d-flex gap-2 mt-3">
                                            <input type="hidden" id="product_id" value="{{ $product->id }}"
                                                min="1">

                                            <input type="hidden" id="pname" value="{{ $product->name_en }}">

                                            <input type="hidden" id="product_price" value="{{ $amount }}">

                                            <input type="hidden" id="pvarient" value="">

                                            <a class="btn btn-white btn-ecomm" onclick="addToCart()">
                                                <i class="bx bxs-cart-add"></i>Add to Cart
                                            </a>
                                            <a style="cursor:pointer;" id="{{ $product->id }}"
                                                onclick="addToWishList(this.id)" class="btn btn-light btn-ecomm">
                                                <i class="bx bx-heart"></i>Add to Wishlist
                                            </a>
                                        </div>
                                        <hr />
                                        <div class="product-sharing">
                                            <ul class="list-inline">
                                                <li class="list-inline-item"> <a href="javascript:;"><i
                                                            class='bx bxl-facebook'></i></a>
                                                </li>
                                                <li class="list-inline-item"> <a href="javascript:;"><i
                                                            class='bx bxl-linkedin'></i></a>
                                                </li>
                                                <li class="list-inline-item"> <a href="javascript:;"><i
                                                            class='bx bxl-twitter'></i></a>
                                                </li>
                                                <li class="list-inline-item"> <a href="javascript:;"><i
                                                            class='bx bxl-instagram'></i></a>
                                                </li>
                                                <li class="list-inline-item"> <a href="javascript:;"><i
                                                            class='bx bxl-google'></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </div>
                    </div>
                </div>
            </section>
            <!--end product detail-->

            <!--start product more info-->
            <section class="py-4">
                <div class="container">
                    <div class="product-more-info">
                        <ul class="nav nav-tabs mb-0" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" data-bs-toggle="tab" href="#discription" role="tab"
                                    aria-selected="true">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">Description</div>
                                    </div>
                                </a>
                            </li>
                            <!-- <li class="nav-item" role="presentation">
                           <a class="nav-link" data-bs-toggle="tab" href="#more-info" role="tab" aria-selected="false">
                            <div class="d-flex align-items-center">
                             <div class="tab-title text-uppercase fw-500">More Info</div>
                            </div>
                           </a>
                          </li> -->
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#tags" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">Tags</div>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" data-bs-toggle="tab" href="#reviews" role="tab"
                                    aria-selected="false">
                                    <div class="d-flex align-items-center">
                                        <div class="tab-title text-uppercase fw-500">(3) Reviews</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="discription" role="tabpanel">
                                <p>
                                    @if (session()->get('language') == 'bangla')
                                        {!! $product->description_bn ?? 'No Decsription' !!}
                                    @else
                                        {!! $product->description_en ?? 'No Decsription' !!}
                                    @endif
                                </p>
                            </div>
                            <!-- <div class="tab-pane fade" id="more-info" role="tabpanel">
                           <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                          </div> -->
                            <div class="tab-pane fade" id="tags" role="tabpanel">
                                <div class="tags-box w-50">
                                    <a href="#" class="tag-link">{{ $product->tags }}</a>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col col-lg-8">
                                        <div class="product-review">
                                            <h5 class="mb-4">3 Reviews For The Product</h5>
                                            <div class="review-list">
                                                <div class="d-flex align-items-start">
                                                    <div class="review-user">
                                                        <img src="{{ asset('frontend/assets/images/avatars/avatar-1.png') }}"
                                                            width="65" height="65" class="rounded-circle"
                                                            alt="" />
                                                    </div>
                                                    <div class="review-content ms-3">
                                                        <div class="rates cursor-pointer fs-6"> <i
                                                                class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6 class="mb-0">James Caviness</h6>
                                                            <p class="mb-0 ms-auto">February 16, 2021</p>
                                                        </div>
                                                        <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                            Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby
                                                            sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                                                            placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="d-flex align-items-start">
                                                    <div class="review-user">
                                                        <img src="{{ asset('frontend/assets/images/avatars/avatar-2.png') }}"
                                                            width="65" height="65" class="rounded-circle"
                                                            alt="" />
                                                    </div>
                                                    <div class="review-content ms-3">
                                                        <div class="rates cursor-pointer fs-6"> <i
                                                                class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6 class="mb-0">David Buckley</h6>
                                                            <p class="mb-0 ms-auto">February 22, 2021</p>
                                                        </div>
                                                        <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                            Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby
                                                            sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                                                            placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                    </div>
                                                </div>
                                                <hr />
                                                <div class="d-flex align-items-start">
                                                    <div class="review-user">
                                                        <img src="{{ asset('frontend/assets/images/avatars/avatar-3.png') }}"
                                                            width="65" height="65" class="rounded-circle"
                                                            alt="" />
                                                    </div>
                                                    <div class="review-content ms-3">
                                                        <div class="rates cursor-pointer fs-6"> <i
                                                                class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-white"></i>
                                                            <i class="bx bxs-star text-light-4"></i>
                                                        </div>
                                                        <div class="d-flex align-items-center mb-2">
                                                            <h6 class="mb-0">Peter Costanzo</h6>
                                                            <p class="mb-0 ms-auto">February 26, 2021</p>
                                                        </div>
                                                        <p>Nesciunt tofu stumptown aliqua, retro synth master cleanse.
                                                            Mustache cliche tempor, williamsburg carles vegan helvetica.
                                                            Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby
                                                            sweater eu banh mi, qui irure terry richardson ex squid. Aliquip
                                                            placeat salvia cillum iphone. Seitan aliquip quis cardigan</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col col-lg-4">
                                        <div class="add-review bg-dark-1">
                                            <div class="form-body p-3">
                                                <h4 class="mb-4">Write a Review</h4>
                                                <div class="mb-3">
                                                    <label class="form-label">Your Name</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email</label>
                                                    <input type="text" class="form-control rounded-0">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Rating</label>
                                                    <select class="form-select rounded-0">
                                                        <option selected>Choose Rating</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="3">4</option>
                                                        <option value="3">5</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Example textarea</label>
                                                    <textarea class="form-control rounded-0" rows="3"></textarea>
                                                </div>
                                                <div class="d-grid">
                                                    <button type="button" class="btn btn-light btn-ecomm">Submit a
                                                        Review</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--end product more info-->
            <!--start similar products-->
            <section class="py-4">
                <div class="container">
                    <div class="d-flex align-items-center">
                        <h5 class="text-uppercase mb-0">Similar Products</h5>
                        <div class="d-flex align-items-center gap-0 ms-auto"> <a href="javascript:;"
                                class="owl_prev_item fs-2"><i class='bx bx-chevron-left'></i></a>
                            <a href="javascript:;" class="owl_next_item fs-2"><i class='bx bx-chevron-right'></i></a>
                        </div>
                    </div>
                    <hr />
                    <div class="product-grid">
                        <div class="similar-products owl-carousel owl-theme">
                            @forelse ($relatedProducts as $re_product)
                                <div class="item">
                                    <div class="card rounded-0 product-card">
                                        <div class="card-header bg-transparent border-bottom-0">
                                            <div class="d-flex align-items-center justify-content-end">
                                                <a href="javascript:;" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)">
                                                    <div class="product-wishlist"> <i class='bx bx-heart'></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <a href="{{ route('product.details', $re_product->slug) }}">
                                            <img style="object-fit: cover;" src="{{ asset($re_product->product_thumbnail) }}" class="card-img-top"
                                            alt="..." >
                                        </a>
                                        <div class="card-body">
                                            <div class="product-info">
                                                <a href="{{ route('product.childcategory', $re_product->subsubcategory->slug) }}">
                                                    <p class="product-catergory font-13 mb-1">
                                                        @if (session()->get('language') == 'bangla')
                                                            {{ $re_product->subsubcategory->sub_subcategory_name_bn }}
                                                        @else
                                                            {{ $re_product->subsubcategory->sub_subcategory_name_en }}
                                                        @endif
                                                    </p>
                                                </a>
                                                <a href="{{ route('product.details', $re_product->slug) }}">
                                                    <h6 class="product-name mb-2">
                                                        @if (session()->get('language') == 'bangla')
                                                            {{ $re_product->name_bn }}
                                                        @else
                                                            {{ $re_product->name_en }}
                                                        @endif
                                                    </h6>
                                                </a>
                                                <div class="d-flex align-items-center">
                                                    @if ($re_product->discount_price == null)
                                                        <div class="mb-1 product-price">
                                                            <span
                                                                class="text-white fs-5">৳{{ $re_product->regular_price }}</span>
                                                        </div>
                                                    @else
                                                        <div class="mb-1 product-price">
                                                            <span
                                                                class="me-1 text-decoration-line-through">৳{{ $re_product->discount_price }}</span>
                                                            <span
                                                                class="text-white fs-5">৳{{ $re_product->regular_price }}</span>
                                                        </div>
                                                    @endif
                                                    <div class="cursor-pointer ms-auto"><span>5.0</span> <i
                                                            class="bx bxs-star text-white"></i>
                                                    </div>
                                                </div>
                                                <div class="product-action mt-2">
                                                    <input type="hidden" id="product_id" value="{{ $re_product->id }}"
                                                        min="1">

                                                    <input type="hidden" id="pname"
                                                        value="{{ $re_product->name_en }}">

                                                    <input type="hidden" id="product_price"
                                                        value="{{ $amount }}">

                                                    <input type="hidden" id="pvarient" value="">

                                                    <div class="d-grid gap-2">
                                                        <a href="javascript:;" class="btn btn-light btn-ecomm"
                                                            onclick="addToCart()">
                                                            <i class='bx bxs-cart-add'></i>Add to Cart
                                                        </a>

                                                        <a href="javascript:;" class="btn btn-link btn-ecomm">
                                                            <i class='bx bx-zoom-in'></i>Quick View
                                                        </a>
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
                    </div>
                </div>
            </section>
            <!--end similar products-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection
