@extends('layouts.app2')
@section('slider_create') active @endsection
@section('admin')
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
   <!-- Main Content -->
   <div id="content">
      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h3>Attribute Show</h3>
        <h1 class="h3 mb-4 text-gray-800 text-right">
            <a href="{{ route('attribute.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Attribute List </a>
        </h1>
        <!-- DataTales Example -->
        <section class="content-main">
            <div class="row">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="text-white">Attribute Edit</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('attribute.update',$attribute->id) }}" enctype="multipart/form-data">
                              @csrf
                                @method('PUT')
                                <div class="mb-4">
                                    <label for="name" class="col-form-label col-md-2" style="font-weight: bold;"> Name:</label>
                                    <input class="form-control" id="name" type="text" name="name" placeholder="Write attribute name" value="{{$attribute->name}}">
                                    @error('name')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="row mb-4 justify-content-end">
                                  <div class="col-sm-12 col-12">
                                    <input type="submit" name="" class="btn btn-primary" value="Update">
                                  </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- card end// -->
                </div>
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h4 class="text-white">Value Create</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('attribute.value_store') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="attribute_id" value="{{$attribute->id}}">

                                <div class="mb-4">
                                    <label for="value" class="col-form-label" style="font-weight: bold;"> Value:</label>
                                    <input class="form-control" id="value" type="text" name="value" placeholder="Write attribute value" value="{{old('value')}}">
                                    @error('value')
                                        <p class="text-danger">{{$message}}</p>
                                    @enderror
                                </div>

                                  <div class="row mb-4 justify-content-end">
                                    <div class="col-sm-12 col-12">
                                      <input type="submit" name="" class="btn btn-primary" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- card end// -->
                </div>
            </div>
        </section>
        <section>
          <div class="content-main">
              <div class="row">
                  <div class="col-md-12 col-9">
                      <div class="content-header mb-0">
                          <h2 class="content-title">Attribute Value List</h2>
                      </div>
                  </div>
              </div>
          </div>
        </section>
        <section class="content-main table-content">
          <div class="card mb-4 col-12 mx-auto">
              <!-- card-header end// -->
              <div class="card-body">
                  <div class="table-responsive-sm">
                      <div class="table-responsive">
                      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                         <thead>
                            <tr>
                               <th width="5%">Sl</th>
                               <th width="10%">Value</th>
                               <th width="10%">Status</th>
                               <th width="15%">Action</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($values as $key => $value)
                              <tr>
                                  <td> {{ $key+1}} </td>
                                  <td> {{ $value->value ?? 'NULL' }} </td>
                                  <td>
                                      @if($value->status == 1)
                                        <a href="{{ route('attribute_value.active',$value->id) }}">
                                          <span class="badge badge-success">Active</span></a> 
                                      @endif
                                  </td>
                                  <td class="text-end">
                                      <a class="btn btn-primary  btn-sm" data-toggle="modal" data-target="#value{{ $value->id }}"><i class="fas fa-edit"></i></a>

                                      <!-- Modal -->
                                      <div class="modal fade" id="value{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Value Update</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <form method="post" action="{{ route('attribute_value.update', $value->id) }}" enctype="multipart/form-data">
                                            @csrf
                                              <div class="modal-body">
                                                <h4 class="text-white">Value Create</h4>
                                                <input type="hidden" name="attribute_id" value="{{$attribute->id}}">
                                                <div class="form-group">
                                                    <label for="value" class="col-form-label" style="font-weight: bold;"> Value:</label>
                                                    <input class="form-control" id="value" type="text" name="value" placeholder="Write attribute value" value="{{ $value->value }}">
                                                    @error('value')
                                                        <p class="text-danger">{{$message}}</p>
                                                    @enderror
                                                </div>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </form>
                                          </div>
                                        </div>
                                      </div>

                                      <a class="btn btn-danger btn-sm" href="{{ route('attribute_value.delete',$value->id) }}" id="delete"><i class="fa fa-trash"></i></a>

                                  </td>
                                  
                              </tr>
                            @endforeach
                         </tbody>
                      </table>
                   </div>
                  </div>
                  <!-- table-responsive //end -->
              </div>
              <!-- card-body end// -->
          </div>
          <!-- card end// -->
        </section>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
