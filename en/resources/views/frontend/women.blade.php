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
					<div class="col-sm-2">
					    <div class="cta-bar">
					        <h2>Top news</h2>
					    </div>
					</div>
                    <div class="col-sm-7">
                        <div class="breakingnews-carousel">
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-1">
                                    <a href="" class="slider-headline">
                                        <h3>The customs duty was reduced to 10%</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-2">
                                    <a href="" class="slider-headline">
                                        <h3>Intercontinental meeting</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-3">
                                    <a href="" class="slider-headline">
                                        <h3>No more hurt on hillside damage</h3>
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
                    <h3 class="section-heading"><a href="">Category name</a></h3>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
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

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				       <h2>Joita</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Joita</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
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
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
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


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Corporate</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Corporate</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
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
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
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

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Life Style</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Life Style</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
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
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
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

    <!-- big video section -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Glamor and Beauty Tips</h2>
				    </div>
				</div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Glamor and Beauty Tips</a></h3>
                    </div>
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

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
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

    <!-- big video section -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Cooking house</h2>
				    </div>
				</div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Cooking house</a></h3>
                    </div>
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

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>unspoken words</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">unspoken words</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
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

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Victim Support</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Victim Support</a></h3>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>Unauthorized mountain cut forest</h3>
                            </a>
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
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>Balaam could not finish a song in 50 days!</h3>
                            <p>People have started returning to Dhaka after the Eid holiday. Today the crowd of people was on the road, rail and waterways on Friday.Eid these numbers increase a few times.  </p>
                            <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
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
@endsection
