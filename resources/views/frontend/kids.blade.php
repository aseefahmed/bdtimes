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
                                    <a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                @endif

                            </div>
                            <div class="single-long-ad-right">
                                <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('Home', 2)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
                                @else
                                    <a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
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

                        @if(count($all_news)>2)
                            <div class="col-sm-7">
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
                        @else
                            <div class="col-sm-7">
                                <div class="breakingnews-carousel">
                                    <div class="single-breakingnews-item">
                                        <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class="col-sm-3">
                            <!-- ad here -->
                            <div class="advertise-1">
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('Home', 4)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
                                @endif
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
                        @if(isset($all_news[0]))
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[0]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$all_news[0]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($all_news[0]->details), 0, 297); ?></p>
                                    <a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
                                </div>
                            </div>
                        @endif

                        @if(isset($all_news[0]))
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[1]->featured_image)}})"></div>
                                <div class="news-content">
                                    <h3>{{$all_news[1]->title}}</h3>
                                    <p><?php echo mb_substr(strip_tags($all_news[1]->details), 0, 297); ?></p>
                                    <a href="{{ url('news/front/details/'.$all_news[1]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="single-thumbnail-item-1">
                                <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                <div class="news-content">
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
                                @if(isset($video_reporting[1]))
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
                                @endif
                                @if(isset($video_reporting[2]))
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
                                @endif
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

    </div>


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>রঙ তুলি</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">রঙ তুলি</a></h3>
                    </div>
                    @if(count($colors_news)>=1)
                        <div class="big-section-slider">
                            <div class="single-big-slider big-bg-1" style="background-image: url({{ asset('public/images/news/featured/'.$colors_news[0]->featured_image) }})">
                                <a href="{{ url('news/front/details/'.$colors_news[0]->id) }}"  class="slider-headline">
                                    <h3>{{$colors_news[0]->title}}</h3>
                                </a>
                            </div>
                            @if(count($colors_news)>=2)
                                <div class="single-big-slider big-bg-2" style="background-image: url({{ asset('public/images/news/featured/'.$colors_news[1]->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$colors_news[1]->id) }}"  class="slider-headline">
                                        <h3>{{$colors_news[1]->title}}</h3>
                                    </a>
                                </div>
                            @endif
                            @if(count($colors_news)>=3)
                                <div class="single-big-slider big-bg-3" style="background-image: url({{ asset('public/images/news/featured/'.$colors_news[2]->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$colors_news[2]->id) }}"  class="slider-headline">
                                        <h3>{{$colors_news[2]->title}}</h3>
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- big featured section -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>হাতে খড়ি</h2>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">হাতে খড়ি</a></h3>
                    </div>
                    @if(isset($start_news[0]))
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$start_news[0]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$start_news[0]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($start_news[0]->details), 0, 297); ?></p>
                                <a href="{{ url('news/front/details/'.$start_news[0]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-4">
                    @if(isset($start_news[1]))
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$start_news[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$start_news[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($start_news[1]->details), 0, 297); ?></p>
                                <a href="{{ url('news/front/details/'.$start_news[1]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
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
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>মজার গল্প</h2>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">মজার গল্প</a></h3>
                    </div>
                    @if(isset($interesting_news[0]))
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$interesting_news[0]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$interesting_news[0]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($interesting_news[0]->details), 0, 297); ?></p>
                                <a href="{{ url('news/front/details/'.$interesting_news[0]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-4">
                    @if(isset($interesting_news[1]))
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$start_news[1]->featured_image)}})"></div>
                            <div class="news-content">
                                <h3>{{$interesting_news[1]->title}}</h3>
                                <p><?php echo mb_substr(strip_tags($interesting_news[1]->details), 0, 297); ?></p>
                                <a href="{{ url('news/front/details/'.$interesting_news[1]->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    @else
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                            </div>
                        </div>
                    @endif
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
                    @if(count($video_reporting)>0)
                    <div class="video-slides">
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
                        @if(isset($video_reporting[1]))
                        <div class="single-video-slide">
                            <a href="{{$video_reporting[1]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[1]->featured_image) }})" class="video-play-btn play-bg-1 mfp-iframe">
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
                        @endif
                        @if(isset($video_reporting[1]))
                        <div class="single-video-slide">
                            <a href="{{$video_reporting[2]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[2]->featured_image) }})" class="video-play-btn play-bg-1 mfp-iframe">
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
                            @endif
                    </div>
                        @else
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                            </div>
                        </div>
                    @endif
                </div>
                <div class="col-sm-7 pdt-10">
                    <h3 class="section-heading"><a href="">ফটো গ্যালারী</a></h3>
                    @if(count($all_news)>0)
                    <div class="breakingnews-carousel">
                        <div class="single-breakingnews-item">
                            <div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$all_news[0]->featured_image) }})">
                                <a href="{{ url('news/front/details/'.$all_news[0]->id) }}" class="slider-headline">
                                    <h3>{{ $all_news[0]->title }}</h3>>
                                </a>
                            </div>
                        </div>
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
                        @else
                        <div class="single-breakingnews-item">
                            <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>


        <br>
        <br>
        <div class="container">
            <a href="{{url('category/kids/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>
        </div>
        <br>
    </div>
@endsection
