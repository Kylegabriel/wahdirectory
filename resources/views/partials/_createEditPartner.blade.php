<div class="card shadow border-0 border-primary">
        <div class="card-header border-primary">
            @if(isset($partners))
            Edit Partner Organization
            @else
            Create Partner
            @endif
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
                    @if(isset($partners->region_code))
                    {{ Form::select('region_code',$region,null, ['class' => 'form-control','id' => 'region_code','name' => 'region_code']) }}
                    @else
                    <select type="text" id="region_code" name="region_code" class="form-control">
                        <option value="{{ $facility->region['region_code'] }}" >{{ $facility->region['region_name'] }}</option>
                        @foreach($region as $ion)
                          <option value="{{ $ion->region_code }}">{{ $ion->region_name }}</option>
                        @endforeach
                    </select>
                    @endif
                </div>
                <div class="col-md-3">
                        {{ Form::label('province_code','Province') }}
                        <select type="text" id="province_code" name="province_code" class="form-control">
                            @if(isset($partners->province_code))
                            <option value="{{ $partners->provinces['province_code'] }}" >{{ $partners->provinces['province_name'] }}</option>
                            @else
                            <option value="{{ $facility->province['province_code'] }}" >{{ $facility->province['province_name'] }}</option>
                            @endif
                        </select>
                </div>
                <div class="col-md-3">
                        {{ Form::label('muncity_code','Municipality') }}
                        <select type="text" id="muncity_code" name="muncity_code" class="form-control">
                            @if(isset($partners->muncity_code))
                            <option value="{{ $partners->municipality['muncity_code'] }}" >{{ $partners->municipality['muncity_name'] }}</option>
                            @else
                            <option value="{{ $facility->municipality['muncity_code'] }}" >{{ $facility->municipality['muncity_name'] }}</option>
                            @endif
                        </select>
                </div>
                <div class="col-md-3">
                        {{ Form::label('brgy_code','Barangay') }}
                        <select type="text" id="brgy_code" name="brgy_code" class="form-control">
                            @if(isset($partners->brgy_code))
                            <option value="{{ $partners->barangay['brgy_code'] }}" >{{ $partners->barangay['brgy_name'] }}</option>
                            @else
                            <option value="{{ $facility->barangay['brgy_code'] }}" >{{ $facility->barangay['brgy_name'] }}</option>
                            @endif
                        </select>                
                </div>
            </div>
        </div>

        <div class="card-footer border-primary">
            <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
                <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                <span class="btn-inner--text">
                    @if(isset($partners))
                    Save Changes
                    @else
                    Submit
                    @endif
                </span>
            </button>
            <a href="{{ route('partner.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                <span class="btn-inner--text">Go Back</span>
            </a>
        </div>                
</div>


                            