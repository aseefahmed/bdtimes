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
<form class="form-horizontal form-stripe" id="editNewsForm">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	<input type="hidden" name="news_id" value="{{ $news[0]->id }}">
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
								  <input type="text" class="form-control" name="news_title" id="news_title" placeholder="News Title" value="{{ $news[0]->title }}">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Sub Title</label>
								  <div class="col-sm-9">
								  <input type="text" class="form-control" name="sub_title" placeholder="Name" value="{{ $news[0]->sub_title }}">
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Status</label>
								  <div class="col-sm-9">
								    <div class="col-sm-12">
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="flag_{{$news[0]->flag}}" name="flag" value="0" <?php if($news[0]->flag==0){echo "checked";} ?>>
											<label for="flag_{{$news[0]->flag}}">Draft</label>
										</div>
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="ln_publish" name="flag" value="1" <?php if($news[0]->flag==1){echo "checked";} ?>>
											<label for="ln_publish">Publish</label>
										</div>
									</div>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Breaking News</label>
								  <div class="col-sm-9">
								    <div class="col-sm-12">
										<div class="checkbox-custom checkbox-primary">
											<input type="checkbox" id="checkboxCustom3" name="breaking_news" value="1"  <?php if($news[0]->is_breaking_news==1){echo "checked";} ?>>
											<label class="check" for="checkboxCustom3"></label>
										</div>
									</div>
								  </div>
							  </div>
							    <?php 
									$cat_arr = array();
									$tag_arr = array();
									foreach(findNewsCategories($news[0]->id) as $cat)
									{
										array_push($cat_arr, $cat->category_name);
									}
									foreach(findNewsTags($news[0]->id) as $tag)
									{
										array_push($tag_arr, $tag->tag_name);
									}
								?>
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">News Category</label>
								  <div class="col-sm-9">
										<select id="main_category" <?php if(Auth::user()->role == 2){echo "disabled";} ?> class="form-control select2js" style="width: 100%" name="categories[]" id="categories">
										
										<option value="0">Chose Category</option>
										 @foreach($categories as $category)
											<option value="{{ $category->id }}" <?php if(in_array($category->category_name, $cat_arr)){echo "selected";} ?>>{{ $category->category_name }}</option>
										  @endforeach
										</select>
								  </div>
							  </div>
							  <div class="form-group" id="sub_cat">
							  @if($num_of_sub_cat > 0)
									  <label for="username" class="col-sm-3 control-label">Sub Category</label>
									  <div class="col-sm-9">
											<select class="form-control select2js" style="width: 100%" name="sub_categories" id="sub_categories">
											  @foreach($sub_categories as $sub_category)
												<option value="{{ $sub_category->id }}" <?php if($sub_category->id == $news[0]->sub_category_id ){echo "selected";} ?>>{{ $sub_category->category_name }}</option>
											  @endforeach
											</select>
									  </div>
							  @endif
							  </div>
							  <div class="form-group">
								  <label for="username" class="col-sm-3 control-label">Keywords</label>
								  <div class="col-sm-9">
										<select <?php if(Auth::user()->role == 2){echo "disabled";} ?> class="form-control select2-tags" style="width: 100%" name="tags[]" id="categories" multiple>
										  @foreach($tags as $tag)
											<option value="{{ $tag->tag_name }}" <?php if(in_array($tag->tag_name, $tag_arr)){echo "selected";} ?>>{{ $tag->tag_name }}</option>
										  @endforeach
										</select>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Meta Description</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="meta_desc" placeholder="Meta Description" value="{{$news[0]->meta_desc}}">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Languge</label>
								  <div class="col-sm-9">
								    <div class="col-sm-12">
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="flag_{{$news[0]->language}}" name="language" value="bangla" <?php if($news[0]->language=='bangla'){echo "checked";} ?>>
											<label for="flag_{{$news[0]->language}}">Bangla</label>
										</div>
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="ln_us" name="language" value="english" <?php if($news[0]->language=='english'){echo "checked";} ?>>
											<label for="ln_us"">English</label>
										</div>
									</div>
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Featured Image</label>
								  <div class="col-sm-9">
									  <input type="file" class="form-control fileinput" name="featured_image" id="featured_image" placeholder="Email">
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Image Caption</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control" name="image_caption" placeholder="Image Caption" value="{{$news[0]->image_caption}}">
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="email3" class="col-sm-3 control-label">Vedio Link</label>
								  <div class="col-sm-9">
									  <input type="text" class="form-control fileinput" name="vedio_link" value="{{ $news[0]->vedio_link }}" placeholder="Vedio Link">
								  </div>
							  </div>

							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">Short Description</label>
								  <div class="col-sm-9">
									  <textarea id="short_desc" class="short_desc" name="short_desc" style="width: 450px;height: 200px" required>{{ $news[0]->short_description }}</textarea>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">Details</label>
								  <div class="col-sm-9">
									<textarea id="news_details" class="news_details" name="news_details" style="height: 300px">{{ $news[0]->details }}</textarea>
								  </div>
							  </div>
							  <div class="form-group">
								  <label for="password3" class="col-sm-3 control-label">&nbsp;</label>
								  <div class="col-sm-9">
									<a class="btn btn-success" id="updateNewsBtn" news_id="{{ $news[0]->id }}">Update</a>
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
			<a class="btn btn-success btn-block" href="{{ url('news/view/'.$news[0]->id) }}">Preview</a>
			<div class="panel b-primary bt-sm ">
                <div class="panel-header">
                    <h5 class="panel-title">Featured Image</h5>
                </div>
                <div class="panel-content text-center" style="height:300px;">
                 
                            <img class="img1 text-center col-md-12" src="{{ asset('public/images/news/featured/'.$news[0]->featured_image) }}" height="250px;">
                       
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
@endsection