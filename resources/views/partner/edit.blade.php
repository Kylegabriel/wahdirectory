@extends('layouts.app')
@section('content')
<div class="card shadow border-0 border-primary">
    <div class="card-header border-primary">Edit Partner Organization</div>
        <div class="card-body">
                {!! Form::model($partners, ['route' => ['partner.update', $partners->id], 'method' => 'PUT']) !!} 
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
                                        {{ Form::label('suffixName','Suffix Name') }}
                                        {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                        {{ Form::label('partnerDesignation','Designation') }}
                                        {{ Form::select('partnerDesignation', $designation,'NOTAP', ['class' => 'form-control','id' => 'partnerDesignation','name' => 'partnerDesignation']) }}
                                </div>
                                <div class="col-md-4">
                                        {{ Form::label('partnerOrganization','Organization') }}
                                        {{ Form::select('partnerOrganization',$organization,NULL, ['class' => 'form-control','id' => 'partnerOrganization','name' => 'partnerOrganization']) }}
                                </div>
                                <div class="col-md-3">
                                        {{ Form::label('province','Province') }}
                                        {{ Form::select('province',$province,NULL,['class' => 'form-control','id' => 'province','name' => 'province']) }}
                                </div>
                                <div class="col-md-2">
                                        {{ Form::label('gender', "Gender") }}
                                        {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],null, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                                </div>
                            </div>    

                            <div class="row">
                                <div class="col-md-4">
                                    {{ Form::label('primary_contact','Primary Contact') }}
                                    {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','placeholder'=>'0930*******']) }} 
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('secondary_contact','Secondary Contact') }}
                                    {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','placeholder'=>'0906*******']) }} 
                                </div>
                                <div class="col-md-4">
                                    {{ Form::label('birthdate','Birthdate') }}
                                    {{ Form::text('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
                                </div> 
                            </div> 


                            <div class="row">
                                <div class="col-md-6">
                                    {{ Form::label('email','Email') }}
                                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('secondary_email','Secondary Email') }}
                                    {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
                                </div>
                                <input type="hidden" name="is_active" id="is_active" value="{{ $partners->is_active == 'Y' ? 'Y' : 'N' }}">
                            </div>
                            
            </div>
            <div class="card-footer border-primary">
                <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                    <span class="btn-inner--text">Save Changes</span>
                </button>
                <a href="{{ route('partner.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="btn-inner--text">Go Back</span>
                </a>
            </div>                
    </div>
        {!! Form::close() !!}

@endsection
