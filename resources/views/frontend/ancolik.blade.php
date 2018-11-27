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

        <form class="form-horizontal form-stripe" action="ancolik" method="POST">
            <div class="row animated fadeInUp" ng-controller="NewsController">

                <input type="hidden" name="flag" id="flag">
                {{ csrf_field() }}


                <div class="panel">
                    <div class="panel-content">

                        <div class="container">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-2">
                                    <select  class="form-control select2js"  style="width: 100%" name="division" id="division">
                                        <option value="0">বিভাগ</option>
                                        @foreach($divisions as $division)
                                            <option value="{{ $division->id }}">{{ $division->division }} </option>
                                        @endforeach

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group" style="display: none" name="district" id="district"></div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group" style="display: none" name="upazila" id="upazila"></div>
                                </div>

                                <div class="col-sm-1" style="float: right;margin-right: 5%;" >
                                    {{--<a class="btn btn-success searchAncolikNews" id="searchAncolikNews" >Search</a>--}}
                                    <div class="form-group" >
                                        <input class="btn btn-success" type="submit" value="Search">
                                    </div>
                                </div>

                            </div>
                        </div>





                    </div>
                </div>

            </div>
        </form>




        <div class="section-padding">
            <div class="container">
                <div class="row">
                    <div class="form-group" style="display: none" name="ancoliknews" id="ancoliknews">Ancolik</div>
                </div>
            </div>
        </div>


        <div class="section-padding padding-top-zero">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="left-content-section single-page">
                            <div class="archive-items">
                                <h3 class="section-heading"> আঞ্চলিক </h3>

                                @foreach($all_news as $news)
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

                                @if(count($all_news) == 0)
                                    No Data Found
                                @endif
                            </div>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


        <div class="modal fade" id="warning_modal" tabindex="-1" role="dialog" aria-labelledby="modal-success-label" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header state modal-success">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modal-success-label"><i class="fa fa-user"></i>Delete User</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group-attached">
                            <div class="row">
                                <div class="col-sm-6" style="margin: 10px;">
                                    <div class="form-group form-group-default">
                                        Choose at least:<br>
                                        <code>Division</code><br>
                                        <code>District</code><br>
                                        <code>Upazila</code>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer"> <a type="button" class="btn btn-default" data-dismiss="modal">Close</a> </div>
                </div>
            </div>
        </div>




        <div class="container">
            {{--<a href="{{url('category/ancolik/more')}}" class="news-readmore-btn btn btn-primary">আরও খবর</a>--}}
        </div>
        <br>

        <!--single advertise area-->
        <div class="section-padding advertise-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a href="">
                            @if(isset(Auth::user()->id) && Auth::user()->role == 1)
                                <img ng-click="changeAd('Home', 8)" style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt="">
                            @else
                                <a href="{{ $ads[7]->external_link }}" target="_blank"><img style="cursor:pointer" src="{{asset('public/images/assets/'.$ads[7]->image_id)}}" alt=""></a>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!--single advertise area end-->


    </div>
@endsection
