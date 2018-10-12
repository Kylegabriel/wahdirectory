@extends('layouts.app')
@section('content')
<div class="card shadow border-0  border-primary">
    <div class="card-header  border-primary">Create WAH NGO</div>
        <div class="card-body">
         {!! Form::open(['route' => 'profile.store','method' => 'POST']) !!}    
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
                                            {{ Form::label('designation','Designation') }}
                                            <select type="text" id="designation" name="designation" class="form-control">
                                              <option value="" disabled selected>Choose your option</option>
                                              @foreach( $designation as $designation )
                                                    <option value="{{ $designation['role_id'] }}">{{ $designation['role_name'] }}</option>
                                              @endforeach
                                            </select>
                                         </div>
                                        <div class="col-md-3">
                                            {{ Form::label('gender', "Gender") }}
                                            {{ Form::select('gender', ['M' => 'M', 'F' => 'F'],'M', ['class' => 'form-control','id' => 'gender','name' => 'gender']) }}
                                        </div>
                                        <input type="hidden" name="is_active" id="is_active" value="Y">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            {{ Form::label('email','Email') }}
                                            {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                                        </div>
                                        <div class="col-md-4">
                                            {{ Form::label('secondary_email','Secondary Email') }}
                                            {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
                                        </div>
                                        <div class="col-md-4">
                                            {{ Form::label('datehired','Date Of Hired') }}
                                            {{ Form::date('datehired',null,['class'=>'form-control','id'=>'datehired','name' => 'datehired']) }}
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
        </div>
        <div class="card-footer border-primary">
                <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                    <span class="btn-inner--text">Save</span>
                </button>
                <a href="{{ route('profile.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="btn-inner--text">Go Back</span>
                </a>
        </div> 
    </div>            
        {!! Form::close() !!}
@endsection
