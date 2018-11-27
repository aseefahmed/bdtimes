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
							<img ng-click="changeAd('National', 12)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
						@endif

					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id))
							<img ng-click="changeAd('National', 13)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
								<img ng-click="changeAd('National', 14)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
							@endif
						<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					       <h2>Top news</h2>
					    </div>
					</div>
					<div class="col-sm-7">
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
									<img ng-click="changeAd('National', 15)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
					<h3 class="section-heading"><a href="">Category name</a></h3>
					@foreach($probash_recent as $news)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endforeach

				</div>
				<div class="col-sm-7 col-xs-12">
					<h3 class="section-heading">Reporting based news</h3>
					<div class="video-slides">
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-1 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</a>
						</div>
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-2 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</a>
						</div>
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-3 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2><a href="">Life-Livelihood</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Life-Livelihood</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>Balaam could not finish a song in 50 days!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
									</a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>

                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
				<div class="col-sm-2">
				    <div class="cta-bar">
				       <h2><a href="">Labor market</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Labor market</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
                                        <h3>Balaam could not finish a song in 50 days!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
                                        <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>

                                    </a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2><a href="">Manpower sector</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Manpower sector</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
                                        <h3>A song of 50 days</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>

                                        <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                                    </a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2><a href="">Remittance</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Remittance</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>Balaam could not finish a song in 50 days!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
                                        <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                                    </a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2><a href="">Laugh and cry</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Laugh and cry</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>Balaam could not finish a song in 50 days!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
                                        <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                                    </a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>A song of 50 days</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2><a href="">Exile life</a></h2>
				    </div>
				</div>
				<div class="col-md-10">
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">Exile life</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>Balaam could not finish a song in 50 days!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
                                        <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                                    </a>
									<a href="#" class="news-readmore-btn">Details</a>
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
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
</div>
@endsection
