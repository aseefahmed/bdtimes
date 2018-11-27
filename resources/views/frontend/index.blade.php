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
                                    @if(Auth::user()->role ==1)
                                    <img ng-click="changeAd('Home', 1)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                    @endif
                                @else
                                    <a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
                                @endif

                            </div>
                            <div class="single-long-ad-right">
                                <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                                @if(isset(Auth::user()->id))
                                    @if(Auth::user()->role ==1)
                                    <img ng-click="changeAd('Home', 2)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
                                    @endif
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
                <div class="col-sm-12">
                    <div class="aside-advertise-3 scrollToShow">
                        <div class="ad">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 3)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
                                @endif
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
                                <h2>ব্রেকিং নিউজ</h2>
                            </div>
                        </div>
                        @if(count($breaking_news)>0)
                            <div class="col-sm-7 col-xs-12">
                                <div class="breakingnews-carousel">
                                    @if(isset($breaking_news[0]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ url('public/images/news/featured/'.$breaking_news[0]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$breaking_news[0]->id) }}" class="slider-headline">
                                                    <h3>{{ $breaking_news[0]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($breaking_news[1]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ url('public/images/news/featured/'.$breaking_news[1]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$breaking_news[1]->id) }}" class="slider-headline">
                                                    <h3>{{ $breaking_news[1]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(isset($breaking_news[2]))
                                        <div class="single-breakingnews-item">
                                            <div class="breakingnews-bg" style="background-image: url({{ url('public/images/news/featured/'.$breaking_news[2]->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$breaking_news[2]->id) }}" class="slider-headline">
                                                    <h3>{{ $breaking_news[2]->title }}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        @else
                            <div class="col-sm-7 col-xs-12">
                                <div class="breakingnews-carousel">
                                    <div class="single-breakingnews-item">
                                        <div class="breakingnews-bg"  style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-sm-3 pdt-10 col-xs-12">
                            <!-- ad here -->
                            <div class="advertise-1">
                                <a href="">
                                    @if(isset(Auth::user()->id))
                                        @if(Auth::user()->role ==1)
                                        <img ng-click="changeAd('Home', 4)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
                                        @else
                                            <a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
                                        @endif
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

        <!-- service section here -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/national')}}">বাংলাদেশ সংবাদ</a></h3>
                        <?php $i=1;?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 1 && $i<4)
                                <?php $i++; ?>
                                @if($news->title !=null)
                                    <div class="single-thumbnail-item-2">
                                        <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                        <div class="news-content">
                                            <a href="{{ url('news/front/details/'.$news->id) }}">
                                                <h3>{{ $news->title }}</h3>
                                                <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", strpos($news->details, " ", 120)+1)+1); ?></p>
                                            </a>
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                        </div>
                                    </div>
                                @else
                                    <div class="single-thumbnail-item-2">
                                        <div class="thumbnail-bg " style="background-image: url({{ url('public/images/news/featured/'.'no_news.png') }})"></div>
                                        <div class="news-content">
                                        </div>
                                    </div>
                                @endif

                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/international')}}">আন্তর্জাতিক সংবাদ</a></h3>
                        <?php $i=1;?>
                        @foreach($latest_news as $news)
                            @if(($news->category_id == 2 || $news->category_id == 24 || $news->category_id == 25 || $news->category_id == 26 || $news->category_id == 28) && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/economics')}}">অর্থনীতি</a></h3>
                        <?php $i=1;?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 3 && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('publice/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/jobs')}}">চাকুরি</a></h3>
                        <?php $i=1;?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 4 && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Video reporting & entertainment -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <div class="video-reporting-section">
                            <h3 class="section-heading"><a href="category/vedios">ভিডিও/রিপোর্টিং</a></h3>
                            <div class="single-video-slide">
                                <a href="{{$video_reporting[0]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[0]->featured_image) }})" class="video-play-btn  mfp-iframe">
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
                        </div>
                    </div>
                    <div class="col-sm-7 pdt-10">
                        <div class="entertainment">
                            <h3 class="section-heading"><a href="{{url('category/entertainment')}}">বিনোদন</a></h3>
                            <div class="entertainment-carousel">
                                @foreach($latest_news as $news)
                                    @if($news->category_id == 5)

                                        <div class="single-entertainment-item">
                                            <div class="entertainment-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                    <h3>{{$news->title}}</h3>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Full width ad -->
        <!--single advertise area-->
        <div class="section-padding advertise-252">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 5)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                                @endif
                            @else
                                <a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->

        <!-- politics & sports -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="politics">
                            <h3 class="section-heading"><a href="{{url('category/politics')}}">রাজনীতি</a></h3>
                            <div class="entertainment-carousel">
                                @foreach($latest_news as $news)
                                    @if($news->category_id == 6)
                                        <div class="single-entertainment-item">
                                            <div class="entertainment-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                    <h3>{{$news->title}}</h3>
                                                </a>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 pdt-10">
                        <div class="politics">
                            <h3 class="section-heading"><a href="{{url('category/sports')}}">খেলাধুলা</a></h3>
                            <div class="entertainment-carousel">
                                @foreach($sports as $news)

                                    <div class="single-entertainment-item">
                                        <div class="entertainment-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                <h3>{{$news->title}}</h3>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 service-section goes here -->
        <div class="section-padding news-section-im75">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/education')}}">শিক্ষা</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 8 && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach

                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/science')}}">বিজ্ঞান ও প্রযুক্তি</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 9 && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 pdt-10">
                        <h3 class="section-heading"><a href="{{url('category/rashi')}}">রাশি</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 10 && $i<3)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- 4 service-section goes here -->
        <div class="section-padding news-section-im85">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/crime')}}">ক্রাইম</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 11 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/lifestyle')}}">জীবনধারা/লাইফ স্টাইল</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 12 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/travel')}}">ভ্রমন</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 20 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <h3 class="section-heading"><a href="{{url('category/cartoon')}}">রম্য/কার্টুন</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 21 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        <!--2 ads area-->
        <div class="section-padding advertise-252">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 6)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
                                @endif
                            @else
                                <a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                    <div class="col-sm-6 col-xs-6">
                        <a href="">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 7)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                                @endif
                            @else
                                <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                </div>
            </div>
        </div>
    @if(count($apnaar_lekha)>0)
        <!-- big featured section -->
            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="cta-bar">
                                <h2>আপনি লিখুন/ <br>আপনার লেখা</h2>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="cta-bar-alternative">
                                <h3 class="section-heading">আপনি লিখুন/ আপনার লেখা</h3>
                            </div>
                            @foreach($apnaar_lekha as $news)
                                <div class="single-featured-item">
                                    <h3>{{ $news->title }}</h3>
                                    <img src="public/images/news/featured/{{$news->featured_image }}" alt="">
                                    <?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 800)+1); ?>
                                    <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
    @endif

    <!-- big slider -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h3 class="section-heading"><a href="{{url('category/buysell')}}">ক্রয় বিক্রয়</a></h3>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">ক্রয় বিক্রয়</h3>
                        </div>
                        <div class="big-section-slider">
                            @foreach($latest_news as $news)
                                @if($news->category_id == 18)
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
    @if(count($aayna)>0)
        <!-- big featured section -->
            <div class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-2">
                            <div class="cta-bar">
                                <h2>আয়না</h2>
                            </div>
                        </div>
                        <div class="col-sm-5 ">
                            <div class="cta-bar-alternative">
                                <h3 class="section-heading">আয়না</h3>
                            </div>
                            @if(isset($aayna[0]))
                                <div class="single-featured-item">
                                    <h3>{{ $aayna[0]->title }}</h3>
                                    <img src="public/images/news/featured/{{$aayna[0]->featured_image }}" alt="">
                                    <?php echo substr(strip_tags($aayna[0]->details), 0, strpos($aayna[0]->details, " ", 800)+1); ?>
                                    <a href="{{ url('news/front/details/'.$aayna[0]->id) }}" class="news-readmore-btn"></a>

                                </div>
                            @endif

                        </div>
                        <div class="col-sm-5 pdt-10">
                            @if(isset($aayna[1]))
                                <div class="single-featured-item">
                                    <h3>{{ $aayna[1]->title }}</h3>
                                    <img src="public/images/news/featured/{{$aayna[1]->featured_image }}" alt="">
                                    <?php echo substr(strip_tags($aayna[1]->details), 0, strpos($aayna[1]->details, " ", 800)+1); ?>
                                    <a href="{{ url('news/front/details/'.$aayna[1]->id) }}" class="news-readmore-btn"></a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    @endif
    <!-- two ads and one facebook plug in section goes here -->
        <!-- advertise area-->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center">
                        <a href="">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 8)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
                                @endif
                            @else
                                <a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12 text-center pdt-10">
                        <a href="">
                            @if(isset(Auth::user()->id))
                                @if(Auth::user()->role ==1)
                                <img ng-click="changeAd('Home', 9)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt="">
                                @else
                                    <a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
                                @endif
                            @else
                                <a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
                            @endif

                        </a>
                    </div>
                    <div class="col-md-4 col-sm-12 col-xs-12 text-center pdt-10">
                        <h3 class="section-heading"><a href="">ফেসবুক পেইজ</a></h3>
                        <div class="fb-container">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- advertise area end-->

        <!-- section-padding -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>মতামত/ <br>উপ-সম্পাদকীয়</h2>
                        </div>
                    </div>
                    <div class="col-sm-10">
                        <div class="cta-bar-alternative">
                            <h3 class="section-heading">মতামত/ উপ-সম্পাদকীয়া</h3>
                        </div>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 22)
                                <div class="single-featured-item-big">
                                    <h3>{{ $news->title }}</h3>
                                    <img src="public/images/news/featured/{{$news->featured_image }}" alt="">
                                    <?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 2500)+1); ?><a href="{{ url('news/front/details/'.$latest_news[40]->id) }}" class="news-readmore-btn"></a></p>
                                </div>
                                <?php break; ?>
                            @endif

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- 3 service items goes here -->
        <div class="section-padding news-section-im75">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h3 class="section-heading"><a href="category/women">নারী</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 17 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3 class="section-heading"><a href="category/youth">তরুন প্রজন্ম</a></h3>
                        <?php $i=1; ?>
                        @foreach($latest_news as $news)
                            @if($news->category_id == 16 && $i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="col-md-4 col-sm-6 pdt-15">
                        <h3 class="section-heading"><a href="category/kids">শিশু-কিশোর</a></h3>
                        <?php $i=1; ?>
                        @foreach($kids as $news)
                            @if($i<5)
                                <?php $i++; ?>
                                <div class="single-thumbnail-item-2">
                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                    <div class="news-content">
                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                            <h3>{{ $news->title }}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?> </p>
                                        </a>
                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- video & photo gallary -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-sm-5">
                        <h3 class="section-heading"><a href="category/vedios">ভিডিও গ্যালারী</a></h3>
                        <div class="col-sm-12 col-xs-12">


                            <div class="video-gallary-slides video-gallary-page">
                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[0]->vedio_link}}"   style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[0]->featured_image) }})" class="video-play-btn  mfp-iframe">
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

                                <div class="single-video-slide">
                                    <a href="{{$video_reporting[2]->vedio_link}}" style="background-image: url({{ url('public/images/news/featured/'.$video_reporting[3]->featured_image) }})" class="video-play-btn play-bg-3 mfp-iframe">
                                        <div class="video-icon-table">
                                            <div class="video-icon-tablecell">
                                                <i class="fa fa-play"></i>
                                            </div>
                                        </div>
                                        <a href="" class="slider-headline">
                                            <h3>{{$video_reporting[3]->title}}</h3>
                                        </a>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-7 pdt-10">
                        <h3 class="section-heading"><a href="category/photos">ফটো গ্যালারী</a></h3>
                        <div class="photo-gallary-slides">
                            @foreach($latest_news as $news)
                                @if($news->category_id == 15)
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

        <!-- Readers questions tab, opinion , viral goes here -->
        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-6">
                        <h3 class="section-heading"><a href="">পাঠকের জিজ্ঞাসা</a></h3>
                        <div class="custom-tab readers-qs">
                            <ul class="tab-list text-center">
                                <li class="active"><a data-toggle="tab" href="#custom-tab-1">স্বাস্থ্য </a></li>
                                <li><a data-toggle="tab" href="#custom-tab-2">আইন</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="custom-tab-1" class="tab-pane fade in active">
                                    <div class="single-news-item gray-bg">
                                        @foreach($latest_news as $news)
                                            @if($news->category_id == 24 || $news->category_id == 2)
                                                <div class="single-thumbnail-item-2" >
                                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div id="custom-tab-2" class="tab-pane fade">
                                    <div class="single-news-item gray-bg">
                                        @foreach($latest_news as $news)
                                            @if($news->category_id == 12)
                                                <div class="single-thumbnail-item-2" >
                                                    <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                                    <div class="news-content">
                                                        <a href="{{ url('news/front/details/'.$news->id) }}">
                                                            <h3>{{$news->title}}</h3>
                                                            <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 120)+1); ?></p>
                                                        </a>
                                                        <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <h3 class="section-heading"><a href="">জনমত জরিপ</a></h3>
                        <div class="people-opinion">
                            <p style="font-weight: bold;">{{$poll[0]->question}}</p>
                            <form id="myVoteForm" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" value="{{$poll[0]->id}}" name="poll_id">
                                <input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" name="ip_address"><br><br>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="yes" name="myvote">&nbsp;হ্যাঁ &nbsp;
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="no" name="myvote">&nbsp;না&nbsp;
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="radio">
                                            <label>
                                                <input type="radio" class="myvote" value="nocomment" name="myvote" checked>&nbsp;মন্তব্য নেই
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                                <input type="submit" id="vote_btn" class="btn btn-warning" value="ভোট দিন" >&nbsp;
                                <a class="fb-signup" href="{{url('/votes/result')}}">পুরোনো ফলাফল</a>
                            </form>
                        <!--
								<form id="myVoteForm" method="post">
								   {{ csrf_field() }}
                                <input type="hidden" value="{{$poll[0]->id}}" name="poll_id">
									<input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" name="ip_address"><br><br>
									<input type="radio" class="myvote" value="yes" name="myvote">&nbsp;হ্যাঁ &nbsp;<br>
									<input type="radio" class="myvote" value="no" name="myvote">&nbsp;না&nbsp;<br>
									<input type="radio" class="myvote" value="nocomment" name="myvote" checked>&nbsp;মন্তব্য নেই<br><br>
									<input type="submit" id="vote_btn" class="btn btn-warning" value="ভোট দিন" >&nbsp;
									<a class="fb-signup" href="{{url('/votes/result')}}">পুরোনো ফলাফল</a>
								</form>
