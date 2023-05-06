@extends('layouts.frontend')
@section('content-frontend')
<div class="page-wrapper">
    <div class="page-content">
        <!--start breadcrumb-->
        <section class="py-3 border-bottom d-none d-md-flex">
            <div class="container">
                <div class="page-breadcrumb d-flex align-items-center">
                    <h3 class="breadcrumb-title pe-3">My Address</h3>
                    <div class="ms-auto">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('dashboard') }}:;"><i class="bx bx-home-alt"></i> Home</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">My Address</li>
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
                                        <a data-bs-toggle="modal" data-bs-target="#address" class="btn btn-success btn-sm" style="float: right;">Create New Address</a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="address" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header bg-primary">
                                                <h5 class="modal-title" id="staticBackdropLabel">Create New Address</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                                <form method="post" action="#">
                                                    @csrf
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="form-group col-lg-6">
                                                                <label for="division_id" class="fw-bold text-black col-form-label">
                                                                    Division <span class="text-danger">***</span></label>
                                                                <select class="form-select" aria-label="Default select example"  name="division_id" id="division_id" required>
                                                                    <option selected>Select Division</option>
                                                                    <option>Dhaka</option>
                                                                    <option>Dhaka</option>
                                                                    <option>Dhaka</option>
                                                                    <option>Dhaka</option>
                                                                </select>
                                                                @error('division_id')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="district_id" class="fw-bold text-black col-form-label">
                                                                   District <span class="text-danger">***</span></label>
                                                                <select class="form-select" aria-label="Default select example"  name="district_id" id="district_id" required>
                                                                    <option selected=""  value="">Select District</option>
                                                                </select>
                                                                @error('district_id')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="upazilla_id" class="fw-bold text-black col-form-label">
                                                                    Upazilla <span class="text-danger">***</span></label>
                                                                <select class="form-select" aria-label="Default select example"  name="upazilla_id" id="upazilla_id" required>
                                                                    <option selected=""  value="">Select Upazilla</option>
                                                                </select>
                                                                @error('upazilla_id')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group col-lg-6">
                                                                <label for="address" class="fw-bold text-black col-form-label">Address <span class="text-danger">***</span></label>
                                                                <textarea class="form-control" name="address" id="address" required placeholder="Address"></textarea>
                                                                @error('address')
                                                                    <span>{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" id="md_checkbox_29" class="form-check-input cursor" name="is_default" value="0">
                                                                <label for="md_checkbox_29" class="form-check-label cursor" style="  cursor: pointer; font-weight: bold; padding-left: 8px;"> Is Default</label>
                                                            </div>
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked value="1">
                                                                <label style="cursor: pointer;" class="form-check-label cursor" for="status">Status</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                          </div>
                                        </div>
                                        <h3 class="mb-3">Billing Address</h3>
                                        <div class="row mt-3">
                                            <div class="col-lg-6 mb-3">
                                                <div class="card mb-lg-0 position-relative">
                                                    <div class="card-body">
                                                        <p class="bg-danger" style="position:absolute;bottom: 7px;right: 11px;padding: 4px 10px;font-weight: 600;font-size: 14px;color: #fff;border-radius: 20px;">Default</p>
                                                        <div class="dropdown" style="float: right; position: absolute;top: 9px;right: 17px;">
                                                            <a href="#" data-bs-toggle="dropdown" class="text-white rounded btn-sm font-sm" style="background-color:#3bb77e"> <i class="material-icons md-more_horiz"></i>:</a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Make This Default</a>
                                                                <a class="dropdown-item text-danger" href="#" id="delete">Delete</a>
                                                            </div>
                                                        </div>
                                                        <address>
                                                           Address 1
                                                        </address>
                                                        <p>
                                                           Uttora
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="card mb-lg-0 position-relative">
                                                    <div class="card-body">
                                                        <p class="bg-danger" style="position:absolute;bottom: 7px;right: 11px;padding: 4px 10px;font-weight: 600;font-size: 14px;color: #fff;border-radius: 20px;">Make Default</p>
                                                        <div class="dropdown" style="float: right; position: absolute;top: 9px;right: 17px;">
                                                            <a href="#" data-bs-toggle="dropdown" class="text-white rounded btn-sm font-sm" style="background-color:#3bb77e"> <i class="material-icons md-more_horiz"></i>:</a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Make This Default</a>
                                                                <a class="dropdown-item text-danger" href="#" id="delete">Delete</a>
                                                            </div>
                                                        </div>
                                                        <address>
                                                           Address 1
                                                        </address>
                                                        <p>
                                                           Uttora
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="card mb-lg-0 position-relative">
                                                    <div class="card-body">
                                                        <p class="bg-danger" style="position:absolute;bottom: 7px;right: 11px;padding: 4px 10px;font-weight: 600;font-size: 14px;color: #fff;border-radius: 20px;">Make Default</p>
                                                        <div class="dropdown" style="float: right; position: absolute;top: 9px;right: 17px;">
                                                            <a href="#" data-bs-toggle="dropdown" class="text-white rounded btn-sm font-sm" style="background-color:#3bb77e"> <i class="material-icons md-more_horiz"></i>:</a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Make This Default</a>
                                                                <a class="dropdown-item text-danger" href="#" id="delete">Delete</a>
                                                            </div>
                                                        </div>
                                                        <address>
                                                           Address 1
                                                        </address>
                                                        <p>
                                                           Uttora
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 mb-3">
                                                <div class="card mb-lg-0 position-relative">
                                                    <div class="card-body">
                                                        <p class="bg-danger" style="position:absolute;bottom: 7px;right: 11px;padding: 4px 10px;font-weight: 600;font-size: 14px;color: #fff;border-radius: 20px;">Default</p>
                                                        <div class="dropdown" style="float: right; position: absolute;top: 9px;right: 17px;">
                                                            <a href="#" data-bs-toggle="dropdown" class="text-white rounded btn-sm font-sm" style="background-color:#3bb77e"> <i class="material-icons md-more_horiz"></i>:</a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="#">Make This Default</a>
                                                                <a class="dropdown-item text-danger" href="#" id="delete">Delete</a>
                                                            </div>
                                                        </div>
                                                        <address>
                                                           Address 1
                                                        </address>
                                                        <p>
                                                           Uttora
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
