<div ng-show="isLoading" class="text-center">
  <img src="admin/public/images/flickr.gif">
</div>

<div ng-show="!isLoading">
	<!-- double ad -->
	<div class="section-margin">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="double-ad" id="sticker">
						<div class="single-long-ad-left">
							<!--a class="btn btn-success" ng-if="isLoggedIn==1 && loginUser.role == 1">ddda</a-->
							<a href="" class="ad-close-btn-left"><i class="fa fa-close"></i></a>
							<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 1)" style="cursor:pointer" src="admin/public/images/assets/{{ads[0].image_id}}" alt="">
							<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[0].image_id}}" alt="">
						</div>
						<div class="single-long-ad-right">
							<a href="" class="ad-close-btn-right"><i class="fa fa-close"></i></a>
							<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 2)" style="cursor:pointer" src="admin/public/images/assets/{{ads[1].image_id}}" alt="">
							<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[1].image_id}}" alt="">
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
						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 3)" style="cursor:pointer" src="admin/public/images/assets/{{ads[2].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[2].image_id}}" alt="">
						<a href="" class="ad-close-btn"><i class="fa fa-close"></i></a>
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
                    <div class="col-sm-2">
                        <div class="cta-bar">
                            <h2>Breaking News</h2>
                        </div>
                    </div>
					<div class="col-sm-7  col-xs-12">
						<div class="breakingnews-carousel">
							<div class="single-breakingnews-item">
								<div class="breakingnews-bg" style="background-image: url(admin/public/images/news/featured/{{ breaking_news[0].featured_image }})">
									<a href="" class="slider-headline">
										<h3>{{ breaking_news[0].title }}</h3>
									</a>
								</div>
							</div>
							<div class="single-breakingnews-item">
								<div class="breakingnews-bg" style="background-image: url(admin/public/images/news/featured/{{ breaking_news[1].featured_image }})">
									<a href="" class="slider-headline">
										<h3>{{ breaking_news[1].title }}</h3>
									</a>
								</div>
							</div>
							<div class="single-breakingnews-item">
								<div class="breakingnews-bg" style="background-image: url(admin/public/images/news/featured/{{ breaking_news[2].featured_image }})">
									<a href="" class="slider-headline">
										<h3>{{ breaking_news[2].title }}</h3>
									</a>
								</div>
							</div>

						</div>
					</div>
					<div class="col-sm-3 pdt-10 col-xs-12">
						<!-- ad here -->
						<div class="advertise-1">
								<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 4)" style="cursor:pointer" src="admin/public/images/assets/{{ads[3].image_id}}" alt="">
								<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[3].image_id}}" alt="">

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- service section here -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Bangladesh news</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 1">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">International News</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 2">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Economy</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 3">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Job</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 4">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Video reporting & entertainment -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<div class="video-reporting-section">
						<h3 class="section-heading"><a href="#!details/{{ news.id }}">Video / Reporting</a></h3>
						<a href="https://www.youtube.com/watch?v=ctvlUvN6wSE" class="video-play-btn reporting-video-bg mfp-iframe">
							<div class="video-icon-table">
								<div class="video-icon-tablecell">
									<i class="fa fa-play"></i>
								</div>
							</div>
						</a>
					</div>
				</div>
				<div class="col-sm-7 pdt-10">
					<div class="entertainment">
						<h3 class="section-heading"><a href="#!details/{{ news.id }}">Entertainment</a></h3>
						<div class="entertainment-carousel">
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[10].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[10].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[11].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[11].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[12].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[12].title}}</h3>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Full width ad -->
	<!--single advertise area-->
	<div class="section-padding advertise-252">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 5)" style="cursor:pointer" src="admin/public/images/assets/{{ads[4].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[4].image_id}}" alt="">

				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->

	<!-- politics & sports -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="politics">
						<h3 class="section-heading"><a href="#!details/{{ news.id }}">Politics</a></h3>
						<div class="entertainment-carousel">
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[13].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[13].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[14].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[14].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[15].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[15].title}}</h3>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6 pdt-10">
					<div class="politics">
						<h3 class="section-heading"><a href="#!details/{{ news.id }}">Sport</a></h3>
						<div class="entertainment-carousel">
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[16].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[16].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[17].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[17].title}}</h3>
									</a>
								</div>
							</div>
							<div class="single-entertainment-item">
								<div class="entertainment-bg" style="background-image: url(admin/public/images/news/featured/{{latest_news[18].featured_image}})">
									<a href="" class="slider-headline">
										<h3>{{latest_news[18].title}}</h3>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 3 service-section goes here -->
	<div class="section-padding news-section-im75">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Education</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 8">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Science and Technology</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 9">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 pdt-10">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Sign</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 10">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 4 service-section goes here -->
	<div class="section-padding news-section-im85">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Crime</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 11">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Life Style</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 12">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Travel</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 20">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 col-xs-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Comedy / Cartoon</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 21">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist  </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
	<!--2 ads area-->
	<div class="section-padding advertise-252">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-xs-6">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 6)" style="cursor:pointer" src="admin/public/images/assets/{{ads[5].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[5].image_id}}" alt="">

				</div>
				<div class="col-sm-6 col-xs-6">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 7)" style="cursor:pointer" src="admin/public/images/assets/{{ads[6].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[6].image_id}}" alt="">

				</div>
			</div>
		</div>
	</div>

	<!-- big featured section -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>Write/ <br>Your writing</h2>
                    </div>
                </div>
				<div class="col-sm-5 ">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading">Write/ <br>Your writing</h3>
                    </div>
					<div class="single-featured-item">
						<h3>{{ latest_news[24].title }}</h3>
						<img src="admin/public/images/news/featured/{{latest_news[24].featured_image }}" alt="">
						<p> In the meeting held in the Ministry of Disaster Management and Relief, 18 Ministries and
							The representatives of the organization were present.
							Disaster Management and Relief Minister Mofazzal Hossain Chowdhury after the meeting
							Talk about the meeting and proposals of the meeting at the briefing. In the meeting held at the Ministry of Disaster Management and Relief
							Representatives of 18 ministries and agencies were present. <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a></p>

					</div>
				</div>
				<div class="col-sm-5 pdt-10">
					<div class="single-featured-item">
						<h3>{{ latest_news[25].title }}</h3>
						<img src="admin/public/images/news/featured/{{latest_news[25].featured_image }}" alt="">
						<p> In the meeting held in the Ministry of Disaster Management and Relief, 18 Ministries and
							The representatives of the organization were present.
							Disaster Management and Relief Minister Mofazzal Hossain Chowdhury after the meeting
							Talk about the meeting and proposals of the meeting at the briefing. In the meeting held at the Ministry of Disaster Management and Relief
							Representatives of 18 ministries and agencies were present. <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- big slider -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>Buy and sell</h2>
                    </div>
                </div>
				<div class="col-sm-10 ">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading">Buy and sell</h3>
                    </div>
					<div class="big-section-slider">
						<div class="single-big-slider big-bg-1">
							<a href="" class="slider-headline">
								<h3>Unauthorized mountain bound ban</h3>
							</a>
						</div>
						<div class="single-big-slider big-bg-2">
							<a href="" class="slider-headline">
								<h3>Unauthorized mountain bound ban</h3>
							</a>
						</div>
						<div class="single-big-slider big-bg-3">
							<a href="" class="slider-headline">
								<h3>Unauthorized mountain bound ban</h3>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- big featured section -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>Write/ <br>Your writting</h2>
                    </div>
                </div>
				<div class="col-sm-5 ">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading">Write/ <br>Your writting</h3>
                    </div>
					<div class="single-featured-item">
						<h3>{{ latest_news[26].title }}</h3>
						<img src="admin/public/images/news/featured/{{latest_news[26].featured_image }}" alt="">
						<p> In the meeting held in the Ministry of Disaster Management and Relief, 18 Ministries and
							The representatives of the organization were present.
							Disaster Management and Relief Minister Mofazzal Hossain Chowdhury after the meeting
							Talk about the meeting and proposals of the meeting at the briefing. In the meeting held at the Ministry of Disaster Management and Relief
							Representatives of 18 ministries and agencies were present. <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a></p>

					</div>
				</div>
				<div class="col-sm-5 pdt-10">
					<div class="single-featured-item">
						<h3>{{ latest_news[27].title }}</h3>
						<img src="admin/public/images/news/featured/{{latest_news[27].featured_image }}" alt="">
						<p> In the meeting held in the Ministry of Disaster Management and Relief, 18 Ministries and
							The representatives of the organization were present.
							Disaster Management and Relief Minister Mofazzal Hossain Chowdhury after the meeting
							Talk about the meeting and proposals of the meeting at the briefing. In the meeting held at the Ministry of Disaster Management and Relief
							Representatives of 18 ministries and agencies were present. <a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- two ads and one facebook plug in section goes here -->
	<!-- advertise area-->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12 text-center">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 8)" style="cursor:pointer" src="admin/public/images/assets/{{ads[7].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[7].image_id}}" alt="">

				</div>
				<div class="col-md-4 col-sm-6 col-xs-12 text-center pdt-10">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 9)" style="cursor:pointer" src="admin/public/images/assets/{{ads[8].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[8].image_id}}" alt="">

				</div>
				<div class="col-md-4 col-sm-12 col-xs-12 text-center pdt-10">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Facebook Page</a></h3>
					<div class="fb-container">
						<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook&tabs&width=340&height=214&small_header=false&adapt_container_width=false&hide_cover=false&show_facepile=true&appId" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- advertise area end-->

	<!-- section-padding -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
                <div class="col-sm-2">
                    <div class="cta-bar">
                        <h2>Opinion/ <br>Sub-editorial</h2>
                    </div>
                </div>
				<div class="col-sm-10 ">
                    <div class="cta-bar-alternative">
                        <h3 class="section-heading">Opinion/ <br>Sub-editorial</h3>
                    </div>
					<div class="single-featured-item-big">
						<h3>{{ latest_news[28].title }}</h3>
						<img src="admin/public/images/news/featured/{{latest_news[28].featured_image }}" alt="">
						<p>The minister said, some proposals, including all types of help, standing next to the people immediately injured, have been given. These proposals include the closure of sand, the closure of the ongoing housing projects for the current time, if the people of the surrounding area are feared to be affected, then take strategic and necessary action, identify the hazardous hill area with a survey and show them on the map, forming a strong monitoring team (VG),
							Those who will be able to move the risky hilly areas to safe places. Apart from this, more recommendations have been made. The minister said, standing beside the people immediately injured
							,There are several suggestions, including all types of help. Among these proposals are the closure of sand extract, and the current housing project will be closed,
							If people in the surrounding area are afraid of being harmed then take strategic and necessary action,
							Display the map by marking the risky mountainous area with the survey,
							Forming a strong Vigilance Group, who will recommend the move to safe places of the hazardous hilly areas.<a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a></p>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- 3 service items goes here -->
	<div class="section-padding news-section-im75">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Women</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 4">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p> Generally to create a video song of an artist</p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Young generation</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 7">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p> Generally to create a video song of an artist</p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 pdt-15">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Children and teenagers</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 9">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{ news.title }}</h3>
								<p>Generally to create a video song of an artist </p>
							</a>
							<a href="#" class="news-readmore-btn">Details</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- video & photo gallary -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-sm-5">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Your Video</a></h3>
					<div class="video-slides">
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
				<div class="col-sm-7 pdt-10">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Photo Gallery</a></h3>
					<div class="photo-gallary-slides">
						<div class="single-gallary-photo">
							<div class="gallary-photo-bg gallary-bg-1">
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</div>
						</div>
						<div class="single-gallary-photo">
							<div class="gallary-photo-bg gallary-bg-2">
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</div>
						</div>
						<div class="single-gallary-photo">
							<div class="gallary-photo-bg gallary-bg-3">
								<a href="" class="slider-headline">
									<h3>Unauthorized mountain cut forest</h3>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Readers questions tab, opinion , viral goes here -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-6">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Reader's questions</a></h3>
					<div class="custom-tab readers-qs">
						<ul class="tab-list text-center">
							<li class="active"><a data-toggle="tab" href="#custom-tab-1">Bangla</a></li>
							<li><a data-toggle="tab" href="#custom-tab-2">Law</a></li>
						</ul>
						<div class="tab-content">
							<div id="custom-tab-1" class="tab-pane fade in active">
								<div class="single-news-item gray-bg">
									<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 2">
										<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
										<div class="news-content">
											<a href="#!details/{{ news.id }}">
												<h3>{{news.title}}</h3>
												<p>Generally to create a video song </p>
											</a>
											<a href="#" class="news-readmore-btn">Details</a>
										</div>
									</div>
								</div>
							</div>
							<div id="custom-tab-2" class="tab-pane fade">
								<div class="single-news-item gray-bg">
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<div class="news-content">
											<a href="#!details/{{ news.id }}">
												<h3>A song in 50 days</h3>
                                                <p>Generally to create a video song</p>
											</a>
											<a href="#" class="news-readmore-btn">Details</a>
										</div>
									</div>
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<div class="news-content">
											<a href="#!details/{{ news.id }}">
                                                <h3>A song in 50 days</h3>
                                                <p>Generally to create a video song</p>
											</a>
											<a href="#" class="news-readmore-btn">Details</a>
										</div>
									</div>
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<div class="news-content">
											<a href="#!details/{{ news.id }}">
                                                <h3>A song in 50 days</h3>
                                                <p>Generally to create a video song</p>
											</a>
											<a href="#" class="news-readmore-btn">Details</a>
										</div>
									</div>
									<div class="single-thumbnail-item-2">
										<div class="thumbnail-bg single-thumbnail-1"></div>
										<div class="news-content">
											<a href="#!details/{{ news.id }}">
												<h3>৫০ দিনে একটি গান!</h3>
												<p>Generally to create a video song</p>
											</a>
											<a href="#" class="news-readmore-btn">Details</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-6">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Public opinion survey</a></h3>
					<div class="people-opinion">
						<img src="assets/img/single-news-item-imgs/section-img-2.jpg" alt="">
						<p>The minister said, some proposals, including all types of help, standing next to the people immediately injured, have been given. These proposals include the closure of sand, the closure of the ongoing housing projects for the current time, if the people of the surrounding area are feared to be affected, then take strategic and necessary action, identify the hazardous hill area with a survey and show them on the map, forming a strong monitoring team (VG),
                            Those who will be able to move the risky hilly areas to safe places. Apart from this, more recommendations have been made. The minister said, standing beside the people immediately injured
                            ,There are several suggestions, including all types of help. Among these proposals are the closure of sand extract, and the current housing project will be closed,
                            If people in the surrounding area are afraid of being harmed then take strategic and necessary action,
                            Display the map by marking the risky mountainous area with the survey,
                            Forming a strong Vigilance Group, who will recommend the move to safe places of the hazardous hilly areas.</p>
					</div>

				</div>
				<div class="col-md-4 col-sm-12">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Viral</a></h3>
					<div class="viral">
						<div class="viral-carousel">
							<div class="single-viral-item">
								<div class="viral-bg viral-bg-1">
									<a href="" class="slider-headline">
										<h3>Intercontinental meeting</h3>
									</a>
								</div>
							</div>
							<div class="single-viral-item">
								<div class="viral-bg viral-bg-2">
									<a href="" class="slider-headline">
										<h3>No more hurt in hill collapses</h3>
									</a>
								</div>
							</div>
							<div class="single-viral-item">
								<div class="viral-bg viral-bg-3">
									<a href="" class="slider-headline">
										<h3>The customs duty was reduced to 10%</h3>
									</a>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
	<!-- art & culture , archive goes here -->
	<div class="section-padding news-section-im120">
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Art and literature</a></h3>
					<div class="single-thumbnail-item-2" ng-repeat="news in latest_news" ng-if="news.category_id == 3">
						<div class="thumbnail-bg" style="background-image: url(admin/public/images/news/featured/{{news.featured_image}})"></div>
						<div class="news-content">
							<a href="#!details/{{ news.id }}">
								<h3>{{news.title}}</h3>
								<p>Ramadan rose one point in the beginning of the domestic and broiler chicken prices. Now there is a second increase in the Eid before the Eid.
                                    Buyers complained, vendors raised the price ahead of Eid. And as the reason for the increase in the prices of the traders, the increase in the number of Eid has increased</p>
							</a>
							<a href="#" class="news-readmore-btn">Details<i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<h3 class="section-heading"><a href="#!details/{{ news.id }}">Archive</a></h3>
					<div class="archive-calender">
						<div class="some-class">
							<div id="calender" class="dycalnder-container"></div>
						</div>
					</div>
					<!--Single add 460x180-->
					<img src="http://cdn.trendhunterstatic.com/thumbs/janice-ducate-ebay-ad-campaign.jpeg" alt="">
				</div>
			</div>
		</div>
	</div>


	<!-- picture of the day -->
	<div class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="picture-day-bg">
						<a href="" class="slider-headline">
							<h3>Today's picture</h3>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- full width ad goes here -->
	<!--single advertise area-->
	<div class="section-padding advertise-252">
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">

						<img ng-if="isLoggedIn==1 && loginUser.role == 1" ng-click="changeAd('Home', 10)" style="cursor:pointer" src="admin/public/images/assets/{{ads[9].image_id}}" alt="">
						<img ng-if="isLoggedIn==0"  style="cursor:pointer" src="admin/public/images/assets/{{ads[9].image_id}}" alt="">

				</div>
			</div>
		</div>
	</div>
	<!--single advertise area end-->

</div>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.sticky.js"></script>
<script src="assets/js/main.js"></script>
