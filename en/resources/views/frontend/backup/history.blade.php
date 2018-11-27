@extends('layouts.frontend.dashboard')

@section('content')
<div ng-controller="MainController">
<!-- double ad -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="double-ad" id="sticker">
					<div class="single-long-ad-left">
						<!--a class="btn btn-success" ng-if="isLoggedIn==1 && loginUser.role == 1">ddda</a-->
						<a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id))
							<img ng-click="changeAd('History', 392)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
						@endif
						
					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id))
							<img ng-click="changeAd('History', 393)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
						@endif
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
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('History', 394)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
							@endif
						<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-7 col-sm-offset-2">
						<div class="cta-bar">
							<h2>টপ নিউজ</h2>
						</div>
						<div class="breakingnews-carousel">
							@foreach($probash_breaking_news as $news)
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
								@if(isset(Auth::user()->id))
									<img ng-click="changeAd('History', 395)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
								@else 
									<a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
								@endif
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--slider area end-->

	<!--vdo reporting area-->
	<div class="section-padding news-section-img120">
		<div class="container">
			<div class="row">
				<div class="col-sm-5 col-xs-12">
					<h3 class="section-heading"><a href="">ক্যাটাগরির নাম</a></h3>
					@foreach($probash_recent as $news)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endforeach
					
				</div>
				<div class="col-sm-7 col-xs-12">
					<h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
					<div class="video-slides">
						@foreach($probash_vedios as $news)
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
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area-->
	<div class="section-padding advertise-2">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('History', 396)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">ঐতিহাসিক স্থান</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">ঐতিহাসিক স্থান</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$probash_jibon_jibika[0]->id) }}">
										<h3>{{$probash_jibon_jibika[0]->title}}</h3>
										<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jibon_jibika[0]->featured_image)}})"></div>
										<p><?php echo mb_substr(strip_tags($probash_jibon_jibika[0]->short_description), 0, 2050); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$probash_jibon_jibika[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jibon_jibika[1]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_jibon_jibika[1]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_jibon_jibika[1]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_jibon_jibika[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jibon_jibika[2]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_jibon_jibika[2]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_jibon_jibika[2]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_jibon_jibika[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">স্থাপনা</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">স্থাপনা</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$probash_sromobazar[0]->id) }}">
										<h3>{{$probash_sromobazar[0]->title}}</h3>
										<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_sromobazar[0]->featured_image)}})"></div>
										<p><?php echo mb_substr(strip_tags($probash_sromobazar[0]->short_description), 0, 2050); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$probash_sromobazar[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_sromobazar[1]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_sromobazar[1]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_sromobazar[1]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_jibon_jibika[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_sromobazar[2]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_sromobazar[2]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_sromobazar[2]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_sromobazar[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
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
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('History', 397)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">শিল্পকর্ম</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">শিল্পকর্ম</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$probash_jonoshokti[0]->id) }}">
										<h3>{{$probash_jonoshokti[0]->title}}</h3>
										<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jonoshokti[0]->featured_image)}})"></div>
										<p><?php echo mb_substr(strip_tags($probash_jonoshokti[0]->short_description), 0, 2050); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$probash_jonoshokti[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jonoshokti[1]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_jonoshokti[1]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_jonoshokti[1]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_jonoshokti[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jonoshokti[2]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_jonoshokti[2]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_jonoshokti[2]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_jonoshokti[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">হারিয়ে যাওয়া ঐতিহ্য</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">হারিয়ে যাওয়া ঐতিহ্য</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$probash_remitence[0]->id) }}">
										<h3>{{$probash_remitence[0]->title}}</h3>
										<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_remitence[0]->featured_image)}})"></div>
										<p><?php echo mb_substr(strip_tags($probash_remitence[0]->short_description), 0, 2050); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$probash_remitence[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_remitence[1]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_remitence[1]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_remitence[1]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_remitence[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_remitence[2]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_remitence[2]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_remitence[2]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_remitence[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
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
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('History', 398)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">গ্রামীন খেলা</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">গ্রামীন খেলা</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$probash_hashikanna[0]->id) }}">
										<h3>{{$probash_hashikanna[0]->title}}</h3>
										<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_remitence[0]->featured_image)}})"></div>
										<p><?php echo mb_substr(strip_tags($probash_hashikanna[0]->short_description), 0, 2050); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$probash_hashikanna[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_hashikanna[1]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_hashikanna[1]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_hashikanna[1]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_hashikanna[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_hashikanna[2]->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$probash_hashikanna[2]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($probash_hashikanna[2]->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$probash_hashikanna[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
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
					@if(isset(Auth::user()->id))
						<img ng-click="changeAd('History', 399)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
					@endif
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
</div>
@endsection