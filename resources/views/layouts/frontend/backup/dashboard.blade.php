<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ ucwords(Route::currentRouteName()) }} বাংলাদেশ টাইমস</title>
	<link href="{{ url('public/css/frontend/all.css') }}" rel="stylesheet">
    <link href="{{ url('public/css/frontend/print.css') }}" rel="stylesheet">
    @yield('meta_block')
	<!--link href="{{ url('public/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/owl.carousel.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/dycalender.min.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ url('public/assets/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ url('public/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
	<link href="{{ url('public/plugins/bootstrap-fileinput/css/fileinput.css') }}" rel="stylesheet" type="text/css"-->

    <style>
     #status{
    	width:100%;
    	height:100%;
    	position:fixed;
    	overflow:hidden;
    	z-index:9999;
    	background:rgba(255,255,255,1.00);
    }
    #preloader{
    	top:50%;
    	left:50%;
    	width:128px;
    	height:125px;
    	position:absolute;
    	margin:-63px 0 0 -64px;
    }
	
    </style>
</head>
<?php 
checkLanguage();
?>
<body ng-app="myApp">
    <div id="status">
		<div id="preloader" class="preloader">
			<img src="{{asset('public/images/Blocks.gif')}}" alt="Preloader" />
		</div>
	</div>
    <div style="visibility:hidden;" id="main_body">
	<!-- top bar -->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <div class="lang-toggle">
                        <i class="fa fa-language"></i>
                        <select name="language" style="cursor:pointer" id="language">
                            <option value="bangla" <?php if(Session::get('language') !=  'english'){echo "selected";} ?>>বাংলা </option>
                            <option value="english" <?php if(Session::get('language') ==  'english'){echo "selected";} ?>>English</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="weather-update">
                        <p><i class="fa fa-sun-o"></i><span id="weather_id"> ঢাকা, বাংলাদেশ </span>&deg; সেলসিয়াস</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="date-time">
					<?php 
						$currentDate = date("H:i l, F j, Y");
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
						if($hour >= 4 && $hour < 12){
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
                    
                        <p><i class="fa fa-clock-o"></i> {{$pm_am}} {{  $convertedDATE  }}</p>
                    </div>
                    <div>
                        <marquee><?php
                            $data = @file_get_contents("http://cricapi.com/api/cricket/?apikey=dC67qVgdXPab73gWFQ6zSwmfHno2");
                            $json = json_decode($data, true);
                            foreach($json['data'] as $data){
                                echo $data['title']."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            }
                        ?></marquee>
                        
                    </div>
                </div>
                
                <div class="col-md-3 text-right">
                    <ul class="profile-search">
                        <li class="drop-down-user"><a href="" class="user-button"><i class="fa fa-user"></i></a>
                            <ul class="user-menu">
								@if(!isset(Auth::user()->id))
									<li data-toggle="modal" data-target="#myModal"><a href="#">লগ ইন</a></li>
									<li data-toggle="modal" data-target="#myModal2"><a href="#">রেজিস্টার</a></li>
                            
								@else
									<li><a href="{{url('dashboard')}}">আমার একাউন্ট  </a></li>
									<li><a href="{{url('logout')}}">লগ আউট </a></li>
								@endif
                            </ul>
                        </li>
                        <li><span class="search-btn"><i class="fa fa-search"></i></span></li>
                        <form action="{{url('search')}}" method="POST">
							{{csrf_field()}}
							<input class="search-input" id="q" name="search_keyword" type="text" placeholder="খুজুন">
							<input type="radio" name="layoutGrp" onclick="makeUnijoyEditor('q');switched=false;" value="bvkunijoy">
                            <span>UniJoy</span> <span><input type="radio" name="layoutGrp" onclick="makePhoneticEditor('q');switched=false;" value="bvkphonetic"></span>
                            <span>Phonetic</span>

						</form>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="login-modal">
        <!-- Modal -->
        <div class="custom-modal modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>
                            <img src="{{asset('public/img/logo.png')}}" alt="">

                        </div>
                        <div class="modal-body">
                            <div class="login-form">
                                <form  id="formLogin"  name="formLogin" method="POST">
								{{ csrf_field() }}
									<div id="error" class="text-danger"></div>
                                    <input type="text"  name="username" id="username" ng-model="email_address" placeholder="Email Address" ng-required="true">
                                    <input type="password" id="password" name="password"  ng-model="password" placeholder="Credentials" ng-required="true">
                                    <!--div id="remember" class="checkbox">
                                        <label><input type="checkbox" name="remember_me" value="remember-me">Remember</label>
                                    </div-->
                                    <div class="login-btns">
                                        <input type="submit"  data-ng-disabled="formLogin.$dirty && formLogin.$invalid" type="button" id="signin" class="btn btn-primary" value="Sign In">
                                        <input class="fb-signup fb_login_btn" type="submit" value="Sign In with Facebook">
                                    </div>
                                    <!--a href="https://biyebari.com/password/email" class="forgot-password">Forgot the password?</a-->
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

       
        <!-- Modal -->
        <div class="custom-modal modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="vertical-alignment-helper">
                <div class="modal-dialog vertical-align-center">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>

                        </button>
                            <img src="{{asset('public/img/logo.png')}}" alt="">
                        </div>
                        <div class="modal-body">
                            <div class="login-form">
                                <form id="formRegistration" name="formRegistration">
								{{ csrf_field() }}
									<input type="hidden" name="role" value="4">
                                    <div class="user-name">
                                        <input type="text" name="first_name" id="first_name" ng-model="first_name" placeholder="First Name" ng-required="true">
                                        <input type="text" name="last_name" id="last_name" ng-model="last_name" placeholder="Last Name" ng-required="true">
                                    </div>
                                    <input type="text" name="username" id="username" ng-model="email_address" placeholder="Email Address" class="form-control" ng-required="true">
                                    <input type="password" id="password" name="password" ng-model="password" placeholder="Password" ng-required="true">
                                    <div class="login-btns">
                                        <input type="submit" data-ng-disabled="formLogin.$dirty && formLogin.$invalid" id="register" value="Sign up">
										<input class="fb-signup fb_login_btn" type="submit" value="Sign In with Facebook">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- off canvas menu -->
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-menu">
        <span class="menu-close"><i class="fa fa-close"></i></span>
		
        <ul>
            <li>
				<a href="{{url('category/national')}}">বাংলাদেশ</a>
				<a href="{{url('category/international')}}">আন্তর্জাতিক </a>
				<a href="{{url('category/economics')}}">অর্থনীতি</a>
				<a href="{{url('category/entertainment')}}">বিনোদন</a>
				<a href="{{url('category/education')}}">শিক্ষা</a>
				<a href="{{url('category/science')}}">বিজ্ঞান ও প্রযুক্তি</a>
				<a href="{{url('category/crime')}}">ক্রাইম</a>
				<a href="{{url('category/travel')}}">ভ্রমণ </a>
				<a href="{{url('category/politics')}}">রাজনীতি   </a>
				<a href="{{url('category/lifestyle')}}">লাইফ স্টাইল    </a>
				<a href="{{url('category/health')}}">স্বাস্থ্য  </a>
				<a href="{{url('category/legal-aids')}}">আইনী সাহায্য     </a>
				<a href="{{url('category/islamic')}}">ইসলামিক </a>
				<a href="{{url('category/probash')}}">প্রবাস </a>
				<a href="{{url('category/history')}}">ইতিহাস   </a>
				<a href="{{url('category/nreegoshthi')}}">নৃগোষ্ঠী  </a>
				<a href="{{url('category/uthan-boithok')}}">উঠান বৈঠক  </a>
				<a href="{{url('category/vedios')}}">ভিডিও গ্যালারী      </a>
			</li>
				
        </ul>
    </div>

    <!-- header top area -->
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6 col-xs-3 text-left">
                    <div class="menu-toggle-btn">
                        <a href="" class="menu-trigger">
                            <i class="fa fa-bars"></i>
                        </a>
						</span>
                    </div>
                </div>

                <div class="col-sm-6 col-xs-9 text-right">
                    <div class="logo">
                        <a href="{{url('/')}}"><img src="{{ asset('public/assets/img/logo.png')}}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Marquee text area  -->
    <div class="marquee-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="marquee-wrap">
                        <div class="marquee-heading text-center">
                            <h3>সদ্যপ্রাপ্ত:</h3>
                        </div>
                        <div class="marquee-text marquee">
                           <p>
								@if(isset($breaking_news))
									@foreach($breaking_news as $news) 
                                        <a href="{{ url('news/front/details/'.$news->id) }}">{{ $news->title }}</a> | 
                                    @endforeach
								@else 
									<?php $breaking_news = findBreakingNews(); ?>
                                    @foreach($breaking_news as $news) 
                                        <a href="{{ url('news/front/details/'.$news->id) }}">{{ $news->title }}</a> | 
                                    @endforeach
								@endif
							</p>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	<style type="text/css">  
	  .centered {
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		transform: -webkit-translate(-50%, -50%);
		transform: -moz-translate(-50%, -50%);
		transform: -ms-translate(-50%, -50%);
		color:darkred;
	  }
	</style>
	
	@yield('content')
    <!-- footer area -->
    <div class="footer-area">
        <div class="container">
            <div class="row">
				<div class="col-sm-3 col-xs-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{url('category/national')}}">বাংলাদেশ</a></li>
                            <li><a href="{{url('category/international')}}">আন্তর্জাতিক </a></li>
                            <li><a href="{{url('category/economics')}}">অর্থনীতি</a></li>
                            <li><a href="{{url('category/legal-aids')}}">আইনী সাহায্য  </a></li>
                            <li><a href="{{url('category/nreegoshthi')}}">নৃগোষ্ঠী  </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{url('category/entertainment')}}">বিনোদন</a></li>
                            <li><a href="{{url('category/education')}}">শিক্ষা</a></li>
                            <li><a href="{{url('category/science')}}">বিজ্ঞান ও প্রযুক্তি </a></li>
                            <li><a href="{{url('category/islamic')}}">ইসলামিক </a></li>
                            <li><a href="{{url('category/uthan-boithok')}}">উঠান বৈঠক  </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{url('/')}}">রাজনীতি</a></li>
                            <li><a href="{{url('category/crime')}}">ক্রাইম</a></li>
                            <li><a href="{{url('category/travel')}}">ভ্রমন</a></li>
                            <li><a href="{{url('category/probash')}}">প্রবাস </a></li>
                            <li><a href="{{url('category/vedios')}}">ভিডিও গ্যালারী      </a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-3 col-xs-12">
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{url('/')}}">প্রচ্ছদ </a></li>
                            <li><a href="{{url('/archives')}}">আর্কাইভ</a></li>
                            <li><a href="{{url('category/lifestyle')}}">লাইফ স্টাইল </a></li>
                            <li><a href="{{url('category/health')}}">স্বাস্থ্য  </a></li>
                            <li><a href="{{url('category/history')}}">ইতিহাস   </a></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<!----Modal------>
	<div>
		<div class="modal fade" id="ad-upload-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
		 
		  <div class="container" style="background-color: white; margin-top: 20px;">
				<div class="loginmodal-container">
					<h1 class="well text-center" style="margin-top: 10px;"> Upload Banner</h1><br>
				
				
				<div class="row">
					<form class="form-horizontal" id="myForm" method="POST" enctype="multipart/form-data">
					<input type="hidden" name="banner_id" id="banner_id">
					<input type="hidden" name="banner_page" id="banner_page">
					{{ csrf_field() }}
						<div class="form-group">
						  <label class="control-label col-sm-2" for="email">Banner Name:</label>
						  <div class="col-sm-6">
							<input type="text" class="form-control" id="banner_name" placeholder="Banner Name" name="banner_name">
						  </div>
						</div>
						<div class="form-group">
						  <label class="control-label col-sm-2" for="pwd">External Link:</label>
						  <div class="col-sm-6">          
							<input type="text" class="form-control" id="external_link" placeholder="External Link" name="external_link">
						  </div>
						</div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Browse Image:</label>
                          <div class="col-sm-6">          
                            <input type="file" class="form-control fileinputjs" id="photo" placeholder="Image" name="photo">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">&nbsp;</label>
                          <div class="col-sm-6 text-danger">          
                            Hints: Ad dimenstion should be 300px*680px
                          </div>
                        </div>
						<div class="form-group">        
						  <div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-success" id="uploadBanner">Upload</button>
						  </div>
						</div>
					  </form>
				</div>
				<div style="height: 10px;"></div>
				<div id="divToHid" style="display:none;background-color: white;">
					<button style='margin-top: 10px;' class='col-md-6 btn btn-success'  id='selectImageAd'>Select</button>
					<button style='margin-top: 10px;' class='col-md-6 btn btn-primary'  id='undoImageAd'>Undo</button>
				</div>
				<div id="adImg"></div>
			</div>
		</div>
	</div>
	</div>
	<script src="{{ url('public/js/frontend/all.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <!--script src="{{ url('public/assets/js/jquery.min.js') }}"></script>
	
	<script src="{{ url('public/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ url('public/assets/js/custom.js') }}"></script>
    <script src="{{ url('public/plugins/select2/js/select2.min.js') }}"></script>
	<script src="{{ url('public/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('public/assets/js/owl.carousel.min.js') }}"></script>
	<script src="{{ url('public/assets/js/jquery.magnific-popup.min.js') }}"></script>
	<script src="{{ url('public/assets/js/jquery.sticky.js') }}"></script-->
	
    <script src="{{ url('public/assets/js/controllers/main_controllers.js') }}"></script>
    <script src="{{ url('public/assets/js/main.js') }}"></script>
    <script src="{{ url('public/assets/js/unijoy.js') }}"></script>
    <script src="{{ url('public/assets/js/phoneticunicode.js') }}"></script>
	@yield('js_libs')
	<script>
	$(document).ready(function(){
		$.ajax({
			url: "http://api.openweathermap.org/data/2.5/forecast/daily?mode=json&q=Dhaka&lang=en&APPID=e90ad8bee96d555950989a20552a6002",
			method: "GET",
			contentType: false,
			cache: false,
			processData:false,
			success: function(result){
				result = Math.round(result.list[0].temp.day-275.15);
				var convert = ['০','১','২','৩','৪','৫','৬','৭','৮','৯'];
				//now split the provided string into array by each character
				var splitArray = result.toString().split("");
				//declare a empty string
				var newString = "";
				//run a loop upto the length of the string array
				for (i = 0; i < splitArray.length; i++) { 

					//check if current array element if not number
					if(isNaN(splitArray [i])){
						//if not number then place it as it is
						newString += splitArray [i];
					}else{
						//if number then get same numbered element from the bangla array
						newString += convert[splitArray [i]];
					}
				}
				//return the newly converted number
				weather = newString;
				$('#weather_id').append(weather);
				
			}
		}).fail(function(result){
			console.log(result.list[0])
		});
	    $("#status").css('display', 'none')
    	$("#main_body").css('visibility', 'visible');
		
        $('#signin').click(function(e){
			e.preventDefault();
            formData = new FormData($("#formLogin")[0]);
            $.ajax({
                url: "{{ url('processLogin') }}",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    console.log(result);

                    if(result == -1)
                    {
                        $("#error").html('Username/Password did not matched');
                    }
                    else if(result == 2)
                    {
                        $("#error").html('Account has not been activated yet. please contact administrator.');
                    }
                    else
                    {
						localStorage.setItem('loginUser', JSON.stringify(result));
						console.log('^^^^^^^^');
						console.log(JSON.parse(localStorage.getItem('loginUser')));
                        window.location.href = "{{url('dashboard')}}";
                    }

                }
            }).fail(function(result){
                
                $("#error").html('Username/Password did not matched');
            });
        })
        
		
		$('#language').change(function(){
			var local = $('#language').val();
            @if(Route::currentRouteName() !="")
			 window.location.href = "{{url('setLanguage')}}/"+local+"/{{Route::currentRouteName()}}";
            @endif
		})
        $('#register').click(function(e){
			e.preventDefault();
            formData = new FormData($("#formRegistration")[0]);
            $.ajax({
                url: "{{ url('registerUser') }}",
                method: "POST",
                data: formData,
                contentType: false,
                cache: false,
                processData:false,
                success: function(result){
                    console.log(result);
                    if(result == -1)
                    {
                        $("#error").html('Email address already exists in the system');
                    }
                    else if(result == 2)
                    {
                        $("#error").html('Account has not been activated yet. please contact administrator.');
                    }
                    else
                    {
                        window.location.href = "{{url('dashboard')}}";
                    }

                }
            }).fail(function(result){
                console.log(result)
            });
        })
        $('#password').on('keypress', function (e) {
            if(e.which === 13){
                loginFunc();
            }
        });
		$('.fb_login_btn').click(function(e){
			e.preventDefault();
			window.location.href = "{{url('/redirect')}}"
		})
		if($('.select2js').length > 0)
		{
			$('.select2js').select2();
		}
		if($('.calendarjs').length > 0)
		{
            $.datepicker.setDefaults($.datepicker.regional['bn']);
			$('.calendarjs').datepicker({
				changeMonth: true,
				changeYear: true,
				dateFormat: 'mm/dd/yy',
				@if(isset($month_date))
					defaultDate: "{{$month_date}}/{{$day_date}}/{{$year_date}}",
				@endif
				onSelect: function (date) {
					window.location.href = "{{url('archives')}}/"+date
				}
			});

            /*$('.ui-datepicker-calendar tr td a').each(function() {
                var text = $(this).text();
                $(this).text(text.replace('1', '১')); 
                //repeat this for each number
            });*/
		}
        
		if($('.fileinputjs').length > 0)
		{
			$('.fileinputjs').fileinput();
		}
		$('#submit_comment_btn').click(function(){
			$("#ajax_loader").css('display', 'block');
			formData = new FormData($("#myForm")[0]);
			$.ajax({
				url: "{{ url('submitComment') }}",
				method: "POST",
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(result){
					
					$("#ajax_loader").css('display', 'none');
					str = "<div class='single-demo-comment'>";
					str += "<div class='comment-dp'>";
					str += "<img src='{{url('/')}}/"+result.profile_image+"'></div>";
					str += "<div class='comment-meta'>";
					str += "<h3>"+result.name+"</h3>";
					str += "<p>"+result.details+" </p>";
					str += "<p>"+result.date+"</p></div></div>";
															
					$('.demo-comments').prepend(str)
					/* toastr.warning('User has been created successfully!', 'Notification')
					toastr.options.closeButton = true;
					window.location.href = app.host + 'dashboard/'+user_type+'/list'; */
					
				}
			}).fail(function(result){
				console.log(result)
			});
		})
		$('.savePostBtn').click(function(e){
		e.preventDefault();
		$('.savePostBtn').attr('disabled', 'disabled');
		$('#ajax_loader1').css('display', 'inline');
		/* for ( instance in CKEDITOR.instances )
			CKEDITOR.instances[instance].updateElement(); */

		var flag = $(this).attr('flag');
		$('#flag').val(flag);
		console.log(222222);
		console.log($('#news_details'));
		formData = new FormData($("#addNewsForm")[0]);
		console.log(formData)
        $.ajax({
            url: "{{ url('news/add/visitor') }}",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData:false,
            success: function(result){
				console.log(result)
				
				$('#ajax_loader1').css('display', 'none');
                
                window.location.href = "{{ url('dashboard') }}";
            }
        }).fail(function(result){
            console.log(result)
        });
	}); 
		$('#uploadBanner').click(function(){
			formData = new FormData($("#myForm")[0]);
			$.ajax({
				url: "{{url('uploadBanner')}}",
				method: "POST",
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(result){
					console.log(result);
					$('.success_div').css('display', 'block');
					$('#success-modal').modal('toggle');
					/* toastr.warning('User has been created successfully!', 'Notification')
					toastr.options.closeButton = true;
					window.location.href = app.host + 'dashboard/'+user_type+'/list'; */
					if(result == 'home'){
						window.location.href = "{{url('/')}}";
					}else{
						window.location.href = "{{url('category')}}/"+result;
					}
				}
			}).fail(function(result){
				console.log(result)
			});

		})
		

		$('#choose_image').change(function(){
			var choose_image = $('#choose_image').val();
			
			var file_id = choose_image.substr(0, choose_image.indexOf('-'));
			var file_name = choose_image.substr(choose_image.indexOf('-')+1);
			
			$('#divToHid').css('display', 'block');
			src = "<img id='choosenImage' file_name='"+file_name+"' style='margin-top: 10px;' src='"+app.frontend+"/public/images/assets/"+file_name+"'>";
			$('#adImg').html(src);
		})
		
		$('#selectImageAd').click(function(){
			banner_id = $('#selectImageAd').attr('banner_id') ;
			page = $('#selectImageAd').attr('page') ;
			image_id = $('#choosenImage').attr('file_name');
			alert(banner_id);dd
			$.ajax({
            url: "ads/changeBanner/"+banner_id+'/'+image_id,
            method: "GET",
            contentType: false,
            cache: false,
            processData:false,
            success: function(result){
					console.log(page)
					window.location.href = app.frontend;
				}
			}).fail(function(result){
				console.log(result)
			});
		})
		$('#edit_user').click(function(){
			
			$('#ajax_loader').css('display', 'inline');
			formData = new FormData($("#userDetails")[0]);
			$.ajax({
				url: "{{ url('dashboard/visitor/update') }}",
				method: "POST",
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(result){
					console.log(result)
					window.location.href = "{{ url('dashboard') }}";
				}
			}).fail(function(result){
				$('#ajax_loader').css('display', 'none');
				$("#failure_div").delay(3000).fadeOut('slow');
			});
		});
		$('#vote_btn').click(function(e){
			e.preventDefault();
			$('#vote_btn').attr('disabled', 'disabled');
			formData = new FormData($("#myVoteForm")[0]);
			$.ajax({
				url: "{{ url('vote') }}",
				method: "POST",
				data: formData,
				contentType: false,
				cache: false,
				processData:false,
				success: function(result){
					console.log(result)
					$('#vote_btn').attr('disabled', false);
					if(result == -1)
					{
						
						alert('You already participated in this poll');
					}
					else{
						alert('You have successfully submitted your vote.');
					}
				}
			}).fail(function(result){
				$('#vote_btn').attr('disabled', false);
				alert('Error. Submission failed.');
			});
		})
		$('#undoImageAd').click(function(){
			banner_id = $('#undoImageAd').attr('banner_id') ;
			page = $('#undoImageAd').attr('page') ;
			image_id = $('#choosenImage').attr('file_name');
			
			$.ajax({
            url: "ads/undoBanner/"+banner_id+'/'+image_id,
            method: "POST",
            contentType: false,
            cache: false,
            processData:false,
            success: function(result){
					console.log(page)
					window.location.href = app.frontend;
				}
			}).fail(function(result){
				console.log(result)
			});
		})
	})
		
	</script>

</body>

</html>