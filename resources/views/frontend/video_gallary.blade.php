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
                                    <img ng-click="changeAd('vedio', 1001)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
                                @else
                                    <a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                @endif

                            </div>
                            <div class="single-long-ad-right">
                                <a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('vedio', 1002)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
                <div class="col-sm-12">
                    <div class="aside-advertise-3 scrollToShow">
                        <div class="ad">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('vedio', 1003)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
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
                                <h2>টপ ভিডিও</h2>
                            </div>
                        </div>
                        @if(count($video)>0)
                            <div class="col-sm-7 col-xs-12">
                                <div class="video-gallary-slides video-gallary-page">
                                    <div class="single-video-slide">
                                        <a href="{{$video[0]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$latest_news[0]->featured_image) }})" class="video-play-btn play-bg-1 mfp-iframe">
                                            <div class="video-icon-table">
                                                <div class="video-icon-tablecell">
                                                    <i class="fa fa-play"></i>
                                                </div>
                                            </div>
                                            <a href="" class="slider-headline">
                                                <h3>{{$video[0]->title}}</h3>
                                            </a>
                                        </a>
                                    </div>
                                    @if(count($video)>1)
                                        <div class="single-video-slide">
                                            <a href="{{$video[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$latest_news[1]->featured_image) }})" class="video-play-btn play-bg-2 mfp-iframe">
                                                <div class="video-icon-table">
                                                    <div class="video-icon-tablecell">
                                                        <i class="fa fa-play"></i>
                                                    </div>
                                                </div>
                                                <a href="" class="slider-headline">
                                                    <h3>{{$video[1]->title}}</h3>
                                                </a>
                                            </a>
                                        </div>
                                    @endif
                                    @if(count($video)>2)
                                        <div class="single-video-slide">
                                            <a href="{{$video[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$latest_news[2]->featured_image) }})" class="video-play-btn play-bg-3 mfp-iframe">
                                                <div class="video-icon-table">
                                                    <div class="video-icon-tablecell">
                                                        <i class="fa fa-play"></i>
                                                    </div>
                                                </div>
                                                <a href="" class="slider-headline">
                                                    <h3>{{$video[2]->title}}</h3>
                                                </a>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                </div>
                            </div>
                    </div>
                    @endif

                    <div class="col-sm-3 pdt-10 col-xs-12">
                        <!-- ad here -->
                        <div class="advertise-1">
                            <a href="">
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('vedio', 1004)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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


    <br>
    <br>




    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>রিপোর্টিং</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">রিপোর্টিং</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_reporting[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_reporting[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_reporting[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe" >
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_reporting[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_reporting[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_reporting[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_reporting[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_reporting[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_reporting[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_reporting[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_reporting[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_reporting[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--single advertise area-->
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                        <img ng-click="changeAd('vedio', 1005)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>টেক</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">টেক</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_tech[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tech[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tech[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tech[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tech[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tech[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tech[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tech[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tech[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tech[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tech[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tech[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tech[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tech[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tech[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tech[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>টিপস</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">টিপস</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_tips[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tips[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tips[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tips[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tips[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tips[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tips[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tips[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tips[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tips[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tips[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tips[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_tips[3]))

                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_tips[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_tips[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_tips[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--single advertise area-->
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                        <img ng-click="changeAd('vedio', 1006)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>অনুষ্ঠান</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">অনুষ্ঠান</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_programme[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_programme[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_programme[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_programme[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_programme[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_programme[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_programme[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_programme[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_programme[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_programme[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_programme[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_programme[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_programme[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_programme[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_programme[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_programme[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>বৈঠকখানা</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">বৈঠকখানা</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_boithokkhana[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_boithokkhana[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_boithokkhana[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_boithokkhana[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_boithokkhana[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_boithokkhana[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_boithokkhana[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_boithokkhana[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_boithokkhana[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_boithokkhana[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_boithokkhana[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_boithokkhana[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_boithokkhana[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_boithokkhana[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_boithokkhana[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_boithokkhana[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--single advertise area-->
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                        <img ng-click="changeAd('vedio', 1007)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                    @else
                        <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <br>
    <br>


    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>ইতিহাস ও ঐতিহ্য</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">ইতিহাস ও ঐতিহ্য</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_itihash[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_itihash[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_itihash[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_itihash[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_itihash[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_itihash[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_itihash[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_itihash[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_itihash[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_itihash[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_itihash[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_itihash[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_itihash[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_itihash[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_itihash[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_itihash[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>ক্ষুদ্র নৃ-গোষ্ঠী</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">ক্ষুদ্র নৃ-গোষ্ঠীটিং</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_nrigoshthi[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_nrigoshthi[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_nrigoshthi[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_nrigoshthi[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_nrigoshthi[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_nrigoshthi[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_nrigoshthi[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_nrigoshthi[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_nrigoshthi[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_nrigoshthi[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_nrigoshthi[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_nrigoshthi[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_nrigoshthi[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_nrigoshthi[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_nrigoshthi[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_nrigoshthi[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>আপনার ভিডিও</h2>
                    </div>
                </div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">আপনার ভিডিও</a></h3>
                    </div>
                    <div class="row">
                        @if(isset($video_apnar[0]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_apnar[0]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_apnar[0]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_apnar[0]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_apnar[1]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_apnar[1]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_apnar[1]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_apnar[1]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_apnar[2]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_apnar[2]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_apnar[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_apnar[2]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(isset($video_apnar[3]))
                            <div class="col-sm-3">
                                <div class="single-video-item">
                                    <div class="vdo-heding-text">
                                        <a href="single-page.html" class="single-video-heading">
                                            <h3>{{$video_apnar[3]->title}}</h3>
                                        </a>

                                    </div>
                                    <a href="{{$video_apnar[3]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_apnar[3]->featured_image) }})" class="service-video reporting-video-bg mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @else
                            <div class="col-sm-3">
                                <div class="single-breakingnews-item">
                                    <div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.'news.jpg') }})">
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
