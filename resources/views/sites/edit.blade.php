@extends('layouts.app')

@section('content')
<div class="card shadow border-0  border-primary">
    <div class="card-header border-primary">Edit Sites Organization</div>
        <div class="card-body">
            {!! Form::model($sites, ['route' => ['sites.update', $sites->id], 'method' => 'PUT']) !!}
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
                {{ Form::label('suffix_name', "Suffix Name") }}
                {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div>    
         
        <div class="row">
            <div class="col-md-4">
                {{ Form::label('primary_contact','Primary Contact*') }}
                {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
            </div>
            <div class="col-md-4">
                {{ Form::label('secondary_contact','Secondary Contact*') }}
                {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
            </div>
            <div class="col-md-4">
                {{ Form::label('sitDesignation', "Designation") }}
                {{ Form::select('sitDesignation', $siteDesig,'NOTAP', ['class' => 'form-control','id' => 'sitDesignation','name' => 'sitDesignation']) }}
            </div>
        </div> 

        <div class="row">
            <div class="col-md-6">
                {{ Form::label('email','Email*') }}
                {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
            </div>
            <div class="col-md-6">
                {{ Form::label('secondary_email','Secondary Email*') }}
                {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
            </div> 
        </div>  
        <div class="row">
            <div class="col-md-4">
                {{ Form::label('status','Status') }}
                {{ Form::select('status', ['' => 'Choose you option','Y' => 'Site Partner','N' => 'Warm Leads'],null, ['class' => 'form-control','id' => 'status','name' => 'status']) }}
            </div>
            <div class="col-md-4">
                {{ Form::label('birthdate','Birthdate') }}
                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
            </div> 
            <input type="hidden" name="is_active" id="is_active" value="{{ $sites->is_active == 'Y' ? 'Y' : 'N' }}">
            <div class="col-md-4">
                {{ Form::label('gender', "Gender") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],NULL, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>             

        <div class="row">
            <div class="col-md-3">
                {{ Form::label('site', "Site") }}
                {{ Form::select('site', ['' => 'Choose you option','L' => 'Luzon','V' => 'Visayas','M' => 'Mindanao'],null, ['class' => 'form-control','id' => 'site','name' => 'site']) }}
            </div>
            <div class="col-md-3">
                {{ Form::label('region_code','Region') }}
                {{ Form::select('region_code',$region,null, ['class' => 'form-control','id' => 'region_code','name' => 'region_code']) }}
            </div>
            <div class="col-md-3">
                {{ Form::label('province_code','Province') }}
                {{ Form::select('province_code',$province,null, ['class' => 'form-control','id' => 'province_code','name' => 'province_code']) }}
            </div>
            <div class="col-md-3">
                {{ Form::label('muncity_code','Municipality') }}
                {{ Form::select('muncity_code',$municipality,null, ['class' => 'form-control','id' => 'muncity_code','name' => 'muncity_code']) }}
            </div>
        </div> 
    </div>
    <div class="card-footer border-primary">
        <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
            <span class="btn-inner--text">Save Changes</span>
        </button>
        <a href="{{ route('sites.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
            <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
            <span class="btn-inner--text">Go Back</span>
        </a>
    </div> 
    </div>        
        {!! Form::close() !!}
</div>
@section('scripts')        
    @include('partials._sitesScript')
@endsection
@endsection