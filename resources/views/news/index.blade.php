@extends('layouts.admin.dashboard')
@section('css_block')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
@endsection

@section('js_block')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@endsection
@section('content')
<div style="padding-left:15px;">
	<form id="myForm">
	 {{csrf_field()}}
	  {{-- <div class="col-md-4">
		<input type="text" class="form-control" id="search_news" name="search_news" placeholder="Search News">
		
	  </div> --}}
	  <div class="col-md-4">
		<select class="select2js" name="news_cat_id">
					<option value="0">Choose Category</option>
				@foreach($categories as $cat)
					<option value="{{$cat->id}}">{{$cat->category_name}}</option>
				@endforeach
		</select>
	  </div>
	  <div class="col-md-3">
		<a class="btn btn-success" id="search_news_btn">Search News</a>
		
	  </div>
	</form>
</div>
<div class="col-sm-12" ng-controller="NewsController" style="margin-top: 10px;">
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="panel panel-transparent clearfix">
      <div class="panel-body  table-responsive"  id="table_div">
        <div class="col-md-12 text-center">
            {{ $news_list->links() }}
        </div>
        <table class="table table-striped responsive-table" id="responsive-table">
          <thead>
            <tr>
              <th>Image </th>
              <th>News Title </th>
              <th>Category </th>
              <th>Author</th>
              <th>Status</th>
              <th>Created At</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
          @if(count($news_list) == 0)
			  <tr><td colspan="7">No data available.</td></tr>
		  @endif

              @if(Auth::user()->role == 4)

              @foreach($news_list as $news)

                      <tr>
                          <td width="8%"><img src="{{ asset('public/images/news/featured/'.$news->featured_image)}}" height="40px"></td>
                          <td><?php echo wordwrap($news->title,80,"<br>\n");?></td>
                          <td>
                              <?php
                              /*$str = "";
                              foreach(findNewsCategories($news->id) as $cat)
                              {
                                  $str = $str."<code>$cat->category_name</code><br>";
                              }
                              echo substr($str, 0, -1);
                              if(strlen($str) == 0)
                                  echo "<code>Not Categorized</code>";*/
                              if ($news->category_id !=27){
                                  echo findCategoryDetails($news->category_id)[0]->category_name;
                              }
                              else{
                                  echo "<code>Not Categorized</code>";
                              }
                              ?>
                          </td>
                          <td>{{ $news->creator_name }}</td>
                          <td>
                              @if($news->flag==0 ||$news->flag==2)
                                  <span class="badge x-warning">Draft</span>
                              @elseif( $news->flag == 1)
                                  <span class="badge x-info">Published</span>
                              @endif
                          </td>
                          <td>{{ date_format(date_create($news->created_at), 'd/M/Y') }}</td>
                          <td class="text-right">
                              <a href="{{ url('news/view/'.$news->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a>
                              <a href="{{ url('news/edit/'.$news->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                              <a class="btn btn-danger" ng-click="deleteNews({{ $news->id }})"><i class="fa fa-trash"></i></a>
                          </td>
                      </tr>


              @endforeach




          @else
          @foreach($news_list as $news)
                @if($news->flag==2)
                    @else

          <tr>
            <td width="8%"><img src="{{ asset('public/images/news/featured/'.$news->featured_image)}}" height="40px"></td>
            <td><?php echo wordwrap($news->title,80,"<br>\n");?></td>
            <td>
				<?php 
					/*$str = "";
					foreach(findNewsCategories($news->id) as $cat)
					{
						$str = $str."<code>$cat->category_name</code><br>";
					}
					echo substr($str, 0, -1);
					if(strlen($str) == 0)
						echo "<code>Not Categorized</code>";*/
					if ($news->category_id !=27){
					echo findCategoryDetails($news->category_id)[0]->category_name;
                    }
				?>
			</td>
            <td>{{ $news->creator_name }}</td>
            <td>
				@if($news->flag==0)
					<span class="badge x-warning">Draft</span>
				@elseif( $news->flag == 1)
					<span class="badge x-info">Published</span>
				@endif
			</td>
            <td>{{ date_format(date_create($news->created_at), 'd/M/Y') }}</td>
            <td class="text-right">
            	<a href="{{ url('news/view/'.$news->id) }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"></i></a> 
                <a href="{{ url('news/edit/'.$news->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a> 
                <a class="btn btn-danger" ng-click="deleteNews({{ $news->id }})"><i class="fa fa-trash"></i></a>
            </td>
          </tr>

                @endif
          @endforeach
              @endif
            </tbody>
          
        </table>
        <div class="col-md-12 text-center">
            {{ $news_list->links() }}
        </div>
      </div>
    </div>
	<div class="modal fade" id="modalSlideUp2" tabindex="-1" role="dialog" aria-labelledby="modal-success-label" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header state modal-success">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modal-success-label"><i class="fa fa-location-arrow"></i>Remove News</h4>
				</div>
				<div class="modal-body" style="">
					Are you sure you want perform this action.
					<div class="row">
						<div class="col-sm-4 m-t-10 sm-m-t-10 pull-right">
							<div class="modal-footer"> <a ng-click="confirmRemoveNews()" type="button" class="btn btn-success">Ok</a> <a type="button" class="btn btn-default" data-dismiss="modal">Close</a> </div>

						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
  </div>
  
</div>
@endsection