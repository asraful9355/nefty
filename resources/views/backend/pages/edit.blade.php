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
      <a href="{{ route('pages.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All Pages </a>
   </h1>
   <!-- DataTales Example -->
   <div class="row">
      <form method="post" action="{{ route('pages.update',$page->id) }}">
         @csrf
         <div class="col-md-10 offset-1">
            <div class="card shadow mb-4">
               <div class="card-body">
                  <h4>Pages Edit</h4>
                  <hr>
                  <div class="row">
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="name_en">Pages Name (English): <span class="text-danger">*</span></label>
                           <input type="text" name="name_en" value="{{ $page->name_en }}" id="name_en" class="form-control" placeholder="Write name english">
                           @error('name_en')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="name_bn">Pages Name (Bangla): <span class="text-danger">*</span></label>
                           <input type="text" name="name_bn" value="{{ $page->name_bn }}" id="name_bn" class="form-control" placeholder="Write name bangla">
                           @error('name_bn')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="title">Title Name<span class="text-danger">*</span></label>
                           <input type="text" name="title" value="{{ $page->title }}" id="title" class="form-control" placeholder="Write Title ">
                           @error('title')
                           <span class="text-danger">{{ $message }}</span>
                           @enderror
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="description_en">Description (English):
                           <span class="text-danger">*</span>
                           </label>
                           <textarea class="summernote" id="description_en" name="description_en">{{ $page->description_en }}</textarea>
                        </div>
                        @error('description_en')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                     </div>

                     <div class="col-md-12">
                        <div class="form-group">
                           <label for="description_bn">Description (Bangla):
                           <span class="text-danger">*</span>
                           </label>
                           <textarea class="summernote" id="description_bn" name="description_bn">{{ $page->description_bn }}</textarea>
                        </div>
                     <div class="col-md-12">
                        <div class="form-group">
                            <label for="position" class="col-form-label" style="font-weight: bold;"> Position:</label>
                           <div class="custom_select">
                              <select class="form-control select-active w-100 form-select select-nice" name="position">
                                @if ($page->position == 1)
                                <option value="1" selected>Nav</option>
                                <option value="2">Bottom</option>
                                <option value="3">Both</option>
                                @endif
                                @if ($page->position == 2)
                                <option value="2">Bottom</option>
                                <option value="1">Nav</option>
                                <option value="3" selected>Both</option>
                                @endif

                                @if ($page->position == 3)
                                <option value="3">Both</option>
                                <option value="2" selected>Bottom</option>
                                <option value="1">Nav</option>
                                @endif
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-12">
                              <div class="form-group">
                                 <label for="status">Status</label>
                                 <select name="status" id="status" class="form-control">
                                    @if ($page->status == 1)
                                    <option value="1" selected>Active</option>
                                    <option value="0">Disable</option>
                                    @else
                                    <option value="1" >Active</option>
                                    <option value="0" selected>Disable</option>
                                    @endif

                                </select>
                              </div>
                           </div>
                           <div class="col-md-12 text-right">
                              <div class="form-group">
                                 <button class="btn btn-success" type="submit">Update</button>
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
