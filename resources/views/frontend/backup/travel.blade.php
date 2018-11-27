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
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>টপ নিউজ</h2>
                    </div>
                    <div class="big-section-slider">
						@foreach($travel_news as $news)
							<div class="single-big-slider big-bg-1">
								<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
									<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
										<h3>{{ $news->title }}</h3>>
									</a>
								</div>
							</div>
						@endforeach
                        
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
					@foreach($travel_recent as $news)
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
						<div class="news-content">
							<h3>{{$news->title}}</h3>
							<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
							<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
					@endforeach
                </div>
                <div class="col-sm-7 col-xs-12">
                    <h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
                    <div class="video-slides">
						
						@foreach($travel_vedios as $index=>$news)
							<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-{{$index+1}} mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="{{ url('news/front/details/'.$all_news[5]->id) }}" class="slider-headline">
									<h3>{{$all_news[5]->title}}</h3>
								</a>
							</a>
						</div>
						@endforeach
					</div>
                </div>
            </div>
        </div>
    </div>

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>দর্শনীয় স্থান</h2>
                    </div>
					
					<div class="big-section-slider">
                        @foreach($travel_droshonio as $index=>$news)
							@if($index<3)
								<div class="single-big-slider"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})">
									<a href="" class="slider-headline">
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
                <div class="col-sm-6 col-xs-12">
					@foreach($travel_droshonio as $index=>$news)
						@if($index>2 && $index<6)
							<div class="single-thumbnail-item-1">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
						
					@endforeach
                    
                    
                </div>
                <div class="col-sm-6 col-xs-12">
				@foreach($travel_droshonio as $index=>$news)
					@if($index>5 && $index<9)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<a href="{{ url('news/front/details/'.$news->id) }}">
									<h3>{{$news->title}}</h3>
									<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
								</a>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
							</div>
						</div>
					@endif
					
				@endforeach
				
				
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
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>সময় সূচি</h2>
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
									@foreach($travel_time_bus as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$all_news[17]->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$all_news[17]->id) }}">
													<h3>{{$all_news[17]->title}}</h3>
													<p><?php echo mb_substr(strip_tags($all_news[17]->short_description), 0, 550); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$all_news[17]->id) }}" class="news-readmore-btn">বিস্তারিত</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                            <div id="custom-tab-2" class="tab-pane fade">
                                <div class="single-news-item gray-bg">
                                    @foreach($travel_time_train as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$news->id) }}">
													<h3>{{$news->title}}</h3>
													<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                            <div id="custom-tab-3" class="tab-pane fade">
                                <div class="single-news-item gray-bg">
                                    @foreach($travel_time_biman as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$news->id) }}">
													<h3>{{$news->title}}</h3>
													<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                            <div id="custom-tab-4" class="tab-pane fade">
                                <div class="single-news-item gray-bg">
                                    @foreach($travel_time_lunch as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$news->id) }}">
													<h3>{{$news->title}}</h3>
													<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>টিপস</h2>
                    </div>
                    <div class="single-news-item gray-bg min-h">
						@foreach($travel_tips as $news)
							<div class="single-thumbnail-item-2">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
									<a href="{{ url('news/front/details/'.$news->id) }}">
									<h3>{{$news->title}}</h3>
									<p><?php echo mb_substr(strip_tags($news->short_description), 0, 550); ?></p>
									</a>
									<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endforeach
                    </div>
                </div>
                
            </div>
        </div>
    </div>


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>কোথায়-কিভাবে</h2>
                    </div>
					
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
                </div>
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
					@foreach($travel_kothay as $index=>$news)
						@if($index>2 && $index<5)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                   
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_kothay as $index=>$news)
						@if($index>5 && $index<7)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_kothay as $index=>$news)
						@if($index>6 && $index<9)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
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
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>ভ্রমন অভিজ্ঞতা</h2>
                    </div>
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
                </div>
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_exp as $index=>$news)
						@if($index>2 && $index<4)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_exp as $index=>$news)
						@if($index>3 && $index<5)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_exp as $index=>$news)
						@if($index>4 && $index<6)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
            </div>
        </div>
    </div>

    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>বিবিদ</h2>
                    </div>
					
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
                </div>
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
					@foreach($travel_bibid as $index=>$news)
						@if($index>2 && $index<5)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                   
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_bibid as $index=>$news)
						@if($index>5 && $index<7)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($travel_bibid as $index=>$news)
						@if($index>6 && $index<9)
							 <div class="single-thumbnail-item-3">
								<div class="thumbnail-bg single-thumbnail-1" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($all_news[36]->short_description), 0, 550); ?></p>
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						@endif
					@endforeach
                </div>
            </div>
        </div>
    </div>
@endsection