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

    <div class="section-padding padding-top-zero">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="single-page-content-wrap">
                        <div class="left-content-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="single-page-news">
                                        <div class="single-content-bg"  style="background-image: url({{ asset('public/images/news/featured/'.$news_details[0]->featured_image)}})"></div>
                                        
                                        <h3>
										{{$news_details[0]->title}}
                                        </h3>
                                        <p>ঈদের ছুটি শেষে ঢাকায় ফিরতে শুরু করেছে মানুষ। আজ শুক্রবার সড়ক, রেল ও নৌপথে ছিল মানুষের উপচে পড়া ভিড়। কর্মস্থলে যোগ দিতে দক্ষিণাঞ্চলের মানুষের ঢল নামে মাদারীপুরের কাঁঠালবাড়ি ঘাটে। সকাল থেকেই লঞ্চ, স্পিডবোট ও ফেরিতে যাত্রী ও যানবাহনের চাপ ছিল চোখে পড়ার মতো। একই চিত্র দেখা গেছে গাজীপুরেও। কাল শনিবার থেকে গাজীপুরের অধিকাংশ অফিস, কল-কারখানার ছুটি শেষ হওয়ায় আজ শুক্রবার জেলার বাস ও রেল স্টেশনগুলোতে ছিল কর্মক্ষেত্রে ফেরা মানুষের ভিড়।</p>
                                        <p>বিআইডব্লিউটিসি সূত্রে জানা যায়, কাঁঠালবাড়ি-শিমুলিয়া নৌরুট দিয়ে দক্ষিণ ও দক্ষিণ-পশ্চিমাঞ্চলের ২১ জেলার প্রায় ৩০ হাজার মানুষ প্রতিদিন যাতায়াত করে। ঈদে এই সংখ্যা বেড়ে যায় কয়েক গুন। যাত্রী ও যানবাহন পারাপারে কাঁঠালবাড়ি শিমুলিয়া নৌরুটে ১৯টি ফেরি, ৮৭টি লঞ্চ ও ১২০টির বেশি স্পিডবোট চলাচল করে।</p>
                                        <p>সরেজমিনে কাওরাকান্দি লঞ্চঘাট ও কাঁঠালবাড়ি ফেরিঘাটে দেখা যায়, দীর্ঘ সময় লাইনে দাঁড়িয়ে থেকে লঞ্চ ও স্পিডবোটে উঠছে যাত্রীরা। স্পিডবোটে তোলা হচ্ছে অতিরিক্ত যাত্রী। লঞ্চ ও যাত্রীবাহী বাসগুলো ছাদে যাত্রী বোঝাই করে ঝুঁকি নিয়ে চলছে গন্তব্যে। কাঁঠালবাড়ি ঘাট বাস টার্মিনালেও ছিল ঢাকাগামী যাত্রীদের ভিড়।</p>
                                        <p>যাত্রীদের সার্বিক নিরাপত্তার জন্য ফায়ার সার্ভিস, নৌপুলিশ, র‌্যাব এবং জেলা প্রশাসনের ভ্রাম্যমাণ আদালতের একাধিক টিম কাজ করছে। তারপরও প্রশাসনের চোখকে ফাঁকি দিয়ে লঞ্চ, স্পিডবোট ও পরিবহন মালিকেরা যাত্রীদের কাছ থেকে হাতিয়ে নিচ্ছে অতিরিক্ত ভাড়া। যাত্রীদের অভিযোগ, লঞ্চে ঈদ উপলক্ষে ৩৩ টাকা ভাড়ার পরিবর্তে রাখা হচ্ছে ৫০ টাকা। স্পিডবোটের ১২০ টাকার ভাড়া রাখা হচ্ছে ১৮০ টাকা। খুলনা থেকে কাঁঠালবাড়ি ঘাটের বাস ভাড়া ২৮০ টাকা। সেখানে রাখা হচ্ছে ৪০০ টাকা। মাদারীপুর থেকে কাঁঠালবাড়ি ঘাট বা কাওরাকান্দি ঘাট পর্যন্ত যেতে বাস ভাড়া ১০০ টাকার বিপরীতে রাখা হচ্ছে ১৮০ টাকা। মাইক্রোবাসের ভাড়াও রাখা হচ্ছে দ্বিগুণের বেশি। বরিশাল থেকে কাঁঠালবাড়ি আসতে ভাড়া স্বাভাবিক সময়ে রাখা হতো ২৫০ টাকা। সেখানে ৩৫০ থেকে ৪৫০ টাকা রাখা হচ্ছে।</p>
                                        <!--single-ad-->
                                        <div class="single-page-ad">
                                            <a href=""><img src="https://images-na.ssl-images-amazon.com/images/G/01/AdProductsWebsite/images/ad-specs/GW_Billboard_BTF_NA3.jpg" alt=""></a>
                                        </div>
                                        <p>গোপালগঞ্জ থেকে ঢাকাগামী যাত্রী সুজিৎ মৃধা বলেন, ‘ঈদের ছুটি কাটিয়ে ঢাকায় ফিরছি। শুক্রবার বন্ধের দিন থাকায় খুব ভিড়ের মধ্যে পড়েছি। দ্রুত যাওয়ার জন্য স্পিডবোটে ভাড়া বেশি দিয়েই পদ্মা পাড়ি দিতে হচ্ছে।’ বরিশাল থেকে কাঁঠালবাড়ি ঘাটে আসা যাত্রী শফিকুল ইসলাম বলেন, ‘আসার সময় বেশি ভাড়া দিয়ে বাসে টিকিট কেটেছি। এখন ঢাকা যাওয়ার জন্যও বেশি ভাড়া দিতে হচ্ছে।’</p>
                                        <p>লঞ্চ মালিক সমিতির মাওয়া জোনের সাধারণ সম্পাদক ভাস্কর চৌধুরী বলেন, ‘আমরা নৌপরিবহনমন্ত্রীর নির্দেশ অনুসারে কাঁঠালবাড়ি থেকে শিমুলিয়া নৌ রুটে লঞ্চের যাত্রীদের কাছ থেকে ৩৩ টাকা করে ভাড়া নির্ধারণ করেছি। যদি কোনো লঞ্চ মালিক সেটা অমান্য করে এবং অতিরিক্ত যাত্রী বোঝাই করে, তবে তার বিরুদ্ধে কর্তৃপক্ষ যথাযথ ব্যবস্থা নেবে।’ শিবচরের কাঁঠালবাড়ি স্পিডবোটের সুপারভাইজার মো. দেলোয়ার দেওয়ান বলেন, কোনো প্রকার বাড়তি ভাড়া নেওয়া হচ্ছে না। সমিতির নিয়ম অনুসারে নির্ধারিত ১২০ টাকা করেই যাত্রীদের কাছ থেকে ভাড়া নেওয়া হচ্ছে।</p>
                                        <p>মাদারীপুর জেলা সড়ক পরিবহন শ্রমিক ইউনিয়নের সাধারণ সম্পাদক মো. মিজানুর রহমান হাওলাদার বলেন, ‘কিছু কিছু পরিবহনে অতিরিক্ত ভাড়া আদায় করলেও আমরা লোকাল পরিবহনগুলোতে বেশি ভাড়া নিচ্ছি না।’</p>
                                        <p>ঈদের ছুটিতে ফাঁকা হয়ে যাওয়া শিল্প–কারখানাসমৃদ্ধ গাজীপুর আবার জেগে উঠছে। শুক্রবার শ্রীপুর রেলস্টেশন, মাওনা চৌরাস্তা ও সাতখামাইর রেলস্টেশন ঘুরে যাত্রীদের চাপ লক্ষ করা যায়। বিকেল সাড়ে চারটায় শ্রীপুরে থামে বলাকা কমিউটার মেইল ট্রেন। ট্রেনটি সাড়ে তিনটায় আসার কথা থাকলেও শিডিউল বিপর্যয়ের কারণে সাড়ে চারটায় শ্রীপুর স্টেশনে এসে পৌঁছে। পুরো ট্রেনের ভেতর-বাইরে ছিল যাত্রীদের উপচে পড়া ভিড়। শ্রীপুরে অন্তত ৫০০ জন যাত্রী নেমে গেলেও ঢাকামুখী অপেক্ষমাণ অন্তত আড়াই শ যাত্রী ট্রেনে ওঠে। ভেতরে জায়গা না পেয়ে ছাদেও উঠছে অনেকে।</p>
                                        <p>ময়মনসিংহ থেকে আসা ট্রেনের যাত্রী আহসানুল কবির জানান, ছুটি শেষ, তাই উত্তরায় কর্মস্থলে ফিরছেন তিনি। জামালপুর থেকে আসা অপর যাত্রী শাহরিয়ার আহমেদ বলেন, বাড়িতে যাওয়ার সময় ভিড় হলেও খুব আনন্দ নিয়ে গিয়েছি। কিন্তু বাড়ি থেকে আসতে এই ভিড় সহ্য হচ্ছে না। ছাদে ভ্রমণ করা সুতিয়াখালীর আশরাফুল আলম জানান, ময়মনসিংহ স্টেশনে প্রচুর যাত্রীর চাপ থাকায় ট্রেনের ভেতরে উঠতে পারেননি তিনি। তাই বাধ্য হয়েই ছাদে উঠতে হয়েছে।</p>
                                        <!--single-ad-->
                                        <div class="single-page-ad">
                                            <a href=""><img src="https://images-na.ssl-images-amazon.com/images/G/01/AdProductsWebsite/images/ad-specs/GW_Billboard_BTF_NA3.jpg" alt=""></a>
                                        </div>
                                        <p>শ্রীপুর রেলস্টেশনের স্টেশনমাস্টার মো. শাহজাহান মিয়া জানান, ঈদ উপলক্ষে যাত্রীদের চাপ বেশি থাকায় ট্রেন কিছুটা দেরিতে পৌঁছায়। তবে ট্রেন যাত্রায় নিরাপত্তার অভাব নেই। যাত্রীদের ছাদে ওঠার বিষয়ে তিনি জানান, শুরুতেই কিছু যাত্রী ছাদে উঠে পড়ে। শ্রীপুর স্টেশন থেকে ছাদে উঠতে বাধা দেওয়া হচ্ছে। তবু কেউ কেউ হয়তো উঠে পড়ছে।</p>
                                        <p>শ্রীপুরের মাওনা চৌরাস্তায় সকাল নয়টায় ময়মনসিংহ, শেরপুর, জামালপুর ও নেত্রকোনা থেকে আসা যাত্রীদের বাস থেকে নামার তোড়জোড় লক্ষ করা যায়। ময়মনসিংহ থেকে নিজের কর্মস্থলে ফেরা যাত্রী আজাদ জানান, প্রিয়জনদের সঙ্গে কয়েকটি দিন আনন্দে কাটিয়ে বাড়ি ছেড়ে আসতে মন খারাপ লাগছিল। ঢাকা-ময়মনসিংহ মহাসড়কের দূরপাল্লার গ্রিনলাইন পরিবহনের চালক আলফাজ মিয়া জানান, নেত্রকোনা থেকে এই পরিবহনের বাস ছাড়ে। যাত্রীদের প্রচুর চাপ থাকায় পরিবহনের পরিচালকদের হিমশিম খেতে হচ্ছে। দাঁড়িয়ে যাত্রী পরিবহনের নিয়ম না থাকলেও অনেক সময় যাত্রীদের চাপের কারণে তা মানা সম্ভব হচ্ছে না। তবে তাঁরা ছাদে যাত্রী বহন করছেন না।</p>
                                        <p>মাওনা হাইওয়ে থানার ভারপ্রাপ্ত কর্মকর্তা (ওসি) দেলোয়ার হোসেন জানান, ‘ঈদের আগে থেকেই ঢাকা-ময়মনসিংহ মহাসড়কে যাত্রীদের চলাচল নির্বিঘ্ন করতে আমরা তৎপর ছিলাম। এখন মানুষ নিজ নিজ কর্মস্থলে ফিরছে। কোথাও যানজটের আশঙ্কা দেখা দিলেই ব্যবস্থা নেওয়া হচ্ছে।</p>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="social-links">
                                                <h3 class="social-heading">মন্তব্য করুন</h3>
