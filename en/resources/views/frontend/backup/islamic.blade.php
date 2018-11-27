@extends('layouts.frontend.dashboard')

@section('content')
<div ng-controller="MainController">
<!-- double ad -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="double-ad" id="sticker">
                    <div class="single-long-ad-left">
                        <a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
                        <img src="https://placehold.it/160x600" alt="">
                    </div>
                    <div class="single-long-ad-right">
                        <a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
                        <img src="https://placehold.it/160x600" alt="">
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
    <!-- news with youtube vdo section style 2 -->
    <div class="section-padding news-with-vdo-section yt-secion-style2">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">ধর্ম ও জিজ্ঞাসা</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">ধর্ম ও জিজ্ঞাসা</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img90">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে</p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে</p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে</p>
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
    <!-- news with youtube vdo section style 3 -->
    <div class="section-padding news-with-vdo-section yt-secion-style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">সাহাবাদের জীবন কাহিনী</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">সাহাবাদের জীবন কাহিনী</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img150">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।
                                        বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন পারাপারে কাঁঠালবাড়ি শিমুলিয়া নৌরুটে ১৯টি ফেরি, ৮৭টি লঞ্চ ও ১২০টির বেশি স্পিডবোট চলাচল করে।
                                        সরেজমিনে কাওরাকান্দি লঞ্চঘাট ও কাঁঠালবাড়ি ফেরিঘাটে দেখা যায়, দীর্ঘ সময় লাইনে দাঁড়িয়ে থেকে লঞ্চ ও স্পিডবোটে উঠছে যাত্রীরা। স্পিডবোটে তোলা হচ্ছে অতিরিক্ত যাত্রী। লঞ্চ ও যাত্রীবাহী বাসগুলো ছাদে যাত্রী বোঝাই করে ঝুঁকি নিয়ে চলছে গন্তব্যে। কাঁঠালবাড়ি ঘাট বাস টার্মিনালেও ছিল ঢাকাগামী যাত্রীদের ভিড়।
                                        যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news with youtube vdo section style 3 -->
    <div class="section-padding news-with-vdo-section yt-secion-style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">ইসলামের গুরুত্যপূর্ন ঘটনা</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">ইসলামের গুরুত্যপূর্ন ঘটনা</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img150">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।
                                            বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন পারাপারে কাঁঠালবাড়ি শিমুলিয়া নৌরুটে ১৯টি ফেরি, ৮৭টি লঞ্চ ও ১২০টির বেশি স্পিডবোট চলাচল করে।
                                            সরেজমিনে কাওরাকান্দি লঞ্চঘাট ও কাঁঠালবাড়ি ফেরিঘাটে দেখা যায়, দীর্ঘ সময় লাইনে দাঁড়িয়ে থেকে লঞ্চ ও স্পিডবোটে উঠছে যাত্রীরা। স্পিডবোটে তোলা হচ্ছে অতিরিক্ত যাত্রী। লঞ্চ ও যাত্রীবাহী বাসগুলো ছাদে যাত্রী বোঝাই করে ঝুঁকি নিয়ে চলছে গন্তব্যে। কাঁঠালবাড়ি ঘাট বাস টার্মিনালেও ছিল ঢাকাগামী যাত্রীদের ভিড়।
                                            যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news with youtube vdo section style 2 -->
    <div class="section-padding news-with-vdo-section yt-secion-style">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">মাসলা মাসায়েল</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">মাসলা মাসায়েল</a></h3>
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
    <!-- news with youtube vdo section style 3 -->
    <div class="section-padding news-with-vdo-section yt-secion-style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">তাফসির</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">তাফসির</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img150">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।
                                            বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন পারাপারে কাঁঠালবাড়ি শিমুলিয়া নৌরুটে ১৯টি ফেরি, ৮৭টি লঞ্চ ও ১২০টির বেশি স্পিডবোট চলাচল করে।
                                            সরেজমিনে কাওরাকান্দি লঞ্চঘাট ও কাঁঠালবাড়ি ফেরিঘাটে দেখা যায়, দীর্ঘ সময় লাইনে দাঁড়িয়ে থেকে লঞ্চ ও স্পিডবোটে উঠছে যাত্রীরা। স্পিডবোটে তোলা হচ্ছে অতিরিক্ত যাত্রী। লঞ্চ ও যাত্রীবাহী বাসগুলো ছাদে যাত্রী বোঝাই করে ঝুঁকি নিয়ে চলছে গন্তব্যে। কাঁঠালবাড়ি ঘাট বাস টার্মিনালেও ছিল ঢাকাগামী যাত্রীদের ভিড়।
                                            যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news with youtube vdo section style 4 -->
    <div class="section-padding news-with-vdo-section yt-secion-style-4">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">ইসলামের গুরুত্যপূর্ন স্থাপনা</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">ইসলামের গুরুত্যপূর্ন স্থাপনা</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img150">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান শেষ করতে পারলেননা!</h3>
                                    </a>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।
                                            বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন  </p>
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
    <!-- news with youtube vdo section style 2 -->
    <div class="section-padding news-with-vdo-section ">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">হাদিসের বাণী</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">হাদিসের বাণী</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap small-news-area">
                        <div class="news-section-img90 small-news-area-left">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                        <div class="news-section-img90 small-news-area-right">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময়ে</p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময়ে</p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান!</h3>
                                        <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময়ে</p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- news with youtube vdo section style 3 -->
    <div class="section-padding news-with-vdo-section yt-secion-style-3">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-2">
                    <div class="cta-bar">
                        <h2><a href="">আল কোরআনের গল্প</a></h2>
                    </div>
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">আল কোরআনের গল্প</a></h3>
                    </div>
                    <div class="news-with-vdo-wrap">
                        <div class="news-section-img150">
                            <div class="single-thumbnail-item-2">
                                <div class="thumbnail-bg single-thumbnail-1"></div>
                                <div class="news-content">
                                    <a href="">
                                        <h3>৫০ দিনে একটি গান শেষ করতে পারলেননা বালাম!</h3>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।
                                            বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন পারাপারে কাঁঠালবাড়ি শিমুলিয়া নৌরুটে ১৯টি ফেরি, ৮৭টি লঞ্চ ও ১২০টির বেশি স্পিডবোট চলাচল করে।
                                            সরেজমিনে কাওরাকান্দি লঞ্চঘাট ও কাঁঠালবাড়ি ফেরিঘাটে দেখা যায়, দীর্ঘ সময় লাইনে দাঁড়িয়ে থেকে লঞ্চ ও স্পিডবোটে উঠছে যাত্রীরা। স্পিডবোটে তোলা হচ্ছে অতিরিক্ত যাত্রী। লঞ্চ ও যাত্রীবাহী বাসগুলো ছাদে যাত্রী বোঝাই করে ঝুঁকি নিয়ে চলছে গন্তব্যে। কাঁঠালবাড়ি ঘাট বাস টার্মিনালেও ছিল ঢাকাগামী যাত্রীদের ভিড়।
                                            যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন </p>
                                    </a>
                                    <a href="#" class="news-readmore-btn">বিস্তারিত</a>
                                </div>
                            </div>
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
    <div class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
                            <a href="#" class="news-readmore-btn">বিস্তারিত<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <div class="single-thumbnail-item-1">
                        <div class="thumbnail-bg single-thumbnail-1"></div>
                        <div class="news-content">
                            <h3>৫০ দিনে একটি গানের ভিডিও!</h3>
                            <p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি করতে শুটিং, সম্পাদনা, যাবতীয় কাজসহ সব মিলিয়ে সর্বোচ্চ সাত দিন পর্যন্ত সময় লাগে বলে জানা গেছে। তবে বেশির ভাগ গানের ভিডিও বানাতে সময় নেওয়া হয় দুই থেকে তিন দিন। আর সেখানে কিনা ঈদের একটি</p>
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