@php
    $route = Route::current()->getName();
    $prefix = Request::route()->getPrefix();
@endphp
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <!--  <div class="sidebar-brand-icon rotate-n-15">
         <i class="fas fa-anchor"></i>
      </div> -->
        <div class="sidebar-brand-text mx-3">{{ Auth::guard('admin')->user()->name }} Dashboard</div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ $route == 'admin.dashboard' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#category" aria-expanded="true"
            aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Category</span>
        </a>
        <div id="category"
            class="collapse
            {{ $route == 'category.index' ? 'show' : '' }}
            {{ $route == 'category.create' ? 'show' : '' }}
            {{ $route == 'category.view' ? 'show' : '' }}
            {{ $route == 'subcategory.index' ? 'show' : '' }}
            {{ $route == 'subcategory.create' ? 'show' : '' }}
            {{ $route == 'subcategory.view' ? 'show' : '' }}
            {{ $route == 'subsubcategory.index' ? 'show' : '' }}
            {{ $route == 'subsubcategory.create' ? 'show' : '' }}
            {{ $route == 'subsubcategory.view' ? 'show' : '' }}
            "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'category.index' ? 'active' : '' }}"
                    href="{{ route('category.index') }}">Manage Category</a>
                {{-- <a class="collapse-item {{ ($route == 'category.create') ? 'active' : '' }}" href="{{ route('category.create') }}">Add Category</a> --}}
                <a class="collapse-item {{ $route == 'subcategory.index' ? 'active' : '' }}"
                    href="{{ route('subcategory.index') }}">Manage SubCategory</a>
                {{-- <a class="collapse-item {{ ($route == 'subcategory.create') ? 'active' : '' }}" href="{{ route('subcategory.create') }}">Add SubCategory</a> --}}
                <a class="collapse-item {{ $route == 'subsubcategory.index' ? 'active' : '' }}"
                    href="{{ route('subsubcategory.index') }}">Manage SubSubCategory</a>
                {{-- <a class="collapse-item {{ ($route == 'subsubcategory.create') ? 'active' : '' }}" href="{{ route('subsubcategory.create') }}">Add SubSubCategory</a> --}}
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#slider" aria-expanded="true"
            aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Slider</span>
        </a>
        <div id="slider"
            class="collapse
      {{ $route == 'slider.index' ? 'show' : '' }}
      {{ $route == 'slider.create' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'slider.index' ? 'active' : '' }}"
                    href="{{ route('slider.index') }}">Manage Slider</a>
                <a class="collapse-item {{ $route == 'slider.create' ? 'active' : '' }}"
                    href="{{ route('slider.create') }}">Add Slider</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#product" aria-expanded="true"
            aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Products</span>
        </a>
        <div id="product"
            class="collapse
      {{ $route == 'product.index' ? 'show' : '' }}
      {{ $route == 'product.create' ? 'show' : '' }}
      {{ $route == 'product.view' ? 'show' : '' }}
      {{ $route == 'product.edit' ? 'show' : '' }}

      {{ $route == 'order.index' ? 'show' : '' }}
      {{ $route == 'order.show' ? 'show' : '' }}
      {{ $route == 'attribute.index' ? 'show' : '' }}
      {{ $route == 'attribute.create' ? 'show' : '' }}
      {{ $route == 'brand.index' ? 'show' : '' }}
      {{ $route == 'brand.create' ? 'show' : '' }}
      {{ $route == 'brand.view' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'product.index' ? 'active' : '' }}"
                    href="{{ route('product.index') }}">All Product</a>
                <a class="collapse-item {{ $route == 'product.create' ? 'active' : '' }}"
                    href="{{ route('product.create') }}">Add New Product</a>
                <a class="collapse-item  {{ $route == 'orders.index' ? 'active' : '' }}"
                    href="{{ route('order.index') }}">All Orders</a>
                <a class="collapse-item {{ $route == 'attribute.index' ? 'active' : '' }}"
                    href="{{ route('attribute.index') }}">Attribute</a>
                <a class="collapse-item {{ $route == 'product.create' ? 'active' : '' }}"
                    href="{{ route('product.create') }}">Colors</a>
                <a class="collapse-item  {{ $route == 'brand.index' ? 'active' : '' }}"
                    href="{{ route('brand.index') }}">Brand</a>
            </div>
        </div>
    </li>




    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#campaing" aria-expanded="true"
            aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Campaigns</span>
        </a>
        <div id="campaing"
            class="collapse
      {{ $route == 'campaing.index' ? 'show' : '' }}
      {{ $route == 'campaing.create' ? 'show' : '' }}
      {{ $route == 'campaing.edit' ? 'show' : '' }}
      {{ $route == 'campaing.view' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item  {{ $route == 'campaing.index' ? 'active' : '' }}"
                    href="{{ route('campaing.index') }}">Manage Campaign</a>
                <a class="collapse-item {{ $route == 'campaing.create' ? 'active' : '' }}"
                    href="{{ route('campaing.create') }}">Add Campaign</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#banner"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Banner</span>
        </a>
        <div id="banner"
            class="collapse
      {{ $route == 'banner.index' ? 'show' : '' }}
      {{ $route == 'banner.create' ? 'show' : '' }}
      {{ $route == 'banner.view' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item  {{ $route == 'banner.index' ? 'active' : '' }}"
                    href="{{ route('banner.index') }}">Manage Banner</a>
                <a class="collapse-item {{ $route == 'banner.create' ? 'active' : '' }}"
                    href="{{ route('banner.create') }}">Add Banner</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pages"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="pages"
            class="collapse
     {{ $route == 'pages.index' ? 'show' : '' }}
     {{ $route == 'pages.create' ? 'show' : '' }}
     "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'pages.index' ? 'active' : '' }}"
                    href="{{ route('pages.index') }}">Manage Pages</a>
                <a class="collapse-item {{ $route == 'pages.create' ? 'active' : '' }}"
                    href="{{ route('pages.create') }}">Add Padges</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#setting"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Advance Setting</span>
        </a>
        <div id="setting"
            class="collapse
      {{ $route == 'setting.index' ? 'show' : '' }}
      {{ $route == 'paymentMethod.config' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('setting.index') }}">Manage Setting</a>
                <a class="collapse-item" href="{{ route('paymentMethod.config') }}">Payment Methods</a>
                <a class="collapse-item" href="#">Manage Seo</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#blog"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Blog</span>
        </a>
        <div id="blog"
            class="collapse
      {{ $route == 'blog.index' ? 'show' : '' }}
      {{ $route == 'blog.create' ? 'show' : '' }}

      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'blog.index' ? 'active' : '' }}"
                    href="{{ route('blog.index') }}">Manage Blog</a>
                <a class="collapse-item {{ $route == 'blog.create' ? 'active' : '' }}"
                    href="{{ route('blog.create') }}">Add Blog</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#subscribe"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Subscribe</span>
        </a>
        <div id="subscribe" class="collapse
      {{ $route == 'subscribe.index' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'subscribe.index' ? 'active' : '' }}"
                    href="{{ route('subscribe.index') }}">Manage Subscribe</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#vendors"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Vendors</span>
        </a>
        <div id="vendors"
            class="collapse
      {{ $route == 'vendor.index' ? 'show' : '' }}
      {{ $route == 'vendor.create' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'vendor.index' ? 'active' : '' }}"
                    href="{{ route('vendor.index') }}">Manage Vendors</a>
                <a class="collapse-item {{ $route == 'vendor.create' ? 'active' : '' }}"
                    href="{{ route('vendor.create') }}">Add Vendors</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#coupon"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Coupon</span>
        </a>
        <div id="coupon"
            class="collapse
         {{ $route == 'coupon.index' ? 'show' : '' }}
         {{ $route == 'coupon.create' ? 'show' : '' }}
         {{ $route == 'coupon.view' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'coupon.index' ? 'active' : '' }}"
                    href="{{ route('coupon.index') }}">Manage Coupons</a>
                <a class="collapse-item {{ $route == 'coupon.create' ? 'active' : '' }}"
                    href="{{ route('coupon.create') }}">Add Coupon</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#supplier"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Suppliers</span>
        </a>
        <div id="supplier"
            class="collapse
      {{ $route == 'supplier.index' ? 'show' : '' }}
      {{ $route == 'supplier.create' ? 'show' : '' }}
      "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'supplier.index' ? 'active' : '' }}"
                    href="{{ route('supplier.index') }}">Manage Suppliers</a>
                <a class="collapse-item {{ $route == 'supplier.create' ? 'active' : '' }}"
                    href="{{ route('supplier.create') }}">Add Supplier</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#shipping_area"
            aria-expanded="true" aria-controls="real_estate">
            <i class="fas fa-fw fa-folder"></i>
            <span>Shipping Area</span>
        </a>
        <div id="shipping_area"
            class="collapse
    {{ $route == 'viewDivision' ? 'show' : '' }}
    {{ $route == 'viewDistricts' ? 'show' : '' }}
    {{ $route == 'viewStates' ? 'show' : '' }}
    "
            aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item {{ $route == 'viewDivision' ? 'active' : '' }}"
                    href="{{ route('viewDivision') }}">Shipping Division</a>
                <a class="collapse-item {{ $route == 'viewDistricts' ? 'active' : '' }}"
                    href="{{ route('viewDistricts') }}">Shipping Districk</a>
                <a class="collapse-item {{ $route == 'viewStates' ? 'active' : '' }}"
                    href="{{ route('viewStates') }}">Shipping States</a>
            </div>
        </div>
    </li>

</ul>
<!-- End of Sidebar -->
