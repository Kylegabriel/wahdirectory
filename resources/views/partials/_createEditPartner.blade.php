<div class="card shadow rounded">
        <div class="card-header border-primary text-white bg-primary">
            {{ isset($partners) ? 'EDIT PARTNER ORGANIZATION' : 'CREATE PARTNER' }}
        </div>
        <div class="card-body">
            @if(isset($partners))
            {!! Form::model($partners, ['route' => ['partner.update', $partners->id], 'method' => 'PUT']) !!}
            @else
            {!! Form::open(['route' => 'partner.store','method' => 'POST']) !!}
            @endif
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
                    @if(isset($partners->suffix_name))
                    {{ Form::select('suffix_name', $suffix,null, ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                    @else
                    {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-5">
                    {{ Form::label('desig_id','Designation') }}
                    @if(isset($partners->desig_id))
                    {{ Form::select('desig_id', $designation,null, ['class' => 'form-control','id' => 'desig_id','name' => 'desig_id']) }}
                    @else
                    <select type="text" id="desig_id" name="desig_id" class="form-control">
                      <option value="" disabled selected>Choose your option</option>
                      @foreach( App\PartnerDesignation::get() as $designation )
                            <option value="{{ $designation['id'] }}">{{ $designation['designation'] }}</option>
                      @endforeach
                    </select>
                    @endif
                </div>
                <div class="col-md-5">
                    {{ Form::label('org_id','Organization') }}
                    @if(isset($partners->org_id))
                    {{ Form::select('org_id',$organization,NULL, ['class' => 'form-control','id' => 'org_id','name' => 'org_id']) }}
                    @else
                    <select type="text" id="org_id" name="org_id" class="form-control">
                      <option value="" disabled selected>Choose your option</option>    
                      @foreach( App\PartnerOrganization::where('is_active','Y')->get() as $organizations )
                            <option value="{{ $organizations['id'] }}">{{ $organizations['organization'] }}</option>
                      @endforeach
                    </select>
                    @endif
                </div>
                <div class="col-md-2">
                    {{ Form::label('gender', "Gender") }}
                    {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],null, ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                </div>
            </div>    

            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('primary_contact','Primary Contact') }}
                    {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact']) }} 
                </div>
                <div class="col-md-4">
                    {{ Form::label('secondary_contact','Secondary Contact') }}
                    {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact']) }} 
                </div>
                <div class="col-md-4">
                    {{ Form::label('birthdate','Birthdate') }}
                    {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
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
            </div>

            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('region_code','Region') }}
                    {{ Form::select('region_code',$region,isset($facility) ? $facility->region->region_code : null, ['class' => 'form-control','id' => 'region_code','name' => 'region_code']) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('province_code','Province') }}
                    {{ Form::select('province_code', $province,isset($facility) ? $facility->province->province_code : null, ['class' => 'form-control','id' => 'province_code','name' => 'province_code']) }}

                </div>
                <div class="col-md-3">
                    {{ Form::label('muncity_code','Municipality') }}
                    {{ Form::select('muncity_code', $muncity,isset($facility) ? $facility->municipality->muncity_code : null, ['class' => 'form-control','id' => 'muncity_code','name' => 'muncity_code']) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('brgy_code','Barangay') }}
                    {{ Form::select('brgy_code', $brgy,isset($facility) ? $facility->barangay->brgy_code : null, ['class' => 'form-control','id' => 'brgy_code','name' => 'brgy_code']) }}         
                </div>
            </div>
        </div>

        <div class="card-footer border-primary">
            {{ Form::button( isset($partners) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
            <a href="{{ route('partner.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <i class="fa fa-arrow-left"></i>
                Go Back
            </a>
        </div>                
</div>


                            