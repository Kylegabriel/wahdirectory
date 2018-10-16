@extends('layouts.app')
    {!! Html::style('/select2/dist/css/select2.css') !!}
@section('content')
<div class="card shadow border-0 border-primary">
    <div class="card-header border-primary">Create Intern</div>
        <div class="card-body">   
        {!! Form::model($intern, ['route' => ['interns.update', $intern->id], 'method' => 'PUT','class'=>'formform-control']) !!}
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
                    {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    {{ Form::label('school','School') }}
                    {{ Form::select('school', $schools,null, ['class' => 'form-control','id' => 'school','name' => 'school']) }}
                </div>
                <div class="col-md-6">
                    {{ Form::label('course','Course') }}
                    {{ Form::select('course', $courses,null, ['class' => 'form-control','id' => 'course','name' => 'course']) }}
                </div>
            </div> 

            <div class="row">
                <div class="col-md-11">
                    {{ Form::label('tags','Papers') }}
                    {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','id'=>'tags','multiple' => 'multiple']) }}     
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    {{ Form::label('primary_contact','Contact Number') }}
                    {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11']) }} 
                </div>
                <div class="col-md-3">
                    {{ Form::label('email','Email Address') }}
                    {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('date_start','Date Start') }}
                    {{ Form::date('date_start',null,['class'=>'form-control','id'=>'date_start']) }}
                </div>
                <div class="col-md-3">
                    {{ Form::label('date_end','Date End') }}
                    {{ Form::date('date_end',null,['class'=>'form-control','id'=>'date_end']) }}
                </div>
                <input type="hidden" name="is_active" id="is_active" value="{{ $intern->is_active == 'Y' ? 'Y' : 'N' }}">
            </div>
    </div>             

    <div class="card-footer border-primary">
        <button type="submit" class="btn btn-icon btn-3 btn-primary" type="button">
            <span class="btn-inner--icon"><i class="fa fa-save"></i></span>
            <span class="btn-inner--text">Save Changes</span>
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
        $('.select2-multi').select2();
        $('.select2-multi').select2().val({!! json_encode($intern->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection
