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
                        <div class="col-12 col-lg-12">
                            <div class="blog-right-sidebar p-3">
                                <div class="card shadow-none bg-transparent">
                                    <img src="{{ asset($datalisNews->blog_image) }}" class="card-img-top" alt="image">
                                    <div class="card-body p-0">
                                        <div class="list-inline mt-4"> <a href="javascript:;" class="list-inline-item"><i
                                                    class='bx bx-user me-1'></i>By {{ $datalisNews->user->name }}</a>
                                            <a href="javascript:;" class="list-inline-item"><i
                                                    class='bx bx-comment-detail me-1'></i>16 Comments</a>
                                            <a href="javascript:;" class="list-inline-item"><i
                                                    class='bx bx-calendar me-1'></i>{{ Carbon\Carbon::parse($datalisNews->created_at)->diffForHumans() }}</a>
                                        </div>
                                        @if (session()->get('language') == 'bangla')
                                            <h4 class="mt-4">{{ $datalisNews->blog_title_bn }}</h4>
                                            <p>{!! $datalisNews->blog_description_bn !!}</p>
                                        @else
                                            <h4 class="mt-4">{{ $datalisNews->blog_title_en }}</h4>
                                            <p>{!! $datalisNews->blog_description_en !!}</p>
                                        @endif

                                        <div class="d-flex align-items-center gap-2 py-4 border-top border-bottom">
                                            <div class="">
                                                <h6 class="mb-0 text-uppercase">Share This Post</h6>
                                            </div>
                                            <div class="list-inline blog-sharing"> <a href="javascript:;"
                                                    class="list-inline-item"><i class='bx bxl-facebook'></i></a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bxl-twitter'></i></a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bxl-linkedin'></i></a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bxl-instagram'></i></a>
                                                <a href="javascript:;" class="list-inline-item"><i
                                                        class='bx bxl-tumblr'></i></a>
                                            </div>
                                        </div>

                                        {{-- <div class="author d-flex align-items-center gap-3 py-4">
                                        <img src="assets/images/avatars/avatar-1.png" alt="" width="80">
                                        <div class="">
                                            <h6 class="mb-0">Jhon Doe</h6>
                                            <p class="mb-0">Donec egestas metus non vehicula accumsan. Pellentesque sit amet tempor nibh. Mauris in risus lorem. Cras malesuada gravida massa eget viverra. Suspendisse vitae dolor erat. Morbi id rhoncus enim. In hac habitasse platea dictumst. Aenean lorem diam, venenatis nec venenatis id, adipiscing ac massa.</p>
                                        </div>
                                    </div>
                                    <div class="reply-form p-4 border bg-dark-1">
                                        <h6 class="mb-0">Leave a Reply</h6>
                                        <p>Your email address will not be published. Required fields are marked *</p>
                                        <form>
                                            <div class="mb-3">
                                                <label class="form-label">Comment</label>
                                                <textarea class="form-control" rows="4"></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" class="form-control" placeholder="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Website</label>
                                                <input type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <button type="button" class="btn btn-light btn-ecomm">Post Comment</button>
                                            </div>
                                        </form>
                                    </div> --}}

                                    </div>
                                </div>
                                <div class="product-grid">
                                    <h5 class="text-uppercase mb-4">Latest Post</h5>
                                    <div class="latest-news owl-carousel owl-theme">
                                        @forelse ($latest_news as $new)
                                            <div class="item">
                                                <div class="card rounded-0 product-card border">
                                                    <div class="news-date">
                                                        <div class="date-number">24</div>
                                                        <div class="date-month">FEB</div>
                                                    </div>
                                                    <a href="javascript:;">
                                                        <img style="object-fit: cover;" src="{{ asset($new->blog_image) }}"
                                                            class="card-img-top border-bottom bg-dark-1" alt="...">
                                                    </a>
                                                    <div class="card-body">
                                                        <div class="news-title">
                                                            <a href="javascript:;">
                                                                @if (session()->get('language') == 'bangla')
                                                                    <h5 class="mb-3 text-capitalize">
                                                                        {{ $new->blog_title_bn }}</h5>
                                                                @else
                                                                    <h5 class="mb-3 text-capitalize">
                                                                        {{ $new->blog_title_en }}</h5>
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
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </section>
            <!--end start page content-->
        </div>
    </div>
@endsection
