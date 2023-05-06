@extends('layouts.app2')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content-wrapper">
    <!-- Main content -->
 	<div class="content">
    	<div class="container-fluied">
    		<div class="row mb-2 mt-3 p-2">
	          <div class="col-sm-6">
	            <h1>Seo</h1>
	          </div>
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="#">Home</a></li>
	              <li class="breadcrumb-item active">Seo</li>
	            </ol>
	          </div>
	        </div>
    		<div class="row mt-3">
       			<div class="col-12">
				    <div class="">
				    	<form method="post" action="{{ route('seo.update') }}" enctype="multipart/form-data">
					    	@csrf
					    	<input type="hidden" name="id" value="{{ $seo->id }}">
						    <div class="row">
					            <div class="col-md-12">
									<div class="card card-primary card-outline shadow">
										<div class="card-header">
											<h3>Seo Settings</h3>
										</div>
								        <div class="card-body">
					                    	<div class="row">
					                    		<div class="col-sm-12 mb-3">
						                           <label for="meta_title" class="col-form-label" style="font-weight: bold;">Meta Title :</label>
						                            <input class="form-control" type="text" name="meta_title" id="meta_title" placeholder="Write Meta Title " value="{{ $seo->meta_title }}">
						                            @error('meta_title')
						                                <p class="text-danger">{{$message}}</p>
						                            @enderror
						                        </div>

						                        <div class="col-sm-6 mb-3">
						                           <label for="meta_author" class="col-form-label" style="font-weight: bold;">Meta Author :</label>
						                            <input class="form-control" type="text" name="meta_author" id="meta_author" placeholder="Write meta author" value="{{ $seo->meta_author }}">
						                            @error('meta_author')
						                                <p class="text-danger">{{$message}}</p>
						                            @enderror
						                        </div>

						                        <div class="col-sm-6 mb-3">
						                           <label for="meta_keyword" class="col-form-label" style="font-weight: bold;">Meta Keyword :</label>
						                            <input class="form-control" type="text" name="meta_keyword" id="meta_keyword" placeholder="Write meta keyword" value="{{ $seo->meta_keyword }}">
						                            @error('meta_keyword')
						                                <p class="text-danger">{{$message}}</p>
						                            @enderror
						                        </div>
						                        <div class="col-sm-12 mb-3">
							                        <div class="form-group">
				                                        <label for="meta_description" class="">Meta Description:</label>
				                                        <textarea name="meta_description" id="meta_description" class="form-control
				                                        " cols="10" rows="5" class="form-control" >{{ $seo->meta_description }}</textarea>
				                                        @error('meta_description')
				                                        <p class="text-danger">{{ $message }}</p>
				                                        @enderror
				                                    </div>
			                                	</div>
			                                    <div class="col-sm-12 mb-3">
				                                    <div class="form-group">
				                                        <label for="google_analytics" class="">Google Analytics:</label>
				                                        <textarea name="google_analytics" id="google_analytics" class="form-control" cols="10" rows="5" >{{ $seo->google_analytics }}</textarea>
				                                        @error('google_analytics')
				                                        <p class="text-danger">{{ $message }}</p>
				                                        @enderror
				                                    </div>
			                                	</div>
					                    	</div>
								        </div>
								        <!-- card body .// -->
								    </div>
								    <!-- card .// --> 
								</div>
							</div>
							<div class="row mb-4 justify-content-sm-end mr-4">
								<input type="submit" class="btn btn-primary" value="Update">
							</div>
						</form>
						<!-- .row // --> 
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
    