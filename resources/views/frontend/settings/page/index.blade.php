@extends('layouts.frontend')
@section('content-frontend')
<!--start page wrapper -->
<div class="page-wrapper">
	<div class="page-content">
		<!--start breadcrumb-->
		<section class="py-3 border-bottom d-none d-md-flex">
			<div class="container">
				<div class="page-breadcrumb d-flex align-items-center">
					<h3 class="breadcrumb-title pe-3">
						@if(session()->get('language') == 'bangla')
							{{ $page->name_bn ?? 'NULL' }}
						@else
							{{ $page->name_en ?? 'NULL' }}
						@endif
					</h3>
					<div class="ms-auto">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item">
									<a href="{{ route('home') }}">
										<i class="bx bx-home-alt"></i> Home
									</a>
								</li>
								<li class="breadcrumb-item"><a href="javascript:;">Pages</a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">
									@if(session()->get('language') == 'bangla')
										{{ $page->name_bn ?? 'NULL' }}
									@else
										{{ $page->name_en ?? 'NULL' }}
									@endif
								</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</section>
		<!--end breadcrumb-->
		<!--start page content-->
		<section class="py-0 py-lg-4">
			<div class="container">
				<h4>
					@if(session()->get('language') == 'bangla')
						{{ $page->title ?? 'NULL' }}
					@else
						{{ $page->title ?? 'NULL' }}
					@endif
				</h4>
				<p>
					@if(session()->get('language') == 'bangla')
                        {!! nl2br($page->description_bn) !!}
                    @else 
                        {!! nl2br($page->description_en) !!}
                    @endif
				</p>
			</div>
		</section>
		<section class="py-4">
			<div class="container">
				<h4>Why Choose Us</h4>
				<hr>
				<div class="row row-cols-1 row-cols-lg-3">
					<div class="col d-flex">
						<div class="card rounded-0 shadow-none w-100">
							<div class="card-body">
								<img src="{{ asset('frontend/assets/images/icons/delivery.png ') }}" width="60" alt="">
								<h5 class="my-3">FREE SHIPPING</h5>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
							</div>
						</div>
					</div>
					<div class="col d-flex">
						<div class="card rounded-0 shadow-none w-100">
							<div class="card-body">
								<img src="{{ asset('frontend/assets/images/icons/money-bag.png ') }}" width="60" alt="">
								<h5 class="my-3">100% MONEY BACK GUARANTEE</h5>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
							</div>
						</div>
					</div>
					<div class="col d-flex">
						<div class="card rounded-0 shadow-none w-100">
							<div class="card-body">
								<img src="{{ asset('frontend/assets/images/icons/support.png ') }}" width="60" alt="">
								<h5 class="my-3">ONLINE SUPPORT 24/7</h5>
								<p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industr in some form.</p>
							</div>
						</div>
					</div>
				</div>
				<!--end row-->
			</div>
		</section>
		<section class="py-4">
			<div class="container">
				<h4>Our Top Brands</h4>
				<hr>
				<div class="row row-cols-2 row-cols-sm-2 row-cols-md-4 row-cols-xl-5">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/01.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/02.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/03.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/04.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/05.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/06.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/07.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/08.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/09.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/10.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/11.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/12.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/13.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/14.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card">
							<div class="card-body">
								<a href="javscript:;">
									<img src="{{ asset('frontend/assets/images/brands/15.png ') }}" class="img-fluid" alt="">
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--end start page content-->
	</div>
</div>
<!--end page wrapper -->
@endsection
