@extends('layouts.app')
@section('content')
<div class="card shadow border-0 border-primary">
    <div class="card-header border-primary">Create Partner</div>
        <div class="card-body">
        {!! Form::open(['route' => 'partner.store','method' => 'POST','class' => 'formValidate']) !!}
              	{{ csrf_field() }} 
                    <div class="row">
                            <div class="col-md-3">
                                {{ Form::label('last_name','Last Name') }}
                                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }}
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('first_name','First Name') }}
                                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('middle_name','Middle Name') }}
                                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
                            </div>
                            <div class="col-md-3">
                                {{ Form::label('suffix_name','Suffix Name') }}
                                {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                            </div>
                    </div>    
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('partnerDesignation','Designation') }}
                            <select type="text" id="partnerDesignation" name="partnerDesignation" class="form-control">
                              <option value="" disabled selected>Choose your option</option>
                              @foreach( $designation as $designation )
                                    <option value="{{ $designation['designation_id'] }}">{{ $designation['designation'] }}</option>
                              @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('partnerOrganization','Organization') }}
                            <select type="text" id="partnerOrganization" name="partnerOrganization" class="form-control">
                                  <option value="" disabled selected>Choose your option</option>
                                  @foreach( $organization as $organization )
                                        <option value="{{ $organization['organization_id'] }}">{{ $organization['organization'] }}</option>
                                  @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            {{ Form::label('province','Province*') }}
                            <select type="text" id="province" name="province" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                @foreach($province as $province)
                                    <option value="{{ $province->province_code }}">{{ $province->province_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            {{ Form::label('gender', "Gender") }}
                            {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::label('email','Email') }}
                            {{ Form::email('email',null,['class'=>'form-control','id'=>'email','name' => 'email']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('secondary_email','Secondary Email') }}
                            {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email','name' => 'secondary_email']) }} 
                        </div>
                        <div class="col-md-4">
                            {{ Form::label('birthdate','Date of Birth') }}
                            {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name' => 'birthdate']) }}
                        </div>  
                    </div> 

                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('primary_contact','Primary Contact') }}
                            {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('secondary_contact','Secondary Contact') }}
                            {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
                        </div>
                        <input type="hidden" name="is_active" id="is_active" value="Y">
                    </div>
            </div>         
            <div class="card-footer border-primary">
                <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                    <span class="btn-inner--text">Submit</span>
                </button>
                <a href="{{ route('partner.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="btn-inner--text">Go Back</span>
                </a>
            </div>   
</div>        
        {!! Form::close() !!}
@endsection