@extends('layouts.app')
@section('content')
<div class="card shadow border-0  border-primary">
    <div class="card-header border-primary">Create Sites</div>
        <div class="card-body">
        {!! Form::open(['route' => 'sites.store','method' => 'POST']) !!}    
        {{ csrf_field() }} 
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
                {{ Form::label('sitDesignation','Designation*') }}
                <select type="text" id="sitDesignation" name="sitDesignation" class="form-control">
                  <option value="" disabled selected>Choose your option</option>
                 @foreach($siteDesig as $siteDesig)
                  <option value="{{ $siteDesig['sites_code'] }}">{{ $siteDesig['sites_desc'] }}</option>  
                  @endforeach
                </select>
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
            <input type="hidden" name="is_active" id="is_active" value="Y">
            <div class="col-md-4">
                {{ Form::label('gender', "Gender") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>             

        <div class="row">
            <div class="col-md-3">
                {{ Form::label('site', "Site") }}
                {{ Form::select('site', ['' => 'Choose you option','L' => 'Luzon','V' => 'Visayas','M' => 'Mindanao'],null, ['class' => 'form-control','id' => 'site','name' => 'site']) }}
            </div>
            <div class="col-md-3">
                {{ Form::label('region','Region') }}
                <select type="text" id="region" name="region" class="form-control">
                </select>
            </div>
            <div class="col-md-3">
                {{ Form::label('province','Province') }}
                <select type="text" id="province" name="province" class="form-control">
                </select>
            </div>
            <div class="col-md-3">
                {{ Form::label('municipality','Municipality') }}
                <select type="text" id="municipality" name="municipality" class="form-control">
                </select>
            </div>
        </div>
    </div>

    <div class="card-footer border-primary">
        <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
            <span class="btn-inner--text">Save</span>
        </button>
        <a href="{{ route('sites.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
            <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
            <span class="btn-inner--text">Go Back</span>
        </a>
    </div> 
</div>            
        {!! Form::close() !!}
</div>
@endsection
@section('scripts')        
<script>
    $('#site').on('change',function(){
    var siteID = $(this).val();    
    if(siteID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-region-list')}}?site_id="+siteID,
           success:function(res){ 
           console.log(res);           
            if(res){
                $("#region").empty();
                $("#region").html("<option disabled selected>Choose your Region</option>");
                $.each(res,function(key,value){
                    //console.log(key,value);
                    $('#region').html();
                    $("#region").append('<option value="'+key+'">'+value+'</option>');
                 });
           
            }else{
               $("#region").empty();
            }
           }
        });
    }
    else{
        $("#region").empty();
        $("#province").empty();
    }   

   });

    $('#region').on('change',function(){
    var regionID = $(this).val();    
    if(regionID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-province-list')}}?region_id="+regionID,
           success:function(res){            
            if(res){
                $("#province").empty();
                $("#province").append("<option disabled selected>Choose your Province</option>");
                $.each(res,function(key,value){
                    $('#province').html();
                    $("#province").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#province").empty();
            }
           }
        });
    }
    else{
        $("#province").empty();
        $("#municipality").empty();
    }   

   });

    $('#province').on('change',function(){
    var provinceID = $(this).val();    
    if(provinceID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-muncity-list')}}?province_id="+provinceID,
           success:function(res){               
            if(res){
                $("#municipality").empty();
                $("#municipality").append('<option disabled selected>Choose your Municipality</option>');
                $.each(res,function(key,value){
                    $('#municipality').html();
                    $("#municipality").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#municipality").empty();
            }
           }
        });
    }
    else{
        $("#municipality").empty();
    }     
   });
</script>
@endsection