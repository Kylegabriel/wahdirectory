@extends('layouts.app')
@section('stylesheets')

@endsection
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">User List</a>
    <div class="collapse navbar-collapse" id="nav-inner-primary">
      <div class="navbar-collapse-header">
        <div class="row">
          <div class="col-6 collapse-brand">
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item">
          <a href="" role="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add User" >
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add User</span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 
<div class="card shadow border-0">
	<div class="card-body">  
		<table id="example" class="table-striped" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Designation</th>
					<th>Birthdate</th>
					<th>Gender</th>
					<th>Mobile Number</th>
					<th>Email Address</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
		  	@foreach($users as $user)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $user->last_name . ", " . $user->first_name . " " . $user->middle_name . " " }} @if($user->suffix_name == 'NOTAP') @else {{ $user->suffix_name }} @endif</td>
					<td>{{ $user->designations['role_name'] }}</td>
					<td>{{ $user->birthdate }}</td>
					<td>{{ $user->gender }}</td>
					<td>{{ $user->mobile_number }}</td>
					<td>{{ $user->email }}</td>
					<td>

					</td>
				</tr>
			@endforeach	
			</tbody>
		</table>
	</div>	
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		{!! Form::open(['route' => 'users.store','method' => 'POST']) !!}
              	{{ csrf_field() }} 
                    <div class="row">
                            <div class="col-md-4">
                                {{ Form::label('username','User Name') }}
                                <input type="text" class="form-control" name="username" id="username">
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('password','Password') }}
                                <input type="password" class="form-control" name="password" id="password">
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('confirm_password','Comfirm Password') }}
                                <input type="password" class="form-control" name="comfirm_password" id="comfirm_password"> 
                            </div>
                    </div>    

                    <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('last_name','Last Name*') }}
                                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }}
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('first_name','First Name*') }}
                                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('middle_name','Middle Name*') }}
                                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('suffix_name','Suffix Name*') }}
                                <select type="text" id="suffix_name" name="suffix_name" class="form-control">
                                  <option value="" disabled selected>Choose your option</option>
                                  @foreach( $suffix as $suffix )
                                        <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
                                  @endforeach
                                </select>
                            </div>
                    </div>
                     
                    <div class="row">
                        <div class="col-md-2">
                            {{ Form::label('gender','Gender*') }}
                            <select type="text" id="gender" name="gender" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                        </div>
                        <div class="col-md-2">  
                            {{ Form::label('birthdate','Date of Birth*') }}
                            <input type="text" name="birthdate" id="birthdate" data-date-format="mm/dd/yyyy" class="form-control datepicker" placeholder="12/31/2018">
                        </div> 
                        <div class="col-md-4">
                            {{ Form::label('mobile_number','Mobile Number') }}
                            {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number','placeholder'=>'0930*******']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('email','Email') }}
                            {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                        </div>
                    </div> 

                    <div class="row">
                      <div class="col-md-9">
                          <label for="designation">Designation</label>
                              <select type="text" id="designation" name="designation" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                  @foreach($role as $role)
                                      <option value="{{ $role['role_id'] }}">{{ $role['role_name'] }}</option>
                                  @endforeach
                              </select>
                       </div>
                        <div class="col-md-3">
                            {{ Form::label('is_admin','Admin') }}
                            <select type="text" id="is_admin" name="is_admin" class="form-control">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="Y" >Yes</option>
                              <option value="N" >No</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
		        <button type="submit" class="btn btn-primary">Save</button>
		      </div>
		    </div>  
		    {!! Form::close() !!}        
		</div>        
</div>
@endsection