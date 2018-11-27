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
                                    <img ng-click="changeAd('Travel', 201)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                @endif

                            </div>
                            <div class="single-long-ad-right">
                                <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('Travel', 202)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- big slider -->
        <div class="section-padding padding-top-zero">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>টপ নিউজ</h2>
                        </div>
                    </div>
                    @if(count($travel_news)>0)
                        <div class="col-sm-10">
                            <div class="big-section-slider">
                                @foreach($travel_news as $news)
                                    <div class="single-big-slider big-bg-1">
                                        <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                <h3>{{ $news->title }}</h3>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @else
                        <div class="col-sm-10">
                            <div class="big-section-slider">

                                <div class="single-big-slider big-bg-1">
                                    <div class="breakingnews-bg" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">

                                    </div>
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
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Travel', 203)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
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
                        <h3 class="section-heading"><a href="">ভ্রমন</a></h3>
                        @if(count($travel_recent)>0)
                            @foreach($travel_recent as $news)
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

                    @if(count($travel_vedios)>0)
                        <div class="col-sm-7 col-xs-12">
                            <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                            <div class="video-slides">

                                @foreach($travel_vedios as $news)
                                    <div class="single-video-slide">
                                        <a href="{{$news->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})" class="video-play-btn play-bg-1 mfp-iframe">
                                            <div class="video-icon-table">
                                                <div class="video-icon-tablecell">
                                                    <i class="fa fa-play"></i>
                                                </div>
                                            </div>
                                            <a href="" class="slider-headline">
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

        <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>দর্শনীয় স্থান</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">দর্শনীয় স্থান</h3>
                        </div>
                        <div class="big-section-slider">
                            @if(count($travel_droshonio)>0)
                                @foreach($travel_droshonio as $index=>$news)
                                    @if($index<3)
                                        <div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                            <a href="" class="slider-headline">
                                                <h3>{{$news->title}}</h3>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            @else
                                <div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                    <a href="" class="slider-headline">

                                    </a>
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

                    <div class="col-sm-6 col-xs-12">
                        @if(isset($travel_droshonio[3]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[3]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[3]->id) }}">
                                        <h3>{{$travel_droshonio[3]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[3]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>

                        @if(isset($travel_droshonio[4]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[4]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[4]->id) }}">
                                        <h3>{{$travel_droshonio[4]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[4]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>
                        @if(isset($travel_droshonio[5]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[5]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[5]->id) }}">
                                        <h3>{{$travel_droshonio[5]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[5]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[5]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif

                    </div>



                    <div class="col-sm-6 col-xs-12">


                        @if(isset($travel_droshonio[6]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[6]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[6]->id) }}">
                                        <h3>{{$travel_droshonio[6]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[6]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[6]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif

                        <br>

                        @if(isset($travel_droshonio[7]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[7]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[7]->id) }}">
                                        <h3>{{$travel_droshonio[7]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[7]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[7]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>
                        @if(isset($travel_droshonio[8]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_droshonio[8]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[8]->id) }}">
                                        <h3>{{$travel_droshonio[8]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_droshonio[8]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_droshonio[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
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

        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Travel', 204)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->


        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>সময় সূচী</h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">সময় সূচী</h3>
                        </div>
                        <div class="custom-tab readers-qs">
                            <ul class="tab-list text-center">
                                <li class="active"><a data-toggle="tab" href="#custom-tab-1">বাস</a></li>
                                <li><a data-toggle="tab" href="#custom-tab-2">ট্রেন</a></li>
                                <li><a data-toggle="tab" href="#custom-tab-3">বিমান</a></li>
                                <li><a data-toggle="tab" href="#custom-tab-3">লঞ্চ</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="custom-tab-1" class="tab-pane fade in active">
                                    <div class="single-news-item gray-bg">
                                        @if(count($travel_time_bus)>0)
                                            @foreach($travel_time_bus as $news)
                                                <div class="single-thumbnail-item-2 min-h75">
                                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 400); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="custom-tab-2" class="tab-pane fade">
                                    <div class="single-news-item gray-bg">
                                        @if(count($travel_time_train))
                                            @foreach($travel_time_train as $news)
                                                <div class="single-thumbnail-item-2 min-h75">
                                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 400); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="custom-tab-3" class="tab-pane fade">
                                    <div class="single-news-item gray-bg">
                                        @if(count($travel_time_biman)>0)
                                            @foreach($travel_time_biman as $news)
                                                <div class="single-thumbnail-item-2 min-h75">
                                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 400); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                <div id="custom-tab-4" class="tab-pane fade">
                                    <div class="single-news-item gray-bg">
                                        @if(count($travel_time_lunch))
                                            @foreach($travel_time_lunch as $news)
                                                <div class="single-thumbnail-item-2 min-h75">
                                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 400); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                                    </div>
                                                </div>
                                                <br>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>টিপস</h2>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">টিপস</h3>
                        </div>
                        @if(count($travel_tips)>0)
                            <div class="single-news-item gray-bg min-h">
                                @foreach($travel_tips as $news)
                                    <div class="single-thumbnail-item-2">
                                        <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$news->id) }}">
                                                <h3>{{$news->title}}</h3>
                                                <p><?php echo mb_substr(strip_tags($news->details), 0, 400); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                        </div>
                                    </div>
                                    <br>
                                @endforeach
                            </div>
                        @else
                            <div class="single-news-item gray-bg min-h">

                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">

                                    </div>
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
                            <h2>কোথায়-কিভাব</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">কোথায়-কিভাব</h3>
                        </div>
                        @if(count($travel_kothay)>0)
                            <div class="big-section-slider">
                                @foreach($travel_kothay as $index=>$news)
                                    @if($index<3)
                                        <div class="single-big-slider" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})">
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                <h3>{{$news->title}}</h3>
                                            </a>
                                        </div>

                                    @endif

                                @endforeach

                            </div>
                        @else
                            <div class="big-section-slider">
                                <div class="single-big-slider" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
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

                    <div class="col-sm-4 col-xs-12">
                        @if(isset($travel_kothay[3]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[3]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[3]->id) }}">
                                        <h3>{{$travel_kothay[3]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[3]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>

                        @if(isset($travel_kothay[4]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[4]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[4]->id) }}">
                                        <h3>{{$travel_kothay[4]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[4]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>



                    <div class="col-sm-4 col-xs-12">
                        @if(isset($travel_kothay[5]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[5]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[5]->id) }}">
                                        <h3>{{$travel_kothay[5]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[5]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[5]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>

                        @if(isset($travel_kothay[6]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[6]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[6]->id) }}">
                                        <h3>{{$travel_kothay[6]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[6]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[6]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>

                    <div class="col-sm-4 col-xs-12">
                        @if(isset($travel_kothay[7]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[7]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[7]->id) }}">
                                        <h3>{{$travel_kothay[7]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[7]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[7]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                    </a>
                                </div>
                            </div>
                        @endif
                        <br>

                        @if(isset($travel_kothay[8]))
                            <div class="single-thumbnail-item-3">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_kothay[8]->featured_image)}})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$travel_kothay[8]->id) }}">
                                        <h3>{{$travel_kothay[8]->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($travel_kothay[8]->details), 0, 400); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$travel_kothay[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <br>
                        @else
                            <div class="single-thumbnail-item-3">
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

        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Travel', 205)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
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
                            <h2>ভ্রমন অভিজ্ঞত</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">ভ্রমন অভিজ্ঞত</h3>
                        </div>
                        @if(count($travel_exp)>0)
                            <div class="big-section-slider">
                                @foreach($travel_exp as $index=>$news)
                                    @if($index<3)
                                        <div class="single-big-slider" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})">
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                <h3>{{$news->title}}</h3>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        @else
                            <div class="big-section-slider">
                                <div class="single-big-slider" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                </div>
                                @endif
                            </div>
                    </div>
                </div>
            </div>

            <div class="section-padding">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_exp[3]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[3]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[3]->id) }}">
                                            <h3>{{$travel_exp[3]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[3]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_exp[4]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[4]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[4]->id) }}">
                                            <h3>{{$travel_exp[4]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[4]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>



                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_exp[5]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[5]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[5]->id) }}">
                                            <h3>{{$travel_exp[5]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[5]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[5]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_exp[6]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[6]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[6]->id) }}">
                                            <h3>{{$travel_exp[6]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[6]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[6]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_exp[7]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[7]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[7]->id) }}">
                                            <h3>{{$travel_exp[7]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[7]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[7]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_exp[8]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_exp[8]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_exp[8]->id) }}">
                                            <h3>{{$travel_exp[8]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_exp[8]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_exp[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
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

            <!-- big slider -->
            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="cta-bar">
                                <h2>বিবিদ</h2>
                            </div>
                        </div>
                        <div class="col-sm-10">
                            <div class="cta-bar-alternative">
                                <h3 class="section-heading">বিবিদ</h3>
                            </div>
                            @if(count($travel_bibid)>0)
                                <div class="big-section-slider">
                                    @foreach($travel_bibid as $index=>$news)
                                        @if($index<3)
                                            <div class="single-big-slider" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})">
                                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                    <h3>{{$news->title}}</h3>
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @else
                                <div class="big-section-slider">
                                    <div class="single-big-slider" style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
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
                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_bibid[3]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[3]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[3]->id) }}">
                                            <h3>{{$travel_bibid[3]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[3]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[3]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_bibid[4]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[4]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[4]->id) }}">
                                            <h3>{{$travel_bibid[4]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[4]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[4]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>


                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_bibid[5]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[5]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[5]->id) }}">
                                            <h3>{{$travel_bibid[5]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[5]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[5]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_bibid[6]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[6]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[6]->id) }}">
                                            <h3>{{$travel_bibid[6]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[6]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[6]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="col-sm-4 col-xs-12">
                            @if(isset($travel_bibid[7]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[7]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[7]->id) }}">
                                            <h3>{{$travel_bibid[7]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[7]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[7]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                            <br>

                            @if(isset($travel_bibid[8]))
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$travel_bibid[8]->featured_image)}})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$travel_bibid[8]->id) }}">
                                            <h3>{{$travel_bibid[8]->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($travel_bibid[8]->details), 0, 400); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$travel_bibid[8]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
                                    </div>
                                </div>
                                <br>
                            @else
                                <div class="single-thumbnail-item-3">
                                    <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                    <div class="news-content">
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>


                    </div>
                </div>

                <div class="container">
                    <a href="{{url('category/travel/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
                </div>
                <br>

            </div>
        </div>
@endsection
