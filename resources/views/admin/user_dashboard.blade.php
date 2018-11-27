@extends('layouts.frontend.dashboard')

@section('content')
<!-- double ad -->
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

    <!-- Log-in profile -->
    <div class="log-in-section">
        <div class="container">
            <div class="row top-profile-bar">
                <div class="col-xs-8">
                    <div class="profile-lists">
                        <ul role="tablist" class="nav nav-tabs">
                            <li role="presentation" class="active"><a href="#write-here" data-toggle="tab" role="tab" aria-controls="write-here">লিখুন</a></li>
                            <li role="presentation"><a href="#your-writings" data-toggle="tab" role="tab" aria-controls="your-writings">আপনার লেখা</a></li>
                            <li role="presentation"><a href="#edit-profile" data-toggle="tab" role="tab" aria-controls="edit-profile">এডিট প্রোফাইল</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xs-4 text-right">
                    <div class="right-profile-picture">
                        <a href="" class="profile-name">নাম</a>
                        <a href="" class="profile-picture">
							@if(Auth::user()->image != "")
								<img src="{{asset('public/images/profiles/'.Auth::user()->image)}}" alt="">
							@else 
								<img src="{{asset('public/images/no_thumb.jpg')}}" alt="">
							@endif
						</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="tab-content">
                    <div class="write-here tab-pane active fade in" role="tabpanel" id="write-here">
                        <div class="col-xs-12">
                            <form id="addNewsForm" class="write-here-form">
							{{csrf_field()}}
								<input type="hidden" id="flag" name="flag">
                                <input type="text" placeholder="শিরোনাম" name="news_title">
                                <textarea  id="" cols="30" rows="10" placeholder="এখানে লিখুন" name="news_details"></textarea>
								Featured Image: <input type="file"  name="featured_image" placeholder="Picture">
                                <input type="submit" class="savePostBtn" flag="2" value="সেভ">
                                <input type="submit" class="savePostBtn" flag="0" value="প্রচার">
                            </form>
                        </div>
                    </div>

                    <div class="your-writings tab-pane fade" role="tabpanel" id="your-writings" >
                        <div class="col-xs-12">
                            <table class="writings">
                                <tr>
                                    <th>লেখা</th>
                                    <th>বিষয়</th>
                                    <th>সময়</th>
                                    <th>ধরন</th>
                                </tr>
                                @if(count($news_list) == 0)
									<tr>
										<td colspan="4">No Data found.</td>
									</tr>
								@endif
                                @foreach($news_list as $news)
									<tr>
										<td class="big-td"><a href="{{url('news/list')}}">{{$news->title}}</a></td>
										<td>{{$news->category_name}}</td>
										<td>{{date_format(date_create($news->created_at), 'd/m/Y H:i:s')}}</td>
										<td>
											@if($news->flag == 0)
												খসড়া 
											@elseif($news->flag == 1)
                                                প্রকাশিত
											@endif
										</td>
									</tr>
								@endforeach
                            </table>

                            {{ $news_list->links() }}
                        </div>
                    </div>


                    <div class="edit-profile tab-pane fade" role="tabpanel" id="edit-profile">
                        <div class="col-xs-4 text-center">
                            <div class="change-picture">
                                <a href="">
									@if(Auth::user()->image != "")
										<img src="{{asset('public/images/profiles/'.Auth::user()->image)}}" alt="">
									@else 
										<img src="{{asset('public/images/no_thumb.jpg')}}" alt="">
									@endif
								</a>
                                <a href="" class="picture-change-btn">ছবি পরিবর্তন</a>
                            </div>
                        </div>

                        <div class="col-xs-8">
                            <div class="profile-input-form">
                                <form class="profile-form" id="userDetails" method="post">
								{{csrf_field()}}
								<input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                    <input type="text" class="first-name" name="first_name" placeholder="প্রথম নাম" value="{{Auth::user()->first_name}}">
                                    <input type="text" class="last-name" name="last_name" placeholder="শেষ নাম" value="{{Auth::user()->last_name}}">
                                    <input type="email" disabled placeholder="{{Auth::user()->email}}">
                                    <input type="file"  name="photo" placeholder="Picture">
                                    <input type="submit" value="জমা" id="edit_user">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection