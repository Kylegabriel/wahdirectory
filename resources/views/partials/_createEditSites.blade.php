<div class="card shadow">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($sites) ? 'EDIT SITE' : 'CREATE SITE' }}
    </div>
        <div class="card-body">
        @if(isset($sites))
        {!! Form::model($sites, ['route' => ['sites.update', $sites->id], 'method' => 'PUT']) !!}
        @else
        {!! Form::open(['route' => 'sites.store','method' => 'POST']) !!}
        @endif 
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
            <div class="col-md-8">
                {{ Form::label('status','Status') }}
                {{ Form::select('status', ['' => 'Choose you option','Y' => 'Site Partner','N' => 'Warm Leads'],null, ['class' => 'form-control','id' => 'status','name' => 'status']) }}
            </div>
            <div class="col-md-2">
                {{ Form::label('birthdate','Birthdate') }}
                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
            </div> 
            <div class="col-md-2">
                {{ Form::label('gender', "Gender") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
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
                {{ Form::label('primary_contact','Primary Contact*') }}
                {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
            </div>
            <div class="col-md-4">
                {{ Form::label('secondary_contact','Secondary Contact*') }}
                {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
            </div>
            <div class="col-md-4">
                {{ Form::label('site_id','Designation*') }}
                @if(isset($sites->site_id))
                {{ Form::select('site_id', $siteDesig,NULL, ['class' => 'form-control','id' => 'site_id','name' => 'site_id']) }}
                @else
                <select type="text" id="site_id" name="site_id" class="form-control">
                  <option value="" disabled selected>Choose your option</option>
                  @foreach(App\SitesDesignation::get() as $siteDesig)
                        <option value="{{ $siteDesig['id'] }}">{{ $siteDesig['sites_desc'] }}</option>  
                   @endforeach
                </select>
                @endif
            </div>
        </div>             

        <div class="row">
                <div class="col-md-4">
                    {{ Form::label('region_code','Region') }}
                    {{ Form::select('region_code',$region,isset($facility) ? $facility->region->region_code : null, ['class' => 'form-control','id' => 'region_code','name' => 'region_code']) }}
                </div>
                <div class="col-md-4">
                    {{ Form::label('province_code','Province') }}
                    {{ Form::select('province_code', $province,isset($facility) ? $facility->province->province_code : null, ['class' => 'form-control','id' => 'province_code','name' => 'province_code']) }}

                </div>
                <div class="col-md-4">
                    {{ Form::label('muncity_code','Municipality') }}
                    {{ Form::select('muncity_code', $muncity,isset($facility) ? $facility->municipality->muncity_code : null, ['class' => 'form-control','id' => 'muncity_code','name' => 'muncity_code']) }}
                </div>
        </div>
        <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('brgy_code','Barangay') }}
                        {{ Form::select('brgy_code', $brgy,isset($facility) ? $facility->barangay->brgy_code : null, ['class' => 'form-control','id' => 'brgy_code','name' => 'brgy_code']) }}         
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('hfhudcode','Facility Name') }}      
                        {{ Form::select('hfhudcode', $fac,isset($facility) ? $facility->facilities->hfhudcode : null, ['class' => 'form-control','id' => 'hfhudcode','name' => 'hfhudcode']) }}
                    </div>
        </div>
    </div>

        <div class="card-footer border-primary">
                {{ Form::button( isset($sites) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('sites.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
        </div> 
    </div>            
</div>