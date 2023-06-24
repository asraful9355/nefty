<div class="discount-alert bg-dark-1 d-none d-lg-block">
    <div class="alert alert-dismissible fade show shadow-none rounded-0 mb-0 border-bottom">
        <div class="d-lg-flex align-items-center gap-2 justify-content-center">
            <p class="mb-0 text-white">Get Up to <strong>40% OFF</strong> New-Season Styles</p> <a href="javascript:;"
                class="bg-dark text-white px-1 font-13 cursor-pointer">Men</a>
            <a href="javascript:;" class="bg-dark text-white px-1 font-13 cursor-pointer">Women</a>
            <p class="mb-0 font-13 text-light-3">*Limited time only</p>
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>

<!--start top header wrapper-->
<div class="header-wrapper bg-dark-1">

    <div class="top-menu border-bottom">
        <div class="container">
            <nav class="navbar navbar-expand">
                <div class="shiping-title text-uppercase font-13 text-white d-none d-sm-flex">Need help? Call Us:
                    <strong class="text-brand"> <a class="text-brand"
                            href="tel:{{ get_setting('phone')->value ?? 'null' }}"><i class="fa fa-phone ms-1"></i>
                            {{ get_setting('phone')->value ?? 'null' }}</a></strong>
                </div>
                <ul class="navbar-nav ms-auto d-none d-lg-flex">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Track Order</a>
                    </li>
                    @foreach (get_pages_nav_header() as $page)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('page.about', $page->slug) }}">{{ $page->name_en }}</a>
                        </li>
                    @endforeach
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item dropdown ml-5">
                        @if (session()->get('language') == 'bangla')
                            <a class="nav-link" href="{{ route('english.language') }}">English</a>
                        @else
                            <a class="nav-link" href="{{ route('bangla.language') }}">বাংলা</a>
                        @endif
                    </li>
                </ul>
                <ul class="navbar-nav social-link ms-lg-2 ms-auto">
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ get_setting('facebook_url')->value ?? 'null' }}"><i
                                class='bx bxl-facebook'></i></a>
                    </li>
                    <li class="nav-item"> <a class="nav-link"
                            href="{{ get_setting('twitter_url')->value ?? 'null' }}"><i class='bx bxl-twitter'></i></a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="header-content pb-3 pb-md-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col col-md-auto">
                    <div class="d-flex align-items-center">
                        <div class="mobile-toggle-menu d-lg-none px-lg-2" data-trigger="#navbar_main"><i
                                class='bx bx-menu'></i>
                        </div>
                        <div class="logo d-none d-lg-flex">
                            <a href="{{ route('home') }}">
                                @php
                                    $logo = get_setting('site_logo');
                                @endphp
                                @if ($logo != null)
                                    <img src="{{ asset(get_setting('site_logo')->value ?? 'null') }}"
                                        alt="{{ env('APP_NAME') }}" width="110" height="33">
                                @else
                                    <img src="{{ asset('upload/no_image.jpg') }}" alt="{{ env('APP_NAME') }}"
                                        style="height: 60px !important; width: 80px !important; min-width: 80px !important;">
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
                @php
                    $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                @endphp
                <div class="col-12 col-md order-4 order-md-2 advance_search">
                    <form action="{{ route('product.search') }}" method="post">
                        @csrf
                        <div class="input-group flex-nowrap px-xl-4">
                            <input type="text" class="form-control w-100 search" placeholder="Search for Products"
                                name="search" onfocus="search_result_show()" onblur="search_result_hide()">
                            <select name="searchCategory" id="searchCategory" class="form-select flex-shrink-0"
                                aria-label="Default select example" style="width: 10.5rem;">
                                <option value="0" selected>All Categories</option>
                                @foreach (get_all_categories() as $cat)
                                    <option value="{{ $cat->id }}">
                                        @if (session()->get('language') == 'bangla')
                                            {{ $cat->category_name_bn }}
                                        @else
                                            {{ $cat->category_name_en }}
                                        @endif
                                    </option>
                                @endforeach
                            </select>
                            <div>
                                <button type="submit" class="input-group-text cursor-pointer"><i
                                        class='bx bx-search'></i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col col-md-auto order-3 d-none d-xl-flex align-items-center">
                    <div class="fs-1 text-white"><i class='bx bx-headphone'></i>
                    </div>
                    <div class="ms-2">
                        <p class="mb-0 font-13">CALL US NOW</p>
                        <h5 class="mb-0">{{ get_setting('phone')->value ?? 'null' }}</h5>
                    </div>
                </div>
                <div class="col col-md-auto order-2 order-md-4">
                    <div class="top-cart-icons">
                        <nav class="navbar navbar-expand">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item" id="compare_list">
                                    @include('frontend.compare.compare_index')
                                </li>
                                <li class="nav-item">
                                    <a href="javascript:;" class="nav-link cart-link">
                                        <i class='bx bx-heart'></i>
                                    </a>
                                </li>
                                @auth
                                    <li class="nav-item">
                                        <a href="{{ route('dashboard') }}" class="nav-link cart-link">
                                            <i class='bx bx-user'></i>
                                        </a>
                                    </li>
                                @else
                                    <li class="nav-item">
                                        <a href="{{ route('login') }}" class="nav-link cart-link">
                                            <i class='bx bx-lock'></i>
                                        </a>
                                    </li>
                                @endauth
                                <li class="nav-item dropdown dropdown-large">
                                    <a href="#"
                                        class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative cart-link"
                                        data-bs-toggle="dropdown">
                                        <span class="alert-count cartQty"></span>
                                        <i class='bx bx-shopping-bag'></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="javascript:;">
                                            <div class="cart-header">
                                                <p class="cart-header-title mb-0">CART ITEMS</p>
                                                <p class="cart-header-clear ms-auto mb-0"><a
                                                        href="{{ route('cart.show') }}">VIEW CART</a></p>
                                            </div>
                                        </a>
                                        <!-- start minicart show all product -->
                                        <div class="cart-list" id="miniCart">

                                        </div>

                                        <!-- Cart Show Total Checkout Section Show -->
                                        <div class="shopping-cart-footer" id="miniCart_btn">
                                            <a href="javascript:;">
                                                <div class="text-center cart-footer d-flex align-items-center">
                                                    <h5 class="mb-0">TOTAL</h5>
                                                    <h5 class="mb-0 ms-auto">
                                                        ৳<span id="cartSubTotal"></span>
                                                    </h5>
                                                </div>
                                            </a>
                                            <div class="d-flex border-top">
                                                <div class="d-grid p-3 text-center">
                                                    <a href="{{ route('cart.show') }}"
                                                        class="btn btn-light btn-ecomm">View Cart</a>
                                                </div>
                                                <div class="d-grid p-3" style="float: right;">
                                                    <a href="{{ route('checkout') }}"
                                                        class="btn btn-light btn-ecomm">CHECKOUT</a>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Cart Empty/No Cart Continue Shopping Section Show -->
                                        <div class="shopping-cart-footer" id="miniCart_empty_btn">
                                            <div class="d-grid p-3 border-top">
                                                <a href="{{ route('home') }}"
                                                    class="btn btn-light btn-ecomm">Continue Shopping</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="searchProducts"></div>
            <style type="text/css">
                .searchProducts {
                    z-index: 9;
                    position: absolute;
                    width: 80%;
                }

                .advance_search {
                    position: relative;
                }
            </style>
            <!--end row-->
        </div>
    </div>

    <div class="primary-menu border-top">
        <div class="container">
            <nav id="navbar_main" class="mobile-offcanvas navbar navbar-expand-lg">
                <div class="offcanvas-header">
                    <button class="btn-close float-end"></button>
                    <h5 class="py-2 text-white">Navigation</h5>
                </div>
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('home') }}">
                            @if (session()->get('language') == 'bangla')
                                হোম
                            @else
                                Home
                            @endif
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/product/shop" class="nav-link">
                            @if (session()->get('language') == 'bangla')
                                দোকান
                            @else
                                Shop
                            @endif
                        </a>
                    </li>
                    @php
                        $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                    @endphp
                    @foreach ($categories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ route('product.category', $category->slug) }}">
                                @if (session()->get('language') == 'bangla')
                                    {{ $category->category_name_bn }}
                                @else
                                    {{ $category->category_name_en }}
                                @endif
                                <i class='bx bx-chevron-down'></i>
                            </a>
                            <div class="dropdown-menu dropdown-large-menu">
                                @php
                                    $subcategories = App\Models\Subcategory::where('category_id', $category->id)
                                        ->orderBy('subcategory_name_en', 'ASC')
                                        ->get();
                                @endphp
                                <div class="row">
                                    @foreach ($subcategories as $subcategory)
                                        <div class="col-md-6">
                                            <a href="{{ route('product.subcategory', $subcategory->slug) }}"
                                                class="large-menu-title">
                                                @if (session()->get('language') == 'bangla')
                                                    {{ $subcategory->subcategory_name_bn }}
                                                @else
                                                    {{ $subcategory->subcategory_name_en }}
                                                @endif
                                            </a>
                                            @php
                                                $subsubcategories = App\Models\Subsubcategory::where('subcategory_id', $subcategory->id)
                                                    ->orderBy('sub_subcategory_name_en', 'ASC')
                                                    ->get();
                                            @endphp
                                            @foreach ($subsubcategories as $subsubcategory)
                                                <ul class="">
                                                    <li>
                                                        <a
                                                            href="{{ route('product.childcategory', $subsubcategory->slug) }}">
                                                            @if (session()->get('language') == 'bangla')
                                                                {{ $subsubcategory->sub_subcategory_name_bn }}
                                                            @else
                                                                {{ $subsubcategory->sub_subcategory_name_en }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                        <!-- end col-3 -->
                                    @endforeach

                                </div>
                                <!-- end row -->
                            </div>
                            <!-- dropdown-large.// -->
                        </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>

</div>
<!--end top header wrapper-->

@push('footer-script')
    <script type="text/javascript">
        /* ================ Advance Product Search ============ */
        $("body").on("keyup", ".search", function() {
            let text = $(".search").val();
            let category_id = $("#searchCategory").val();
            // alert(category_id);
            // console.log(text);

            if (text.length > 0) {

                $.ajax({
                    data: {
                        search: text,
                        category: category_id
                    },
                    url: "/search-product",
                    method: 'post',
                    beforSend: function(request) {
                        return request.setReuestHeader('X-CSRF-Token', ("meta[name='csrf-token']"))

                    },
                    success: function(result) {
                        $(".searchProducts").html(result);
                    }

                }); // end ajax
            } // end if
            if (text.length < 1) $(".searchProducts").html("");
        }); // end function

        /* ================ Advance Product slideUp/slideDown ============ */
        function search_result_hide() {
            $(".searchProducts").slideUp();
        }

        function search_result_show() {
            $(".searchProducts").slideDown();
        }
    </script>

    <script>
        $(document).ready(function() {
            $(".show").click(function() {
                $(".advance-search").show();
            });
            $(".hide").click(function() {
                $(".advance-search").hide();
            });
        });
    </script>
@endpush
