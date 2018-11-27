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
							<?php $ads = findAds('home') ?>
							<!--a class="btn btn-success" ng-if="isLoggedIn==1 && loginUser.role == 1">ddda</a-->
							<a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('International', 111)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
							
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							@if(isset(Auth::user()->id) && Auth::user()->role == 1)
								<img ng-click="changeAd('International', 112)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
							@endif
						</div>
					</div>
                </div>
            </div>
        </div>
    </div>

    <!-- error section -->
    <div class="error-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="error-text">
                        <h2>Not found</h2>
                        <p>
							It's a problem. You probably searched the wrong way. Your issue is not related to our newspaper. Please try again or find it correctly in the search bar.</p>
                        <p>Thank you।</p>
                    </div>
                </div>
                
                <div class="col-md-4 col-sm-6">
                    <h3 class="section-heading"><a href="">News</a></h3>
                    <div class="custom-tab readers-qs">
                        <ul class="tab-list text-center">
                            <li class="active"><a data-toggle="tab" href="#custom-tab-1">Most readed</a></li>
                            <li><a data-toggle="tab" href="#custom-tab-2">Most discussed</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="custom-tab-1" class="tab-pane fade in active">
                                <div class="single-news-item gray-bg">
									<?php $latest_news = findTopNews();?>
                                    @foreach($latest_news as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$news->id) }}">
													<h3>{{$news->title}}</h3>
													<p><?php echo substr(strip_tags($news->details), 0, 50); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                            <div id="custom-tab-2" class="tab-pane fade">
                                <div class="single-news-item gray-bg">
									<?php $latest_news = findMostCommented();?>
                                    @foreach($latest_news as $news)
										<div class="single-thumbnail-item-2 min-h75">
											<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
											<div class="news-content">
												<a href="{{ url('news/front/details/'.$news->id) }}">
													<h3>{{$news->title}}</h3>
													<p><?php echo substr(strip_tags($news->details), 0, 50); ?></p>
												</a>
												<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details</a>
											</div>
										</div>
									@endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php $latest_news = findLatestNews();?>
    @if(count($latest_news) > 0)
		<div class="section-padding">
	        <div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <h2>Other</h2>
	                </div>
					@foreach($latest_news as $news)
						<div class="col-sm-4 col-xs-12">
							<div class="single-thumbnail-item-3">
								<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
								<div class="news-content">
									<h3>{{$news->title}}</h3>
									<p><?php echo substr(strip_tags($news->details), 0, 550); ?></p>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					@endforeach
	                
	            </div>
	        </div>
	    </div>
    @endif
</div>
@endsection