-->
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <h3 class="section-heading"><a href="category/viral">ভাইরাল</a></h3>
                        <div class="viral">
                            <div class="viral-carousel">
                                @foreach($latest_news as $news)
                                    @if($news->category_id == 14	)


                                        <div class="single-viral-item">
                                            <div class="viral-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                                    <h3>{{$news->title}}</h3>
                                                </a>
                                            </div>
                                        </div>

                                    @endif
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- art & culture , archive goes here -->
        <div class="section-padding news-section-imstrpos($news->details, " ", 120)+1">
        <div class="container">
            <div class="row">
                <div class="col-sm-7">
                    <h3 class="section-heading"><a href="category/culture">শিল্প ও সাহিত্য</a></h3>
                    <?php $i=1; ?>
                    @foreach($latest_news as $news)
                        @if($news->category_id == 13 && $i<5)
                            <?php $i++; ?>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                <div class="news-content">
                                    <a href="{{ url('news/front/details/'.$news->id) }}">
                                        <h3>{{$news->title}}</h3>
                                        <p><?php echo mb_substr(strip_tags($news->details), 0, strpos($news->details, " ", 720)+1); ?></p>
                                    </a>
                                    <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn"></a>
                                </div>
                            </div>

                        @endif
                    @endforeach
                </div>
                <div class="col-sm-5">
                    <h3 class="section-heading"><a href="">আর্কাইভ</a></h3>
                    <div class="archive-calender">
                        <div class="calendarjs"></div>
                    </div>
                    <!--Single add 460x180-->
                    @if(isset(Auth::user()->id))
                        @if(Auth::user()->role ==1))
                        <img ng-click="changeAd('Home', 10)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
                        @endif
                    @else
                        <a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
                    @endif

                </div>

            </div>
        </div>
    </div>


    <!-- picture of the day -->
    <!--
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    @foreach($latest_news as $news)
                        @if($news->category_id == 15)

                            <div style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
                                background-size: cover;
                                background-position: center;
                                height: 350px;">
                                <a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
                                    <h3>আজকের ছবি</h3>
                                </a>
                            </div>

                            <?php break; ?>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    -->

    <!-- full width ad goes here -->
    <!--single advertise area-->
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    @if(isset(Auth::user()->id))
                        @if(Auth::user()->role ==1)
                        <img ng-click="changeAd('Home', 11)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt="">
                        @else
                            <a href="{{ $ads[10]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt=""></a>
                        @endif
                    @else
                        <a href="{{ $ads[10]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt=""></a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->

    </div>
    <div class="modal fade" id="getCodeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"> Bdtimes </h4>
                </div>
                <div class="modal-body" id="getCode" style="overflow-x: scroll;">
                    //ajax success content here.
                </div>
            </div>
        </div>
    </div>

@endsection
