<div class="card shadow border-0  border-primary">
    <div class="card-header  border-primary">
            @if(isset($profile))
            Edit WAH-NGO
            @else
            Create WAH NGO
            @endif
    </div>
        <div class="card-body">
            @if(isset($profile))
            {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT']) !!}
            @else
            {!! Form::open(['route' => 'profile.store','method' => 'POST']) !!}
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
                    {{ Form::label('suffix_name', "Suffix Name") }}
                    {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                </div>
            </div>    
            <div class="row">
                <div class="col-md-9">
                    {{ Form::label('role_id','Designation') }}
                    @if(isset($profile->role_id))
                    {{ Form::select('role_id', $desig,NULL, ['class' => 'form-control','id' => 'role_id','name' => 'role_id']) }}
                    @else
                    <select type="text" id="role_id" name="role_id" class="form-control">
                      <option value="" disabled selected>Choose your option</option> 
                      @foreach( App\UserRole::get() as $designation )
                            <option value="{{ $designation['id'] }}">{{ $designation['role_name'] }}</option>
                      @endforeach
                    </select>
                    @endif
                 </div>
                <div class="col-md-3">
                    {{ Form::label('gender', "Gender") }}
                    {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    {{ Form::label('email','Email') }}
                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                </div>
                <div class="col-md-5">
                    {{ Form::label('secondary_email','Secondary Email') }}
                    {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
                </div>
                <div class="col-md-2">
                    {{ Form::label('datehired','Date Of Hired') }}
                    {{ Form::date('datehired',null,['class'=>'form-control','id'=>'datehired','name' => 'datehired']) }}
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    {{ Form::label('primary_contact','Primary Contact') }}
                    {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact']) }} 
                </div>
                <div class="col-md-5">
                    {{ Form::label('secondary_contact','Secondary Contact') }}
                    {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact']) }} 
                </div>
                <div class="col-md-2">
                    {{ Form::label('birthdate','Birthdate') }}
                    {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }}
                </div> 
            </div> 
            <div class="row">
                <div class="col-md-4">
                    {{ Form::label('philhealth','PHILHEALTH NUMBER') }}
                    {{ Form::text('philhealth',null,['class'=>'form-control','id'=>'philhealth']) }} 
                </div>
                <div class="col-md-4">
                    {{ Form::label('tin','TIN NUMBER') }}
                    {{ Form::text('tin',null,['class'=>'form-control','id'=>'tin']) }} 
                </div>
                <div class="col-md-4">
                    {{ Form::label('sss','SSS NUMBER') }}
                    {{ Form::text('sss',null,['class'=>'form-control','id'=>'sss']) }} 
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('pagibigmidno','PAG-IBIG MID NO.') }}
                    {{ Form::text('pagibigmidno',null,['class'=>'form-control','id'=>'pagibigmidno']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('pagibigrtn','PAG-IBIG RTN') }}
                    {{ Form::text('pagibigrtn',null,['class'=>'form-control','id'=>'pagibigrtn']) }}
                </div>    
                <div class="col-md-3">
                    {{ Form::label('mabuhaymilespal','MABUHAY MILES NO.') }}
                    {{ Form::text('mabuhaymilespal',null,['class'=>'form-control','id'=>'mabuhaymilespal']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('getgocebupac','GET GO CEBU PAC NO.') }}
                    {{ Form::text('getgocebupac',null,['class'=>'form-control','id'=>'getgocebupac']) }} 
                </div>
            </div>
<!--                                     <div class="row">
                <div class="col-md-6">
                    {{ Form::label('image_url','Image') }}
                    <input type="file" name="image_url" id="image_url" class="form-control">
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('region_code','Region') }}
                    @if(isset($profile->region_code))
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
                            @if(isset($profile->province_code))
                            <option value="{{ $profile->province['province_code'] }}" >{{ $profile->province['province_name'] }}</option>
                            @else
                            <option value="{{ $facility->province['province_code'] }}" >{{ $facility->province['province_name'] }}</option>
                            @endif
                        </select>
                </div>
                <div class="col-md-3">
                        {{ Form::label('muncity_code','Municipality') }}
                        <select type="text" id="muncity_code" name="muncity_code" class="form-control">
                            @if(isset($profile->muncity_code))
                            <option value="{{ $profile->municipality['muncity_code'] }}" >{{ $profile->municipality['muncity_name'] }}</option>
                            @else
                            <option value="{{ $facility->municipality['muncity_code'] }}" >{{ $facility->municipality['muncity_name'] }}</option>
                            @endif
                        </select>
                </div>
                <div class="col-md-3">
                        {{ Form::label('brgy_code','Barangay') }}
                        <select type="text" id="brgy_code" name="brgy_code" class="form-control">
                            @if(isset($profile->brgy_code))
                            <option value="{{ $profile->barangay['brgy_code'] }}" >{{ $profile->barangay['brgy_name'] }}</option>
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
                        @if(isset($profile))
                        Save Changes
                        @else
                        Submit
                        @endif
                    </span>
                </button>
                <a href="{{ route('profile.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="btn-inner--text">Go Back</span>
                </a>
        </div> 
    </div>            
