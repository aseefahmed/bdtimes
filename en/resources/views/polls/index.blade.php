@extends('layouts.admin.dashboard')
@section('content')

<div class="col-sm-12" ng-controller="NewsController" style="margin-top: 10px;">
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="panel panel-transparent clearfix">
      <div class="panel-body  table-responsive"  id="table_div">
        <div class="col-md-12 text-center">
            {{ $polls->links() }}
        </div>
        <table class="table table-striped responsive-table" id="responsive-table">
          <thead>
            <tr>
              <th>Image </th>
              <th>Poll </th>
              <th>No Votes </th>
              <th>Yes Votes</th>
              <th>No Comments</th>
              <th>Created At</th>
              <th>Status</th>
              <th class="text-right">Action</th>
            </tr>
          </thead>
          <tbody>
          @if(count($polls) == 0)
			  <tr><td colspan="7">No data available.</td></tr>
		  @endif
		  
          @foreach($polls as $poll)
          <tr>
            <td width="8%"><img src="{{ asset('public/images/polls/featured/'.$poll->featured_image)}}" height="40px"></td>
            <td><?php echo wordwrap($poll->question,80,"<br>\n");?></td>
            <td>{{$poll->no_vote}}</td>
            <td>{{$poll->no_vote}}</td>
            <td>{{$poll->no_vote}}</td>
            <td>{{ date_format(date_create($poll->created_at), 'd/M/Y') }}</td>
            <td>
				@if($poll->flag == '0')
					<strong class="badge x-danger">Draft</strong>
				@else 
					<strong class="badge x-success">Published</strong>
				@endif
			</td>
            <td class="text-right">
            	<a href="{{ url('polls/edit/'.$poll->id) }}" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-pencil-square-o"></i></a> 
                <a class="btn btn-danger" ng-click="deletePoll({{ $poll->id }})"><i class="fa fa-trash"></i></a>
            </td>
          </tr>
          @endforeach
            </tbody>
          
        </table>
        <div class="col-md-12 text-center">
            {{ $polls->links() }}
        </div>
      </div>
    </div>
	<div class="modal fade" id="modalSlideUp2" tabindex="-1" role="dialog" aria-labelledby="modal-success-label" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header state modal-success">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="modal-success-label"><i class="fa fa-location-arrow"></i>Remove Poll</h4>
				</div>
				<div class="modal-body" style="">
					Are you sure you want perform this action.
					<div class="row">
						<div class="col-sm-4 m-t-10 sm-m-t-10 pull-right">
							<div class="modal-footer"> <a ng-click="confirmRemovePoll()" type="button" class="btn btn-success">Ok</a> <a type="button" class="btn btn-default" data-dismiss="modal">Close</a> </div>

						</div>
					</div>
				</div>


			</div>
		</div>
	</div>
  </div>
  
</div>
@endsection