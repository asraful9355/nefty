@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Password</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Password</li>
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
                                    @include('frontend.common.usersidebar')
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="card shadow-none mb-0">
                                    <div class="card-body">
                                        <form action="{{  route('user.update.password') }}" method="post">
                                           @csrf
                                           @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                               {{session('status')}}
                                            </div>
                                            @elseif(session('error'))
                                            <div class="alert alert-danger" role="alert">
                                               {{session('error')}}
                                            </div>
                                            @endif
                                            <div class="col-12">
                                                <label class="form-label" for="oldpassword">Current Password</label>
                                                <input type="password" class="form-control @error('old_password') is-invalid @enderror"  id="oldpassword" name="old_password" value="">
                                                @error('old_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label" for="newpassword">New Password</label>
                                                <input type="password" class="form-control @error('new_password') is-invalid @enderror"  name="new_password" id="newpassword">
                                                @error('new_password')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12 mt-2">
                                                <label class="form-label" for="confirm_password">Confirm New Password</label>
                                                <input type="password" class="form-control" name="confirm_password " id="confirm_password">
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-light btn-ecomm mt-2">Save Changes</button>
                                            </div>
                                        </form>
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
