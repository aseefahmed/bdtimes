@extends('layouts.admin.dashboard')
@section('content')
<form class="form-horizontal form-stripe" id="addNewsForm">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-8">
			<h4 class="section-subtitle"><b>News</b> Details</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-12">
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">News Title</label>
								  <div class="col-sm-9">
								  {{ $image[0]->title }}
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Shape</label>
								  <div class="col-sm-9">
								  <div class="code">{{ $image[0]->file_type }}</div>
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">External Link</label>
								  <div class="col-sm-9">
									<a href="{{ $image[0]->external_link }}" target="_blank">{{ $image[0]->external_link }}</a>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Created At</label>
								  <div class="col-sm-9">
								  {{ date_format(date_create($image[0]->created_at), 'g:s A, dS M, Y') }}
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Last Modified At</label>
								  <div class="col-sm-9">
								  {{ date_format(date_create($image[0]->updated_at), 'g:s A, dS M, Y') }}
								  </div>
							  </div>
							  
						   </form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<a class="btn btn-success btn-block" href="{{ url('media/edit/'.$image[0]->id) }}">Modify This File</a>
			<div class="panel b-primary bt-sm ">
                <div class="panel-header">
                    <h5 class="panel-title">Featured Image</h5>
                </div>
            </div>
			<div class="text-center">
			 
						<a href="{{ asset('public/images/assets/'.$image[0]->file_name) }}" target="_blank"><img class="img1 text-center col-md-12" src="{{ asset('public/images/assets/'.$image[0]->file_name) }}"></a>
				   
			</div>
		</div>
</div>
</form>
@endsection