<div class="card shadow">
    <div class="card-header border-primary text-white bg-primary">
            @if(isset($intern))
            Edit Partner Organization
            @else
            Create Intern
            @endif
    </div>
        <div class="card-body">
            @if(isset($intern))
            {!! Form::model($intern, ['route' => ['interns.update', $intern->id], 'method' => 'PUT']) !!}
            @else
            {!! Form::open(['route'=>'interns.store','method'=>'POST']) !!}
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
                    {{ Form::select('suffix_name', $suffix,'NOTAP', ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
                </div>
            </div>
            <div class="row">
                    <div class="col-md-5">
                        {{ Form::label('school_id','School') }}
                        @if(isset($intern->school_id))
                        {{ Form::select('school_id', $schools,null, ['class' => 'form-control','id' => 'school_id','name' => 'school_id']) }}
                        @else
                        <select type="text" name="school_id" id="school_id" class="form-control">
                        <option value="" disabled selected>Choose your option</option>
                            @foreach(App\InternSchool::get() as $school)
                            <option value="{{ $school['id'] }}">{{ $school['school'] }}</option>
                            @endforeach
                        </select>
                        @endif 
                    </div>
                    <div class="col-md-5">
                        {{ Form::label('course_id','Course') }}
                        @if(isset($intern->course_id))
                        {{ Form::select('course_id', $courses,null, ['class' => 'form-control','id' => 'course_id','name' => 'course_id']) }}
                        @else
                        <select type="text" name="course_id" id="course_id" class="form-control">
                           <option value="" disabled selected>Choose your option</option>
                            @foreach( App\InternCourse::get() as $course)
                            <option value="{{ $course['id'] }}">{{ $course['course'] }}</option>
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
                    <div class="col-md-10">
                        {{ Form::label('tags','Papers') }}
                        @if(isset($intern->tags))
                        {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','id'=>'tags','multiple' => 'multiple']) }}
                        @else
                        <select type="text" name="tags[]" id="tags" class="form-control select2-multi" multiple="multiple">
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select> 
                        @endif  
                    </div>
                    <div class="col-md-2">
                        {{ Form::label('birthdate','Birthdate') }}
                        {{ Form::date('birthdate',null,['class'=>'form-control','id'=>'birthdate','name'=>'birthdate']) }} 
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
                <span class="btn-inner--text">
                    @if(isset($intern))
                    Save Changes
                    @else
                    Submit
                    @endif
                </span>
            </button>
            <a href="{{ route('interns.index') }}" class="btn btn-icon btn-3 btn-success" role="button">
                <span class="btn-inner--icon"><i class="fa fa-arrow-left"></i></span>
                <span class="btn-inner--text">Go Back</span>
            </a>
        </div>               
</div>