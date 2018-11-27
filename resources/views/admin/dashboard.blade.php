@extends('layouts.admin.dashboard')

@section('content')
    <div class="row animated fadeInUp">
        <div class="col-sm-12 col-lg-9">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="panel widgetbox wbox-2 bg-scale-0">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-globe color-darker-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-1">News</h4>
                                        <h1 class="title color-primary"> <a href="{{ url('news/list') }} ">{{$total_news}}</a></h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-darker-2"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-2">Comments</h4>
                                        <h1 class="title color-w"> {{$total_comments}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-users color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Visitors</h4>
                                        <h1 class="title color-light"> {{$total_visitors}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-8">
                    <div class="tabs mt-none">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="active"><a href="#home" data-toggle="tab">Reporters</a></li>
                            <!--li><a href="#profile" data-toggle="tab">Sells</a></li>
                            <li><a href="#messages" data-toggle="tab">Messages</a></li>
                            <li><a href="#settings" data-toggle="tab"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a></li-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="home">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Total News</th>
                                            <th>Last Login</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($employees as $emp)
											<tr>
												<td>{{$emp->first_name}}</td>
												<td>{{$emp->email}}</td>
												<td>{{findTotalNews($emp->id)}}</td>
												<td>{{date_format(date_create($emp->last_login), 'g:s A, j M, Y')}}</td>
											</tr>
											
										@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="profile">
                                <p><b>Profile</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="messages">
                                <p><b>Message</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                            <div class="tab-pane fade" id="settings">
                                <p><b>Settings</b> content</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae tellus tincidunt, mattis odio eu, accumsan quam. Duis ultricies, erat nec suscipit mattis, risus est efficitur enim, sed finibus lacus nisi et mauris. Ut sed accumsan ipsum. Aliquam vel nibh et turpis euismod porttitor. In diam odio, cursus eget faucibus quis, efficitur id erat. Aliquam euismod in justo sit amet ornare. Quisque eu fringilla libero. Donec iaculis sit amet nibh non laoreet.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <div class="panel b-primary bt-md">
                        <div class="panel-content p-none">
                            <div class="widget-list list-to-do">
                                <h4 class="list-title">Categories</h4>
                                <!--button class="add-item btn btn-o btn-primary btn-xs"><i class="fa fa-plus"></i></button-->
                                <ul>
									@foreach($popular_categories as $index=>$cat)
										<li>
											<div class="checkbox-custom checkbox-primary">
												<label for="check-h1">{{$index+1}}. {{$cat->category_name}}</label>
											</div>
										</li>
									@endforeach
                                    
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        <div class="col-sm-12 col-lg-3">
            <div class="panel">
				<div class="panel-content">
					<div class="widget-list list-left-element">
						<ul>
							<li>
								<a href="{{url('categories/list')}}">
									<div class="left-element"><i class="fa fa-warning color-warning"></i></div>
									<div class="text">
										<span class="title">{{$total_categories}} Categories</span>
										<span class="subtitle">News Categories</span>
									</div>
								</a>
							</li>
							<li>
								<a href="{{url('news/list')}}">
									<div class="left-element"><i class="fa fa-flag color-danger"></i></div>
									<div class="text">
										<span class="title">{{$total_news_posted}} News</span>
										<span class="subtitle">News Posted</span>
									</div>
								</a>
							</li>
							<li>
								<a href="{{url('comments/list')}}">
									<div class="left-element"><i class="fa fa-cog color-dark"></i></div>
									<div class="text">
										<span class="title">{{$total_comments_posted}} Comments</span>
										<span class="subtitle">Comments Written</span>
									</div>
								</a>
							</li>
							<li>
								<a href="{{url('polls/list')}}">
									<div class="left-element"><i class="fa fa-tasks color-success"></i></div>
									<div class="text">
										<span class="title">{{$polls[0]->yes_vote+$polls[0]->no_vote+$polls[0]->no_comments_vote}} Votes</span>
										<span class="subtitle">Recent Polls</span>
									</div>
								</a>
							</li>
							<!--li>
								<a href="{{url('categories/list')}}">
									<div class="left-element"><i class="fa fa-envelope color-primary"></i></div>
									<div class="text">
										<span class="title">{{$total_ads}} Menssage</span>
										<span class="subtitle"> Advertisements</span>
									</div>
								</a>
							</li-->
						</ul>

					</div>
				</div>
			</div>

        </div>
    </div>
    
@endsection