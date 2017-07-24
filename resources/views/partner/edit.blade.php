@extends('layouts.app')

@section('content')
	<div class="col s12 card">
        {!! Form::model($partners, ['route' => ['partner.update', $partners->id], 'method' => 'PUT','class'=>'formValidate']) !!}
            <h5><div class="card blue" style="padding:10px"></i>Edit Partner Organization</div></h5> 
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
                                <select type="text" id="suffixName" name="suffixName" class="validate">
                                  <option value="{{ isset($partners->partnerSuffix['suffix_code']) ? $partners->partnerSuffix['suffix_code'] : '' }}">{{ isset($partners->partnerSuffix['suffix_desc']) ? $partners->partnerSuffix['suffix_desc'] : '--Select--' }}</option>
                                  @foreach( $suffix as $suffix )
                                        <option value="{{ $suffix['suffix_code'] }}">{{ $suffix['suffix_desc'] }}</option>
                                  @endforeach
                                </select>
                                {{ Form::label('suffixName','Suffix Name') }}
                            </div>
                    </div>    

                    <div class="row">
                        <div class="input-field col s3">
                            <select type="text" id="partnerDesignation" name="partnerDesignation">
                              <option value="{{ isset($partners->partnerDesignation['designation_id']) ? $partners->partnerDesignation['designation_id'] : null }}">{{ isset($partners->partnerDesignation['designation']) ? $partners->partnerDesignation['designation'] : '--Select--' }}</option>
                              @foreach( $designation as $designation )
                                    <option value="{{ $designation['designation_id'] }}">{{ $designation['designation'] }}</option>
                              @endforeach
                            </select>
                            {{ Form::label('partnerDesignation','Designation') }}

                        </div>
                        <div class="input-field col s4">
                            <select type="text" id="partnerOrganization" name="partnerOrganization">
                                  <option value="{{ isset($partners->partnerOrganization['organization_id']) ? $partners->partnerOrganization['organization_id'] : null }}">{{ isset($partners->partnerOrganization['organization']) ? $partners->partnerOrganization['organization'] : '--Select--' }}</option>
                                  @foreach( $organization as $organization )
                                        <option value="{{ $organization['organization_id'] }}">{{ $organization['organization'] }}</option>
                                  @endforeach
                            </select>
                            {{ Form::label('partnerOrganization','Organization') }}
                        </div>
                        <div class="input-field col s3">
                            <select type="text" id="province" name="province">
                                <option value="{{ $partners->province }}">{{$partners->province}}</option>
                                @foreach($province as $province)
                                    <option value="{{ $province->province_name }}">{{ $province->province_name }}</option>
                                @endforeach
                            </select>
                            {{ Form::label('province','Province') }}
                        </div>
                        <div class="input-field col s2">
                            <select type="text" id="gender" name="gender">
                                @if($partners->gender == 'M')
                                    <option value="{{ $partners->gender }}">{{ $partners->gender == 'M' ? 'Male' : 'Female' }}</option>
                                    <option value="F">Female</option>
                                @else    
                                    <option value="{{ $partners->gender }}">{{ $partners->gender == 'F' ? 'Female' : 'Male' }}</option>
                                    <option value="F">Male</option>
                                @endif
                            </select>
                            {{ Form::label('gender','Gender') }}
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
                            <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker" value="{{ isset($partners['birthdate']) ? $partners['birthdate'] : null }}">
                            <label for="date_of_birth">Date of Birth</label>
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
                            <select type="text" id="is_active" name="is_active">
                                    @if($partners->is_active == 'Y')
                                        <option value="{{ $partners->is_active }}" >{{$partners->is_active == 'Y' ? 'Active' : 'In Active'}}</option>
                                        <option value="N" >In Active</option>
                                    @elseif($partners->is_active == 'N')
                                        <option value="N" >{{$partners->is_active == 'N' ? 'In Active' : 'Active'}}</option>
                                        <option value="Y" >Active</option>
                                    @else
                                        <option value="" disabled selected>Choose your option</option>
                                        <option value="N">Active</option>
                                        <option value="Y">In Active</option> 
                                    @endif
                            </select>
                            <label for="is_active">Is Active</label>
                        </div>
                    </div>    
    </div>
    <div class="row">
    	<button type="submit" class="waves-effect waves-light btn left">Save Changes<i class="material-icons right">send</i></button>
	    <a href="{{ route('partner.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Cancel</a>
	</div>	
        {!! Form::close() !!}

@endsection
