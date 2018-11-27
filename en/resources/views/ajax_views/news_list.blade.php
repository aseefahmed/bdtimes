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
  
  @foreach($news_list as $news)
  <tr>
	<td width="8%"><img src="{{ asset('public/images/news/featured/'.$news->featured_image)}}" height="40px"></td>
	<td><?php echo wordwrap($news->title,80,"<br>\n");?></td>
	<td>
	{{ $news->category_name}}
	</td>
	<td>{{ $news->creator_name }}</td>
	<td>
		@if($news->flag == 0)
			<span class="badge x-warning">Draft</span>
		@elseif($news->flag == 1)
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
	</tbody>
  
</table>