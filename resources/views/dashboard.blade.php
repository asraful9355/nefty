@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
   <div class="page-content">
      <!--start breadcrumb-->
      <section class="py-3 border-bottom d-none d-md-flex">
         <div class="container">
            <div class="page-breadcrumb d-flex align-items-center">
               <h3 class="breadcrumb-title pe-3">My Dashboard</h3>
               <div class="ms-auto">
                  <nav aria-label="breadcrumb">
                     <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                        </li>
                        <li class="breadcrumb-item"><a href="javascript:;">Account</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">My Dashboard</li>
                     </ol>
                  </nav>
               </div>
            </div>
         </div>
      </section>
      <!--end breadcrumb-->
      <!--start shop cart-->
      <section class="py-4">
         <div class="container">
            <h3 class="d-none">Account</h3>
            <div class="card">
               <div class="card-body">
                  <div class="row">
                     <div class="col-lg-4">
                        <div class="card shadow-none mb-3 mb-lg-0">
                           <div class="card-body">
                              @include('frontend.common.usersidebar')
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-8">
                        <div class="card shadow-none mb-0">
                           <div class="card-body">
                              <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                         <div class="card">
                                             <p class="pt-3"><i class="fas fa-box"></i></p>
                                             <span>TOTAL ORDER</span>
                                             @php
                                                $orders = App\Models\Order::where('user_id',Auth::id())->orderBy('id','DESC')->get();
                                             @endphp
                                             <p>{{ count($orders) }}</p> 
                                         </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                         <div class="card">
                                             <p class="pt-3">
                                                <i class="fas fa-balance-scale"></i>
                                             </p>       
                                             <span>PENDING ORDER</span>
                                             <p>{{ count($orders) }}</p>
                                         </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                         <div class="card">
                                             <p class="pt-3"><i class="fas fa-hourglass-start"></i></p>
                                             <span>PROCESSING ORDER</span>
                                             <p>0</p>
                                         </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                         <div class="card">
                                             <p class="pt-3"><i class="fas fa-plane"></i></p>
                                             <span>SHIPPING ORDER</span>
                                             <p>0</p>
                                         </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                         <div class="card">
                                             <p class="pt-3"><i class="fas fa-thumbs-up"></i></p>
                                             <span>PICKED UP ORDER</span>
                                             <p>0</p>
                                         </div>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-4 col-6 item text-center">
                                       <div class="card">
                                          <p class="pt-3"><i class="fa fa-window-close"></i></p>
                                          <span>CANCELED ORDER</span>
                                          <p>0</p>
                                       </div>
                                    </div>

                                 </div>
                              <!-- <p>Hello <strong>Madison Ruiz</strong>
                              <form method="post" action="{{ route('logout') }}" >
                                 @csrf
                                 <a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();">Logout</a>
                              </form>
                              </p>
                              <p>From your account dashboard you can view your Recent Orders, manage your shipping and billing addesses and edit your password and account details</p> -->
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--end row-->
               </div>
            </div>
         </div>
      </section>
      <!--end shop cart-->
   </div>
</div>
@endsection
