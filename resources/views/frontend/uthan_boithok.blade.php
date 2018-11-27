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
                                <img ng-click="changeAd('Uthan', 492)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                            @endif

                        </div>
                        <div class="single-long-ad-right">
                            <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Uthan', 493)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
                                <img ng-click="changeAd('Uthan', 494)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
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
                            @if(count($uthan_breaking_news)>0)
                                <div class="breakingnews-carousel">
                                    @foreach($uthan_breaking_news as $news)
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                    <h3>{{ $news->title }}</h3>>
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="breakingnews-carousel">
                                    <div class="single-breakingnews-item">
                                        <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                        </div>
                                    </div>
                                </div>

                            @endif
                        </div>
                        <div class="col-sm-3">
                            <!-- ad here -->
                            <div class="advertise-1">
                                <a href="">
                                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('Uthan', 495)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
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
                        @if(count($uthan_recent)>0)
                            @foreach($uthan_recent as $news)
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
                    @if(count($uthan_vedios)>0)
                        <div class="col-sm-7 col-xs-12">
                            <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                            <div class="video-slides">
                                @foreach($uthan_vedios as $news)
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
                            <img ng-click="changeAd('Uthan', 496)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
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
                            <h2><a href="">বাল্যবিবাহ</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">বাল্যবিবাহ</a></h3>
                        </div>
                        @if(count($early_marriage)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$early_marriage[0]->id) }}">
                                                <h3>{{$early_marriage[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$early_marriage[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($early_marriage[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$early_marriage[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($early_marriage[0]->vedio_link !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$early_marriage[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$early_marriage[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
                                                <div class="video-icon-table">
                                                    <div class="video-icon-tablecell">
                                                        <i class="fa fa-play"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @else
                                    <div class="single-big-youtube">
                                        <div class="single-video-item" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        @else

                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">

                                    </div>
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
                    <div class="row">
                        @if(count($early_marriage)>1)
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$early_marriage[1]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <h3>{{$early_marriage[1]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($early_marriage[1]->details), 0, 550); ?></p>
                                        <a href="{{ url('news/front/details/'.$early_marriage[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                        @if(count($early_marriage)>2)
                            <div class="col-sm-6 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$early_marriage[2]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <h3>{{$early_marriage[2]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($early_marriage[2]->details), 0, 550); ?></p>
                                        <a href="{{ url('news/front/details/'.$early_marriage[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                            <img ng-click="changeAd('Uthan', 497)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
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
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2><a href="">নারীশিক্ষা</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">নারীশিক্ষা</a></h3>
                        </div>
                        @if(count($women_education)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$women_education[0]->id) }}">
                                                <h3>{{$women_education[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$women_education[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($women_education[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$women_education[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($women_education[0]->vedio_link !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$women_education[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$women_education[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                    @if(count($women_education)>1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$women_education[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$women_education[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($women_education[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$women_education[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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

                    @if(count($women_education)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$women_education[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$women_education[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($women_education[2]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$women_education[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                            <h2><a href="">গ্রামীন সাস্থ্যসেবা</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">গ্রামীন সাস্থ্যসেবা</a></h3>
                        </div>
                        @if(count($health_service)>0)
                            <div class="news-with-vdo-wrap">

                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$health_service[0]->id) }}">
                                                <h3>{{$health_service[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$health_service[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($health_service[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$health_service[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($health_service[0]->vedio_link !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$health_service[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$health_service[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                            <br><br><br>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    @if(count($health_service)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$health_service[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$health_service[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($health_service[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$health_service[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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

                    @if(count($health_service)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$health_service[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$health_service[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($health_service[2]->details), 0, 500); ?></p>
                                    <a href="{{ url('news/front/details/'.$health_service[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Uthan', 498)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
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
                            <h2><a href="">ই-থ্যসেবা কেন্দ্র</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">ই-থ্যসেবা কেন্দ্র</a></h3>
                        </div>
                        @if(count($e_info_service)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$e_info_service[0]->id) }}">
                                                <h3>{{$e_info_service[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$e_info_service[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($e_info_service[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$e_info_service[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($e_info_service[0]->vedio_link !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$e_info_service[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$e_info_service[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                    @if(count($e_info_service)>1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$e_info_service[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$e_info_service[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($e_info_service[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$e_info_service[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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

                    @if(count($e_info_service)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$e_info_service[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$e_info_service[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($e_info_service[2]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$e_info_service[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                            <h2><a href="">এনজিও ও গ্রামীণউন্নয়ন</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">এনজিও ও গ্রামীণউন্নয়ন</a></h3>
                        </div>
                        @if(count($ngos_development)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$ngos_development[0]->id) }}">
                                                <h3>{{$ngos_development[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ngos_development[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($ngos_development[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$ngos_development[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($ngos_development[0]->vedio_link !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$ngos_development[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$ngos_development[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                    @if(count($ngos_development)>1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ngos_development[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$rural_culture[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($ngos_development[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$ngos_development[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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

                    @if(count($ngos_development)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ngos_development[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$ngos_development[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($ngos_development[2]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$ngos_development[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                            <h2><a href="">তৃণমুলে বাজেট বাস্তবায়ন</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">তৃণমুলে বাজেট বাস্তবায়ন</a></h3>
                        </div>
                        @if(count($budget_implementation)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$budget_implementation[0]->id) }}">
                                                <h3>{{$budget_implementation[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$budget_implementation[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($budget_implementation[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$budget_implementation[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if($budget_implementation[0]->vedio_link  !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$budget_implementation[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$budget_implementation[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                    @if(count($budget_implementation)>1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$budget_implementation[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$budget_implementation[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($budget_implementation[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$budget_implementation[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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

                    @if(count($budget_implementation)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$budget_implementation[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$budget_implementation[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($budget_implementation[2]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$budget_implementation[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
            <a href="{{url('category/uthan-boithok/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
        </div>
        <br>
        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Uthan', 499)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->
    </div>
@endsection
