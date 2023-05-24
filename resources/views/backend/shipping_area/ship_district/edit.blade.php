@extends('layouts.app2')
@section('admin')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <form method="post" action="{{ route('districts.update', $district->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Division Select</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="shipdivision_id">Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <select name="shipdivision_id" required="" class="form-control"
                                            aria-invalid="false">
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $division->id ==  $district->shipdivision_id ? 'selected' : '' }}>{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('shipdivision_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="p-2 ">
                                            <h4>District Edit</h4>
                                        </div>
                                        <div class="p-2 ">
                                            <a class="btn btn-success" href="{{ route('viewDistricts') }}">All List</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="district_name">District Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="district_name" value="{{ $district->district_name }}"
                                            class="form-control" value="">
                                        @error('district_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </div>
                </form>


            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
    </div>
@endsection
