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
    <script src="{{ asset('public/plugins/ckeditor/ckeditor.js')}}"></script>
	<script src="{{ asset('public/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>

@endsection

@section('content')
<form class="form-horizontal form-stripe" id="addNewsForm" method="POST">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-8">
			<h4 class="section-subtitle"><b>ADD</b> NEWS</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-12">
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">News Title</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="news_title" id="news_title" placeholder="News Title">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Sub Title</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="sub_title" placeholder="News Sub Title">
								  </div>
							  </div>
							  <?php 
								$my_categories = findMyCategories(Auth::user()->id);
							  ?>
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">Category</label>
								  <div class="col-sm-9">
										<select <?php if(Auth::user()->role == 4){echo "readonly";}?> class="form-control select2js" id="main_category" style="width: 100%" name="categories" id="categories">
										  <option value="0">Chose Category</option>
										  @foreach($categories as $category)
											<option value="{{ $category->id }}">{{ $category->category_name }} <?php if($category->label!=""){echo "(".$category->label.")";}?></option>
										  @endforeach
										  @if(Auth::user()->role == 4)
											<option value="101" selected>Visitor Section</option>
										  @endif
										</select>
								  </div>
							  </div>
							  <div class="form-group" style="display: none" id="sub_cat">
								  
							  </div>
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">Meta Keywords</label>
								  <div class="col-sm-9">
										<select name="tags[]" class="form-control select2-tags" multiple="multiple" style="width: 100%">
											
											@foreach($tags as $tag)
												<option value="{{ $tag->tag_name }}">{{ $tag->tag_name }} </option>
											@endforeach
												
											
										</select>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Meta Description</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="meta_desc" placeholder="Meta Description">
								  </div>
							  </div>
							  
							  
							  
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Featured Image</label>
								  <div class="col-sm-9">
									  <input type="file" class="form-control fileinput" name="featured_image" id="featured_image" placeholder="Image">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Image Caption</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="image_caption" placeholder="Image Caption">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Vedio Link</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="vedio_link" placeholder="Vedio Link">
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">Short Description</label>
								  <div class="col-sm-9">
									  <textarea id="short_desc" class="short_desc" name="short_desc" style="width: 400px" required></textarea>
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">Details</label>
								  <div class="col-sm-9">
									  <textarea id="news_details" class="news_details" name="news_details" style="height: 300px" required></textarea>
								  </div>
							  </div>
							  
						   </form>

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
						<label for="righticon" class="col-sm-2 control-label"><code>Language</code></label>
						<div class="col-sm-12">
							<div class="radio radio-custom radio-inline radio-primary">
								<input type="radio" id="ln_bn" name="language" value="bangla" checked>
								<label for="ln_bn">Bangla</label>
							</div>
							<div class="radio radio-custom radio-inline radio-primary">
								<input type="radio" id="ln_us" name="language" value="english">
								<label for="ln_us">English</label>
							</div>
						</div>
						<label for="righticon" class="col-sm-12" style="margin-top:10px;"><code>Breaking News</code></label>
						<div class="col-sm-12">
							<div class="checkbox-custom checkbox-primary" style="margin-top:10px;">
								<input type="checkbox" id="checkboxCustom3" name="breaking_news" value="1" >
								<label class="check" for="checkboxCustom3">Checkbox success</label>
							</div>
						</div>
						
						<div class="col-sm-12" style="margin-top:15px">
								<a class="btn btn-primary savePostBtn" flag="0">Save as Draft</a>
								<a class="btn btn-success savePostBtn" flag="1">Publish</a>
								<img src="{{ asset('public/images/pie.gif') }}" height="30px" id="ajax_loading" style="display: none;">
						</div>
						

					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="warning_modal" tabindex="-1" role="dialog" aria-labelledby="modal-success-label" data-keyboard="false" data-backdrop="static">
		    <div class="modal-dialog" role="document">
		      <div class="modal-content">
		        <div class="modal-header state modal-success">
		          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          <h4 class="modal-title" id="modal-success-label"><i class="fa fa-user"></i>Delete User</h4>
		        </div>
		        <div class="modal-body">
		          <div class="form-group-attached">
		            <div class="row">
		              <div class="col-sm-6" style="margin: 10px;">
		                <div class="form-group form-group-default"> 
							Following fields are mendatory:<br>
							<code>News Title</code><br>
							<code>Category</code><br>
							<code>Featured Image</code><br>
							<code>Details</code>
		                </div>
		              </div>
		            </div>
		          </div>
		        </div>
		        <div class="modal-footer"> <a type="button" class="btn btn-default" data-dismiss="modal">Close</a> </div>
		      </div>
		    </div>
		  </div>
		
</div>
</form>
<script>

</script>
@endsection