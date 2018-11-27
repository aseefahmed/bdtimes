@extends('layouts.admin.dashboard')
@section('content')
<form class="form-horizontal form-stripe" id="addNewsForm">
<div class="row animated fadeInUp" ng-controller="NewsController">

	<input type="hidden" name="flag" id="flag">
	{{ csrf_field() }}
		<div class="col-sm-12 col-md-12" style="overflow:hidden ">
			<h4 class="section-subtitle">
				@if(!isset($page))
					<b>Home</b> Page
				@else
					<b>{{ucwords($page)}}</b> Page
				@endif
			</h4>
			@if(!isset($page))
				<iframe src="http://139.59.66.70" frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;">
				  <p>Your browser does not support iframes.</p>
				</iframe>
			@else
				<iframe src="http://139.59.66.70" frameborder="0" scrolling="yes" seamless="seamless" style="display:block; width:100%; height:100vh;">
				  <p>Your browser does not support iframes.</p>
				</iframe>
			@endif
			
			
		</div>
</div>
</form>
@endsection
