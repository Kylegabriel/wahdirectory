@extends('settings.index')
@section('settings')
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
          <td>{{ $user->userRole['role_name'] }}</td>
          <td>{{ $user->birthdate }}</td>
          <td>{{ $user->gender }}</td>
          <td>{{ $user->mobile_number }}</td>
          <td>{{ $user->email }}</td>
          <td>
              <a data-toggle="modal" data-target="#editUser{{ $user->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
          </td>
        </tr>

        <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Add New User</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'PUT']) !!}
                          {{ csrf_field() }} 
                              <div class="row">
                                      <div class="col-md-4">
                                          {{ Form::label('username','User Name') }}
                                          {{ Form::text('username',null,['class'=>'form-control','id'=>'username','name'=>'username']) }}
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
                                          {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                                      </div>
                              </div>
                               
                              <div class="row">
                                  <div class="col-md-2">  
                                          {{ Form::label('birthdate','Date of Birth*') }}
                                          {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
                                  </div> 
                                  <div class="col-md-4">
                                          {{ Form::label('mobile_number','Mobile Number') }}
                                          {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number','placeholder'=>'0930*******']) }} 
                                  </div>
                                  <div class="col-md-4">
                                          {{ Form::label('email','Email') }}
                                          {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                                  </div> 
                                  <div class="col-md-2">
                                          {{ Form::label('gender','Gender*') }}
                                          {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],null, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                                  </div>
                              </div> 

                              <div class="row">
                                <div class="col-md-9">
                                          {{ Form::label('role_id','Designation') }}
                                          {{ Form::select('role_id', $role,'NOTAP', ['class' => 'form-control','id' => 'role_id','name' => 'role_id']) }}
                                 </div>
                                  <div class="col-md-3">
                                      {{ Form::label('is_admin','Is Admin') }}
                                      {{ Form::select('is_admin', ['Y' => 'Yes', 'N' => 'No'],null, ['class' => 'form-control','id' => 'is_admin','name' => 'is_admin']) }}
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
                                {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                            </div>
                    </div>
                     
                    <div class="row">
                        <div class="col-md-2">  
                                {{ Form::label('birthdate','Date of Birth*') }}
                                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 

                        </div> 
                        <div class="col-md-4">
                                {{ Form::label('mobile_number','Mobile Number') }}
                                {{ Form::text('mobile_number',null,['class'=>'form-control','id'=>'mobile_number','placeholder'=>'0930*******']) }} 
                        </div>
                        <div class="col-md-4">
                                {{ Form::label('email','Email') }}
                                {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                        </div>
                        <div class="col-md-2">
                                {{ Form::label('gender','Gender*') }}
                                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],null, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                        </div> 
                    </div> 

                    <div class="row">
                      <div class="col-md-9">
                          <label for="role_id">Designation</label>
                              <select type="text" id="role_id" name="role_id" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                  @foreach(App\UserRole::get() as $role)
                                      <option value="{{ $role['id'] }}">{{ $role['role_name'] }}</option>
                                  @endforeach
                              </select>
                       </div>
                        <div class="col-md-3">
                            {{ Form::label('is_admin','Is Admin') }}
                            {{ Form::select('is_admin', ['Y' => 'Yes', 'N' => 'No'],'N', ['class' => 'form-control','id' => 'is_admin','name' => 'is_admin']) }}
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