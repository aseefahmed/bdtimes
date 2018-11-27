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
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="cta-bar">
                                <h2>টপ নিউজ</h2>
                            </div>
                        </div>


                        <div class="col-sm-7">
                            @if(count($all_news)>0)
                                <div class="breakingnews-carousel">
                                    @foreach($all_news as $news)

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
        <!--slider area end-->

        <!--vdo reporting area-->
        <div class="section-padding news-section-img120">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5 col-xs-12">
                        <h3 class="section-heading"><a href="">সব খবর</a></h3>
                        @if(count($all_news)>1)
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[0]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[0]->id) }}">
                                        <h3>{{$all_news[0]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[0]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
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

                        @if(count($all_news)>2)
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[1]->id) }}">
                                        <h3>{{$all_news[1]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[1]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[1]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
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
                    </div>

                    @if(count($video_reporting)>0)
                        <div class="col-sm-7 col-xs-12">
                            <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                            <div class="video-gallary-slides video-gallary-page">
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[0]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[0]->featured_image) }})" class="video-play-btn play-bg-1 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="" class="slider-headline">
                                            <h3>{{$video_reporting[0]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[1]->featured_image) }})" class="video-play-btn play-bg-2 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="" class="slider-headline">
                                            <h3>{{$video_reporting[1]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[2]->featured_image) }})" class="video-play-btn play-bg-3 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="" class="slider-headline">
                                            <h3>{{$video_reporting[2]->title}}</h3>
                                        </a>
                                    </a>
                                </div>
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
                            <img ng-click="changeAd('Home', 5)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->

        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>স্বাস্থ্য পরামর্শ</h2>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="breakingnews-carousel">
                            @if(count($health_news)>1)
                                @foreach($health_news as $news)
                                    <div class="single-breakingnews-item">
                                        <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                <h3>{{ $news->title }}</h3>>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>

        <br>
        <br>



        <div class="section-padding">
            <div class="container">
                <div class="row">
                    @if(count($all_news)>3)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[2]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[2]->id) }}">
                                        <h3>{{$all_news[2]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[2]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[2]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($all_news)>4)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[3]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[3]->id) }}">
                                        <h3>{{$all_news[3]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[3]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($all_news)>5)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[4]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[4]->id) }}">
                                        <h3>{{$all_news[4]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[4]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
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
        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>মনোজগৎ</h2>
                        </div>
                    </div>

                    <div class="col-sm-7">
                        @if(count($mind_news)>1)
                            <div class="breakingnews-carousel">

                                @foreach($mind_news as $news)
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


                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    @if(count($all_news)>6)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[5]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[5]->id) }}">
                                        <h3>{{$all_news[5]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[5]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[5]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>

                    @endif
                    @if(count($all_news)>7)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[6]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[6]->id) }}">
                                        <h3>{{$all_news[6]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[6]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[6]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($all_news)>8)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[7]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[7]->id) }}">
                                        <h3>{{$all_news[7]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[7]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[7]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
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

        <!-- big video section -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>পাঠের জিজ্ঞাসা</h2>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        @if(count($miscellaneous_news)>1)
                            <div class="breakingnews-carousel">
                                @foreach($miscellaneous_news as $news)
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
                </div>
            </div>
        </div>

        <div class="section-padding">
            <div class="container">
                <div class="row">
                    @if(count($all_news)>9)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[8]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[8]->id) }}">
                                        <h3>{{$all_news[8]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[8]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(count($all_news)>10)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[9]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[9]->id) }}">
                                        <h3>{{$all_news[9]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[9]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[9]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-sm-4 col-xs-12">
                                <div class="single-thumbnail-item-1">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            </div>
                    @endif
                    @if(count($all_news)>11)
                        <div class="col-sm-4 col-xs-12">
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[10]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$all_news[10]->id) }}">
                                        <h3>{{$all_news[10]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($all_news[10]->details), 0, 120); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$all_news[10]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                        @else
                            <div class="col-sm-4 col-xs-12">
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
        <div class="container">
            <a href="{{url('category/lifestyle/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
        </div>
        <br>

        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Home', 6)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
