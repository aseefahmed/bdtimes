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
                    <div class="col-md-11">
                        <div class="left-content-section single-page">
                            <div class="archive-items">
                                <h3 class="section-heading">ভাইরাল </h3>

                                @foreach($viral as $news)
                                    <div class="single-thumbnail-item-1">
                                        <div class="thumbnail-bg" style="background-image: url({{ url('public/images/news/featured/'.$news->featured_image) }})"></div>
                                        <div class="news-content">
                                            <h3>{{$news->title}}</h3>
                                            <p><?php echo mb_substr(strip_tags($news->details), 0, 800); ?></p>
                                            <a href="{{ url('news/front/details/'.$news->id) }}" class="news-readmore-btn">বিস্তারিত <i class="fa fa-arrow-right"></i></a>
                                            <br><br>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    {{ $viral->links() }}
                                </div>
                                @if(count($viral) == 0)
                                    No Data Found
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
