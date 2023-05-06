@extends('layouts.app2')
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 text-right">
          <a href="{{ route('supplier.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Suppliers </a>
        </h1>
         <!-- DataTales Example -->
          <div class="row justify-content-center">
            <div class="col-sm-8">
              <div class="card">
                  <div class="card-body">
                      <div class="row">
                          <div class="col-md-12">
                            <form method="post" action="{{ route('supplier.store') }}" > @csrf
                              <div class="mb-4">
                                <label for="name" class="col-form-label col-md-4" style="font-weight: bold;">Supplier Name:</label>
                                  <input class="form-control" id="name" type="text" name="name" placeholder="Write supplier name" required="" value="">
                              </div>

                              <div class="mb-4">
                                <label for="phone" class="col-form-label col-md-4" style="font-weight: bold;">Supplier Phone:</label>
                                  <input class="form-control" id="phone" type="text" name="phone" placeholder="Write supplier phone number" required="" value="">
                              </div>

                                <div class="mb-4">
                                  <label for="email" class="col-form-label col-md-4" style="font-weight: bold;">Supplier Email:</label>
                                    <input class="form-control" id="email" type="email" name="email" placeholder="Write supplier email address" required="" value="">
                                </div>

                                <div class="mb-4">
                                  <label for="address" class="col-form-label col-md-4" style="font-weight: bold;">Supplier Address :</label>
                                    <textarea name="address" id="address" cols="5" placeholder="Write supplier address " class="form-control "></textarea>
                                </div>

                                

                                <div class="mb-4">
                                  <div class="custom-control custom-switch">
                                      <input type="checkbox" class="form-check-input me-2 cursor" name="status" id="status" checked="" value="1">
                                      <label class="form-check-label cursor" for="status">Status</label>
                                  </div>
                                </div>

                                <div class="row mb-4 justify-content-sm-end">
                                  <div class="col-lg-3 col-md-4 col-sm-5 col-6">
                                     <input type="submit" class="btn btn-primary" value="Submit">
                                  </div>
                                </div>
                              </form>
                          </div>
                      </div>
                      <!-- .row // -->
                  </div>
                  <!-- card body .// -->
              </div>
              <!-- card .// -->
            </div>
          </div>




      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
