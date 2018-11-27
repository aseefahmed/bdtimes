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
									<img ng-click="changeAd('Home', 1)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
								@else
									<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
								@endif

							</div>
							<div class="single-long-ad-right">
								<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
								@if(isset(Auth::user()->id) && Auth::user()->role == 1)
									<img ng-click="changeAd('Home', 2)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
				<div class="col-sm-12">
					<div class="aside-advertise-3 scrollToShow">
						<div class="ad">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 3)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
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
	                            <h2>Breaking News</h2>
	                        </div>
	                    </div>
						<div class="col-sm-7 col-xs-12">
							<div class="breakingnews-carousel">
								@if(isset($breaking_news[0]))
									<div class="single-breakingnews-item">
										<div class="breakingnews-bg" style="background-image: url(public/images/news/featured/{{ $breaking_news[0]->featured_image }})">
											<a href="{{ url('news/front/details/'.$breaking_news[0]->id) }}" class="slider-headline">
												<h3>{{ $breaking_news[0]->title }}</h3>
											</a>
										</div>
									</div>
								@endif
								@if(isset($breaking_news[0]))
									<div class="single-breakingnews-item">
										<div class="breakingnews-bg" style="background-image: url(public/images/news/featured/{{ $breaking_news[1]->featured_image }})">
											<a href="{{ url('news/front/details/'.$breaking_news[1]->id) }}" class="slider-headline">
												<h3>{{ $breaking_news[1]->title }}</h3>
											</a>
										</div>
									</div>
								@endif
								@if(isset($breaking_news[0]))
									<div class="single-breakingnews-item">
										<div class="breakingnews-bg" style="background-image: url(public/images/news/featured/{{ $breaking_news[2]->featured_image }})">
											<a href="{{ url('news/front/details/'.$breaking_news[2]->id) }}" class="slider-headline">
												<h3>{{ $breaking_news[2]->title }}</h3>
											</a>
										</div>
									</div>
								@endif

							</div>
						</div>
						<div class="col-sm-3 pdt-10 col-xs-12">
							<!-- ad here -->
							<div class="advertise-1">
								<a href="">
									@if(isset(Auth::user()->id) && Auth::user()->role == 1)
										<img ng-click="changeAd('Home', 4)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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

		<!-- service section here -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/national')}}">National</a></h3>
						<?php $i=1;?>
						@foreach($latest_news as $news)
							@if($news->category_id == 1 && $i<3)
								<?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", strpos($news->details, " ", 120)+1)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/international')}}">International</a></h3>
						<?php $i=1;?>
						@foreach($latest_news as $news)
							@if(($news->category_id == 2 || $news->category_id == 24 || $news->category_id == 25 || $news->category_id == 26 || $news->category_id == 28) && $i<3)
								<?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/economics')}}">Economics</a></h3>
						<?php $i=1;?>
						@foreach($latest_news as $news)
							@if($news->category_id == 3 && $i<3)
								<?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/national')}}">Jobs</a></h3>
						<?php $i=1;?>
						@foreach($latest_news as $news)
							@if($news->category_id == 4 && $i<3)
								<?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- Video reporting & entertainment -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<div class="video-reporting-section">
							<h3 class="section-heading"><a href="">Video/Reporting</a></h3>
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn reporting-video-bg mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-sm-7 pdt-10">
						<div class="entertainment">
							<h3 class="section-heading"><a href="{{url('category/entertainment')}}">Entertainment</a></h3>
							<div class="entertainment-carousel">
								@foreach($latest_news as $news)
									@if($news->category_id == 5)

										<div class="single-entertainment-item">
											<div class="entertainment-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})">
												<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
													<h3>{{$news->title}}</h3>
												</a>
											</div>
										</div>
									@endif
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Full width ad -->
		<!--single advertise area-->
		<div class="section-padding advertise-252">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 5)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
							@endif

						</a>
					</div>
				</div>
			</div>
		</div>
		<!--single advertise area end-->

		<!-- politics & sports -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="politics">
							<h3 class="section-heading"><a href="{{url('category/politics')}}">Politics</a></h3>
							<div class="entertainment-carousel">
								@foreach($latest_news as $news)
									@if($news->category_id == 6)
										<div class="single-entertainment-item">
											<div class="entertainment-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})">
												<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
													<h3>{{$news->title}}</h3>
												</a>
											</div>
										</div>

									@endif
								@endforeach
							</div>
						</div>
					</div>
					<div class="col-sm-6 pdt-10">
						<div class="politics">
							<h3 class="section-heading"><a href="{{url('category/national')}}">Sports</a></h3>
							<div class="entertainment-carousel">
								@foreach($latest_news as $news)
									@if($news->category_id == 7)
										<div class="single-entertainment-item">
											<div class="entertainment-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})">
												<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
													<h3>{{$news->title}}</h3>
												</a>
											</div>
										</div>

									@endif
								@endforeach

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- 3 service-section goes here -->
		<div class="section-padding news-section-im75">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/education')}}">Education</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
							@if($news->category_id == 8 && $i<3)
							<?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach

					</div>
					<div class="col-md-4 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/science')}}">Science & Technology</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 9 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12 pdt-10">
						<h3 class="section-heading"><a href="">Horoscope</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 10 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
		<!-- 4 service-section goes here -->
		<div class="section-padding news-section-im85">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/crime')}}">Crime</a></h3>
								<?php $i=1; ?>
								@foreach($latest_news as $news)
								    @if($news->category_id == 11 && $i<3)
								    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/lifestyle')}}">Life Styles</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 12 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/travel')}}">Travel</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 20 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12">
						<h3 class="section-heading"><a href="{{url('category/national')}}">Cartoon</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 21 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>

				</div>
			</div>
		</div>
		<!--2 ads area-->
		<div class="section-padding advertise-252">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-xs-6">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 6)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
							@endif

						</a>
					</div>
					<div class="col-sm-6 col-xs-6">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 7)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
							@endif

						</a>
					</div>
				</div>
			</div>
		</div>
		@if(count($apnaar_lekha))
			<!-- big featured section -->
			<div class="section-padding">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
						    <div class="cta-bar">
						        <h2>Write/ <br>Your writting</h2>
						    </div>
						</div>
						<div class="col-sm-5">
							<div class="cta-bar-alternative">
							    <h3 class="section-heading">Your Writings</h3>
							</div>
							@foreach($apnaar_lekha as $news)
								<div class="single-featured-item">
									<h3>{{ $news->title }}</h3>
									<img src="public/images/news/featured/{{$news->featured_image }}" alt="">
									<?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 800)+1); ?>
									<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		@endif

		<!-- big slider -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					        <h2>Buy/Sell</h2>
					    </div>
					</div>
					<div class="col-sm-10">
						<div class="cta-bar-alternative">
						    <h3 class="section-heading">Buy/Sell</h3>
						</div>
						<div class="big-section-slider">
							@foreach($latest_news as $news)
								@if($news->category_id == 18)
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
		@if(count($aayna)>0)
		<!-- big featured section -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
							<h2>Mirror</h2>
					    </div>
					</div>
					<div class="col-sm-5 ">
						<div class="cta-bar-alternative">
						    <h3 class="section-heading">Mirror</h3>
						</div>
						@if(isset($aayna[0]))
							<div class="single-featured-item">
								<h3>{{ $aayna[0]->title }}</h3>
								<img src="public/images/news/featured/{{$aayna[0]->featured_image }}" alt="">
								<?php echo substr(strip_tags($aayna[0]->details), 0, strpos($aayna[0]->details, " ", 800)+1); ?>
							<a href="{{ url('news/front/details/'.$aayna[0]->id) }}" class="news-readmore-btn"></a>

							</div>
						@endif

					</div>
					<div class="col-sm-5 pdt-10">
						@if(isset($aayna[1]))
							<div class="single-featured-item">
								<h3>{{ $aayna[1]->title }}</h3>
								<img src="public/images/news/featured/{{$aayna[1]->featured_image }}" alt="">
								<?php echo substr(strip_tags($aayna[1]->details), 0, strpos($aayna[1]->details, " ", 800)+1); ?>
								<a href="{{ url('news/front/details/'.$aayna[1]->id) }}" class="news-readmore-btn"></a>
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		@endif
		<!-- two ads and one facebook plug in section goes here -->
		<!-- advertise area-->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6 col-xs-12 text-center">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 8)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
							@endif

						</a>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-12 text-center pdt-10">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 9)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
							@endif

						</a>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 text-center pdt-10">
						<h3 class="section-heading"><a href="">Facebook Page</a></h3>
						<div class="fb-container">
							<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- advertise area end-->

		<!-- section-padding -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					       <h2>Opinion/Co-editing</h2>
					    </div>
					</div>
					<div class="col-sm-10">
						<div class="cta-bar-alternative">
						    <h3 class="section-heading">Opinion/Co-editing</h3>
						</div>
						@foreach($latest_news as $news)
							@if($news->category_id == 22)
								<div class="single-featured-item-big">
									<h3>{{ $news->title }}</h3>
									<img src="public/images/news/featured/{{$news->featured_image }}" alt="">
									<?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 2500)+1); ?><a href="{{ url('news/front/details/'.$latest_news[40]->id) }}" class="news-readmore-btn"></a></p>
								</div>
								<?php break; ?>
							@endif

						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- 3 service items goes here -->
		<div class="section-padding news-section-im75">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3 class="section-heading"><a href="">Women</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 17 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-4 col-sm-6">
						<h3 class="section-heading"><a href="">Young Generation</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 6 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
					<div class="col-md-4 col-sm-6 pdt-15">
						<h3 class="section-heading"><a href="">Kids/Teen Agers</a></h3>
						<?php $i=1; ?>
						@foreach($latest_news as $news)
						    @if($news->category_id == 9 && $i<3)
						    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{ $news->title }}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- video & photo gallary -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						<h3 class="section-heading"><a href="">Your Videos</a></h3>
						<div class="video-slides">
							@foreach($latest_news as $news)
								@if($news->category_id == 69)
									<div class="single-video-slide">
										<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-1 mfp-iframe">
											<div class="video-icon-table">
												<div class="video-icon-tablecell">
													<i class="fa fa-play"></i>
												</div>
											</div>
											<a href="" class="slider-headline">
												<h3>{{ $news->title }} </h3>
											</a>
										</a>
									</div>

								@endif
							@endforeach
						</div>
					</div>
					<div class="col-sm-7 pdt-10">
						<h3 class="section-heading"><a href="">Gallery</a></h3>
						<div class="photo-gallary-slides">
							@foreach($latest_news as $news)
								@if($news->category_id == 15)
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

		<!-- Readers questions tab, opinion , viral goes here -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-6">
						<h3 class="section-heading"><a href="">Readers' Questions</a></h3>
						<div class="custom-tab readers-qs">
							<ul class="tab-list text-center">
								<li class="active"><a data-toggle="tab" href="#custom-tab-1">Health</a></li>
								<li><a data-toggle="tab" href="#custom-tab-2">Legal</a></li>
							</ul>
							<div class="tab-content">
								<div id="custom-tab-1" class="tab-pane fade in active">
									<div class="single-news-item gray-bg">
										@foreach($latest_news as $news)
											@if($news->category_id == 24 || $news->category_id == 2)
												<div class="single-thumbnail-item-2" >
													<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
													<div class="news-content">
														<a href="{{ url('news/front/details/'.$news->id) }}">
															<h3>{{$news->title}}</h3>
															<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
														</a>
														<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
													</div>
												</div>
											@endif
										@endforeach
									</div>
								</div>
								<div id="custom-tab-2" class="tab-pane fade">
									<div class="single-news-item gray-bg">
										@foreach($latest_news as $news)
											@if($news->category_id == 12)
												<div class="single-thumbnail-item-2" >
													<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
													<div class="news-content">
														<a href="{{ url('news/front/details/'.$news->id) }}">
															<h3>{{$news->title}}</h3>
															<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
														</a>
														<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
													</div>
												</div>
											@endif
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-6">
						<h3 class="section-heading"><a href="">Poll</a></h3>
						<div class="people-opinion">
							<p style="font-weight: bold;">{{$poll[0]->question}}</p>
                            <form id="myVoteForm" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$poll[0]->id}}" name="poll_id">
                                <input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" name="ip_address"><br><br>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="yes" name="myvote">&nbsp;Yes &nbsp;
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="no" name="myvote">&nbsp;No &nbsp;
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="nocomment" name="myvote" checked>&nbsp;No Comments
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <input type="submit" id="vote_btn" class="btn btn-warning" value="ভোট দিন" >&nbsp;
                                <a class="fb-signup" href="{{url('/votes/result')}}">Old Results</a>
                            </form>
