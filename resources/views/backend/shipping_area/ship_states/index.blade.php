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
                                <h6 class="m-0 font-weight-bold text-primary pr-2 pt-1">States List</h6>
                                <span class="badge badge-success rounded-pill" style="font-size: 18px;">
                                    {{ count($states) }} </span>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th width="5%">Sl</th>
                                                <th width="10%">Division Name</th>
                                                <th width="10%">District Name</th>
                                                <th width="10%">States Name</th>
                                                <th width="15%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($states as $key => $item)
                                                <tr>
                                                    <td> {{ $key + 1 }} </td>
                                                    <td>{{ $item->division->division_name ?? 'NULL' }}</td>
                                                    <td>{{ $item->district->district_name ?? 'NULL' }}</td>
                                                    <td>{{ $item->state_name ?? 'NULL' }}</td>

                                                    <td>
                                                        <a href="{{ route('states.edit', $item->id) }}"
                                                            class="btn btn-primary btn-sm"><i id="#Modal{{ $item->id }}"
                                                                class="fas fa-edit"></i></a>

                                                        <a href="{{ route('states.delete', $item->id) }}"class="btn btn-danger btn-sm"
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
                        <form method="post" action="{{ route('states.store') }}">
                            @csrf
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>State Create</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="shipdivision_id">Select Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <select name="shipdivision_id" required="" class="form-control"
                                            aria-invalid="false">
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('shipdivision_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="shipdistrict_id">Select District Name (English): <span
                                                class="text-danger">*</span></label>
                                        <select name="shipdistrict_id" required="" class="form-control"
                                            aria-invalid="false">
                                            <option value="" selected="" disabled="">Select District</option>
                                        </select>
                                        @error('shipdistrict_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="state_name">State Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="state_name" value="" id="state_name"
                                            class="form-control" placeholder="Write state name">
                                        @error('state_name')
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
    <!-- Category Ajax -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="shipdivision_id"]').on('change', function() {
                var shipdivision_id = $(this).val();
                if (shipdivision_id) {
                    console.log(shipdivision_id);
                    $.ajax({
                        url: "{{ url('/admin/state/division/ajax') }}/" + shipdivision_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            var d = $('select[name="shipdistrict_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="shipdistrict_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .district_name + '</option>');
                            });
                        },
                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>
@endsection
