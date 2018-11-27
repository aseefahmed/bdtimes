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
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Home', 1)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else 
								<a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
							
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							<img ng-click="changeAd('Home', 2)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
                        <img src="http://placehold.it/1000x100" alt="">
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
							<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[0]->featured_image) }})">
								<a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="slider-headline">
									<h3>{{ $all_news[0]->title }}</h3>>
								</a>
							</div>
						</div>
						<div class="single-breakingnews-item">
							<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[1]->featured_image) }})">
								<a href="{{ url('news/front/details/'.$all_news[1]->id) }}" class="slider-headline">
									<h3>{{ $all_news[1]->title }}</h3>
								</a>
							</div>
						</div>
						<div class="single-breakingnews-item">
							<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[2]->featured_image) }})">
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
                            <a href=""><img src="http://placehold.it/270x290" alt=""></a>
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
                    <h3 class="section-heading"><a href="">শিশু কিশোর</a></h3>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[3]->featured_image)}})"></div>
					<div class="news-content">
						<h3>{{$all_news[3]->title}}</h3>
						<p><?php echo mb_substr(strip_tags($all_news[3]->short_description), 0, 297); ?></p>
						<a href="{{ url('news/front/details/'.$all_news[3]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
				<div class="single-thumbnail-item-1">
					<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[4]->featured_image)}})"></div>
					<div class="news-content">
						<h3>{{$all_news[4]->title}}</h3>
						<p><?php echo mb_substr(strip_tags($all_news[4]->short_description), 0, 297); ?></p>
						<a href="{{ url('news/front/details/'.$all_news[4]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
                </div>
                <div class="col-sm-7 col-xs-12">
                    <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
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
                    <a href=""><img src="http://placehold.it/1200x250" alt=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>রঙ তুলি</h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">রঙ তুলি</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="{{ url('news/front/details/'.$all_news[8]->id) }}" class="slider-headline">
									<h3>{{$all_news[8]->title}}</h3>
								</a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                             <a href="{{ url('news/front/details/'.$all_news[9]->id) }}" class="slider-headline">
									<h3>{{$all_news[9]->title}}</h3>
								</a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                           <a href="{{ url('news/front/details/'.$all_news[10]->id) }}" class="slider-headline">
									<h3>{{$all_news[10]->title}}</h3>
								</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- big featured section -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>হাতে খড়ি</h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">হাতে খড়ি</a></h3>
                    </div>
                    <div class="single-featured-item">
                      <h3>{{$all_news[11]->title}}</h3>
                        <img src="url({{asset('public/images/news/featured/'.$all_news[11]->featured_image)}})">
                        <p><?php echo mb_substr(strip_tags($all_news[11]->short_description), 0, 297); ?></p>
                        <a href="{{ url('news/front/details/'.$all_news[11]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                       </div>
                </div>
                <div class="col-sm-5">
                    <div class="single-featured-item">
                        <h3>{{$all_news[12]->title}}</h3>
                        <img src="url({{asset('public/images/news/featured/'.$all_news[12]->featured_image)}})">
                        <p><?php echo mb_substr(strip_tags($all_news[12]->short_description), 0, 297); ?></p>
                        <a href="{{ url('news/front/details/'.$all_news[12]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- section-padding -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>মজার গল্প</h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">মজার গল্প</a></h3>
                    </div>
                    <div class="single-featured-item-big">
                         <h3>{{$all_news[12]->title}}</h3>
                        <img src="url({{asset('public/images/news/featured/'.$all_news[12]->featured_image)}})">
                        <p><?php echo mb_substr(strip_tags($all_news[12]->short_description), 0, 297); ?></p>
                        <a href="{{ url('news/front/details/'.$all_news[12]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
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

    <!-- video & photo gallary -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-5">
                    <h3 class="section-heading"><a href="">কিডস ভিডিও</a></h3>
                    <div class="video-slides">
                        <div class="single-video-slide">
                            <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-1 mfp-iframe">
                                <div class="video-icon-table">
                                    <div class="video-icon-tablecell">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                                <a href="{{ url('news/front/details/'.$all_news[13]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[13]->title}}</h3>
                                </a>
                            </a>
                        </div>
                        <div class="single-video-slide">
                            <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-2 mfp-iframe">
                                <div class="video-icon-table">
                                    <div class="video-icon-tablecell">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                                 <a href="{{ url('news/front/details/'.$all_news[14]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[14]->title}}</h3>
                                </a>
                            </a>
                        </div>
                        <div class="single-video-slide">
                            <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-3 mfp-iframe">
                                <div class="video-icon-table">
                                    <div class="video-icon-tablecell">
                                        <i class="fa fa-play"></i>
                                    </div>
                                </div>
                                <a href="{{ url('news/front/details/'.$all_news[15]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[15]->title}}</h3>
                                </a>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-7 pdt-10">
                    <h3 class="section-heading"><a href="">ফটো গ্যালারী</a></h3>
                    <div class="photo-gallary-slides">
                        <div class="single-gallary-photo">
                            <div class="gallary-photo-bg gallary-bg-1">
                                <a href="{{ url('news/front/details/'.$all_news[16]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[16]->title}}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-gallary-photo">
                            <div class="gallary-photo-bg gallary-bg-2">
                               <a href="{{ url('news/front/details/'.$all_news[17]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[17]->title}}</h3>
                                </a>
                            </div>
                        </div>
                        <div class="single-gallary-photo">
                            <div class="gallary-photo-bg gallary-bg-3">
                                <a href="{{ url('news/front/details/'.$all_news[18]->id) }}" class="slider-headline">
                                     <h3>{{$all_news[18]->title}}</h3>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection