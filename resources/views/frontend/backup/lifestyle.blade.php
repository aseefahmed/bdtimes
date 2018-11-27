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
								<img ng-click="changeAd('Home', 1)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else 
								<a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif
							
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							<img ng-click="changeAd('Home', 2)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
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
                        <img src="http://placehold.it/1000x100" alt="">
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
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-1">
                                    <a href="" class="slider-headline">
                                        <h3>চালের শুল্ক কমিয়ে ১০% করা হলো</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-2">
                                    <a href="" class="slider-headline">
                                        <h3>আন্তমন্ত্রণালয়ের সভা</h3>
                                    </a>
                                </div>
                            </div>
                            <div class="single-breakingnews-item">
                                <div class="breakingnews-bg breakingnews-bg-3">
                                    <a href="" class="slider-headline">
                                        <h3>আর যেন পাহাড়ধসে ক্ষতি না হয়</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <!-- ad here -->
                        <div class="advertise-1">
                            <a href=""><img src="http://placehold.it/270x290" alt=""></a>
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
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
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


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>ফ্যাশন</h2>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
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


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>রূপচর্চা</h2>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন</h3>
                            </a>
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
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত</p>
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


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>গৃহসজ্জা</h2>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন</h3>
                            </a>
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


    <!-- big slider -->
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-2">
                    <div class="cta-bar">
                        <h2>বিবিধ</h2>
                    </div>
                    <div class="big-section-slider">
                        <div class="single-big-slider big-bg-1">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-2">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন্</h3>
                            </a>
                        </div>
                        <div class="single-big-slider big-bg-3">
                            <a href="" class="slider-headline">
                                <h3>অননুমোদিত পাহাড় কাটা বন</h3>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    
    
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4  col-xs-12">
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-3">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর</p>
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
@endsection