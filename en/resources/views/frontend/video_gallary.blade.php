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
								<img ng-click="changeAd('vedio', 1001)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt="">
							@else
								<a href="" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[0]->image_id)}}" alt=""></a>
							@endif

						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							<img ng-click="changeAd('vedio', 1002)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[1]->image_id)}}" alt="">
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!-- breaking news slider -->
    <div class="section-padding breaking-news-slider padding-top-zero">
        <div class="container-fluid">
            <div class="col-sm-12">
                <div class="aside-advertise-3 scrollToShow">
                    <div class="ad">
                        @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('vedio', 1003)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[2]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[2]->image_id)}}" alt=""></a>
                            @endif
                        <a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
					<div class="col-sm-2">
					    <div class="cta-bar">
					        <h2>Top Video</h2>
					    </div>
					</div>
                    <div class="col-sm-7 col-xs-12">
                        <div class="video-gallary-slides video-gallary-page">
                            <div class="single-video-slide">
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-1 mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                    <a href="" class="slider-headline">
                                        <h3>Unauthorized mountain cut forest</h3>
                                    </a>
                                </a>
                            </div>
                            <div class="single-video-slide">
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-2 mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                    <a href="" class="slider-headline">
                                        <h3>Unauthorized mountain cut forest</h3>
                                    </a>
                                </a>
                            </div>
                            <div class="single-video-slide">
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn play-bg-3 mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                    <a href="" class="slider-headline">
                                        <h3>Unauthorized mountain cut forest</h3>
                                    </a>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-3 pdt-10 col-xs-12">
                        <!-- ad here -->
                        <div class="advertise-1">
                            <a href="">
                                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('vedio', 1004)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[3]->image_id)}}" alt="">
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

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Reporting</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Reporting</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                   <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                   <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                   <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('vedio', 1005)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[4]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[4]->image_id)}}" alt=""></a>
                                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Tech</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Tech</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Tips</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Tips</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('vedio', 1006)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[6]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[6]->image_id)}}" alt=""></a>
                                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Programme</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Programme</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>বৈঠকখানা</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">বৈঠকখানা</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('vedio', 1007)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>History and tradition</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">History and tradition</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
				        <h2>Small ethnic group</h2>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Small ethnic group</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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
    <div class="section-padding advertise-252">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                        <img ng-click="changeAd('vedio', 1009)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt="">
                                    @else
                                        <a href="{{ $ads[8]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[8]->image_id)}}" alt=""></a>
                                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="video-service-area section-padding">
        <div class="container">
            <div class="row">
				<div class="col-sm-2">
				    <div class="cta-bar">
                        <h3>Your Video</h3>
				    </div>
				</div>
                <div class="col-sm-10">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading"><a href="">Your Video</a></h3>
                    </div>
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
                                <a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="service-video reporting-video-bg mfp-iframe">
                                    <div class="video-icon-table">
                                        <div class="video-icon-tablecell">
                                            <i class="fa fa-play"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="single-video-item">
                               <div class="vdo-heding-text">
                                    <a href="single-page.html" class="single-video-heading">
                                        <h3>Video headline</h3>
                                    </a>
                                    <p>Thanks and congratulations Dear readers</p>
                                </div>
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

@endsection
