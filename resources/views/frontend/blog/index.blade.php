@extends('layouts.frontend')
@section('content-frontend')
    <div class="page-wrapper">
        <div class="page-content">
            <!--start breadcrumb-->
            <section class="py-3 border-bottom d-none d-md-flex">
                <div class="container">
                    <div class="page-breadcrumb d-flex align-items-center">
                        @if (session()->get('language') == 'bangla')
                            <h3 class="breadcrumb-title pe-3">নিউজ </h3>
                        @else
                            <h3 class="breadcrumb-title pe-3">News</h3>
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
            <!--start page content-->
            <section class="py-4">
                <div class="container">
                    <div class="row">

                        <div class="col-12 col-lg-9">
                            <div class="blog-right-sidebar p-3">
                                @forelse ($latest_news as $new)
                                    <div class="card">
                                        <img src="{{ asset($new->blog_image) }}" class="card-img-top" alt="">
                                        <div class="card-body">
                                            <div class="list-inline"> <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bx-user me-1'></i>By {{ $new->user->name }}</a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bx-comment-detail me-1'></i>16 Comments</a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bx-calendar me-1'></i>{{ Carbon\Carbon::parse($new->created_at)->diffForHumans() }}</a>
                                            </div>
                                            @if (session()->get('language') == 'bangla')
                                                <h4 class="mt-4">{{ $new->blog_title_bn }}</h4>
                                            @else
                                                <h4 class="mt-4">{{ $new->blog_title_en }}</h4>
                                            @endif
                                            <p>
                                                @if (session()->get('language') == 'bangla')
                                                    <?php $b_name_bn = strip_tags(html_entity_decode($new->blog_description_bn)); ?>
                                                    {!! Str::limit($b_name_bn, $limit = 222, $end = '. . .') !!}
                                                @else
                                                    <?php $b_name_en = strip_tags(html_entity_decode($new->blog_description_en)); ?>
                                                    {!! Str::limit($b_name_en, $limit = 222, $end = '. . .') !!}
                                                @endif
                                            </p>
                                            <a href="{{ route('news.details', $new->blog_slug_en) }}"
                                                class="btn btn-light btn-ecomm">Read More <i
                                                    class='bx bx-chevrons-right'></i></a>
                                        </div>
                                    </div>
                                @empty
                                @endforelse
                                <hr>
                                <nav class="d-flex justify-content-between" aria-label="Page navigation">
                                    <ul class="pagination">
                                        {{ $latest_news->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>

                        <div class="col-12 col-lg-3">
                            <div class="blog-left-sidebar p-3">
                                <form>
                                    <div class="position-relative blog-search mb-3">
                                        <input type="text" class="form-control form-control-lg rounded-0 pe-5"
                                            placeholder="Serach posts here...">
                                        <div class="position-absolute top-50 end-0 translate-middle"><i
                                                class='bx bx-search fs-4 text-white'></i>
                                        </div>
                                    </div>
                                    <div class="blog-categories mb-3">
                                        <h5 class="mb-4">Blog Categories</h5>
                                        <div class="list-group list-group-flush"> <a href="javascript:;"
                                                class="list-group-item bg-transparent"><i
                                                    class='bx bx-chevron-right me-1'></i> Fashion</a>
                                            <a href="javascript:;" class="list-group-item bg-transparent"><i
                                                    class='bx bx-chevron-right me-1'></i> Electronis</a>
                                            <a href="javascript:;" class="list-group-item bg-transparent"><i
                                                    class='bx bx-chevron-right me-1'></i> Accessories</a>
                                            <a href="javascript:;" class="list-group-item bg-transparent"><i
                                                    class='bx bx-chevron-right me-1'></i> Kitchen & Table</a>
                                            <a href="javascript:;" class="list-group-item bg-transparent"><i
                                                    class='bx bx-chevron-right me-1'></i> Furniture</a>
                                        </div>
                                    </div>

                                    <div class="blog-categories mb-3">
                                        <h5 class="mb-4">Recent Posts</h5>
                                        @forelse ($recent_news->take(4) as $new)
                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset($new->blog_image) }}" width="75" alt="">
                                                <div class="ms-3"> <a href="{{ route('news.details', $new->blog_slug_en) }}" class="fs-6">
                                                        @if (session()->get('language') == 'bangla')
                                                            {{ $new->blog_title_bn }}
                                                        @else
                                                            {{ $new->blog_title_en }}
                                                        @endif
                                                    </a>
                                                    <p class="mb-0">
                                                        {{ Carbon\Carbon::parse($new->created_at)->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                            <div class="my-3 border-bottom"></div>
                                        @empty
                                        @endforelse


                                    </div>

                                    <div class="blog-categories mb-3">
                                        <h5 class="mb-4">Popular Tags</h5>
                                        <div class="tags-box"> <a href="javascript:;" class="tag-link">Cloths</a>
                                            <a href="javascript:;" class="tag-link">Electronis</a>
                                            <a href="javascript:;" class="tag-link">Furniture</a>
                                            <a href="javascript:;" class="tag-link">Sports</a>
                                            <a href="javascript:;" class="tag-link">Men Wear</a>
                                            <a href="javascript:;" class="tag-link">Women Wear</a>
                                            <a href="javascript:;" class="tag-link">Laptops</a>
                                            <a href="javascript:;" class="tag-link">Formal Shirts</a>
                                            <a href="javascript:;" class="tag-link">Topwear</a>
                                            <a href="javascript:;" class="tag-link">Headphones</a>
                                            <a href="javascript:;" class="tag-link">Bottom Wear</a>
                                            <a href="javascript:;" class="tag-link">Bags</a>
                                            <a href="javascript:;" class="tag-link">Sofa</a>
                                            <a href="javascript:;" class="tag-link">Shoes</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end start page content-->
        </div>
    </div>
@endsection
