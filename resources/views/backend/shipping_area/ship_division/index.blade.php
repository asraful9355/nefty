@extends('layouts.app2')
@section('admin')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3 d-flex">
                                <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">Division List</h6>
                                <span class="badge badge-success rounded-pill" style="font-size: 18px;">
                                    {{ count($divisions) }} </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">Sl</th>
                                                <th width="10%">Division Name</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($divisions as $key => $item)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>{{ $item->division_name ?? 'NULL' }}</td>

                                                    <td>
                                                        <a href="{{ route('division.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm"><i id="#Modal{{ $item->id }}" class="fas fa-edit"></i></a>

                                                        <a href="{{ route('division.delete', $item->id) }}"class="btn btn-danger btn-sm"
                                                            title="Delete Data" id="delete"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <form method="post" action="{{ route('division.store') }}">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Division Create</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="division_name">Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="division_name" value=""
                                            id="division_name" class="form-control"
                                            placeholder="Write division name">
                                        @error('division_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-success" type="submit">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
@endsection
