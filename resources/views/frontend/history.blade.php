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
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Probash', 192)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else
								<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif

						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Probash', 193)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('Probash', 194)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
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
								<h2>টপ নিউজ</h2>
							</div>
						</div>
						<div class="col-sm-7">
							@if(count($history_breaking_news)>0)
								<div class="breakingnews-carousel">
									@foreach($history_breaking_news as $news)
										<div class="single-breakingnews-item">
											<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
												<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
													<h3>{{ $news->title }}</h3>
												</a>
											</div>
										</div>
									@endforeach
								</div>

							@endif
						</div>
						<div class="col-sm-3">
							<!-- ad here -->
							<div class="advertise-1">
								<a href="">
									@if(isset(Auth::user()->id) && Auth::user()->role == 1)
										<img ng-click="changeAd('Probash', 195)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
						<h3 class="section-heading">সব খবর<a href=""></a></h3>
						@if(count($history_recent)>0)
						@foreach($history_recent as $news)
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$news->title}}</h3>
									<p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						@endforeach
							@else
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
								<div class="news-content">
									</a>
								</div>
							</div>
						@endif

					</div>
					@if(count($history_vedios)>0)
					<div class="col-sm-7 col-xs-12">
						<h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
						<div class="video-slides">
							@foreach($history_vedios as $news)
								<div class="single-video-slide">
									<a href="{{$news->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
						@else
                        <div class="col-sm-7 col-xs-12">
                            <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">

                                    </a>

                                </div>
                            </div>
                        </div>
					@endif
				</div>
			</div>
		</div>
		<!--single advertise area-->
		<div class="section-padding advertise-2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('Probash', 196)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
						@endif
					</div>
				</div>
			</div>
		</div>
		<!--single advertise area end-->
		<!-- news with youtube vdo section style 2 -->



		<!-- news with youtube vdo section style 2 -->
		<div class="section-padding news-with-vdo-section yt-secion-style2">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">ঐতিহাসিক স্থান</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">ঐতিহাসিক স্থান</a></h3>
						</div>
						@if(count($historical_place)>0)
							<div class="news-with-vdo-wrap">
								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$historical_place[0]->id) }}">
												<h3>{{$historical_place[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$historical_place[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($historical_place[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$historical_place[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($historical_place[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$historical_place[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$historical_place[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					<div class="row">
						@if(count($historical_place)>1)
							<div class="col-sm-6 col-xs-12">
								<div class="single-thumbnail-item-1">
									<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$historical_place[1]->featured_image)}})"></div>
									<div class="news-content">
										<h3>{{$historical_place[1]->title}}</h3>
										<p><?php echo mb_substr(strip_tags($historical_place[1]->details), 0, 550); ?></p>
										<a href="{{ url('news/front/details/'.$historical_place[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
                            @else
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
						@endif
						@if(count($historical_place)>2)
							<div class="col-sm-6 col-xs-12">
								<div class="single-thumbnail-item-1">
									<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$historical_place[2]->featured_image)}})"></div>
									<div class="news-content">
										<h3>{{$historical_place[2]->title}}</h3>
										<p><?php echo mb_substr(strip_tags($historical_place[2]->details), 0, 550); ?></p>
										<a href="{{ url('news/front/details/'.$historical_place[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
									</div>
								</div>
							</div>
                            @else
                                <div class="col-sm-6 col-xs-12">
                                    <div class="single-thumbnail-item-1">
                                        <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                        <div class="news-content">
                                            </a>
                                        </div>
                                    </div>
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
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('Probash', 197)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
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
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">স্থাপনা</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">স্থাপনা</a></h3>
						</div>
						@if(count($sthapona)>0)
							<div class="news-with-vdo-wrap">
								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$sthapona[0]->id) }}">
												<h3>{{$sthapona[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$sthapona[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($sthapona[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$sthapona[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($sthapona[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$sthapona[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$sthapona[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					@if(count($sthapona)>1)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$sthapona[1]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$sthapona[1]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($sthapona[1]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$sthapona[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
					@if(count($sthapona)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$sthapona[2]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$sthapona[2]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($sthapona[2]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$sthapona[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
					@endif
				</div>
			</div>
		</div>
		<!-- news with youtube vdo section style 2 -->
		<div class="section-padding news-with-vdo-section yt-secion-style2">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">শিল্পকর্ম</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">শিল্পকর্ম</a></h3>
						</div>
						@if(count($silpokormo)>0)
							<div class="news-with-vdo-wrap">

								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$silpokormo[0]->id) }}">
												<h3>{{$silpokormo[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$silpokormo[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($silpokormo[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$silpokormo[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($silpokormo[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$silpokormo[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$silpokormo[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					@if(count($silpokormo)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$silpokormo[1]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$silpokormo[1]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($silpokormo[1]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$silpokormo[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
					@if(count($silpokormo)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$silpokormo[2]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$silpokormo[2]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($silpokormo[2]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$silpokormo[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
					@endif
				</div>
			</div>
		</div>
		<!--single advertise area-->
		<div class="section-padding advertise-2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('Probash', 198)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
						@else
							<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
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
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">হারিয়ে যাওয়া ঐতিহ্য</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">হারিয়ে যাওয়া ঐতিহ্য</a></h3>
						</div>
						@if(count($lost_tradition)>0)
							<div class="news-with-vdo-wrap">
								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$lost_tradition[0]->id) }}">
												<h3>{{$lost_tradition[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$lost_tradition[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($lost_tradition[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$lost_tradition[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($lost_tradition[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$lost_tradition[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$lost_tradition[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif

					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					@if(count($lost_tradition)>1)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$lost_tradition[1]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$lost_tradition[1]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($lost_tradition[1]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$lost_tradition[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
					@if(count($lost_tradition)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$lost_tradition[2]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$lost_tradition[2]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($lost_tradition[2]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$lost_tradition[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                            <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
				</div>
			</div>
		</div>

		<br>
		<br>
		<!-- news with youtube vdo section style 2 -->
		<div class="section-padding news-with-vdo-section yt-secion-style2">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">সংস্কৃতি</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">সংস্কৃতি</a></h3>
						</div>
						@if(count($rural_culture)>0)
							<div class="news-with-vdo-wrap">
								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$rural_culture[0]->id) }}">
												<h3>{{$rural_culture[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$rural_culture[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($rural_culture[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$rural_culture[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($rural_culture[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$rural_culture[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$rural_culture[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					@if(count($rural_culture)>1)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$probash_jibon[1]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$rural_culture[1]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($rural_culture[1]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$rural_culture[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
					@if(count($rural_culture)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$rural_culture[2]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$rural_culture[2]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($rural_culture[2]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$rural_culture[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
					@endif
				</div>
			</div>
		</div>


		<div class="section-padding news-with-vdo-section yt-secion-style2">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="cta-bar">
							<h2><a href="">গ্রামীন খেলা</a></h2>
						</div>
					</div>
					<div class="col-md-10">
						<div class="cta-bar-alternative">
							<h3 class="section-heading"><a href="">গ্রামীন খেলা</a></h3>
						</div>
						@if(count($rural_sports)>0)
							<div class="news-with-vdo-wrap">
								<div class="news-section-img150">
									<div class="single-thumbnail-item-2">
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$rural_sports[0]->id) }}">
												<h3>{{$rural_sports[0]->title}}</h3>
												<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$rural_sports[0]->featured_image)}})"></div>
												<p><?php echo mb_substr(strip_tags($rural_sports[0]->details), 0, 2050); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$rural_sports[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								</div>
								@if($rural_sports[0]->vedio_link !=null)
									<div class="single-big-youtube">
										<div class="single-video-item">
											<a href="{{$rural_sports[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$rural_sports[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
												<div class="video-icon-table">
													<div class="video-icon-tablecell">
														<i class="fa fa-play"></i>
													</div>
												</div>
											</a>
										</div>
									</div>
								@endif
							</div>
						@endif
					</div>
				</div>
			</div>
		</div>
		<div class="section-padding">
			<div class="container">
				<div class="row">
					@if(count($rural_sports)>1)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$rural_sports[1]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$rural_sports[1]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($rural_sports[1]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$rural_sports[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
					@endif
					@if(count($rural_sports)>2)
						<div class="col-sm-6 col-xs-12">
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$rural_sports[2]->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$rural_sports[2]->title}}</h3>
									<p><?php echo mb_substr(strip_tags($rural_sports[2]->details), 0, 550); ?></p>
									<a href="{{ url('news/front/details/'.$rural_sports[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
                        @else
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
					@endif
				</div>
			</div>
		</div>


		<br>
		<div class="container">
			<a href="{{url('category/history/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
		</div>
		<br>
		<!--single advertise area-->
		<div class="section-padding advertise-2">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('Probash', 199)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
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