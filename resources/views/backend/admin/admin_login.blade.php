<!DOCTYPE html>
<html lang="en">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Admin Login</title>
      <!-- Custom fonts for this template-->
      <link href="{{ asset('backend/asset/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
      <link
         href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
         rel="stylesheet">
      <link href="{{ asset('backend/asset/css/sb-admin-2.css') }}" rel="stylesheet">
      <!-- Custom styles for this template-->
      <link href="{{ asset('backend/backend/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('backend/patient/css/jquery-ui.min.html') }}">
      <link rel="stylesheet" href="{{ asset('backend/patient/css/bootstrap-datepicker.min.html') }}">
      <link rel="stylesheet" href="{{ asset('backend/backend/css/select2.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/toastr/toastr.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/css/bootstrap4-toggle.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/summernote/summernote-bs4.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/timepicker/jquery.timepicker.min.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/css/prescription.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/css/style.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/css/spacing.css') }}">
      <link rel="stylesheet" href="{{ asset('backend/asset/iconpicker/fontawesome-iconpicker.min.css') }}">

      <!-- toastr css -->
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- Sweetalert css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.8/sweetalert2.css">
      <!-- Bootstrap core JavaScript-->
      <script src="{{ asset('backend/asset/vendor/jquery/jquery.min.js') }}"></script>
      <script src="{{ asset('backend/asset/timepicker/jquery.timepicker.min.js') }}"></script>
      <link rel="stylesheet" type="text/css" href="{{ asset('backend/user/css/flaticon.min.html') }}">
      <style>
         .fade.in {
         opacity: 1 !important;
         }
      </style>

   </head>
   <body id="page-top" class="body_bg">
      <div class="container">
         <!-- Outer Row -->
         <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
               <div class="card o-hidden border-0 shadow-lg mt_100">
                  <div class="card-body p-0">
                     <!-- Nested Row within Card Body -->
                     <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image" style="background-image:url({{ asset('backend//uploads/website-images/login-2021-10-12-09-34-01-8223.jpg') }});"></div>
                        <div class="col-lg-6">
                           <div class="p-5">
                               <div class="text-center">
                                 <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                                </div>
                                <form method="POST" action="{{ route('admin.login') }}" class="login-form">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control form-control-user"
                                           id="email" aria-describedby="email"
                                           placeholder="Email">
                                            @error('email')
                                                <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                            @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                        <div class="input-group" id="show_hide_password">
                                           <input type="password" class="form-control form-control-user" value="12345678" placeholder="Enter Password" id="myInput" name="password"> 
                                           @error('password')
                                           <span class="text-danger" style="font-weight: bold;">{{ $message }}</span>
                                           @enderror
                                        </div>
                                      
                                        <input type="checkbox" onclick="myFunction()" class="mt-4"> Show Password
                                        <button type="submit" class="btn btn-primary btn-user btn-block  mt-4">
                                        Login
                                        </button>
                                        <hr>
                                  </form>
                                <div class="d-flex">
                                    <div class="col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}">Forgot Password</a>
                                        @endif
                                    </div>
                                </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
   <script src="{{ asset('backend/asset/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('backend/asset/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
   <script src="{{ asset('backend/asset/js/bootstrap4-toggle.min.js') }}"></script>
   <script src="{{ asset('backend/asset/js/sb-admin-2.min.js') }}"></script>
   <script src="{{ asset('backend/asset/vendor/chart.js/Chart.min.js') }}"></script>
   <script src="{{ asset('backend/asset/js/demo/chart-area-demo.js') }}"></script>
   <script src="{{ asset('backend/asset/js/demo/chart-pie-demo.js') }}"></script>
   <script src="{{ asset('backend/asset/vendor/datatables/jquery.dataTables.min.js') }}"></script>
   <script src="{{ asset('backend/asset/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
   <script src="{{ asset('backend/asset/js/demo/datatables-demo.js') }}"></script>
   <script src="{{ asset('backend/asset/js/jquery.PrintArea.js') }}"></script>
   <script src="{{ asset('backend/asset/js/select2.min.js') }}"></script>
   <script src="{{ asset('backend/toastr/toastr.min.js') }}"></script>
   <script src="{{ asset('backend/asset/summernote/summernote-bs4.js') }}"></script>
   <script src="{{ asset('backend/asset/iconpicker/fontawesome-iconpicker.min.js') }}"></script>
<!-- Sweetalert js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <!-- toastr js -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

   <!-- all toastr message show -->
    <script>
        @if(Session::has('message'))
        var type = "{{ Session::get('alert-type','info') }}"
        switch(type){
            case 'info':
            toastr.info(" {{ Session::get('message') }} ");
            break;

            case 'success':
            toastr.success(" {{ Session::get('message') }} ");
            break;

            case 'warning':
            toastr.warning(" {{ Session::get('message') }} ");
            break;

            case 'error':
            toastr.error(" {{ Session::get('message') }} ");
            break;
        }
        @endif
    </script>

    <!-- 3 color toastr message show -->
    <script type="text/javascript">
        @if(Session::has('success'))
            toastr.success("{{Session::get('success') }}");
        @endif
        @if(Session::has('warning'))
            toastr.warning("{{Session::get('warning') }}");
        @endif
        @if(Session::has('info'))
            toastr.info("{{Session::get('info') }}");
        @endif
    </script>

<!-- sweetalerat link -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- sweetalerat delete data -->
<script type="text/javascript">
$(function(){
  $(document).on('click','#delete',function(e){
    e.preventDefault();
    var link = $(this).attr("href");

  Swal.fire({
  title: 'Are you sure?',
  text: "Delete This Data!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.isConfirmed) {
    window.location.href = link
    Swal.fire(
      'Deleted!',
      'Your file has been deleted.',
      'success'
    )
  }
})

  });
});
</script>

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
    function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  }
</script>
</html>


