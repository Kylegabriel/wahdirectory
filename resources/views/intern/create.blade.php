@extends('layouts.app')
@section('stylesheets')

    {!! Html::style('/css/select2.min.css') !!}

@endsection
@section('content')
<div class="col s12 card">
    {!! Form::open(['route'=>'interns.store','class'=>'formValidate','method'=>'POST']) !!}
            <h5><div class="card blue" style="padding:10px"><i class="material-icons small">add</i>Intern</div></h5> 
          	 {{ csrf_field() }} 
                    <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix">person_pin</i>
                                {{ Form::text('last_name',null,['class'=>'validate','id'=>'last_name','data-length'=>'20']) }} 
                                {{ Form::label('last_name','Last Name') }}
                            </div>
                            <div class="input-field col s4">
                                {{ Form::text('first_name',null,['class'=>'validate','id'=>'first_name','data-length'=>'20']) }}
                                {{ Form::label('first_name','First Name') }}
                            </div>
                            <div class="input-field col s4">
                                {{ Form::text('middle_name',null,['class'=>'validate','id'=>'middle_name','data-length'=>'20']) }}
                                {{ Form::label('middle_name','Middle Name') }}
                            </div>
                    </div>
                    <div class="row">
                            <div class="input-field col s6">
                                <select type="text" name="school" id="school" class="validate">
                                <option value="" disabled selected>Choose your option</option>
                                    @foreach($schools as $school)
                                    <option value="{{ $school->id }}">{{ $school->school }}</option>
                                    @endforeach
                                  </select> 
                                {{ Form::label('school','School') }}
                            </div>
                            <div class="input-field col s6">
                                <select type="text" name="course" id="course" class="validate">
                                   <option value="" disabled selected>Choose your option</option>
                                    @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course }}</option>
                                    @endforeach
                                </select> 
                                {{ Form::label('course','Course') }}
                            </div>
                    </div> 
                    <div class="row">
                            <div class="input-field col s12">
                                {{ Form::label('tags', 'Paper') }}
                                <select class="validate select2-multi" name="tags[]" id="tags" multiple="multiple">
                                    @foreach($tags as $tag)
                                        <option value='{{ $tag->id }}'>{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="row">
                            <div class="input-field col s4">
                                <i class="material-icons prefix">phone</i>
                                {{ Form::text('primary_contact',null,['class'=>'validate','id'=>'primary_contact','data-length'=>'11']) }}
                                {{ Form::label('primary_contact','Contact Number') }}
                            </div>
                            <div class="input-field col s4">
                                <i class="material-icons prefix">mail_outline</i>
                                {{ Form::email('email',null,['class'=>'validate','id'=>'email']) }} 
                                {{ Form::label('email','Email Address') }}
                            </div>
                            <div class="input-field col s2">
                                <i class="material-icons prefix">date_range</i>
                                {{ Form::text('date_start',null,['class'=>'datepicker','id'=>'date_start']) }}
                                {{ Form::label('date_start','Date Start') }}
                            </div>
                            <div class="input-field col s2">
                                <i class="material-icons prefix">date_range</i>
                                {{ Form::text('date_end',null,['class'=>'datepicker','id'=>'date_end']) }}
                                {{ Form::label('date_end','Date End') }}
                            </div>
                    </div> 
                </div>
                <div class="row">
                	<button type="submit" class="waves-effect waves-light btn left">SUBMIT<i class="material-icons right">send</i></button>
            	    <a href="{{ route('partner.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Cancel</a>
            	</div>	
    {!! Form::close() !!}

@endsection
@section('scripts')

    {!! Html::script('/js/select2.min.js') !!}

    <script>
        $('.select2-multi').select2();
    </script>

@endsection