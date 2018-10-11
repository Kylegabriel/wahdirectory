@extends('layouts.app')
    {!! Html::style('/select2/dist/css/select2.min.css') !!}
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
    <a class="navbar-brand" href="">Interns</a>
    <div class="collapse navbar-collapse" id="nav-inner-primary">
      <div class="navbar-collapse-header">
        <div class="row">
          <div class="col-6 collapse-brand">
          </div>
          <div class="col-6 collapse-close">
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-inner-primary" aria-controls="nav-inner-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span></span>
              <span></span>
            </button>
          </div>
        </div>
      </div>
      <ul class="navbar-nav ml-lg-auto">
        <li class="nav-item">
          <a role="button" data-toggle="modal" data-target="#createIntern" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Intern" >
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add Intern</span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 
<div class="card shadow border-0  border-primary">
	<div class="card-body">   
		<table id="example" class="table-striped" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Mail</th>
					<th>Course</th>
					<th>School</th>
					<th>Papers</th>
					<th>Date Start</th>
					<th>Date End</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($interns as $intern)
					<tr>
						<td>{{ $count++ .'.' }}</td>
						<td>{{ $intern->last_name .', ' . $intern->first_name . ' ' . $intern->middle_name }}</td>
						<td>{{ $intern->primary_contact }}</td>
						<td>{{ $intern->email }}</td>
						<td>{{ $intern->courses['course'] }}</td>
						<td>{{ $intern->schools['school'] }}</td>
						<td>
							@foreach($intern->tags as $tag)
								<span class="badge badge-pill badge-primary text-uppercase">{{ $tag->name }}</span>
							@endforeach
						</td>
						<td>{{ date('F j, Y', strtotime($intern->date_start)) }}</td>
						<td>{{ date('F j, Y', strtotime($intern->date_end)) }}</td>
						<td>
							 <a data-toggle="modal" data-target="#editIntern{{ $intern->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							@if($intern->is_active == '')
							@else
							<a class="btn btn-link text-primary" 	href="{{ route('partner.edit',$partners->id) }}" >
							 <i class="fa fa-eye fa-2x" aria-hidden="true"></i>
							</a>
							@endif
						</td>
					</tr>


                              <div class="modal fade" id="editIntern{{ $intern->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                          <h5 class="modal-title text-white" id="exampleModalLabel">Add New WAH-NGO</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                        {!! Form::model($intern, ['route' => ['interns.update', $intern->id], 'method' => 'PUT','class'=>'formform-control']) !!}
                                        	{{ csrf_field() }} 
							                <div class="row">
							                        <div class="col-md-4">
							                            {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
							                            {{ Form::label('last_name','Last Name') }}
							                        </div>
							                        <div class="col-md-4">
							                            {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }}
							                            {{ Form::label('first_name','First Name') }}
							                        </div>
							                        <div class="col-md-4">
							                            {{ Form::text('middle_name',null,['class'=>'form-control text-lg','id'=>'middle_name']) }}
							                            {{ Form::label('middle_name','Middle Name') }}
							                        </div>
							                </div>
							                <div class="row">
							                        <div class="col-md-6">
							                            {{ Form::label('school','School') }}
							                            <select type="text" id="school" name="school" class="form-control">
							                              <option value="{{ $intern->schools['id'] }}">{{ $intern->schools['school'] }}</option>
							                              @foreach( App\InternSchool::get() as $school )
							                                    <option value="{{ $school['id'] }}">{{ $school['school'] }}</option>
							                              @endforeach
							                            </select>
							                        </div>
							                        <div class="col-md-6">
							                            {{ Form::label('course','Course') }}
							                            <select type="text" id="course" name="course" class="form-control">
							                              <option value="{{ $intern->courses['id'] }}">{{ $intern->courses['course'] }}</option>
							                              @foreach( App\InternCourse::get() as $course )
							                                    <option value="{{ $course['id'] }}">{{ $course['course'] }}</option>
							                              @endforeach
							                            </select>
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
							                </div> 
                                        </div>         
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save</button>
                                              </div>
                                              {{ method_field('PUT') }}
                                              {!! Form::close() !!}     
                                        </div>            
                                      </div>        
                                    </div>
				@endforeach	  
			</tbody>
		</table>			
	</div>
</div>

<div class="modal fade" id="createIntern" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Add New Intern</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      	<div class="modal-body">
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
	                            {{ Form::label('tags','Papers') }}
	                            {{ Form::select('tags[]', $tags, null, ['class' => 'form-control select2-multi','id'=>'tags','multiple' => 'multiple']) }}   
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
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
         {!! Form::close() !!}   
      </div>            
    </div>        
</div>
@endsection
@section('scripts')

    {!! Html::script('/select2/dist/js/select2.js') !!}
    <script>
        $('.select2-multi').select2({
            width: 'resolve',
            placeholder: 'Choose Paper'
        });

        $('.select2-multi').select2().val({!! json_encode($intern->tags()->getRelatedIds()) !!}).trigger('change');
    </script>

@endsection