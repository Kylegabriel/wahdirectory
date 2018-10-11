@extends('layouts.app')
    {!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
<div class="card shadow border-0 border-primary">
    <div class="card-header border-primary">Create Intern</div>
        <div class="card-body">
    {!! Form::open(['route'=>'interns.store','class'=>'formform-control','method'=>'POST']) !!}
          	 {{ csrf_field() }} 
                    <div class="row">
                            <div class="col-md-4">
                                {{ Form::label('last_name','Last Name') }}
                                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('first_name','First Name') }}
                                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('middle_name','Middle Name') }}
                                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }}
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-6">
                                {{ Form::label('school','School') }}
                                <select type="text" name="school" id="school" class="form-control">
                                <option value="" disabled selected>Choose your option</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->school }}</option>
                                    @endforeach
                                  </select> 
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('course','Course') }}
                                <select type="text" name="course" id="course" class="form-control">
                                   <option value="" disabled selected>Choose your option</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course }}</option>
                                    @endforeach
                                </select> 
                            </div>
                    </div> 
                    <div class="row">
                            <div class="col-md-11">
                                {{ Form::label('tags', 'Paper') }}
                                <select class="form-control select2-multi" name="tags[]" id="tags" multiple="multiple" >
                                    @foreach($tags as $tag)
                                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="row">
                            <div class="col-md-4">
                                {{ Form::label('primary_contact','Contact Number') }}
                                {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact']) }}
                            </div>
                            <div class="col-md-4">
                                {{ Form::label('email','Email Address') }}
                                {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
                            </div>
                            <div class="col-md-2">
                                {{ Form::label('date_start','Date Start') }}
                                {{ Form::date('date_start',null,['class'=>'form-control','id'=>'date_start']) }}
                            </div>
                            <div class="col-md-2">
                                {{ Form::label('date_end','Date End') }}
                                {{ Form::date('date_end',null,['class'=>'form-control','id'=>'date_end']) }}
                            </div>
                    </div> 
                </div>
            <div class="card-footer border-primary">
                <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
                    <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
                    <span class="btn-inner--text">Submit</span>
                </button>
                <a href="{{ route('interns.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                    <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                    <span class="btn-inner--text">Go Back</span>
                </a>
            </div>               
</div>
    {!! Form::close() !!}

@endsection
@section('scripts')

    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.select2-multi').select2({
            width: 'resolve',
            placeholder: 'Choose Paper'
        });
    </script>

@endsection