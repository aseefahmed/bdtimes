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

    <div class="section-padding padding-top-zero">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-content-section single-page">
                        <div class="archive-items">
                            <h3 class="section-heading">Reporter : {{$user[0]->first_name}} {{$user[0]->last_name}}</h3>
                            
                            @foreach($newslist as $news)
								<div class="single-thumbnail-item-1">
									<div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
									<div class="news-content">
										<h3>{{$news->title}}</h3>
										<p><?php echo mb_substr(strip_tags($news->details), 0, 800); ?></p>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details <i class="fa fa-arrow-right"></i></a>
										<br><br>
									</div>
								</div>
							@endforeach
                            <div class="col-md-12">
							{{ $newslist->links() }}
							</div>
							@if(count($newslist) == 0)
								No Data Found
							@endif
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="right-content-section single-page">
                        <div class="calender homepage">
                            <h3 class="section-heading">
								Archive</h3>
                            
                            <div class="archive-calender">
									<div class="calendarjs"></div>
                            </div>
                        </div>

                        <!--fb section-->
                        <div class="single-page-fb-section margin-top-10">
                            <h3 class="section-heading"><a href="">Facebook page</a></h3>
                            <div class="fb-container">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=294&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="294" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                        </div>

                        <!--top news section-->
                        <div class="single-page-top-news news-section-im70 margin-top-10">
                            <h3 class="section-heading"><a href="">Top News</a></h3>
                            @foreach($top_news as $news)
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{$news->title}}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, 250); ?></p>
										
										</a>
										<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">Details</a>
									</div>
								</div>
							@endforeach
                        </div>
                        <!--jonomot jorip-->
                        <div class="opinion-section margin-top-10">
                            <h3 class="section-heading"><a href="">
									Public opinion survey</a></h3>
                            <div class="people-opinion">
								<img src="{{asset('public/images/polls/featured/'.$poll[0]->featured_image)}}" alt="">
								<p style="font-weight: bold;">{{$poll[0]->question}}</p>
								<p>
									<form id="myVoteForm" method="post">
									   {{ csrf_field() }}
										<input type="hidden" value="{{$poll[0]->id}}" name="poll_id">
										<input type="hidden" value="{{$_SERVER['REMOTE_ADDR']}}" name="ip_address">
										<input type="radio" class="myvote" value="yes" name="myvote">&nbsp;Yes &nbsp;
										<input type="radio" class="myvote" value="no" name="myvote">&nbsp;No&nbsp;
										<input type="radio" class="myvote" value="nocomment" name="myvote" selected>&nbsp;No Comment<br>
										<input type="submit" id="vote_btn" class="btn btn-warning" value="ভোট দিন" >&nbsp;
										<a class="fb-signup" href="{{url('/votes/result')}}">Older Results</a>
									</form>
								</p>
							</div>
                        </div>

                        <!--most news section-->
                        <div class="single-page-top-news news-section-im70 margin-top-10">
                            <h3 class="section-heading"><a href="">Most discussed</a></h3>
                            @foreach($most_commented as $news)
								<div class="single-thumbnail-item-2">
									<div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
									<div class="news-content">
										<a href="{{ url('news/front/details/'.$news->id) }}">
											<h3>{{$news->title}}</h3>
											<p><?php echo mb_substr(strip_tags($news->details), 0, 250); ?></p>
										
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
@endsection