<!--
								<form id="myVoteForm" method="post">
								   {{ csrf_field() }}
									<input type="hidden" value="{{$poll[0]->id}}" name="poll_id">
									<input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" name="ip_address"><br><br>
									<input type="radio" class="myvote" value="yes" name="myvote">&nbsp;হ্যাঁ &nbsp;<br>
									<input type="radio" class="myvote" value="no" name="myvote">&nbsp;না&nbsp;<br>
									<input type="radio" class="myvote" value="nocomment" name="myvote" checked>&nbsp;মন্তব্য নেই<br><br>
									<input type="submit" id="vote_btn" class="btn btn-warning" value="ভোট দিন" >&nbsp;
									<a class="fb-signup" href="{{url('/votes/result')}}">পুরোনো ফলাফল</a>
								</form>
-->
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<h3 class="section-heading"><a href="">Viral</a></h3>
						<div class="viral">
							<div class="viral-carousel">
								@foreach($latest_news as $news)
									@if($news->category_id == 14	)


										<div class="single-viral-item">
											<div class="viral-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})">
												<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
													<h3>{{$news->title}}</h3>
												</a>
											</div>
										</div>

									@endif
								@endforeach


							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- art & culture , archive goes here -->
		<div class="section-padding news-section-imstrpos($news->details, " ", 120)+1">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<h3 class="section-heading"><a href="">Cultures</a></h3>
						<?php $i=1; ?>
							@foreach($latest_news as $news)
							    @if($news->category_id == 13 && $i<3)
							    <?php $i++; ?>
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url(public/images/news/featured/{{$news->featured_image}})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{$news->title}}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 720)+1); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
									</div>
								</div>

							@endif
						@endforeach
					</div>
					<div class="col-sm-5">
						<h3 class="section-heading"><a href="">Archives</a></h3>
						<div class="archive-calender">
								<div class="calendarjs"></div>
						</div>
						<!--Single add 460x180-->
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 10)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
							@endif

					</div>
				</div>
			</div>
		</div>


		<!-- picture of the day -->
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						@foreach($latest_news as $news)
							@if($news->category_id == 15)

								<div style="background-image: url(public/images/news/featured/{{$news->featured_image}});
											background-size: cover;
											background-position: center;
											height: 350px;">
									<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
										<h3>Today's Picture</h3>
									</a>
								</div>

							<?php break; ?>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>

		<!-- full width ad goes here -->
		<!--single advertise area-->
		<div class="section-padding advertise-252">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">

							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Home', 11)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[10]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt=""></a>
							@endif
					</div>
				</div>
			</div>
		</div>
		<!--single advertise area end-->

	</div>

@endsection
