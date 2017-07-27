@extends('layouts.app')

@section('content')
	<div class="col s12 card">
         {!! Form::open(['route' => 'profile.store','method' => 'POST','class' => 'formValidate']) !!}    
                    <h5><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>WAH NGO</div></h5>
                        {{ csrf_field() }}
                                <div class="row">
                                    <div class="input-field col s3">
                                        {{ Form::text('last_name',null,['class'=>'validate','id'=>'last_name','data-length'=>'20']) }} 
                                        {{ Form::label('last_name','Last Name') }}
                                    </div>
                                    <div class="input-field col s3">
                                        {{ Form::text('first_name',null,['class'=>'validate','id'=>'first_name','data-length'=>'20']) }} 
                                        {{ Form::label('first_name','First Name') }}
                                    </div>
                                    <div class="input-field col s3">
                                        {{ Form::text('middle_name',null,['class'=>'validate','id'=>'middle_name','data-length'=>'20']) }} 
                                        {{ Form::label('middle_name','Middle Name') }}
                                    </div>
                                    <div class="input-field col s3">
                                        <select type="text" id="suffixName" name="suffixName">
                                          <option value="" disabled selected>Choose your option</option>
                                          @foreach( $suffix as $suffix)
                                            <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
                                          @endforeach
                                        </select>
                                        <label for="suffixName">Suffix Name</label>
                                    </div>
                                </div>    
                                <div class="row">
                                    <div class="input-field col s6">
                                            <select type="text" id="designation" name="designation">
                                              <option value="" disabled selected>Choose your option</option>
                                                @foreach($role as $role)
                                                    <option value="{{ $role['role_id'] }}">{{ $role['role_name'] }}</option>
                                                @endforeach
                                            </select>
                                            <label for="designation">Designation</label>
                                     </div>
                                    <div class="input-field col s3">
                                        <select type="text" id="gender" name="gender">
                                          <option value="" disabled selected>Choose your option</option>
                                          <option value="M">Male</option>
                                          <option value="F">Female</option>
                                        </select>
                                    <label for="gender">Gender</label>
                                    </div>
                                    <div class="input-field col s3">
                                        <select type="text" id="is_active" name="is_active">
                                          <option value="" disabled selected>Choose your option</option>
                                          <option value="N" >In Active</option>
                                          <option value="Y" >Active</option>
                                        </select>
                                        <label for="is_active">Is Active</label>
                                     </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        {{ Form::email('email',null,['class'=>'validate','id'=>'email']) }} 
                                        {{ Form::label('email','Email') }}
                                    </div>
                                    <div class="input-field col s4">
                                        {{ Form::email('secondary_email',null,['class'=>'validate','id'=>'secondary_email']) }} 
                                        {{ Form::label('secondary_email','Secondary Email') }}
                                    </div>
                                    <div class="input-field col s4">
                                        <input type="date" name="date_of_hired" id="date_of_hired" class="datepicker" value="{{ isset($users->birthdate) ? $users->birthdate : null }}">
                                        <label for="date_of_hired">Date Of Hired</label>
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="input-field col s4">
                                        {{ Form::text('primary_contact',null,['class'=>'validate','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
                                        {{ Form::label('primary_contact','Primary Contact') }}
                                    </div>
                                    <div class="input-field col s4">
                                        {{ Form::text('secondary_contact',null,['class'=>'validate','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
                                        {{ Form::label('secondary_contact','Secondary Contact') }}
                                    </div>
                                    <div class="input-field col s4">
                                        <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker" value="{{ isset($users->datehired) ? $users->datehired : null }}">
                                        <label for="date_of_birth">Date of Birth</label>
                                    </div> 
                                </div>

    </div>            
                <div class="row">
                	<button type="submit" class="waves-effect waves-light btn left">Submit<i class="material-icons right">send</i></button>
            	    <a href="{{ route('profile.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Close</a>
            	</div>	
        {!! Form::close() !!}
	

@endsection
