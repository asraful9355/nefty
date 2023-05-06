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
        <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
       <h6 class="m-0 font-weight-bold text-primary">Pages Details</h6>
    </div>
    <div class="card-body">
       <div class="table-responsive">
          <table class="table table-bordered">
             <tr>
                <td>Title</td>
                <td>{{ $page->title }}</td>
             </tr>
             <tr>
                <td>Name En</td>
                <td>{{ $page->name_en }}</td>
             </tr>
             <tr>
                <td>Name Bn</td>
                <td>{{ $page->name_bn }}</td>
             </tr>
             <tr>
                <td>Description En</td>
                <td>{!! $page->description_en !!}</td>
             </tr>
             <tr>
                <td>Description Bn</td>
                <td>{!! $page->description_bn !!}</td>
             </tr>
             <tr>
                <td>Position</td>
                <td>
                    @if($page->position ==1)
                    nav
                  @else

                  @endif
                  @if($page->position ==2)
                   Both
                  @else

                  @endif
                  @if($page->position ==3)
                  Bottom
                  @else

                  @endif
                 </td>



             </tr>

             <td>Status</td>
                <td>
                    @if ($page->status == 1)
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
