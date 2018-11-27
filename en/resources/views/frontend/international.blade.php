@extends('layouts.frontend.dashboard')

@section('content')
<div ng-controller="MainController">
<!-- double ad -->
<div class="section-margin">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="double-ad" id="sticker">
					<div class="single-long-ad-left">
						<!--a class="btn btn-success" ng-if="isLoggedIn==1 && loginUser.role == 1">ddda</a-->
						<a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('International', 21)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
						@endif

					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('International', 22)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- breaking news slider -->
<div class="section-padding breaking-news-slider padding-top-zero">
	<div class="container-fluid">
		<div class="col-md-12">
			<div class="aside-advertise-3 scrollToShow">
				<div class="ad">
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('International', 23)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
						@endif
					<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
				</div>
			</div>
		</div>
		<div class="container">
			@if(count($internation_breaking_news)>1)
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					        <h2>Breaking News</h2>
					    </div>
					</div>
					<div class="col-sm-7 ">
						<div class="breakingnews-carousel">
							
								@foreach($internation_breaking_news as $news)
									<div class="single-breakingnews-item">
										<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
											<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
												<h3>{{ $news->title }}</h3>>
											</a>
										</div>
									</div>
								@endforeach


						</div>
					</div>
					<div class="col-sm-3">
						<!-- ad here -->
						<div class="advertise-1">
							<a href="">
								@if(isset(Auth::user()->id) && Auth::user()->role == 1)
									<img ng-click="changeAd('International', 24)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
								@else
									<a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
								@endif
							</a>
						</div>
					</div>
				</div>
			@endif
		</div>
	</div>
</div>
<!--slider area end-->

<!--vdo reporting area-->
<div class="section-padding news-section-img120">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 col-xs-12">
				<h3 class="section-heading"><a href="">Recent</a></h3>
				@foreach($internation_recent as $news)
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$news->title}}</h3>
							<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				@endforeach
			</div>
			<div class="col-sm-7 col-xs-12">
				@if(count($internation_vedios)>1)
				<h3 class="section-heading">Reporting</h3>
				<div class="video-slides">
					@foreach($internation_vedios as $news)
						<div class="single-video-slide">
							<a href="{{$news->vedio_link}}" class="video-play-btn long-height play-bg-1 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
									<h3>{{$news->title}}</h3>
								</a>
							</a>
						</div>
					@endforeach
				</div>
				@endif
			</div>
		</div>
	</div>
</div>
<!-- big slider -->
<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>Middle East</h2>
			    </div>
			</div>
			<div class="col-sm-10 ">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="">Middle East</a></h3>
				</div>
				<div class="big-section-slider">
					@foreach($internation_middleeast as $index=>$news)
						@if($index<3)
							<div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
								<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
									<h3>{{$news->title}}</h3>
								</a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>


<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_middleeast as $index=>$news)
				@if($index>2 && $index<5)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_middleeast as $index=>$news)
				@if($index>4 && $index<8)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
<!--single advertise area-->
<div class="section-padding advertise-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				@if(isset(Auth::user()->id) && Auth::user()->role == 1)
					<img ng-click="changeAd('International', 25)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
				@else
					<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
				@endif
			</div>

		</div>
	</div>
</div>
<!--single advertise area end-->
<!-- big slider -->
<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			       <h2>North America</h2>
			    </div>
			</div>
			<div class="col-sm-10 ">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="">North America</a></h3>
				</div>
				<div class="big-section-slider">
					@foreach($internation_northamerica as $index=>$news)
						@if($index<3)
							<div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
								<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
									<h3>{{$news->title}}</h3>
								</a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>


<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_northamerica as $index=>$news)
				@if($index>2 && $index<5)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_northamerica as $index=>$news)
				@if($index>4 && $index<8)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
<!-- big slider -->
<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>Europe</h2>
			    </div>
			</div>
			<div class="col-sm-10 ">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="">Europe</a></h3>
				</div>
				<div class="big-section-slider">
					<?php $i=0; ?>
					@foreach($internation_europe as $index=>$news)
							<?php $i++; ?>
							<div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
								<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
									<h3>{{$news->title}}</h3>
								</a>
							</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!--single advertise area-->
<div class="section-padding advertise-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				@if(isset(Auth::user()->id) && Auth::user()->role == 1)
					<img ng-click="changeAd('International', 26)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
				@else
					<a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
				@endif
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->
<!-- big slider -->
<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>Asia</h2>
			    </div>
			</div>
			<div class="col-sm-10 ">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="">Asia</a></h3>
				</div>
				<div class="big-section-slider">
					@foreach($internation_asia as $index=>$news)
						@if($index<3)
							<div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
								<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
									<h3>{{$news->title}}</h3>
								</a>
							</div>
						@endif
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>2 && $index<5)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>4 && $index<8)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-2">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>
<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>7 && $index<11)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-3">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<!--single advertise area-->
<div class="section-padding advertise-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				@if(isset(Auth::user()->id) && Auth::user()->role == 1)
					<img ng-click="changeAd('International', 27)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
				@else
					<a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
				@endif
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->
<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>10 && $index<13)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>12 && $index<16)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-2">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>15 && $index<19)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-3">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($internation_asia as $index=>$news)
				@if($index>18 && $index<22)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-3">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Read More<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>

</div>
@endsection
