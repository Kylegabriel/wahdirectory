<div class="card shadow">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($sites) ? 'EDIT SITE' : 'CREATE SITE' }}
    </div>
        <div class="card-body">
        @if(isset($sites))
        {!! Form::model($sites, ['route' => ['sites.update', $sites->id], 'method' => 'PUT', 'files' => true]) !!}
        @else
        {!! Form::open(['route' => 'sites.store','method' => 'POST', 'files' => true]) !!}
        @endif 
        {{ csrf_field() }} 
        <div class="row">
            <div class="col-md-3">
                {{ Form::label('last_name','LAST NAME') }}
                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('first_name','FIRST NAME') }}
                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('middle_name','MIDDLE NAME') }}
                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('suffix_name', "SUFFIX NAME") }}
                {{ Form::select('suffix_name', $suffix,isset($sites) ? null : 'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
            </div>
        </div>    

        <div class="row">
            <div class="col-md-8">
                {{ Form::label('site_id','DESIGNATION*') }}
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
            <div class="col-md-4">
                {{ Form::label('birthdate','BIRTHDATE') }}
                {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
            </div> 
        </div>
        <div class="row">
            <div class="col-md-8">
                {{ Form::label('status','STATUS') }}
                {{ Form::select('status', ['' => 'Choose you option','Y' => 'Site Partner','N' => 'Warm Leads'],null, ['class' => 'form-control','id' => 'status','name' => 'status']) }}
            </div>
            <div class="col-md-4">
                {{ Form::label('gender', "GENDER") }}
                {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                {{ Form::label('email','EMAIL') }}
                {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('secondary_email','SECONDARY EMAIL') }}
                {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email','name'=> 'secondary_email']) }} 
            </div> 
            <div class="col-md-3">
                {{ Form::label('primary_contact','PRIMARY CONTACT') }}
                {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','name'=> 'primary_contact']) }} 
            </div>
            <div class="col-md-3">
                {{ Form::label('secondary_contact','SECONDARY CONTACT') }}
                {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','name'=> 'secondary_contact']) }} 
            </div>
        </div>             

<!--         <div class="row">
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
        </div> -->
            <br>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
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