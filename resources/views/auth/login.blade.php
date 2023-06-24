@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    @if (session()->get('language') == 'bangla')
                        <h3 class="breadcrumb-title pe-3">সাইন ইন করুন</h3>
                    @else
                        <h3 class="breadcrumb-title pe-3">Sign in</h3>
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
        <!--start shop cart-->
        <section class="">
            <div class="container">
                <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
                    <div class="row row-cols-1 row-cols-xl-2">
                        <div class="col mx-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign in</h3>
                                        </div>
                                        <!-- <div class="d-grid">
                                            <a class="btn my-4 shadow-sm btn-light" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                                                <img class="me-2" src="{{ asset('frontend/assets/images/icons/search.svg') }}" width="16" alt="Image Description">
                                                <span>Sign in with Google</span>
                                                </span>
                                            </a> <a href="javascript:;" class="btn btn-light"><i class="bx bxl-facebook"></i>Sign in with Facebook</a>
                                        </div> -->
                                        <div class="login-separater text-center mb-4"> <span>OR SIGN IN WITH EMAIL</span>
                                            <hr/>
                                        </div>
                                        <div class="form-body">
                                            <form class="row g-3" action="{{ route('login') }}" method="post">
                                                @csrf
                                                <div class="col-12">
                                                    <label for="email" class="form-label">Email Address</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                                                    @error('email')
                                                        <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">

                                                    <div class="input-group" >
                                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                        <div class="input-group" id="show_hide_password">
                                                            <input type="password" class="form-control border-end-0" value="12345678" placeholder="Enter Password" id="myInput" name="password">
                                                            @error('password')
                                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                                            @enderror
                                                            <a href="javascript:;" class="input-group-text bg-transparent" onclick="myFunction()"><i class='bx bx-hide'></i></a>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end">
                                                    <a href="{{ route('password.request') }}">Forgot Password ?</a>
                                                </div>
                                                <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a>
                                                </p>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-light"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </section>
        <!--end shop cart-->
    </div>
</div>

<script>
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
    })()
</script>
@endsection
