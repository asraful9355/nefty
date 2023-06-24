<!--start footer section-->
<footer>
    <section class="py-4 bg-dark-1">
        <div class="container">
            <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-4">

                <div class="col">
                    <div class="footer-section1 mb-3">
                        @if (session()->get('language') == 'bangla')
                        <h6 class="mb-3 text-uppercase">কন্টাক্ট ইনফো</h6>
                        @else
                        <h6 class="mb-3 text-uppercase">Contact Info</h6>
                        @endif
                        <div class="address mb-3">
                            <p class="mb-0 text-uppercase text-white">Address :</p>
                            <p class="mb-0 font-12">{{ get_setting('business_address')->value ?? 'null' }}</p>
                        </div>
                        <div class="phone mb-3">
                            <p class="mb-0 text-uppercase text-white">Phone</p>
                            <p class="mb-0 font-13">Mobile : {{ get_setting('phone')->value ?? 'null' }}</p>
                        </div>
                        <div class="email mb-3">
                            <p class="mb-0 text-uppercase text-white">Email</p>
                            <p class="mb-0 font-13">{{ get_setting('email')->value ?? 'null' }}</p>
                        </div>
                        <div class="working-days mb-3">
                            <p class="mb-0 text-uppercase text-white">WORKING DAYS</p>
                            <p class="mb-0 font-13">{{ get_setting('business_hours')->value ?? 'null' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="footer-section2 mb-3">
                        @php
                            $categories = App\Models\Category::orderBy('category_name_en', 'ASC')->get();
                        @endphp

                        @if (session()->get('language') == 'bangla')
                        <h6 class="mb-3 text-uppercase">পপুলার ক্যাটাগরি</h6>
                        @else
                        <h6 class="mb-3 text-uppercase">Popular Categories</h6>
                        @endif
                        <ul class="list-unstyled">
                            @foreach ($categories->take(10) as $category)
                                <li class="mb-1">
                                    <a href="#">
                                        <i class='bx bx-chevron-right'></i>
                                        @if(session()->get('language') == 'bangla')
                                            {{ $category->category_name_bn }}
                                        @else
                                            {{ $category->category_name_en }}
                                        @endif
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <div class="footer-section2 mb-3">
                        @if (session()->get('language') == 'bangla')
                        <h6 class="mb-3 text-uppercase">পপুলার পেজ</h6>
                        @else
                        <h6 class="mb-3 text-uppercase">Popular Pages</h6>
                        @endif
                        <ul class="list-unstyled">
                           @foreach(get_pages_both_footer() as $page)
                                <li class="mb-1">
                                    <i class='bx bx-chevron-right'></i>
                                    <a href="{{ route('page.about', $page->slug) }}">
                                        {{ $page->name_en }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="col">
                    <div class="footer-section4 mb-3">
                        <h6 class="mb-3 text-uppercase"></h6>
                        @if (session()->get('language') == 'bangla')
                        <h6 class="mb-3 text-uppercase">অবগত থাকুন</h6>
                        @else
                        <h6 class="mb-3 text-uppercase">Stay informed</h6>
                        @endif
                        <div class="subscribe">
                            <form  action="{{ route('subs.store') }}" method="post">
                                @csrf
                                <input type="email"  name="email" class="form-control radius-30" placeholder="Enter Your Email" required />
                                <div class="mt-2 d-grid">
                                  <input type="submit"  class="btn btn-white btn-ecomm radius-30" value="SUBSCRIBE">

                                </div>
                            </form>

                            <!-- <p class="mt-2 mb-0 font-13">Subscribe to our newsletter to receive early discount offers, updates and new products info.</p> -->
                        </div>
                        <div class="download-app mt-3">
                            <h6 class="mb-3 text-uppercase">Download our app</h6>
                            <div class="d-flex align-items-center gap-2">
                                <a href="javascript:;">
                                    <img src="{{ asset('frontend/assets/images/icons/apple-store.png ') }}" class="" width="160" alt="" />
                                </a>
                                <a href="javascript:;">
                                    <img src="{{ asset('frontend/assets/images/icons/play-store.png ') }}" class="" width="160" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
            <hr/>
            <div class="row row-cols-1 row-cols-md-2 align-items-center">
                <div class="col">
                    <p class="mb-0">{{ get_setting('copy_right')->value ?? 'null' }} All right reserved.</p>
                </div>
                <div class="col text-end">
                    <div class="payment-icon">
                        <div class="row row-cols-auto g-2 justify-content-end">
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/visa.png ') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/paypal.png ') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/mastercard.png ') }}" alt="" />
                            </div>
                            <div class="col">
                                <img src="{{ asset('frontend/assets/images/icons/american-express.png ') }}" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </section>
</footer>
<!--end footer section-->

