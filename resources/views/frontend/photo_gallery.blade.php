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
                                    <img ng-click="changeAd('Video', 1001)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                @endif

                            </div>
                            <div class="single-long-ad-right">
                                <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                                @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                    <img ng-click="changeAd('Video', 1002)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>ফটো গ্যালারি</h2>
                    </div>
                </div>
                @if(count($photo)>3)
                <div class="col-sm-7 col-xs-12">
                    <div class="photo-gallary-slides">
                        <?php $i=0;?>
                        @foreach($photo as $news)
                            @if($i<10)
                                <div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                        <h3>{{$news->title}}</h3>
                                    </a>
                                    <?php $i++;?>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-sm-7 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="col-sm-3 pdt-10 col-xs-12">
                    <!-- ad here -->
                    <div class="advertise-1">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Video', 1004)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>

        <br>


        <!--single advertise area-->
        <div class="section-padding advertise-252">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('Video', 1005)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>চাকুরি ফটো</h2>
                    </div>
                </div>
                @if(count($job)>3)
                <div class="col-sm-7 col-xs-12">
                    <div class="photo-gallary-slides">
                        <?php $i=0;?>
                        @foreach($job as $news)
                            @if($i<20)
                                <div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                        <h3>{{$news->title}}</h3>
                                    </a>
                                    <?php $i++;?>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-sm-7 col-xs-12">
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

        <br>

        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>খেলাধুলার ছবি</h2>
                    </div>
                </div>
                @if(count($sports)>3)
                <div class="col-sm-7 col-xs-12">
                    <div class="photo-gallary-slides">
                        <?php $i=0;?>
                        @foreach($sports as $news)
                            @if($i<15)
                                <div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                    <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                        <h3>{{$news->title}}</h3>
                                    </a>
                                    <?php $i++;?>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
                @else
                    <div class="col-sm-7 col-xs-12">
                        <div class="single-thumbnail-item-1">
                            <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                            <div class="news-content">
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-sm-3 pdt-10 col-xs-12">
                    <!-- ad here -->
                    <div class="advertise-1">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Video', 1006)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>







        <br>
        <!--single advertise area-->
        <div class="section-padding advertise-252">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                            <img ng-click="changeAd('vedio', 1006)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>







@endsection
