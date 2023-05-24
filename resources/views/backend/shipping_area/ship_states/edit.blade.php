@extends('layouts.app2')
@section('admin')
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                <form method="post" action="{{ route('states.update', $state->id) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Select Shipping Area</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label for="shipdivision_id">Select Division Name (English): <span
                                                class="text-danger">*</span></label>
                                        <select name="shipdivision_id" required="" class="form-control"
                                            aria-invalid="false">
                                            @foreach ($divisions as $division)
                                                <option value="{{ $division->id }}" {{ $division->id ==  $state->shipdivision_id ? 'selected' : '' }}>{{ $division->division_name }}</option>
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
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div class="p-2 ">
                                            <h4>State Edit</h4>
                                        </div>
                                        <div class="p-2 ">
                                            <a class="btn btn-success" href="{{ route('viewStates') }}">All List</a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group">
                                        <label for="state_name">States Name (English): <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="state_name" value="{{ $state->state_name }}"
                                            class="form-control" value="">
                                        @error('state_name')
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

    <!-- Category Ajax -->
<script type="text/javascript">
	$(document).ready(function() {
		$('select[name="shipdivision_id"]').on('change', function(){
			var shipdivision_id = $(this).val();
			if(shipdivision_id) {
                console.log(shipdivision_id);
				$.ajax({
					url: "{{  url('/admin/state/division/ajax') }}/"+shipdivision_id,
					type:"GET",
					dataType:"json",
					success:function(data) {
					var d =$('select[name="shipdistrict_id"]').empty();
						$.each(data, function(key, value){
							$('select[name="shipdistrict_id"]').append('<option value="'+ value.id +'">' + value.district_name + '</option>');
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
