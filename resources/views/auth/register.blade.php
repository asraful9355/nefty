@extends('layouts.frontend')
@section('content-frontend')
<!--start page wrapper -->
<div class="page-wrapper">
  <div class="page-content">
    <!--start breadcrumb-->
    <section class="py-3 border-bottom d-none d-md-flex">
      <div class="container">
        <div class="page-breadcrumb d-flex align-items-center">
          <h3 class="breadcrumb-title pe-3">Sign Up</h3>
          <div class="ms-auto">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i> Home</a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:;">Authentication</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <!--end breadcrumb-->
    <!--start shop cart-->
    <section class="py-0 py-lg-5">
      <div class="container">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
          <div class="row row-cols-1 row-cols-lg-1 row-cols-xl-2">
            <div class="col mx-auto">
              <div class="card mb-0">
                <div class="card-body">
                  <div class="border p-4 rounded">
                    <div class="text-center">
                      <h3 class="">Sign Up</h3>
                    </div>
                    <!-- <div class="d-grid">
                      <a class="btn my-4 shadow-sm btn-light" href="javascript:;"> <span class="d-flex justify-content-center align-items-center">
                        <img class="me-2" src="{{ asset('frontend/assets/images/icons/search.svg ' )}}" width="16" alt="Image Description">
                        <span>Sign Up with Google</span>
                        </span>
                      </a> <a href="javascript:;" class="btn btn-light"><i class="bx bxl-facebook"></i>Sign Up with Facebook</a>
                    </div> -->
                    <div class="login-separater text-center mb-4"> <span>OR SIGN UP WITH EMAIL</span>
                      <hr/>
                    </div>
                    <div class="form-body">
                      <form class="row g-3" action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="col-sm-6">
                          <label for="inputFirstName" class="form-label">Name</label>
                          <input type="text" name="name" class="form-control" id="inputFirstName" placeholder="Jhon" value="{{ old('name') }}">
                          @error('name')
                              <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-sm-6">
                          <label for="inputLastName" class="form-label">User Name</label>
                          <input type="text" name="username" class="form-control" id="inputLastName" placeholder="Deo" value="{{ old('username') }}" >
                          @error('username')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="inputEmailAddress" class="form-label">Email Address</label>
                          <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="example@user.com" value="{{ old('email') }}">
                          @error('email')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="inputChoosePassword" class="form-label">Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" name="password" class="form-control border-end-0 password" id="inputChoosePassword" value="{{ old('password') }}" placeholder="Enter Password">
                            <a href="javascript:;" onclick="myFunction()" class="input-group-text bg-transparent">
                              <i class='bx bx-hide'></i>
                            </a>
                          </div>
                          @error('password')
                            <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                          @enderror
                        </div>
                        <div class="col-12">
                          <label for="inputChoosePassword1" class="form-label">Confirmation Password</label>
                          <div class="input-group" id="show_hide_password">
                            <input type="password" class="form-control border-end-0" id="inputChoosePassword1" value="{{ old('password_confirmation') }}" placeholder="Enter Password" name="password_confirmation">
                            <a href="javascript:;" onclick="myFunction1()" class="input-group-text bg-transparent">
                              <i class='bx bx-hide'></i>
                            </a>
                          </div>
                            @error('password_confirmation')
                              <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-12">
                          <p>Already have an account? <a href="{{ route('login') }}">Sign in here</a>
                            </p>
                          <!-- <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                            <label class="form-check-label" for="flexSwitchCheckChecked">I read and agree to Terms & Conditions</label>
                          </div> -->
                        </div>
                        <div class="col-12">
                          <div class="d-grid">
                            <button type="submit" class="btn btn-light"><i class='bx bx-user'></i>Sign up</button>
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
<!--end page wrapper -->
<script>
  /* ============= password show function ============= */
  function myFunction() {
    var x = document.getElementById("inputChoosePassword");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
  /* ============= confirm password show function ============= */
  function myFunction1() {
    var x = document.getElementById("inputChoosePassword1");
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