@extends('layouts.frontend.dashboard')

@section('meta_block')
		<meta name="keywords" content="{{$keywords}}">
@endsection
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
                            <img class="news-feature-img" src="{{ url('public/images/news/featured/'.$news_details[0]->featured_image)}}"/>
                            <div class="report-info">
                            	@if($news_details[0]->image_caption != "")
                                	<p>{{$news_details[0]->image_caption}} <span> | বাংলাদেশ টাইমস ফাইল ছবি</span></p>
                                @endif
                            </div>
                            <h3>
								<small>{{$news_details[0]->sub_title}}</small>
                            </h3>
                            <h3>
								{{$news_details[0]->title}}
                            </h3>
                            <div class="reporter-info-section">
                                <div class="row">
                                    <div class="col-xs-6">
                                        <div class="reporter-info">
                                            <div class="profile-pic">
												<?php 
													$user_details = findUserDetails($news_details[0]->created_by);
													
												?>
                                                <img src="{{ asset('public/images/profiles/'.$user_details[0]->image) }}" alt="">
                                            </div>
                                            <div class="profile-info">
                                                <p><a href="{{url('author/'.$news_details[0]->created_by)}}">{{ $news_details[0]->creator_name }}</a></p>

                                                <?php 
													$currentDate = date_format(date_create($news_details[0]->created_at), 'H:i l, F j, Y');
													$engDATE = array(1,2,3,4,5,6,7,8,9,0,'January','February','March','April','May','June','July','August','September','October','November','December','Saturday','Sunday','Monday','Tuesday','Wednesday','Thursday','Friday');
													$bangDATE = array('১','২','৩','৪','৫','৬','৭','৮','৯','০','জানুয়ারী','ফেব্রুয়ারী','মার্চ','এপ্রিল','মে','জুন','জুলাই','আগস্ট','সেপ্টেম্বর','অক্টোবর','নভেম্বর','ডিসেম্বর','শনিবার','রবিবার','সোমবার','মঙ্গলবার','
													বুধবার','বৃহস্পতিবার','শুক্রবার' 
													);
													$convertedDATE = str_replace($engDATE, $bangDATE, $currentDate);
													
													$day_arr = ["রোববার", "সোমবার", "মঙ্গলবার", "বুধবার", "বৃহঃবার", "শুক্রবার", "শনিবার" ];
													$month_arr = [1=>"জানুয়ারি", "ফেব্রুয়ারি", "মার্চ ", "এপ্রিল", "মে", "জুন", "জুলাই", "আগস্ট", "সেপ্টেমবার", "অক্টোবার", "নভেম্বার", "ডিসেম্বার"];
													$day = Date('w');
													$hour = Date('H');
													$month_index = Date('n');
													if($hour > 4 && $hour < 12){
														$pm_am = "সকাল ";
													}else if($hour > 11 && $hour < 16){
														$pm_am = "দুপুর  ";
													}else if($hour > 15 && $hour < 18){
														$pm_am = "বিকাল    ";
													}else if($hour > 17 && $hour < 24){
														$pm_am = "রাত    ";
													}else if($hour >= 0 && $hour < 4){
														$pm_am = "রাত    ";
													}
												?>
                                                <p>{{ $convertedDATE }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 text-right">
                                        <div class="social">
                                            <ul class="social-icons">
                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}" target="_blank"><i class="fa fa-facebook fb_btn"></i></a></li>
											<li><a class="twitter-share-button" href="https://twitter.com/intent/tweet" target="_blank"><i class="fa fa-twitter"></i></a></li>
											<li><a href="https://plus.google.com/share?url={{$url}}" onclick="javascript:window.open(this.href,
'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;"><i class="fa fa-google-plus"></i></a></li>
											<li><a href="" target="_blank"><i class="fa fa-print" onclick="window.print();"></i></a></li>
										
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
								echo $news_details[0]->details;
							?>
                            
                            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
								<ins class="adsbygoogle"
								     style="display:block; text-align:center;"
								     data-ad-format="fluid"
								     data-ad-layout="in-article"
								     data-ad-client="ca-pub-7144585578219196"
								     data-ad-slot="1968017327"></ins>
								<script>
								     (adsbygoogle = window.adsbygoogle || []).push({});
								</script>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <div class="social">
                                        <ul class="social-icons">
                                            <li><a target="_blank" href="javascript:window.print()"><i class="fa fa-print"></i></a></li>
                                            <li><a target="_blank" href=""><i class="fa fa-facebook"></i></a></li>
                                            <li><a target="_blank" href=""><i class="fa fa-twitter"></i></a></li>
                                            <li><a target="_blank" href=""><i class="fa fa-google-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
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
                                        @foreach($relevant_news as $key=>$news)
											@if($key<10)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<a href="{{ url('news/front/details/'.$news->id) }}">
																<h3>{{$news->title}}</h3>
																<p><?php echo mb_substr(strip_tags($news->details), 0, 220); ?></p>
															</a>
														</a>
														<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত</a>
													</div>
												</div>
											@endif
										@endforeach
                                        
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        @foreach($relevant_news as $key=>$news)
											@if($key>9 && $key<20)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<a href="{{ url('news/front/details/'.$news->id) }}">
																<h3>{{$news->title}}</h3>
																<p><?php echo mb_substr(strip_tags($news->details), 0, 220); ?></p>
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
												<p><?php echo mb_substr(strip_tags($news->details), 0, 120); ?></p>
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
								<p><?php echo mb_substr(strip_tags($popular_news[0]->details), 0, 720); ?></p>
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
												<p><?php echo mb_substr(strip_tags($news->details), 0, 120); ?></p>
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