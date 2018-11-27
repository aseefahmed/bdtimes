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
<form class="form-horizontal form-stripe" id="uploadForm">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-8">
			<h4 class="section-subtitle"><b>ADD</b> IMAGE</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-12">
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Title</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="title" placeholder="News Title" required>
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">Shape</label>
								  <div class="col-sm-9">
										<select name="file_type" class="form-control select2-tags" style="width: 100%">
											
											@foreach($file_types as $file)
												<option value="{{ $file->shape }}">{{ $file->shape }} </option>
											@endforeach
												
											
										</select>
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">External Link</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="external_link" placeholder="Email">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Image</label>
								  <div class="col-sm-9">
									  <input type="file" class="form-control fileinput" name="featured_image" placeholder="Email">
								  </div>
							  </div>
							  
						   </form>
							<div class="col-sm-12 text-center" style="margin-top:15px">
								<a class="btn btn-success uploadImage">Upload</a>
								<img src="{{ asset('public/images/pie.gif') }}" height="30px" id="ajax_loading" style="display: none;">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-12 col-md-4">
			<h4 class="section-subtitle"><b>&nbsp;</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
					<label for="righticon" class="col-sm-12 control-label text-left"><code>Latest Uploads</code></label>
						<div class="col-sm-12">
							<table class="table table-striped responsive-table" id="responsive-table">
							  <thead>
								<tr>
								  <th>Image </th>
								  <th>Title </th>
								</tr>
							  </thead>
							  <tbody>
							  @if(count($images) == 0)
								  <td>No data available.</td>
							  @endif
							  
							  @foreach($images as $image)
							  <tr>
								<td width="8%"><img src="{{ asset('public/images/assets/'.$image->file_name)}}" height="40px"></td>
								
								<td><a href="{{ url('media/view/'.$image->id) }}">{{ $image->title }}</a></td>
							  </tr>
							  @endforeach
								</tbody>
							  
							</table>
						</div>
						
						
						

					</div>
				</div>
			</div>
		</div>
		
</div>
</form>

@endsection