@extends('layouts.admin.dashboard')

@section('content')

{{--
<div class="pull-left" style="padding-left:15px;">
  <div class="col-xs-12"> <a href="{{ url('dashboard/clients/list') }}" class="btn btn-wide btn-success" >USERS LIST</a> </div>
</div>
--}}
<div class="col-sm-12 col-md-6" ng-controller="ClientController" >
  <div class="container-fluid padding-25 sm-padding-10">
    <div class="panel panel-transparent clearfix">
      <div class="panel-header">
        <h5 class="panel-title">Update Information</h5>
      </div>
      <form id="userDetails">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $user[0]->id }}">
        <input type="hidden" name="user_type" value="{{ $user_type }}">
        <div class="panel-content">
          <div class="alert alert-success fade in" style="display: none;" id="success_div"> <strong>Success!</strong> You have successfully updated the information </div>
          <div class="alert alert-danger fade in" style="display: none;" id="failure_div"> <strong>Error!</strong> Operation Faild </div>
          
                    
        	<div class="row">
            <div class="col-md-12">      
                <div class="form-group">
                    <label for="email">First Name</label>
                    <input type="text" class="form-control" value="{{ $user[0]->first_name  }}" name="first_name" placeholder="First Namae">
                </div>
                <div class="form-group">
                    <label for="email">Last Name</label>
                    <input type="text" class="form-control" value="{{ $user[0]->last_name  }}" name="last_name" placeholder="Last Namae">
                 </div>
                
                <div class="form-group">
                    <label for="password">Photo</label>
                    <input type="file" class="form-control fileinput" name="photo">
                </div>
                <div class="form-group">
                    <label for="password">Email</label>
                    <input type="text" readonly class="form-control" value="{{ $user[0]->email  }}" name="email" <?php if(Auth::user()->role != 1){echo "readonly";} ?>>
                </div>
                
                @if($user_type == 'profile')
                <div class="form-group">
                 <label for="email">Role</label>
                <select class="form-control select2js"  name="role" <?php if(Auth::user()->role != 1){echo "readonly";} ?>>
                  @foreach($roles as $role)
                  <option value="{{ $role->id }}"  <?php if($user[0]->role == $role->id){echo "selected";} ?>>{{ $role->name }}</option>
                  @endforeach
                </select>
                </div>
                @endif
            
                <div class="form-group">
                    <a class="btn btn-primary" id="edit_user"><i class="fa fa-pencil"></i> Update Information</a> </div>
                </div>
            </div>
         </div>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
@endsection