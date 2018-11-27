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
                <div class="col-md-12">
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

                    @if(count($all_news)>1)
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="cta-bar">
                                    <h2>টপ নিউজ</h2>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="breakingnews-carousel">
                                    @if(isset($all_news[0]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[0]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="slider-headline">
                                                    <h3>{{ $all_news[0]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($all_news[1]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[1]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$all_news[1]->id) }}" class="slider-headline">
                                                    <h3>{{ $all_news[1]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($all_news[2]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[2]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$all_news[2]->id) }}" class="slider-headline">
                                                    <h3>{{ $all_news[2]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-3">
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
                    @endif
                </div>
            </div>
        </div>
        <!--slider area end-->

        <!--single advertise area-->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 5)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 6)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->


        <!--vdo reporting area-->
        <div class="section-padding news-section-img120">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-xs-12">
                        <h3 class="section-heading"><a href="">সাম্প্রতিক</a></h3>
                        @if(isset($all_news[3]))
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[3]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$all_news[3]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($all_news[3]->details), 0, 154); ?></p>
                                    <a href="{{ url('news/front/details/'.$all_news[3]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[4]))
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[4]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$all_news[4]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($all_news[4]->details), 0, 154); ?></p>
                                    <a href="{{ url('news/front/details/'.$all_news[4]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                        <div class="video-slides">
                            @if(isset($video_reporting[0]))
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[0]->featured_image) }})" class="video-play-btn long-height play-bg-1 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('news/front/details/'.$video_reporting[0]->id) }}" class="slider-headline">
                                            <h3>{{$video_reporting[0]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
                            @endif
                            @if(isset($video_reporting[1]))
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[1]->featured_image) }})" class="video-play-btn long-height play-bg-1 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('news/front/details/'.$video_reporting[1]->id) }}" class="slider-headline">
                                            <h3>{{$video_reporting[1]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
                            @endif
                            @if(isset($video_reporting[2]))
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[2]->featured_image) }})" class="video-play-btn long-height play-bg-1 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="{{ url('news/front/details/'.$video_reporting[2]->id) }}" class="slider-headline">
                                            <h3>{{$video_reporting[2]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                @if(count($all_news)>1)
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="cta-bar">
                                <h2>ছোট পর্দা</h2>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="cta-bar-alternative">
                                <h3 class="section-heading">ছোট পর্দা</h3>
                            </div>
                            <div class="big-section-slider">
                                <?php
                                $i=0;
                                ?>
                                @foreach($all_news as $index=>$news)
                                    @if( $i<3)
                                        <?php $i++; ?>
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

        <!--advertise area-->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 7)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 8)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--advertise area end-->

        <div class="section-padding news-section-im75">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        @if(isset($all_news[11]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[11]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[11]->id) }}">
                                        <h3>{{$all_news[11]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[11]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[11]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[12]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[12]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[12]->id) }}">
                                        <h3>{{$all_news[12]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[12]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[12]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        @if(isset($all_news[13]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[13]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[13]->id) }}">
                                        <h3>{{$all_news[13]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[13]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[13]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[14]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[14]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[14]->id) }}">
                                        <h3>{{$all_news[14]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[14]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[14]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        @if(isset($all_news[15]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[15]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[15]->id) }}">
                                        <h3>{{$all_news[15]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[15]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[15]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[16]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[16]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[16]->id) }}">
                                        <h3>{{$all_news[16]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[16]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[16]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--***********************-->
        <!--***********************-->
        <!--2nd-->

    <!--
<div class="movi-section section-padding">
	<div class="container">
		<div class="row">
			<div class="col-sm-2">
			    <div class="cta-bar">
			        <h2>ঢালিউড</h2>
			    </div>
			</div>
			<div class="col-md-3 col-sm-10">
				<div class="cta-bar-alternative">
				    <h3 class="section-heading">ঢালিউড</h3>
				</div>
				<h3 class="section-heading"><a href="">পাঠকের জিজ্ঞাসা</a></h3>
				<div class="single-news-item gray-bg news-section-im75">
				@if(isset($all_news[17]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[17]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[17]->id) }}">
								<h3>{{$all_news[17]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[17]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[17]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
    @if(isset($all_news[18]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[18]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[18]->id) }}">
								<h3>{{$all_news[18]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[18]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[18]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
    @if(isset($all_news[19]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[19]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[19]->id) }}">
								<h3>{{$all_news[19]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[19]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[19]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <h3 class="section-heading"><a href="">পাঠকের জিজ্ঞাসা</a></h3>
            <div class="single-news-item gray-bg news-section-im75">
@if(isset($all_news[20]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[20]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[20]->id) }}">
								<h3>{{$all_news[20]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[20]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[20]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
    @if(isset($all_news[21]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[21]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[21]->id) }}">
								<h3>{{$all_news[21]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[21]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[21]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
    @if(isset($all_news[22]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[22]->featured_image)}})"></div>
						    <div class="news-content">
							<a href="{{ url('news/front/details/'.$all_news[22]->id) }}">
								<h3>{{$all_news[22]->title}}</h3>
								<p><?php echo mb_substr(strip_tags($all_news[22]->details), 0, 154); ?></p>
							</a>
							<a href="{{ url('news/front/details/'.$all_news[22]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						</div>
					</div>
				@endif
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <h3 class="section-heading"><a href="">পাঠকের জিজ্ঞাসা</a></h3>
            <div class="custom-tab readers-qs">
                <ul class="tab-list text-center">
                    <li class="active"><a data-toggle="tab" href="#custom-tab-1">বাংলা</a></li>
                    <li><a data-toggle="tab" href="#custom-tab-2">হিন্দি</a></li>
                    <li><a data-toggle="tab" href="#custom-tab-3">হিন্দি</a></li>
                </ul>
                <div class="tab-content">
                    <div id="custom-tab-1" class="tab-pane fade in active">
                        <div class="single-news-item gray-bg">
@if(isset($all_news[23]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[23]->featured_image)}})"></div>
									    <div class="news-content">
										<a href="{{ url('news/front/details/'.$all_news[23]->id) }}">
											<h3>{{$all_news[23]->title}}</h3>
											<p><?php echo mb_substr(strip_tags($all_news[23]->details), 0, 154); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$all_news[23]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
									</div>
								</div>
				@endif
    @if(isset($all_news[24]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[24]->featured_image)}})"></div>
						                <div class="news-content">
							                <a href="{{ url('news/front/details/'.$all_news[24]->id) }}">
								            <h3>{{$all_news[24]->title}}</h3>
								            <p><?php echo mb_substr(strip_tags($all_news[24]->details), 0, 154); ?></p>
							                </a>
							        <a href="{{ url('news/front/details/'.$all_news[24]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						            </div>
								</div>
				@endif
    @if(isset($all_news[25]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[25]->featured_image)}})"></div>
						                <div class="news-content">
							                <a href="{{ url('news/front/details/'.$all_news[25]->id) }}">
								            <h3>{{$all_news[25]->title}}</h3>
								            <p><?php echo mb_substr(strip_tags($all_news[25]->details), 0, 154); ?></p>
							                </a>
							        <a href="{{ url('news/front/details/'.$all_news[25]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
						            </div>
								</div>
				@endif
    @if(isset($all_news[26]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[26]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[26]->id) }}">
							            <h3>{{$all_news[26]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[26]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[26]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
            </div>
        </div>
        <div id="custom-tab-2" class="tab-pane fade">
            <div class="single-news-item gray-bg">
@if(isset($all_news[27]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[27]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[27]->id) }}">
							            <h3>{{$all_news[27]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[27]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[27]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[28]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[28]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[28]->id) }}">
							            <h3>{{$all_news[28]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[28]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[28]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[29]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[29]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[29]->id) }}">
							            <h3>{{$all_news[29]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[29]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[29]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[30]))
        <div class="single-thumbnail-item-2 min-h75">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[30]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[30]->id) }}">
							            <h3>{{$all_news[30]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[30]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[30]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
            </div>
        </div>
        <div id="custom-tab-3" class="tab-pane fade">
            <div class="single-news-item gray-bg">
@if(isset($all_news[31]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[31]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[31]->id) }}">
							            <h3>{{$all_news[31]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[31]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[31]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[32]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[32]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[32]->id) }}">
							            <h3>{{$all_news[32]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[32]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[32]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[33]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[33]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[33]->id) }}">
							            <h3>{{$all_news[33]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[33]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[33]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
    @if(isset($all_news[34]))
        <div class="single-thumbnail-item-2">
            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[34]->featured_image)}})"></div>
					                <div class="news-content">
						                <a href="{{ url('news/front/details/'.$all_news[34]->id) }}">
							            <h3>{{$all_news[34]->title}}</h3>
							            <p><?php echo mb_substr(strip_tags($all_news[34]->details), 0, 154); ?></p>
						                </a>
						                <a href="{{ url('news/front/details/'.$all_news[34]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
					                </div>
								</div>
				@endif
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
</div>
-->

        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>বলিউড</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">বলিউড</h3>
                        </div>
                        <div class="big-section-slider">
                            <?php
                            $i=0;
                            ?>
                            @foreach($all_news as $index=>$news)
                                @if($i<3)
                                    <?php $i++; ?>
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
                    @if(isset($all_news[35]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[35]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[35]->id) }}">
                                        <h3>{{$all_news[35]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[35]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[35]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[36]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[36]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[36]->id) }}">
                                        <h3>{{$all_news[36]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[36]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[36]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[37]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[37]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[37]->id) }}">
                                        <h3>{{$all_news[37]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[37]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[37]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="section-padding">
            <div class="container">
                <div class="row">
                    @if(isset($all_news[38]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[38]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[38]->id) }}">
                                        <h3>{{$all_news[38]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[38]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[38]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[39]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[39]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[39]->id) }}">
                                        <h3>{{$all_news[39]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[39]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[39]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[40]))
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[40]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[40]->id) }}">
                                        <h3>{{$all_news[40]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[40]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[40]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>


        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>ঢালিউড</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">ঢালিউড</h3>
                        </div>
                        <div class="big-section-slider">
                            <?php
                            $i=0;
                            ?>
                            @foreach($all_news as $index=>$news)
                                @if($i<3)
                                    <?php $i++; ?>
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

        <!--advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 9)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--advertise area end-->

        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        @if(isset($all_news[41]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[41]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[41]->id) }}">
                                        <h3>{{$all_news[41]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[41]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[41]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[42]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[42]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[42]->id) }}">
                                        <h3>{{$all_news[42]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[42]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[42]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        @if(isset($all_news[43]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[43]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[43]->id) }}">
                                        <h3>{{$all_news[43]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[43]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[43]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[44]))
                            <div class="single-thumbnail-item-2">

                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[44]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[44]->id) }}">
                                        <h3>{{$all_news[44]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[44]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[44]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        @if(isset($all_news[45]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[45]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[45]->id) }}">
                                        <h3>{{$all_news[45]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[45]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[45]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        @endif
                        @if(isset($all_news[46]))
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[46]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[46]->id) }}">
                                        <h3>{{$all_news[46]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[46]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[46]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
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
                            <h2>হলিউড</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">হলিউড</h3>
                        </div>
                        <div class="big-section-slider">
                            <?php
                            $i=0;
                            ?>
                            @foreach($all_news as $index=>$news)
                                @if( $i<3)
                                    <?php $i++; ?>
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
                    @if(isset($all_news[47]))
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[47]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[47]->id) }}">
                                        <h3>{{$all_news[47]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[47]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[47]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[48]))
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[48]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[48]->id) }}">
                                        <h3>{{$all_news[48]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[48]->details), 0, 154); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[48]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(isset($all_news[49]))
                        <div class="col-md-4 col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-3">
                                <div class="news-img">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[49]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$all_news[49]->id) }}">
                                            <h3>{{$all_news[49]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($all_news[49]->details), 0, 154); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$all_news[49]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <a href=""><img src="http://www.allnewslinks.com/news/public/images/assets/banner_1501270642.jpeg" alt=""></a>
                            </div>
                        </div>
                </div>
            </div>

            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @if(isset($all_news[50]))
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[50]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$all_news[50]->id) }}">
                                            <h3>{{$all_news[50]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($all_news[50]->details), 0, 154); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$all_news[50]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div><br><br><br>
                            @endif
                            @if(isset($all_news[51]))
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[51]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$all_news[51]->id) }}">
                                            <h3>{{$all_news[51]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($all_news[51]->details), 0, 154); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$all_news[51]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-sm-6 col-xs-12">
                            @if(isset($all_news[52]))
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[52]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$all_news[52]->id) }}">
                                            <h3>{{$all_news[52]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($all_news[52]->details), 0, 154); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$all_news[52]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div><br><br>
                            @endif
                            @if(isset($all_news[53]))
                                <div class="single-thumbnail-item-1">

                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$all_news[53]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$all_news[53]->id) }}">
                                            <h3>{{$all_news[53]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($all_news[53]->details), 0, 154); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$all_news[53]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>


            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            @if(isset($all_news[54]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[54]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[54]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[54]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div><br>
                            @endif
                            @if(isset($all_news[55]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[55]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[55]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[55]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div><br>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            @if(isset($all_news[56]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[56]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[56]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[56]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div><br>
                            @endif
                            @if(isset($all_news[57]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[57]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[57]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[57]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            @if(isset($all_news[58]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[58]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[58]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[58]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                            @if(isset($all_news[59]))
                                <div class="single-thumbnail-item-1">
                                    <div class="news-content">
                                        <h3>{{$all_news[59]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[59]->details), 0, 154); ?></p>
                                        <a href="{{ url('news/front/details/'.$all_news[59]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="container">
                <a href="{{url('category/entertainment/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
            </div>
            <br>

        </div>
    </div>
@endsection
