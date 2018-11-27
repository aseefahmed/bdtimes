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
								<img ng-click="changeAd('Science', 1231)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
							
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Science', 1232)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
                        @if(isset(Auth::user()->id))
							<img ng-click="changeAd('Science', 1233)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
						@endif
                        <a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-7 col-sm-offset-2 col-xs-12">
                        <div class="cta-bar">
                            <h2>টপ নিউজ</h2>
                        </div>
                        <div class="breakingnews-carousel">
                            @foreach($science_news as $news)
								<div class="single-breakingnews-item">
									<div class="breakingnews-bg breakingnews-bg-1" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
										<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
											<h3>{{ $news->title }}</h3>
										</a>
									</div>
								</div>
							@endforeach
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- ad here -->
                        <div class="advertise-1">
                            <a href="">
								@if(isset(Auth::user()->id))
								<img ng-click="changeAd('Science', 1234)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
                    <h3 class="section-heading"><a href="">বিজ্ঞান ও প্রযুক্তি</a></h3>
                    @foreach($science_recent as $news)
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
							@foreach($science_vedios as $news)
								<div class="single-video-slide">
									<a href="{{$news->vedio_link}}" class="video-play-btn long-height play-bg-1 mfp-iframe">
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
            </div>
        </div>
    </div>

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>অ্যাপস</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_apps as $index=>$news)
								@if($index<2)
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
                            @foreach($science_apps as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    
    <div class="section-padding news-section-im75">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_apps as $index=>$news)
					
						@if($index>3 && $index<7)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_apps as $index=>$news)
					
						@if($index>6 && $index<10)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_apps as $index=>$news)
					
						@if($index>9 && $index<13)
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
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1235)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>সাইন্স</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science as $index=>$news)
								@if($index<2)
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
                            @foreach($science as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <div class="section-padding news-section-im75">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($science as $index=>$news)
						@if($index>3 && $index<6)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science as $index=>$news)
						@if($index>5 && $index<8)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science as $index=>$news)
						@if($index>7 && $index<10)
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
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1236)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[5]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[5]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>ই কমার্স</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_ecommerce as $index=>$news)
								@if($index<2)
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
                            @foreach($science_ecommerce as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <div class="section-padding news-section-im75">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_ecommerce as $index=>$news)
						@if($index>3 && $index<6)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_ecommerce as $index=>$news)
						@if($index>5 && $index<8)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_ecommerce as $index=>$news)
						@if($index>7 && $index<10)
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
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1237)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>আউটসোর্সিং</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_outsourcing as $index=>$news)
								@if($index<2)
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
                            @foreach($science_outsourcing as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <div class="section-padding news-section-im75">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_outsourcing as $index=>$news)
						@if($index>3 && $index<6)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_outsourcing as $index=>$news)
						@if($index>5 && $index<8)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_outsourcing as $index=>$news)
						@if($index>7 && $index<10)
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
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1238)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>চাকরি খুঁজব না দেব</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_chakri as $index=>$news)
								@if($index<2)
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
                            @foreach($science_chakri as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <div class="section-padding news-section-im75">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_chakri as $index=>$news)
						@if($index>3 && $index<6)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_chakri as $index=>$news)
						@if($index>5 && $index<8)
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
						@endif
					@endforeach
                </div>
                <div class="col-sm-4 col-xs-12">
                    @foreach($science_chakri as $index=>$news)
						@if($index>7 && $index<10)
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
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1239)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>সফটওয়্যার প্রশিক্ষণ</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_training as $index=>$news)
								@if($index<2)
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
                            @foreach($science_training as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <!--single advertise area-->
    <div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1240)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[9]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[9]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar left">
                        <h2>মোবাইল ইন্সটলমেন্ট</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_mobile as $index=>$news)
								@if($index<2)
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
                            @foreach($science_mobile as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    <!--single advertise area-->
    <div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1241)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[10]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[10]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-md-offset-2">
                    <div class="cta-bar left">
                        <h2>সচেতনতা মুলক ভিডিও</h2>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-xs-12">
                            @foreach($science_awareness as $index=>$news)
								@if($index<2)
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
                            @foreach($science_awareness as $index=>$news)
								@if($index>1 && $index<4)
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
        </div>
    </div>
    
    
    <!--single advertise area-->
    <div class="section-padding advertise-2">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    @if(isset(Auth::user()->id))
						<img ng-click="changeAd('Science', 1242)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[11]->image_id)}}" alt="">
					@else 
						<a href="{{ $ads[11]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[11]->image_id)}}" alt=""></a>
					@endif
                </div>
            </div>
        </div>
    </div>
    <!--single advertise area end-->
@endsection