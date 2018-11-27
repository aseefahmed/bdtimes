@extends('layouts.frontend.dashboard')

@section('content')
<div ng-controller="MainController">
<!-- double ad -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<div class="double-ad" id="sticker">
					<div class="single-long-ad-left">
						<!--a class="btn btn-success" ng-if="isLoggedIn==1 && loginUser.role == 1">ddda</a-->
						<a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id))
							<img ng-click="changeAd('National', 12)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[0]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
						@endif
						
					</div>
					<div class="single-long-ad-right">
						<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
						@if(isset(Auth::user()->id))
							<img ng-click="changeAd('National', 13)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
						@else 
							<a href="{{ $ads[1]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt=""></a>
						@endif
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
								<img ng-click="changeAd('National', 14)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
							@else 
								<a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
							@endif
						<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-sm-7 col-sm-offset-2">
						<div class="cta-bar">
							<h2>টপ নিউজ</h2>
						</div>
						<div class="breakingnews-carousel">
							@foreach($probash_breaking_news as $news)
								<div class="single-breakingnews-item">
								<div class="breakingnews-bg" style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image) }})">
									<a href="{{ url('news/front/details/'.$news->id) }}" class="slider-headline">
										<h3>{{ $news->title }}</h3>>
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
									<img ng-click="changeAd('National', 15)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
					<h3 class="section-heading"><a href="">ক্যাটাগরির নাম</a></h3>
					@foreach($probash_recent as $news)
						<div class="single-thumbnail-item-1">
							<div class="thumbnail-bg" style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
							<div class="news-content">
								<h3>{{$news->title}}</h3>
								<p><?php echo substr(strip_tags($news->details), 0, 550); ?></p>
								<a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					@endforeach
					
				</div>
				<div class="col-sm-7 col-xs-12">
					<h3 class="section-heading">রিপোরটিং-বেজড নিউজ</h3>
					<div class="video-slides">
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-1 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>অননুমোদিত পাহাড় কাটা বন</h3>
								</a>
							</a>
						</div>
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-2 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>অননুমোদিত পাহাড় কাটা বন</h3>
								</a>
							</a>
						</div>
						<div class="single-video-slide">
							<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn long-height play-bg-3 mfp-iframe">
								<div class="video-icon-table">
									<div class="video-icon-tablecell">
										<i class="fa fa-play"></i>
									</div>
								</div>
								<a href="" class="slider-headline">
									<h3>অননুমোদিত পাহাড় কাটা বন</h3>
								</a>
							</a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">জীবন-জীবিকা</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">জীবন-জীবিকা</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">শ্রমবাজার</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">শ্রমবাজার</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">জনশক্তি খাত</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">জনশক্তি খাত</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">রেমিটেন্স</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">রেমিটেন্স</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">হাসি-কান্না</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">হাসি-কান্না</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- news with youtube vdo section style 2 -->
	<div class="section-padding news-with-vdo-section yt-secion-style2">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-2">
					<div class="cta-bar">
						<h2><a href="">প্রবাস জীবন</a></h2>
					</div>
					<div class="cta-bar-alternative">
						<h3 class="section-heading"><a href="">প্রবাস জীবন</a></h3>
					</div>
					<div class="news-with-vdo-wrap">
						<div class="news-section-img150">
							<div class="single-thumbnail-item-2">
								<div class="news-content">
									<a href="">
										<h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।

											বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন  </p>
									</a>
									<a href="#" class="news-readmore-btn">বিস্তারিত</a>
								</div>
							</div>
						</div>
						<div class="single-big-youtube">
							<div class="single-video-item">
								<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
									<div class="video-icon-table">
										<div class="video-icon-tablecell">
											<i class="fa fa-play"></i>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-6 col-xs-12">
					<div class="single-thumbnail-item-1">
						<div class="thumbnail-bg single-thumbnail-1"></div>
						<div class="news-content">
							<h3>৫০ দিনে একটি গানের ভিডিও!</h3>
							<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের</p>
							<a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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
					<a href=""><img src="http://placehold.it/1200x250" alt=""></a>
				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->
</div>
@endsection