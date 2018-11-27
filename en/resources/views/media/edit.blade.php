@extends('layouts.admin.dashboard')

@section('css_block')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/froala-editor/2.6.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('public/plugins/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('js_block')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	<script src="//cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	<script src="{{ asset('public/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>

@endsection

@section('content')
<form class="form-horizontal form-stripe" id="editAssetForm">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	<input type="hidden" name="news_id" value="{{ $image[0]->id }}">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-8">
			<h4 class="section-subtitle"><b>Media</b> Details</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-12">
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Title</label>
								  <div class="col-sm-9">
								  <input type="text" class="form-control" name="title" placeholder="Name" value="{{ $image[0]->title }}">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">Shape</label>
								  <div class="col-sm-9">
										<select name="file_type" class="form-control select2-tags" style="width: 100%">
											
											@foreach($file_types as $file)
												<option <?php if($file->shape == $image[0]->file_type){echo "selected";}?> value="{{ $file->shape }}">{{ $file->shape }} </option>
											@endforeach
												
											
										</select>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">External Link</label>
								  <div class="col-sm-9">
								  <input type="text" class="form-control" name="external_link" placeholder="Name" value="{{ $image[0]->external_link }}">
								  </div>
							  </div>
							  
							  
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Featured Image</label>
								  <div class="col-sm-9">
									  <input type="file" class="form-control fileinput" name="featured_image" placeholder="Email">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">&nbsp;</label>
								  <div class="col-sm-9">
									<a class="btn btn-success" id="updateAssetBtn" asset_id="{{ $image[0]->id }}">Update</a>
								<img src="{{ asset('public/images/pie.gif') }}" height="30px" id="ajax_loading" style="display: none;">
									
								
								  </div>
							  </div>
							  
						   </form>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<a class="btn btn-success btn-block" href="{{ url('media/view/'.$image[0]->id) }}">View Detail</a>
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