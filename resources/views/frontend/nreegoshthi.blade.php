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
                            @if(count($nreegoshthi_breaking_news)>0)
                                <div class="breakingnews-carousel">
                                    @foreach($nreegoshthi_breaking_news as $news)
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
                                <div class="single-breakingnews-item">
                                    <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                    </div>
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
                        @if(count($nreegoshthi_recent)>0)
                            @foreach($nreegoshthi_recent as $news)
                                @if($news->title !=null)
                                    <div class="single-thumbnail-item-1">
                                        <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                        <div class="news-content">
                                            <h3>{{$news->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 550); ?></p>
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="single-thumbnail-item-1">
                                        <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                        <div class="news-content">
                                            </a>
                                        </div>
                                    </div>
                                @endif
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
                    @if(count($nreegoshthi_vedios)>0)
                        <div class="col-sm-7 col-xs-12">
                            <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                            <div class="video-slides">
                                @foreach($nreegoshthi_vedios as $news)
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
                            <h2><a href="">জীবন-জীবিকা</a></h2>
                        </div>
                    </div>
                    <div class="col-md-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading"><a href="">জীবন-জীবিকা</a></h3>
                        </div>
                        @if(count($life_living)>0)
                            <div class="news-with-vdo-wrap">
                                <div class="news-section-img150">
                                    <div class="single-thumbnail-item-2">
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$life_living[0]->id) }}">
                                                <h3>{{$life_living[0]->title}}</h3>
                                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$life_living[0]->featured_image)}})"></div>
                                                <p><?php echo mb_substr(strip_tags($life_living[0]->details), 0, 2050); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$life_living[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                </div>
                                @if(($life_living[0]->vedio_link) !=null)
                                    <div class="single-big-youtube">
                                        <div class="single-video-item">
                                            <a href="{{$life_living[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$life_living[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
    </div>
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="row">
                    @if(count($life_living)>1)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$life_living[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$life_living[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($life_living[1]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$life_living[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                    @if(count($life_living)>2)
                        <div class="col-sm-6 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$life_living[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$life_living[2]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($life_living[2]->details), 0, 550); ?></p>
                                    <a href="{{ url('news/front/details/'.$life_living[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
    <!--<div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
                        <img ng-click="changeAd('Probash', 197)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>-->
    <!--single advertise area end-->
    <!-- news with youtube vdo section style 2 -->
    <div class="section-padding news-with-vdo-section yt-secion-style2">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2><a href="">সমস্যা</a></h2>
0                    </div>
                </div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">সমস্যা</a></h3>
                    </div>
                    @if(count($problem)>0)
                        <div class="news-with-vdo-wrap">
                            <div class="news-section-img150">
                                <div class="single-thumbnail-item-2">
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$problem[0]->id) }}">
                                            <h3>{{$problem[0]->title}}</h3>
                                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$problem[0]->featured_image)}})"></div>
                                            <p><?php echo mb_substr(strip_tags($problem[0]->details), 0, 2050); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$problem[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                            @if($problem[0]->vedio_link !=null)
                                <div class="single-big-youtube">
                                    <div class="single-video-item">
                                        <a href="{{$problem[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$problem[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                        @else
                        <div class="single-thumbnail-item-2">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                                </a>
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
                @if(count($problem)>1)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$problem[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$problem[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($problem[1]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$problem[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                @if(count($problem)>2)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$problem[2]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$problem[2]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($problem[2]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$problem[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                        <h2><a href="">সম্ভাবনা</a></h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">সম্ভাবনা</a></h3>
                    </div>
                    @if(count($possibility)>0)
                        <div class="news-with-vdo-wrap">

                            <div class="news-section-img150">
                                <div class="single-thumbnail-item-2">
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$possibility[0]->id) }}">
                                            <h3>{{$possibility[0]->title}}</h3>
                                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$possibility[0]->featured_image)}})"></div>
                                            <p><?php echo mb_substr(strip_tags($possibility[0]->details), 0, 2050); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$possibility[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                            @if($possibility[0]->vedio_link !=null)
                                <div class="single-big-youtube">
                                    <div class="single-video-item">
                                        <a href="{{$possibility[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$possibility[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                @if(count($possibility)>2)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$possibility[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$possibility[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($possibility[1]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$possibility[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                @if(count($possibility)>2)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$possibility[2]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$possibility[2]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($possibility[2]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$possibility[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
    <!--<div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
                        <img ng-click="changeAd('Probash', 198)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>-->
    <!--single advertise area end-->
    <!-- news with youtube vdo section style 2 -->
    <div class="section-padding news-with-vdo-section yt-secion-style2">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2><a href="">খাদ্য অভ্যাস</a></h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">খাদ্য অভ্যাস</a></h3>
                    </div>
                    @if(count($food_habit)>0)
                        <div class="news-with-vdo-wrap">
                            <div class="news-section-img150">
                                <div class="single-thumbnail-item-2">
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$food_habit[0]->id) }}">
                                            <h3>{{$food_habit[0]->title}}</h3>
                                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$food_habit[0]->featured_image)}})"></div>
                                            <p><?php echo mb_substr(strip_tags($food_habit[0]->details), 0, 2050); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$food_habit[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                            @if($food_habit[0]->vedio_link !=null)
                                <div class="single-big-youtube">
                                    <div class="single-video-item">
                                        <a href="{{$food_habit[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$food_habit[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                @if(count($food_habit)>1)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$food_habit[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$food_habit[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($food_habit[1]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$food_habit[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                @if(count($food_habit)>2)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$food_habit[2]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$food_habit[2]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($food_habit[2]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$food_habit[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                        <h2><a href="">রীতি ও আচার অনুষ্ঠান</a></h2>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">রীতি ও আচার অনুষ্ঠান</a></h3>
                    </div>
                    @if(count($ritual_event)>0)
                        <div class="news-with-vdo-wrap">
                            <div class="news-section-img150">
                                <div class="single-thumbnail-item-2">
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$ritual_event[0]->id) }}">
                                            <h3>{{$ritual_event[0]->title}}</h3>
                                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ritual_event[0]->featured_image)}})"></div>
                                            <p><?php echo mb_substr(strip_tags($ritual_event[0]->details), 0, 500); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$ritual_event[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                            </div>
                            @if($ritual_event[0]->vedio_link  !=null)
                                <div class="single-big-youtube">
                                    <div class="single-video-item">
                                        <a href="{{$ritual_event[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$ritual_event[0]->featured_image) }})"  class="video-play-btn long-height play-bg-1 mfp-iframe">
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
                @if(count($ritual_event)>1)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ritual_event[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$ritual_event[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($ritual_event[1]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$ritual_event[1]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
                @if(count($ritual_event)>2)
                    <div class="col-sm-6 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$ritual_event[2]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$ritual_event[2]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($ritual_event[2]->details), 0, 550); ?></p>
                                <a href="{{ url('news/front/details/'.$ritual_event[2]->id) }}" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
        <a href="{{url('category/nreegoshthi/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
    </div>
    <br>
    <!--single advertise area-->
    <!--
    <div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
                        <img ng-click="changeAd('Probash', 200)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>-->
    <!--single advertise area end-->
    </div>
@endsection
