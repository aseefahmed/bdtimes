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
						@if(isset($all_news[0]))
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Economics', 31)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else
								<a href="{{ url('news/front/details/'.$all_news[0]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
						@endif

					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset($all_news[1]))
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Economics', 32)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
							@else
								<a href="{{ url('news/front/details/'.$all_news[1]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
							@endif
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
						<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
						@if(isset($all_news[2]))
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Economics', 33)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
							@else
								<a href="{{ url('news/front/details/'.$all_news[2]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
							@endif
						@endif

				</div>
			</div>
		</div>
		<div class="container">
			@if(count($economics_news)>1)
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					       <h2>Breaking News</h2>
					    </div>
					</div>
					<div class="col-sm-7">
						<div class="breakingnews-carousel">
							@foreach($economics_news as $news)
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
								@if(isset($all_news[3]))
									@if(isset(Auth::user()->id))
										<img ng-click="changeAd('Economics', 34)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
									@else
										<a href="{{ url('news/front/details/'.$all_news[3]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
									@endif
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
				<h3 class="section-heading"><a href="{{ url('news/front/details/'.$all_news[0]->id) }}">Recent</a></h3>
				@foreach($economics_recent as $index=>$news)
					@if($index<2)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[4]->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endif
				@endforeach

			</div>
			<div class="col-sm-7 col-xs-12">
				@if(count($economics_vedios)>1)
				<h3 class="section-heading">Reporting-Based News</h3>
				<div class="video-slides">
					@foreach($economics_vedios as $news)
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

<!--single advertise area-->
<div class="section-padding advertise-2">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				@if(isset($all_news[4]))
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('Economics', 35)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
					@else
						<a href="{{ url('news/front/details/'.$all_news[4]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_recent as $index=>$news)
				@if($index>1 && $index<4)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<a href="{{ url('news/front/details/'.$news->id) }}">
									<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								</a>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details</a>
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
			@foreach($economics_recent as $index=>$news)
				@if($index>3 && $index<7)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-2">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
		@if(count($economics_shilpo)>1)
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>শিল্প ও বাণিজ্য</h2>
			    </div>
			</div>
			<div class="col-sm-10">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="{{ url('news/front/details/'.$all_news[0]->id) }}">Industries and commerce</a></h3>
				</div>
				<div class="big-section-slider">

					@foreach($economics_shilpo as $index=>$news)
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
		@endif
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_shilpo as $index=>$news)
				@if($index>2 && $index<6)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-3">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
			<div class="col-sm-6 col-xs-12">
				@foreach($economics_shilpo as $index=>$news)
					@if($index>5 && $index<8)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col-sm-6 col-xs-12">
				@foreach($economics_shilpo as $index=>$news)
					@if($index>7 && $index<10)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$all_news[20]->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_shilpo as $index=>$news)
				@if($index>9 && $index<13)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-2">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
		@if(count($economics_sharebazar)>1)
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>Stock market</h2>
			    </div>
			</div>
			<div class="col-sm-10 ">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="{{ url('news/front/details/'.$all_news[0]->id) }}">Stock market</a></h3>
				</div>
				<div class="big-section-slider">

					@foreach($economics_sharebazar as $index=>$news)
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
		@endif
	</div>
</div>
<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_sharebazar as $index=>$news)
				@if($index>2 && $index<5)
					<div class="col-sm-6 col-xs-12">
						<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
				@if(isset($all_news[5]))
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('Economics', 36)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
					@else
						<a href="{{ url('news/front/details/'.$all_news[5]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->
<!-- big slider -->
<div class="section-padding">
	<div class="container">
		@if(count($economics_international)>1)
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>International economy</h2>
			    </div>
			</div>
			<div class="col-sm-10">
				<div class="cta-bar-alternative">
					<h3 class="section-heading"><a href="{{ url('news/front/details/'.$all_news[0]->id) }}">International economy</a></h3>
				</div>
				<div class="big-section-slider">

					@foreach($economics_international as $index=>$news)
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
		@endif
	</div>
</div>
<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_international as $index=>$news)
				@if($index>2 && $index<6)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-3">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
			<div class="col-sm-6 col-xs-12">
				@foreach($economics_international as $index=>$news)
					@if($index>5 && $index<8)
						<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endif
				@endforeach
			</div>
			<div class="col-sm-6 col-xs-12">
				@foreach($economics_international as $index=>$news)
					@if($index>7 && $index<10)
						<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endif
				@endforeach
			</div>
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			@foreach($economics_international as $index=>$news)
				@if($index>9 && $index<13)
					<div class="col-sm-4 col-xs-12">
						<div class="single-thumbnail-item-2">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
				@if(isset($all_news[6]))
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('Economics', 37)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
					@else
						<a href="{{ url('news/front/details/'.$all_news[6]->id) }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
					@endif
				@endif
			</div>
		</div>
	</div>
</div>
</div>
<!--single advertise area end-->
@endsection
