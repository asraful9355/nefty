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
          <a href="{{ route('campaing.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> Campaign List </a>
        </h1>
         <!-- DataTales Example -->
         <div class="row">
            <form method="post" action="{{ route('campaing.store') }}" enctype="multipart/form-data">
              @csrf
               <div class="col-md-10 offset-1">
                  <div class="card shadow mb-4">
                     <div class="card-body">
                        <h4>Campaign Create</h4>
                        <hr>
                        <div class="row">
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="name_en">Name (English): <span class="text-danger">*</span></label>
                                <input type="text" name="name_en" value="" id="name_en" class="form-control" placeholder="Write campaing name english">
                                @error('name_en')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                <label for="name_bn">Name (Bangla): <span class="text-danger">*</span></label>
                                <input type="text" name="name_bn" value="" id="name_bn" class="form-control" placeholder="Write campaing name bangla">
                                @error('name_bn')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                              </div>
                           </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="text" style="font-weight: bold;">Date:</label>
                                <input type="text" name="date_range" class="form-control" placeholder="Select date" id="date" value="">
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="products" class="col-form-label" style="font-weight: bold;">Products:</label>
                                <div class="custom_select cit-multi-select">
                                  <select name="products[]" class="form-control select-active w-100 form-select select2"  id="products" multiple="multiple" data-placeholder="Choose Product">
                                    @foreach(\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                      <option value="{{$product->id}}">{{ $product->name_en }}</option>
                                    @endforeach
                                  </select>
                                </div>
                              </div>
                            </div>

                            <!-- start ajax product show -->
                            <div class="col-md-12">
                              <div class="form-group" id="discount_table">

                              </div>
                            </div>
                            <!-- end ajax product show -->

                            <div class="col-md-12">
                              <div class="form-group">
                                  <img src="" class="p-2" id="mainThmb"><br>
                                  <label for="image" class="col-form-label" style="font-weight: bold;">Campaign Photo:</label>
                                  <input name="campaing_image" class="form-control" type="file" required="" id="image" onChange="mainThamUrl(this)">
                                  @error('campaing_image')
                                        <p class="text-danger">{{$message}}</p>
                                  @enderror
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <div class="form-check">
                                  <input class="form-check-input" name="is_featured" type="checkbox" value="1" id="defaultCheck1">
                                  <label class="form-check-label" for="defaultCheck1" style="font-weight: bold; cursor: pointer;">
                                    Is Features
                                  </label>
                                </div>
                              </div>
                            </div>

                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for="status">Status</label>
                                   <span class="text-danger">*</span>
                                  <select name="status" id="status" class="form-control">
                                      <option value="1">Active</option>
                                      <option value="0">Disable</option>
                                  </select>
                              </div>
                           </div>
                           <div class="col-md-12 text-right">
                              <div class="form-group">
                                <button class="btn btn-success" type="submit">Save</button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection


@push('footer-script')

<script type="text/javascript">
    $(document).ready(function(){
        $('#products').on('change', function(){
            var product_ids = $('#products').val();
            if(product_ids.length > 0){
                $.post('{{ route('flash_deals.product_discount') }}', {_token:'{{ csrf_token() }}', product_ids:product_ids}, function(data){
                    $('#discount_table').html(data);
                    
                });
            }
            else{
                $('#discount_table').html(null);
            }
        });
    });
</script>

<script>
  $(function() {

  $('input[name="date_range"]').daterangepicker({
      timePicker: true,
      startDate: moment().startOf('hour'),
      endDate: moment().startOf('hour').add(32, 'hour'),
      locale: {
        format: 'DD-MM-Y HH:mm:ss'
      }
  });

   
  });
</script>

<script type="text/javascript">
  function mainThamUrl(input){
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function(e){
        $('#mainThmb').attr('src',e.target.result).width(100).height(80);
      };
      reader.readAsDataURL(input.files[0]);
    }
  } 
</script>
@endpush
