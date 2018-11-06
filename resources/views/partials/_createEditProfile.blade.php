<div class="card shadow rounded">
    <div class="card-header border-primary text-white bg-primary">
        {{ isset($profile) ? 'EDIT WAH-NGO' : 'CREATE WAH-NGO' }}
    </div>
        <div class="card-body">
            @if(isset($profile))
            {!! Form::model($profile, ['route' => ['profile.update', $profile->id], 'method' => 'PUT', 'files' => true]) !!}
            @else
            {!! Form::open(['route' => 'profile.store','method' => 'POST', 'files' => true]) !!}
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
            <br>
            <div class="form-group">
                <label for="image">Upload Image:</label>
                {{ Form::file('image',null,['class'=>'form-control','id'=>'image','name'=>'image']) }} 
            </div>
        </div>
        <div class="card-footer border-primary">
                {{ Form::button( isset($profile) ? '<i class="fa fa-save"></i> Save Changes' : '<i class="fa fa-save"></i> Submit', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                <a href="{{ route('profile.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <i class="fa fa-arrow-left"></i>
                    Go Back
                </a>
        </div> 
    </div>            
