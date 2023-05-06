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
          <a href="{{ route('blog.index') }}" class="btn btn-primary"><i class="fas fa-list" aria-hidden="true"></i> All blog </a>
        </h1>
         <!-- DataTales Example -->
        <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Blog Details</h6>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered">
             <tr>
                <td>Blog  Title En</td>
                <td>{{ $blog->blog_title_en }}</td>
             </tr>
             <tr>
                <td>Blog  Title Bn</td>
                <td>{{ $blog->blog_title_bn }}</td>
             </tr>
             <tr>
                <td>blog Image</td>
                <td><img src="{{ asset($blog->blog_image) }}" alt="" style="height:70px; width:80px;"></td>
             </tr>
             <tr>
                <td>Description (English):</td>
                <td>{!! Str::limit($blog->blog_description_en, 600) !!}</td>
             </tr>
             <tr>
                <td>Description (Bangla):</td>
                <td>{!! Str::limit($blog->blog_description_bn, 1100) !!}</td>
             </tr>
             <td>Status</td>
                <td>
                    @if ($blog->status == 1)
                    <span class="badge badge-success">Active</span>
                    @else
                    <span class="badge badge-danger">Disable</span>
                    @endif

                </td>
             </tr>
          </table>
       </div>
    </div>
 </div>
 </div>
      <!-- /.container-fluid -->
   </div>
   <!-- End of Main Content -->
</div>
@endsection