<!--
                                                <ul class="social-icons">
                                                    <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                                                    <li><a href=""><i class="fa fa-tumblr"></i></a></li>
                                                    <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
-->
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="comment-section">
                                            <div class="col-md-4">
                                                <div class="profile-meta">
                                                    <div class="profile-pic">
                                                        <img src="{{asset('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
                                                    </div>
                                                    <div class="profile-info">
                                                        <p>Logged in as</p>
                                                        <h3>রহিম উদ্দিন</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="comment-section">
                                                    <form action="index.html">
                                                        <textarea name="" id="" cols="30" rows="30"></textarea>
                                                        <input class="pull-right" type="submit" value="পাঠান">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-md-offset-4">
                                                <div class="demo-comments">
                                                    <div class="single-demo-comment">
                                                        <div class="comment-dp">
                                                            <img src="{{asset('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
                                                        </div>
                                                        <div class="comment-meta">
                                                            <h3>রহিম উদ্দিন</h3>
                                                            <p>বাংলাদেশ ভালো খেলেছে, অভিনন্দন।</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-demo-comment">
                                                        <div class="comment-dp">
                                                            <img src="{{asset('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
                                                        </div>
                                                        <div class="comment-meta">
                                                            <h3>রোনাল্ডো</h3>
                                                            <p>শুভ বিবাহ মেসি</p>
                                                        </div>
                                                    </div>
                                                    <div class="single-demo-comment">
                                                        <div class="comment-dp">
                                                            <img src="{{asset('public/assets/img/single-news-item-imgs/profile.png')}}" alt="">
                                                        </div>
                                                        <div class="comment-meta">
                                                            <h3>খালেদা জিয়া</h3>
                                                            <p>নিরপেক্ষ নির্বাচনের ব্যবস্থা করুন</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="right-content-area">
                            <div class="row">
                                <div class="col-md-12">
                                    <!--ad-->
                                    <div class="single-page-advertise-1">
                                        <img ng-click="changeAd('Home', 4)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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
											@if($key<10)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{asset('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<h3>{{$news->title}}</h3>
															<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি</p>
														</a>
														<a href="#" class="news-readmore-btn">বিস্তারিত</a>
													</div>
												</div>
											@endif
										@endforeach
                                    </div>
                                    <!--jonomot jorip-->
                                    <div class="opinion-section margin-top-10">
                                        <h3 class="section-heading"><a href="">জনমত জরিপ</a></h3>
                                        <div class="people-opinion">
                                            <img src="{{ asset('public/assets/img/single-news-item-imgs/section-img-2.jpg') }}" alt="">
                                            <p>মন্ত্রী বলেন, তাৎক্ষণিকভাবে ক্ষতিগ্রস্ত ব্যক্তিদের পাশে দাঁড়ানো, সব ধরনের সাহায্য করাসহ কতগুলো প্রস্তাব দেওয়া হয়েছে। এসব প্রস্তাবের মধ্যে রয়েছে বালু উত্তোলন বন্ধ করা, চলমান সব হাউজিং প্রকল্পের কাজ আপাতত বন্ধ রাখা, পার্শ্ববর্তী এলাকার মানুষ ক্ষতিগ্রস্ত হওয়ার আশঙ্কা</p>
                                        </div>
                                    </div>

                                    <!--most news section-->
                                    <div class="single-page-top-news news-section-im70 margin-top-10">
                                        <h3 class="section-heading"><a href="">সর্বাধিক আলোচিত</a></h3>
                                        @foreach($popular_news as $key=>$news)
											@if($key>9 && $key<20)
												<div class="single-thumbnail-item-2">
													<div class="thumbnail-bg"  style="background-image: url({{ asset('public/images/news/featured/'.$news->featured_image)}})"></div>
													<div class="news-content">
														<a href="">
															<h3>{{$news->title}}</h3>
															<p>সাধারণত কোনো শিল্পীর একটি গানের ভিডিও তৈরি</p>
														</a>
														<a href="#" class="news-readmore-btn">বিস্তারিত</a>
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
            </div>
        </div>
    </div>
	</div>
	
@endsection