@extends('layouts.frontend.dashboard')

@section('content')
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
								<img ng-click="changeAd('Home', 1)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
							
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							@if(isset(Auth::user()->id))
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

    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="left-content-section single-page">
                        <div class="single-page-news">
                            <div class="single-content-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news_details[0]->featured_image)}})"></div>
                            <div class="report-info">
                                <div class="row">
                                    <div class="col-md-4 text-center">
                                        <div class="reporters-name">
                                           <h3>{{ $news_details[0]->creator_name }}	</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <div class="report-time">
                                            <p>{{ date_format(date_create($news_details[0]->created_at), 'Y-m-d H:i:s') }}</p>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-center">
										<ul class="report-social-icons">
											<li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"><i class="fa fa-facebook fb_btn"></i></a></li>
											<li><a class="twitter-share-button" href="https://twitter.com/intent/tweet" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href="https://plus.google.com/share?url={{$url}}" onclick="javascript:window.open(this.href,
'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="" target="_blank"><i class="fa fa-print" onclick="window.print();"></i></a></li>
										
										</ul>
									</div>
                                </div>
                            </div>
                            <h3>
								{{$news_details[0]->title}}		
                            </h3>
                            <?php 
								echo $news_details[0]->details;
							?>
                        </div>

                        <div class="comment-section">
                            <div class="col-md-4">
                                @if(isset(Auth::user()->id))
									<div class="profile-meta">
										<div class="profile-pic">
											<img src="{{url('public/images/profiles/'.Auth::user()->image)}}" alt="">
										</div>
										<div class="profile-info">
											<p>Logged in as</p>
											<h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
										</div>
									</div>
								@else
									<div class="profile-meta">
										<div class="profile-pic">
											<img src="{{url('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
										</div>
										<div class="profile-info">
											<p>Comment as</p>
											<h3>Anonymous User</h3>
										</div>
									</div>
								@endif
                            </div>
                            <div class="col-md-6">
								<div class="comment-section">
									<form id="myForm">
									<input type="hidden" name="news_id" value="{{ $news_details[0]->id }}">
									{{ csrf_field() }}
										<textarea name="details" id="details" cols="30" rows="30"></textarea>
										<input class="btn btn-success pull-right" id="submit_comment_btn" type="submit" value="পাঠান">
									</form>
								</div>
							</div>

                            <div class="col-md-6 col-md-offset-4">
								<div class="demo-comments">
									<img src="{{ asset('public/images/Ellipsis.gif') }}" style="display:none;" id="ajax_loader">
									@foreach($comments as $comment)
										<div class="single-demo-comment">
											<div class="comment-dp">
												@if($comment->user_id == 0)
													<img src="{{url('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
												@else 
													<img src="{{url('public/images/profiles/'.$comment->image)}}" alt="">
												@endif
											</div>
											<div class="comment-meta">
												<h3>
													@if($comment->user_id == 0)
														Anonymous User
													@else 
														{{ $comment->first_name}} {{ $comment->last_name}}
													@endif
												</h3>
												<p>{{ $comment->details }}</p>
												<p>{{ date_format(date_create($comment->created_at), 'd M, H:i:s') }}</p>
											</div>
										</div>
									@endforeach
								</div>
							</div>
                        </div>
						
						<div class="col-xs-12">
                            <div class="row">
                                <div class="more-news-singlepage">
                                    <h3 class="section-heading"><a href="">এই বিভাগের আরও খবর</a></h3>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @foreach($popular_news as $key=>$news)
											@if($key<10)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<a href="{{ url('news/front/details/'.$news->id) }}">
																<h3>{{$news->title}}</h3>
																<p><?php echo substr(strip_tags($news->details), 0, 220); ?></p>
															</a>
														</a>
														<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
													</div>
												</div>
											@endif
										@endforeach
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @foreach($popular_news as $key=>$news)
											@if($key<10)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<a href="{{ url('news/front/details/'.$news->id) }}">
																<h3>{{$news->title}}</h3>
																<p><?php echo substr(strip_tags($news->details), 0, 220); ?></p>
															</a>
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
                <div class="col-md-4">
                    <div class="right-content-section single-page">
                        <div class="single-page-advertise-1">
							<a href="">
								@if(isset(Auth::user()->id))
									<img ng-click="changeAd('Home', 4)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
								@else 
									<a href="{{ $ads[3]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt=""></a>
								@endif
								
							</a>
						</div>

                        <!--fb section-->
                        <div class="single-page-fb-section margin-top-10">
                            <h3 class="section-heading"><a href="">ফেসবুক পেইজ</a></h3>
                            <div class="fb-container">
                                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=294&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="294" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                            </div>
                        </div>

                        <!--top news section-->
                        <div class="single-page-top-news news-section-im70 margin-top-10">
                            <h3 class="section-heading"><a href="">শীর্ষ সংবাদ</a></h3>
                            @foreach($popular_news as $key=>$news)
								@if($key<6)
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$news->id) }}">
												<h3>{{$news->title}}</h3>
												<p><?php echo substr(strip_tags($news->details), 0, 120); ?></p>
											</a>
											<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
										</div>
									</div>
								@endif
							@endforeach
                        </div>
                        <!--jonomot jorip-->
                        <div class="opinion-section margin-top-10">
							<h3 class="section-heading"><a href="">জনমত জরিপ</a></h3>
							<div class="people-opinion">
								<img src="{{url('public/images/news/featured/'.$popular_news[0]->featured_image)}}" alt="">
								<p><?php echo substr(strip_tags($popular_news[0]->details), 0, 720); ?></p>
							</div>
						</div>

                        <!--most news section-->
                        <div class="single-page-top-news news-section-im70 margin-top-10">
                            <h3 class="section-heading"><a href="">সর্বাধিক আলোচিত</a></h3>
							@foreach($popular_news as $key=>$news)
								@if($key> 9  && $key<15)
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
										<div class="news-content">
											<a href="{{ url('news/front/details/'.$news->id) }}">
												<h3>{{$news->title}}</h3>
												<p><?php echo substr(strip_tags($news->details), 0, 120); ?></p>
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
@endsection