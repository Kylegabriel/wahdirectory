@extends('layouts.app')
@section('content')
	<div class="col s12 card">
        {!! Form::open(['route' => 'sites.store','method' => 'POST','class' => 'formValidate']) !!}
            <h5><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>Sites</div></h5> 
              	{{ csrf_field() }} 
                    <div class="row">
                            <div class="input-field col s3">
                                {{ Form::text('last_name',null,['class'=>'validate','id'=>'last_name','data-length'=>'20']) }} 
                                {{ Form::label('last_name','Last Name*') }}
                            </div>
                            <div class="input-field col s3">
                                {{ Form::text('first_name',null,['class'=>'validate','id'=>'first_name','data-length'=>'20']) }} 
                                {{ Form::label('first_name','First Name*') }}
                            </div>
                            <div class="input-field col s3">
                                {{ Form::text('middle_name',null,['class'=>'validate','id'=>'middle_name','data-length'=>'20']) }} 
                                {{ Form::label('middle_name','Middle Name*') }}
                            </div>
                            <div class="input-field col s3">
                                <select type="text" id="suffixName" name="suffixName" class="validate">
                                  <option value="" disabled selected>Choose your option</option>
                                  @foreach($suffix as $suffix)
                                    <option value="{{ $suffix->suffix_code }}">{{ $suffix->suffix_desc }}</option>
                                  @endforeach
                                </select>
                                {{ Form::label('suffixName','Suffix Name*') }}
                            </div>
                    </div>    

                    <div class="row">
                        <div class="input-field col s3">
                            <select type="text" id="site" name="site" class="validate">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="L">Luzon</option>
                                <option value="V">Visayas</option>
                                <option value="M">Mindanao</option>
                            </select>
                            {{ Form::label('site','Site*') }}
                        </div>
                        <div class="input-field col s3">
                            <select type="text" id="region" name="region" class="validate">
                            </select>
                            {{ Form::label('region','Region*') }}
                        </div>
                        <div class="input-field col s3">
                            <select type="text" id="province" name="province" class="validate">
                            </select>
                            {{ Form::label('province','Province*') }}
                        </div>
                        <div class="input-field col s3">
                            <select type="text" id="municipality" name="municipality" class="validate">
                            </select>
                            {{ Form::label('municipality','Municipality*') }}
                        </div>
                    </div>
                     
                    <div class="row">
                        <div class="input-field col s4">
                            {{ Form::text('primary_contact',null,['class'=>'validate','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
                            {{ Form::label('primary_contact','Primary Contact*') }}
                        </div>
                        <div class="input-field col s4">
                            {{ Form::text('secondary_contact',null,['class'=>'validate','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
                            {{ Form::label('secondary_contact','Secondary Contact*') }}
                        </div>
                        <div class="input-field col s4">
                            <select type="text" id="sitDesignation" name="sitDesignation">
                              <option value="" disabled selected>Choose your option</option>
                             @foreach($siteDesig as $siteDesig)
                              <option value="{{ $siteDesig->sites_code }}">{{ $siteDesig->sites_desc }}</option>  
                              @endforeach
                            </select>
                            {{ Form::label('sitDesignation','Designation*') }}
                        </div>
                    </div> 

                    <div class="row">
                        <div class="input-field col s4">
                            {{ Form::email('email',null,['class'=>'validate','id'=>'email']) }} 
                            {{ Form::label('email','Email*') }}
                        </div>
                        <div class="input-field col s4">
                            {{ Form::email('secondary_email',null,['class'=>'validate','id'=>'secondary_email']) }} 
                            {{ Form::label('secondary_email','Secondary Email*') }}
                        </div> 
                        <div class="input-field col s4">
                            <input type="date" name="date_of_birth" id="date_of_birth" class="datepicker">
                            {{ Form::label('date_of_birth','Date of Birth**') }}
                        </div> 
                    </div>  
                    <div class="row">
                        <div class="input-field col s4">
                            <select type="text" id="status" name="status">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="Y">Site Partner</option>
                                <option value="N">Warm Leads</option>
                            </select>
                            {{ Form::label('status','Status*') }}
                        </div>
                        <div class="input-field col s4">
                            <select type="text" id="is_active" name="is_active">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="Y" >Active</option>
                              <option value="N" >In Active</option>
                            </select>
                            {{ Form::label('is_active','Is Active*') }}
                        </div>
                        <div class="input-field col s4">
                            <select type="text" id="gender" name="gender">
                                <option value="" disabled selected>Choose your option</option>
                                <option value="M">Male</option>
                                <option value="F">Female</option>
                            </select>
                            {{ Form::label('gender','Gender*') }}
                        </div>
                    </div>
    </div>        
    <div class="row">
    	<button type="submit" class="waves-effect waves-light btn left">SUBMIT<i class="material-icons right">send</i></button>
	    <a href="{{ route('sites.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Close</a>
	</div>	
        {!! Form::close() !!}
</div>
@section('scripts')        
<script>
    $('#site, #region').material_select();
    $('#site').on('change',function(){
    var siteID = $(this).val();    
    if(siteID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-region-list')}}?site_id="+siteID,
           success:function(res){            
            if(res){
                $("#region").empty();
                $("#region").append("<option value=''>Choose your Region</option>");
                $.each(res,function(key,value){
                    $('#region').material_select();
                    $("#region").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#region").empty();
            }
           }
        });
    }else{
        $("#region").empty();
        $("#province").empty();
    }   

   });

    $('#region, #province').material_select();
    $('#region').on('change',function(){
    var regionID = $(this).val();    
    if(regionID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-province-list')}}?region_id="+regionID,
           success:function(res){            
            if(res){
                $("#province").empty();
                $("#province").append("<option value=''>Choose your Province</option>");
                $.each(res,function(key,value){
                    $('#province').material_select();
                    $("#province").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#province").empty();
            }
           }
        });
    }else{
        $("#province").empty();
        $("#municipality").empty();
    }   

   });

    $('#province, #municipality').material_select();
    $('#province').on('change',function(){
    var provinceID = $(this).val();    
    if(provinceID){
        $.ajax({
           type:"GET",
           url:"{{url('sites/create/get-muncity-list')}}?province_id="+provinceID,
           success:function(res){               
            if(res){
                $("#municipality").empty();
                $("#municipality").append('<option>Choose your Municipality</option>');
                $.each(res,function(key,value){
                    $('#municipality').material_select();
                    $("#municipality").append('<option value="'+key+'">'+value+'</option>');
                });
           
            }else{
               $("#municipality").empty();
            }
           }
        });
    }else{
        $("#municipality").empty();
    }
        
   });
</script>
@endsection
@endsection