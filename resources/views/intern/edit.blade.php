@extends('layouts.app')
    {!! Html::style('/css/select2.min.css') !!}
@section('content')
<br>
<div class="col s12 card">
    {!! Form::model($internEdit, ['route' => ['interns.update', $internEdit->id], 'method' => 'PUT','class'=>'formValidate']) !!}
        <h5><div class="card blue" style="padding:10px">Edit Intern</div></h5> 
      	 {{ csrf_field() }} 

                <div class="row">
                        <div class="input-field col s4">
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
                            <select type="text" id="school" name="school">
                              <option value="{{ $internEdit->schools['id'] }}">{{ $internEdit->schools['school'] }}</option>
                              @foreach( App\InternSchool::get() as $school )
                                    <option value="{{ $school['id'] }}">{{ $school['school'] }}</option>
                              @endforeach
                            </select>
                            {{ Form::label('school','School') }}
                        </div>
                        <div class="input-field col s6">
                            <select type="text" id="course" name="course">
                              <option value="{{ $internEdit->courses['id'] }}">{{ $internEdit->courses['course'] }}</option>
                              @foreach( App\InternCourse::get() as $course )
                                    <option value="{{ $course['id'] }}">{{ $course['course'] }}</option>
                              @endforeach
                            </select>
                            {{ Form::label('course','Course') }}
                        </div>
                </div> 
                <div class="row">
                        <div class="input-field col s12">
                            {{ Form::select('tags[]', $tags, null, ['class' => 'validate select2-multi','id'=>'tags','multiple' => 'multiple']) }}
                            {{ Form::label('tags','Papers') }}     
                        </div>
                </div>
                <div class="row">
                        <div class="input-field col s3">
                            {{ Form::text('primary_contact',null,['class'=>'validate','id'=>'primary_contact','data-length'=>'11']) }} 
                            {{ Form::label('primary_contact','Contact Number') }}
                        </div>
                        <div class="input-field col s3">
                            {{ Form::email('email',null,['class'=>'validate','id'=>'email']) }}
                            {{ Form::label('email','Email Address') }}
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">date_range</i>
                            {{ Form::text('date_start',null,['class'=>'datepicker','id'=>'date_start']) }}
                            {{ Form::label('date_start','Date Start') }}
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">date_range</i>
                            {{ Form::text('date_end',null,['class'=>'datepicker','id'=>'date_end']) }}
                            {{ Form::label('date_end','Date End') }}
                        </div>
                </div> 

            </div>
            <div class="row">
                <button type="submit" class="waves-effect waves-light btn left">Save Changes<i class="material-icons right">send</i></button>
                <a href="{{ route('interns.index') }}" class="waves-effect waves-green btn-flat left" style="margin-left:5px"><i class="material-icons left">keyboard_arrow_left</i>Close</a>
        	</div>	
    {!! Form::close() !!}

@endsection
@section('scripts')

    {!! Html::script('/js/select2.min.js') !!}
    <script>
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($internEdit->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection
