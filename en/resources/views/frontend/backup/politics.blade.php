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
							<img ng-click="changeAd('International', 111)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
						@endif
						
					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id) && Auth::user()->role == 1)
							<img ng-click="changeAd('International', 112)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
							<img ng-click="changeAd('International', 113)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
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
						<div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-1" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[0]->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="slider-headline">
                                        <h3>{{ $all_news[0]->title }}</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                               <div class="breakingnews-bg breakingnews-bg-1" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[1]->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$all_news[1]->id) }}" class="slider-headline">
                                        <h3>{{ $all_news[1]->title }}</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                               <div class="breakingnews-bg breakingnews-bg-1" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[2]->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$all_news[2]->id) }}" class="slider-headline">
                                        <h3>{{ $all_news[2]->title }}</h3>
                                    </a>
                                </div>
                            </div>
					</div>
				</div>
				<div class="col-sm-3">
					<!-- ad here -->
					<div class="advertise-1">
						<a href="">
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('International', 114)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
				<h3 class="section-heading"><a href="">সাম্প্রতিক</a></h3>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[3]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[3]->id) }}">
							        <h3>{{$all_news[3]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[3]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[4]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[4]->id) }}">
							        <h3>{{$all_news[4]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[4]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
			</div>
			<div class="col-sm-7 col-xs-12">
				<h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
				<div class="video-slides">
					<div class="single-video-slide">
						<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-1 mfp-iframe">
							<div class="video-icon-table">
								<div class="video-icon-tablecell">
									<i class="fa fa-play"></i>
								</div>
							</div>
							<a href="{{ url('news/front/details/'.$all_news[5]->id) }}" class="slider-headline">
								<h3>{{$all_news[5]->title}}</h3>
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
							<a href="{{ url('news/front/details/'.$all_news[6]->id) }}" class="slider-headline">
								<h3>{{$all_news[6]->title}}</h3>
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
							<a href="{{ url('news/front/details/'.$all_news[7]->id) }}" class="slider-headline">
								<h3>{{$all_news[7]->title}}</h3>
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
				<a href="">
					@if(isset(Auth::user()->id) && Auth::user()->role == 1)
						<img ng-click="changeAd('International', 115)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
					@endif
				</a>
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->

<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[8]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[8]->id) }}">
							        <h3>{{$all_news[8]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[8]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[9]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[9]->id) }}">
							        <h3>{{$all_news[9]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[9]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[9]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[10]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[10]->id) }}">
							        <h3>{{$all_news[10]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[10]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[10]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[11]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[11]->id) }}">
							        <h3>{{$all_news[11]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[11]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[11]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[12]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[12]->id) }}">
							        <h3>{{$all_news[12]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[12]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[12]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					            </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[13]->featured_image)}})"></div>
					    <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[13]->id) }}">
							        <h3>{{$all_news[13]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[13]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[13]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
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
				<a href="">
					@if(isset(Auth::user()->id) && Auth::user()->role == 1)
						<img ng-click="changeAd('International', 116)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
					@endif
				</a>
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->

<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-xs-12">
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[14]->featured_image)}})"></div>
					   <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[14]->id) }}">
							        <h3>{{$all_news[14]->title}}</h3>
								    <p><?php echo mb_substr(strip_tags($all_news[14]->short_description), 0, 550); ?></p>
						            </a>
						            <a href="{{ url('news/front/details/'.$all_news[14]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					   </div>
				</div>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[15]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[15]->id) }}">
						    <h3>{{$all_news[15]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[15]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[15]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
			</div>
			<div class="col-sm-6 col-xs-12">
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[16]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[16]->id) }}">
						    <h3>{{$all_news[16]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[16]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[16]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[17]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[17]->id) }}">
						    <h3>{{$all_news[17]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[17]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[17]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[17]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[17]->id) }}">
						    <h3>{{$all_news[17]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[17]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[17]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[18]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[18]->id) }}">
						    <h3>{{$all_news[18]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[18]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[18]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[19]->featured_image)}})"></div>
					    <div class="news-content">
						    <a href="{{ url('news/front/details/'.$all_news[19]->id) }}">
						    <h3>{{$all_news[19]->title}}</h3>
							<p><?php echo mb_substr(strip_tags($all_news[19]->short_description), 0, 550); ?></p>
						      </a>
						      <a href="{{ url('news/front/details/'.$all_news[19]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					    </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[20]->featured_image)}})"></div>
					        <div class="news-content">
						        <a href="{{ url('news/front/details/'.$all_news[20]->id) }}">
						        <h3>{{$all_news[20]->title}}</h3>
							    <p><?php echo mb_substr(strip_tags($all_news[20]->short_description), 0, 550); ?></p>
						        </a>
						      <a href="{{ url('news/front/details/'.$all_news[20]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					 <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[21]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[21]->id) }}">
						            <h3>{{$all_news[21]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[21]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[21]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[22]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[22]->id) }}">
						            <h3>{{$all_news[22]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[22]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[22]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
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
				<a href="">
					@if(isset(Auth::user()->id) && Auth::user()->role == 1)
						<img ng-click="changeAd('International', 117)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
					@endif
				</a>
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->

<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[23]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[23]->id) }}">
						            <h3>{{$all_news[23]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[23]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[23]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[24]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[24]->id) }}">
						            <h3>{{$all_news[24]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[24]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[24]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					 <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[25]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[25]->id) }}">
						            <h3>{{$all_news[25]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[25]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[25]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[26]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[26]->id) }}">
						            <h3>{{$all_news[26]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[26]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[26]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					 <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[27]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[27]->id) }}">
						            <h3>{{$all_news[27]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[27]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[27]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[28]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[28]->id) }}">
						            <h3>{{$all_news[28]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[28]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[28]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
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
				<a href="">
					@if(isset(Auth::user()->id) && Auth::user()->role == 1)
						<img ng-click="changeAd('International', 118)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
					@endif
				</a>
			</div>
		</div>
	</div>
</div>
<!--single advertise area end-->

<div class="section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					 <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[29]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[29]->id) }}">
						            <h3>{{$all_news[29]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[29]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[29]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[30]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[30]->id) }}">
						            <h3>{{$all_news[30]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[30]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[30]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[31]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[31]->id) }}">
						            <h3>{{$all_news[31]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[31]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[31]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[32]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[32]->id) }}">
						            <h3>{{$all_news[32]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[32]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[32]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[33]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[33]->id) }}">
						            <h3>{{$all_news[33]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[33]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[33]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
				<div class="single-thumbnail-item-3">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[34]->featured_image)}})"></div>
					            <div class="news-content">
						            <a href="{{ url('news/front/details/'.$all_news[34]->id) }}">
						            <h3>{{$all_news[34]->title}}</h3>
							        <p><?php echo mb_substr(strip_tags($all_news[34]->short_description), 0, 550); ?></p>
						            </a>
						      <a href="{{ url('news/front/details/'.$all_news[34]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					        </div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection