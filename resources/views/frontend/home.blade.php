@extends('layouts.frontend')
@section('content-frontend')
    <!--start slider section-->
    <section class="slider-section">
        <div class="first-slider">
            <div id="carouselExampleDark" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    @foreach ($sliders as $slider)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row d-flex align-items-center">
                                <div class="col d-none d-lg-flex justify-content-center">
                                    <div class="">
                                        <!-- <h3 class="h3 fw-light">{{ $slider->title_en }}</h3> -->
                                        <h1 class="h1">{{ $slider->title_en }}</h1>
                                        <p class="pb-3">{!! $slider->description_en !!}</p>
                                        <div class="">
                                            <a class="btn btn-light btn-ecomm" href="{{ $slider->slider_url }}">Shop Now <i
                                                    class='bx bx-chevron-right'></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <img style="object-fit: cover;" src="{{ asset($slider->slider_img) }}" class="img-fluid"
                                        alt="...">
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev"> <span
                        class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next"> <span
                        class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!--end slider section-->

    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--start information-->
            <section class="py-3 border-top border-bottom">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-3 row-group align-items-center">
                        <div class="col p-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-1 text-white"> <i class='bx bx-taxi'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">FREE SHIPPING &amp; RETURN</h6>
                                    <p class="mb-0">Free shipping on all orders over $49</p>
                                </div>
                            </div>
                        </div>
                        <div class="col p-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-1 text-white"> <i class='bx bx-dollar-circle'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">MONEY BACK GUARANTEE</h6>
                                    <p class="mb-0">100% money back guarantee</p>
                                </div>
                            </div>
                        </div>
                        <div class="col p-3">
                            <div class="d-flex align-items-center">
                                <div class="fs-1 text-white"> <i class='bx bx-support'></i>
                                </div>
                                <div class="info-box-content ps-3">
                                    <h6 class="mb-0">ONLINE SUPPORT 24/7</h6>
                                    <p class="mb-0">Awesome Support for 24/7 Days</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end information-->

            <!--start pramotion-->
            <section class="py-4">
                <div class="container">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        @foreach ($banners as $banner)
                            <div class="col">
                                <div class="card rounded-0">
                                    <div class="row g-0 align-items-center">
                                        <div class="col">
                                            <img style="object-fit: cover;" src="{{ asset($banner->banner_image) }}"
                                                class="img-fluid" alt="" />
                                        </div>
                                        <div class="col">
                                            <div class="card-body">
                                                <h5 class="card-title text-uppercase">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $banner->banner_title_bn }}
                                                    @else
                                                        {{ $banner->banner_title_en }}
                                                    @endif
                                                </h5>
                                                <p class="card-text text-uppercase">

                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $banner->banner_description_bn }}
                                                    @else
                                                        {{ $banner->banner_description_en }}
                                                    @endif
                                                </p> <a href="/product/shop" class="btn btn-light btn-ecomm">
                                                    @if (session()->get('language') == 'bangla')
                                                        {{ $banner->button_name_bn }}
                                                    @else
                                                        {{ $banner->button_name_en }}
                                                    @endif
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end pramotion-->

            @php
                $campaign = \App\Models\Campaing::where('status', 1)
                    ->where('is_featured', 1)
                    ->first();
            @endphp
            <!--start New Campaing-->
            @if ($campaign != null && $campaign->flash_start && $campaign->flash_end)
                {{-- <section class="py-4">
			<div class="container">
				<div class="d-flex align-items-center">
					<h5 class="text-uppercase mb-0">Flash Sale</h5>
					<style type="text/css">
						.delivery{
							color:#fff;
							font-size: 20px;
							margin-left: 20px;
							background-color: violet;
							padding: 5px 26px;
							border-radius: 10px;
						}
						.wrap-countdown{
							color:#fff;
						}
					</style>
					<span class="delivery">
						<span class="wrap-countdown mercado-countdown"  data-expire="{{ date('Y-m-d H:i:s'),$campaign->flash_end }}"></span>
					</span>

					<a href="javascript:;" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
				</div>
				<hr/>
				@foreach ($campaign->campaing_products->take(2) as $campaing_product)

				@php
                    $product_campaign = App\Models\Product::find($campaing_product->product_id);
                @endphp
				<div class="product-grid">
					<div class="new-arrivals owl-carousel owl-theme">
						@if ($product_campaign != null && $product_campaign->status != 0)
                		<div class="item">
							<div class="card rounded-0 product-card">
								<div class="card-header bg-transparent border-bottom-0">
									<div class="d-flex align-items-center justify-content-end">
										<a href="javascript:;">
											<div class="product-wishlist"> <i class='bx bx-heart'></i>
											</div>
										</a>
									</div>
								</div>
								<a href="/product/shop">
									<img style="object-fit: cover;" src="" class="card-img-top" alt="...">
								</a>
								<div class="card-body">
									<div class="product-info">
										<a href="javascript:;">
											<p class="product-catergory font-13 mb-1">Catergory Name</p>
										</a>
										<a href="javascript:;">
											<h6 class="product-name mb-2">{{ $product_campaign->name_en }}</h6>
										</a>
										<div class="d-flex align-items-center">
											<div class="mb-1 product-price"> <span class="me-1 text-decoration-line-through">$99.00</span>
												<span class="text-white fs-5">$49.00</span>
											</div>
											<div class="cursor-pointer ms-auto">	<span>5.0</span>  <i class="bx bxs-star text-white"></i>
											</div>
										</div>
										<div class="product-action mt-2">
											<div class="d-grid gap-2">
												<a href="javascript:;" class="btn btn-light btn-ecomm"> <i class='bx bxs-cart-add'></i>Add to Cart</a> <a href="javascript:;" class="btn btn-link btn-ecomm" data-bs-toggle="modal" data-bs-target="#QuickViewProduct"><i class='bx bx-zoom-in'></i>Quick View</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@endif
					</div>
				</div>
				@endforeach
			</div>
		</section> --}}
            @endif
            <!--end New Campaing-->

            <!--start Featured product-->
            <section class="py-4">
                <div class="container">
                    @if (session()->get('language') == 'bangla')
                        <div class="d-flex align-items-center">
                            <h5 class="text-uppercase mb-0">ফিচার্ড প্রোডাক্ট</h5>
                            <a href="{{ route('featured.all') }}" class="btn btn-light ms-auto rounded-0">অল প্রোডাক্ট<i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <h5 class="text-uppercase mb-0">FEATURED PRODUCTS</h5>
                            <a href="{{ route('featured.all') }}" class="btn btn-light ms-auto rounded-0">More Products<i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    @endif

                    <hr />
                    @include('frontend.common.product_grid_view')
                </div>
        </div>
        </section>
        <!--end Featured product-->

        <!--start New Arrivals-->
        <section class="py-4">
            <div class="container">
                @if (session()->get('language') == 'bangla')
                    <div class="d-flex align-items-center">
                        <h5 class="text-uppercase mb-0">নিউ আররিভাল্স </h5>
                        <a href="javascript:;" class="btn btn-light ms-auto rounded-0">অল প্রোডাক্ট<i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                @else
                    <div class="d-flex align-items-center">
                        <h5 class="text-uppercase mb-0">New Arrivals</h5>
                        <a href="/product/shop" class="btn btn-light ms-auto rounded-0">View All<i
                                class='bx bx-chevron-right'></i></a>
                    </div>
                @endif

                <hr />
                <div class="product-grid">
                    <div class="new-arrivals owl-carousel owl-theme">
                        @forelse($products as $product)
                            <div class="item">
                                <div class="card rounded-0 product-card">
                                    <div class="card-header bg-transparent border-bottom-0">
                                        <div class="d-flex align-items-center justify-content-end gap-3">
                                            <a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})">
                                                <div class="product-compare"><span><i class='bx bx-git-compare'></i>
                                                        Compare</span>
                                                </div>
                                            </a>
                                            <a style="cursor:pointer;" id="{{ $product->id }}"
                                                onclick="addToWishList(this.id)">
                                                <div class="product-wishlist">
                                                    <i class='bx bx-heart'></i>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            <img style="object-fit: cover;"
                                                src="{{ asset($product->product_thumbnail) }}" width="261"
                                                height="196" class="card-img-top" alt="...">
                                        </a>
                                    @else
                                        <img style="object-fit: cover;" class="img-lg mb-3"
                                            src="{{ asset('upload/no_image.jpg') }}" alt="" />
                                    @endif
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
                                                        <span class="text-white fs-5">৳{{ $price_after_discount }}</span>
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
                                                            onclick="productView(this.id)" class="btn btn-light btn-ecomm"
                                                            data-bs-toggle="modal" data-bs-target="#QuickViewProduct"> <i
                                                                class='bx bxs-cart-add'></i>Add to Cart</a>
                                                    @else
                                                        <input type="hidden" id="pfrom" value="direct">
                                                        <input type="hidden" id="product_product_id"
                                                            value="{{ $product->id }}" min="1">
                                                        <input type="hidden" id="{{ $product->id }}-product_pname"
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
                            <h5 class="text-danger">No Product Found</h5>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!--end New Arrivals-->

        <!--start Hot Deals-->
        @if (count($hot_deals) > 0)
            <section class="py-4">
                <div class="container">
                    @if (session()->get('language') == 'bangla')
                        <div class="d-flex align-items-center">
                            <h5 class="text-uppercase mb-0">হট ডেলস প্রোডাক্ট</h5>
                            <a href="{{ route('hot_deals.all') }}" class="btn btn-light ms-auto rounded-0">অল প্রোডাক্ট<i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    @else
                        <div class="d-flex align-items-center">
                            <h5 class="text-uppercase mb-0">Hot Deals</h5>
                            <a href="{{ route('hot_deals.all') }}" class="btn btn-light ms-auto rounded-0">View All<i
                                    class='bx bx-chevron-right'></i></a>
                        </div>
                    @endif

                    <hr />
                    <div class="product-grid">
                        <div class="new-arrivals owl-carousel owl-theme">
                            @forelse($hot_deals as $product)
                                <div class="item">
                                    <div class="card rounded-0 product-card">
                                        <div class="card-header bg-transparent border-bottom-0">
                                            <div class="d-flex align-items-center justify-content-end gap-3">
                                                <a style="cursor: pointer;" onclick="addToCompare({{ $product->id }})">
                                                    <div class="product-compare"><span><i class='bx bx-git-compare'></i>
                                                            Compare</span>
                                                    </div>
                                                </a>
                                                <a style="cursor:pointer;" id="{{ $product->id }}"
                                                    onclick="addToWishList(this.id)">
                                                    <div class="product-wishlist">
                                                        <i class='bx bx-heart'></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                                            <a href="{{ route('product.details', $product->slug) }}">
                                                <img style="object-fit: cover;"
                                                    src="{{ asset($product->product_thumbnail) }}" width="261"
                                                    height="196" class="card-img-top" alt="...">
                                            </a>
                                        @else
                                            <img style="object-fit: cover;" class="img-lg mb-3"
                                                src="{{ asset('upload/no_image.jpg') }}" alt="" />
                                        @endif
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
                                                                class="btn btn-light btn-ecomm" data-bs-toggle="modal"
                                                                data-bs-target="#QuickViewProduct"> <i
                                                                    class='bx bxs-cart-add'></i>Add to Cart</a>
                                                        @else
                                                            <input type="hidden" id="pfrom" value="direct">
                                                            <input type="hidden" id="product_product_id"
                                                                value="{{ $product->id }}" min="1">
                                                            <input type="hidden" id="{{ $product->id }}-product_pname"
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
                                    <P class="text-danger">কোন পণ্য খুঁজে পাওয়া যায়নি</P>
                                @else
                                    <P class="text-danger">No Product Found</P>
                                @endif
                            @endforelse
                        </div>
                    </div>
                </div>
            </section>
        @endif
        <!--end New Arrivals-->

        <!--start Advertise banners-->
        <section class="py-4">
            <div class="container">
                <div class="add-banner">
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <img style="object-fit: cover;" src="{{ asset('frontend/assets/images/promo/04.png') }}"
                                    class="card-img-top" alt="...">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                        class="">-10%</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">Sunglasses Sale</h5>
                                    <p class="card-text">See all Sunglasses and get 10% off at all Sunglasses</p> <a
                                        href="javascript:;" class="btn btn-light btn-ecomm">SHOP BY GLASSES</a>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                        class="">-80%</span>
                                </div>
                                <div class="card-body text-center mt-5">
                                    <h5 class="card-title">Cosmetics Sales</h5>
                                    <p class="card-text">Buy Cosmetics products and get 30% off at all Cosmetics</p> <a
                                        href="javascript:;" class="btn btn-light btn-ecomm">SHOP BY COSMETICS</a>
                                </div>
                                <img style="object-fit: cover;" src="{{ asset('frontend/assets/images/promo/08.png') }}"
                                    class="card-img-top" alt="...">
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <img style="object-fit: cover;" src="{{ asset('frontend/assets/images/promo/06.png') }}"
                                    class="card-img h-100" alt="...">
                                <div class="card-img-overlay text-center top-20">
                                    <div class="border border-white border-3 py-3 bg-dark-3">
                                        <h5 class="card-title">Fashion Summer Sale</h5>
                                        <p class="card-text text-uppercase fs-1 text-white lh-1 mt-3 mb-2">Up to 80% off
                                        </p>
                                        <p class="card-text fs-5">On top Fashion Brands</p> <a href="javascript:;"
                                            class="btn btn-white btn-ecomm">SHOP BY FASHION</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col d-flex">
                            <div class="card rounded-0 w-100">
                                <div class="position-absolute top-0 end-0 m-3 product-discount"><span
                                        class="">-50%</span>
                                </div>
                                <div class="card-body text-center">
                                    <img style="object-fit: cover;"
                                        src="{{ asset('frontend/assets/images/promo/07.png') }}" class="card-img-top"
                                        alt="...">
                                    <h5 class="card-title fs-1 text-uppercase">Super Sale</h5>
                                    <p class="card-text text-uppercase fs-4 text-white lh-1 mb-2">Up to 50% off</p>
                                    <p class="card-text">On All Electronic</p> <a href="javascript:;"
                                        class="btn btn-light btn-ecomm">HURRY UP!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end Advertise banners-->

        <!--start categories-->
        {{-- <section class="py-4">
		    <div class="container">
		        <div class="d-flex align-items-center">
		            <h5 class="text-uppercase mb-0">Browse Catergory</h5>
		            <a href="shop-categories.html" class="btn btn-light ms-auto rounded-0">View All<i class='bx bx-chevron-right'></i></a>
		        </div>
		        <hr/>
		        <div class="product-grid">
		            <div class="browse-category owl-carousel owl-theme">
                       @foreach ($featured_category as $category)
		                <div class="item">
		                    <div class="card rounded-0 product-card border">
		                        <div class="card-body">
		                            <img style="object-fit: cover;" src="{{ asset($category->category_image) }}" class="img-fluid" alt="...">
		                        </div>
		                        <div class="card-footer text-center">
		                            <h6 class="mb-1 text-uppercase">
                                    @if (session()->get('language') == 'bangla')
                                        {{ $category->category_name_bn }}
                                    @else
                                        {{ $category->category_name_bn }}
                                    @endif
                                    </h6>
		                            <p class="mb-0 font-12 text-uppercase">{{ $category->products->count() ?? 'NULL' }} Products</p>
		                        </div>
		                    </div>
		                </div>
		               @endforeach
		            </div>
		        </div>
		    </div>
		</section> --}}
        <!--end categories-->

        <!--start support info-->
        <section class="py-4 bg-dark-1">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 row-group">
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50 text-white"> <i class='bx bx-cart'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Free delivery</h2>
                            <p class="text-capitalize">Free delivery over $199</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50 text-white"> <i class='bx bx-credit-card'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Secure payment</h2>
                            <p class="text-capitalize">We possess SSL / Secure сertificate</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50 text-white"> <i class='bx bx-dollar-circle'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Free returns</h2>
                            <p class="text-capitalize">We return money within 30 days</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.
                            </p>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-center">
                            <div class="font-50 text-white"> <i class='bx bx-support'></i>
                            </div>
                            <h2 class="fs-5 text-uppercase mb-0">Customer Support</h2>
                            <p class="text-capitalize">Friendly 24/7 customer support</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec vestibulum magna, et dapib.
                            </p>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </section>
        <!--end support info-->

        <!--start News-->
        <section class="py-4">
            <div class="container">
                <div class="d-flex align-items-center">
                    <h5 class="text-uppercase mb-0">Latest News</h5>
                    <a href="javascript:;" class="btn btn-light ms-auto rounded-0">View All News<i
                            class='bx bx-chevron-right'></i></a>
                </div>
                <hr />
                <div class="product-grid">
                    <div class="latest-news owl-carousel owl-theme">
                        @forelse ($latest_news as $new)
                            <div class="item">
                                <div class="card rounded-0 product-card border">
                                    <div class="news-date">
                                        <div class="date-number">24</div>
                                        <div class="date-month">FEB</div>
                                    </div>
                                    <a href="javascript:;">
                                        <img style="object-fit: cover;"
                                            src="{{ asset($new->blog_image) }}"
                                            class="card-img-top border-bottom bg-dark-1" alt="...">
                                    </a>
                                    <div class="card-body">
                                        <div class="news-title">
                                            <a href="javascript:;">
                                                @if (session()->get('language') == 'bangla')
                                                <h5 class="mb-3 text-capitalize">{{ $new->blog_title_bn }}</h5>
                                                @else
                                                <h5 class="mb-3 text-capitalize">{{ $new->blog_title_en }}</h5>
                                                @endif
                                            </a>
                                        </div>
                                        <p class="news-content mb-0">
                                        @if (session()->get('language') == 'bangla')
                                                <?php $b_name_bn = strip_tags(html_entity_decode($new->blog_description_bn)); ?>
                                                {!! Str::limit($b_name_bn, $limit = 100, $end = '. . .') !!}
                                            @else
                                                <?php $b_name_en = strip_tags(html_entity_decode($new->blog_description_en)); ?>
                                                {!! Str::limit($b_name_en, $limit = 100, $end = '. . .') !!}
                                            @endif
                                        </p>
                                    </div>
                                    <div class="card-footer border-top">
                                        <a href="javascript:;">
                                            <p class="mb-0"><small class="text-white">0 Comments</small>
                                            </p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @if (session()->get('language') == 'bangla')
                                <P class="text-danger">কোন নিউজ খুঁজে পাওয়া যায়নি</P>
                            @else
                                <P class="text-danger">No News Found</P>
                            @endif
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
        <!--end News-->

        <!--start brands-->
        <section class="py-4">
            <div class="container">
                @if (session()->get('language') == 'bangla')
                    <h3 class="d-none">ব্র্যান্ড</h3>
                @else
                    <h3 class="d-none">Brands</h3>
                @endif
                <div class="brand-grid">
                    <div class="brands-shops owl-carousel owl-theme border">
                        @foreach ($brands as $brand)
                            <div class="item border-end">
                                <div class="p-4">
                                    <a href="javascript:;">
                                        <img style="object-fit: cover;" src="{{ asset($brand->brand_image) }}"
                                            class="img-fluid" alt="...">
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!--end brands-->

        <!--start bottom products section-->
        <section class="py-4 border-top">
            <div class="container">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">

                    <div class="col">
                        <div class="bestseller-list mb-3">
                            @if (session()->get('language') == 'bangla')
                                <h6 class="mb-3 text-uppercase">বেস্ট সেলিং প্রোডাক্টস</h6>
                            @else
                                <h6 class="mb-3 text-uppercase">Best Selling Products</h6>
                            @endif
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/01.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/02.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/03.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/04.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="featured-list mb-3">
                            @if (session()->get('language') == 'bangla')
                                <h6 class="mb-3 text-uppercase">ফিচার্ড প্রোডাক্ট</h6>
                            @else
                                <h6 class="mb-3 text-uppercase">Featured Products</h6>
                            @endif
                            @forelse($products->skip(3)->take(4) as $product)
                                <div class="d-flex align-items-center">
                                    <div class="bottom-product-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                                                <img style="object-fit: cover;"
                                                    src="{{ asset($product->product_thumbnail) }}" width="100"
                                                    height="75" alt="">
                                            @else
                                                <img style="object-fit: cover;" src="{{ asset('upload/no_image.jpg') }}"
                                                    width="100" height="75" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 fw-light mb-1 pr-3">
                                            @if (session()->get('language') == 'bangla')
                                                <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                                                {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                                            @else
                                                <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                                                {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                                            @endif
                                        </h6>
                                        <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                        </div>

                                        @php
                                            if ($product->discount_type == 1) {
                                                $price_after_discount = $product->discount_price;
                                            } elseif ($product->discount_type == 2) {
                                                $discount_amount = ($product->discount_price / 100) * $product->regular_price;
                                                $price_after_discount = $product->regular_price - $discount_amount;
                                            }
                                        @endphp


                                        @if ($product->discount_price > 0)
                                            <p class="mb-0 ml-3 text-white">
                                                <strong>৳{{ $price_after_discount }}</strong>
                                                <span class="mb-0 text-decoration-line-through">৳
                                                    {{ $product->regular_price }}</span>
                                            </p>
                                        @else
                                            <p class="mb-0 ml-3 text-white">
                                                <strong>৳ {{ $product->regular_price }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <hr />
                            @empty
                                @if (session()->get('language') == 'bangla')
                                    <P class="text-danger">কোন পণ্য খুঁজে পাওয়া যায়নি</P>
                                @else
                                    <P class="text-danger">No Product Found</P>
                                @endif
                            @endforelse
                        </div>
                    </div>

                    <div class="col">
                        <div class="new-arrivals-list mb-3">
                            @if (session()->get('language') == 'bangla')
                                <h6 class="mb-3 text-uppercase">নিউ আররিভাল্স </h6>
                            @else
                                <h6 class="mb-3 text-uppercase">New arrivals</h6>
                            @endif
                            @forelse($products->take(4) as $product)
                                <div class="d-flex align-items-center">
                                    <div class="bottom-product-img">
                                        <a href="{{ route('product.details', $product->slug) }}">
                                            @if ($product->product_thumbnail && $product->product_thumbnail != '' && $product->product_thumbnail != 'Null')
                                                <img style="object-fit: cover;"
                                                    src="{{ asset($product->product_thumbnail) }}" width="100"
                                                    alt="">
                                            @else
                                                <img style="object-fit: cover;" src="{{ asset('upload/no_image.jpg') }}"
                                                    width="100" alt="">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="ms-2">
                                        <h6 class="mb-0 fw-light mb-1">
                                            @if (session()->get('language') == 'bangla')
                                                <?php $p_name_bn = strip_tags(html_entity_decode($product->name_bn)); ?>
                                                {{ Str::limit($p_name_bn, $limit = 30, $end = '. . .') }}
                                            @else
                                                <?php $p_name_en = strip_tags(html_entity_decode($product->name_en)); ?>
                                                {{ Str::limit($p_name_en, $limit = 30, $end = '. . .') }}
                                            @endif
                                        </h6>
                                        <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                            <i class="bx bxs-star text-white"></i>
                                        </div>

                                        @php
                                            if ($product->discount_type == 1) {
                                                $price_after_discount = $product->discount_price;
                                            } elseif ($product->discount_type == 2) {
                                                $discount_amount = ($product->discount_price / 100) * $product->regular_price;
                                                $price_after_discount = $product->regular_price - $discount_amount;
                                            }
                                        @endphp

                                        @if ($product->discount_price > 0)
                                            <p class="mb-0 ml-3 text-white">
                                                <strong>৳{{ $price_after_discount }}</strong>
                                                <span class="mb-0 text-decoration-line-through">৳
                                                    {{ $product->regular_price }}</span>
                                            </p>
                                        @else
                                            <p class="mb-0 ml-3 text-white">
                                                <strong>৳ {{ $product->regular_price }}</strong>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <hr />
                            @empty
                                @if (session()->get('language') == 'bangla')
                                    <P class="text-danger">কোন পণ্য খুঁজে পাওয়া যায়নি</P>
                                @else
                                    <P class="text-danger">No Product Found</P>
                                @endif
                            @endforelse


                        </div>
                    </div>

                    <div class="col">
                        <div class="top-rated-products-list mb-3">
                            @if (session()->get('language') == 'bangla')
                                <h6 class="mb-3 text-uppercase">টপ রেটেড প্রোডাক্টস</h6>
                            @else
                                <h6 class="mb-3 text-uppercase">Top rated Products</h6>
                            @endif
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/13.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/14.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/15.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                            <hr />
                            <div class="d-flex align-items-center">
                                <div class="bottom-product-img">
                                    <a href="/product/shop">
                                        <img style="object-fit: cover;"
                                            src="{{ asset('frontend/assets/images/products/16.png') }}" width="100"
                                            alt="">
                                    </a>
                                </div>
                                <div class="ms-2">
                                    <h6 class="mb-0 fw-light mb-1">Product Short Name</h6>
                                    <div class="rating font-12"> <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                        <i class="bx bxs-star text-white"></i>
                                    </div>
                                    <p class="mb-0 text-white"><strong>$59.00</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end row-->
            </div>
        </section>
        <!--end bottom products section-->
    </div>
    </div>

    <script>
        $.ajax({
            type: 'GET',
            url: '/banner/all',
            dataType: 'json',
            success: function(response) {
                // alert(response);
                var data = ""
                $.each(response, function(key, value) {
                    data = data "</th>" + value.id + "</td>"
                })


            }
        });
    </script>


@endsection
