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
                                <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">District List</h6>
                                <span class="badge badge-success rounded-pill" style="font-size: 18px;">
                                    {{ count($districts) }} </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">Sl</th>
                                                <th width="10%">Division Name</th>
                                                <th width="10%">District Name</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($districts as $key => $item)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>{{ $item->division->division_name ?? 'NULL' }}</td>
                                                    <td>{{ $item->district_name ?? 'NULL' }}</td>

                                                    <td>
                                                        <a href="{{ route('districts.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm"><i
                                                                class="fas fa-edit"></i></a>

                                                        <a href="{{ route('districts.delete', $item->id) }}" class="btn btn-danger btn-sm"
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
                        <form method="post" action="{{ route('districts.store') }}">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>District Create</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="shipdivision_id">Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <select name="shipdivision_id" required="" class="form-control"
                                            aria-invalid="false">
                                            @foreach ($divisions as $division)
                                            <option disabled selected > select division</option>
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('shipdivision_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="district_name">Ruhul District Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="district_name" value="" id="district_name"
                                            class="form-control" placeholder="Write division name">
                                        @error('district_name')
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
