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
<form class="form-horizontal form-stripe" id="editPollForm">
<div class="row animated fadeInUp">

	<input type="hidden" name="flag" id="flag">
	<input type="hidden" name="news_id" value="{{ $poll[0]->id }}">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-8">
			<h4 class="section-subtitle"><b>Poll</b> Details</h4>
			<div class="panel">
				<div class="panel-content">
					<div class="row">
						<div class="col-md-12">
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Question?</label>
								  <div class="col-sm-9">
								  <input type="text" class="form-control" name="question" placeholder="Please let us know the question to ask ..." value="{{ $poll[0]->question }}">
								  </div>
							  </div>
							  
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Status</label>
								  <div class="col-sm-9">
								    <div class="col-sm-12">
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="flag_{{$poll[0]->flag}}" name="flag" value="0" <?php if($poll[0]->flag==0){echo "checked";} ?>>
											<label for="flag_{{$poll[0]->flag}}">Draft</label>
										</div>
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="flag_publish" name="flag" value="1" <?php if($poll[0]->flag==1){echo "checked";} ?>>
											<label for="flag_publish">Publish</label>
										</div>
									</div>
								  </div>
							  </div>
							 
							  <div class="form-group">
								  <label for="name" class="col-sm-3 control-label">Languge</label>
								  <div class="col-sm-9">
								    <div class="col-sm-12">
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="flag_{{$poll[0]->language}}" name="language" value="bangla" <?php if($poll[0]->language=='bangla'){echo "checked";} ?>>
											<label for="flag_{{$poll[0]->language}}">Bangla</label>
										</div>
										<div class="radio radio-custom radio-inline radio-primary">
											<input type="radio" id="ln_us" name="language" value="english" <?php if($poll[0]->language=='english'){echo "checked";} ?>>
											<label for="ln_us"">English</label>
										</div>
									</div>
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
									<a class="btn btn-success" id="updatePollBtn" poll_id="{{ $poll[0]->id }}">Update</a>
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
			<div class="panel b-primary bt-sm ">
                <div class="panel-header">
                    <h5 class="panel-title">Featured Image</h5>
                </div>
                <div class="panel-content text-center" style="height:300px;">
                 
                            <img class="img1 text-center col-md-12" src="{{ asset('public/images/polls/featured/'.$poll[0]->featured_image) }}" height="250px;">
                       
                </div>
            </div>
		</div>
</div>
</form>
@endsection