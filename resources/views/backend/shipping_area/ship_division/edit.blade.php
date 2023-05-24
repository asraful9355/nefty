@extends('layouts.app2')
@section('admin')

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <form method="post" action="{{ route('division.update', $division->id) }}">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">

                                    <div class="d-flex justify-content-between">
                                        <div class="p-2 "><h4>Division Edit</h4></div>
                                        <div class="p-2 ">
                                            <a class="btn btn-success" href="{{ route('viewDivision') }}">All List</a>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="division_name">Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="division_name" value="{{ $division->division_name }}"
                                            class="form-control" value="">
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
