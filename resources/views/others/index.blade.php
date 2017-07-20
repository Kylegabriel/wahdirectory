@extends('layouts.app')
@section('stylesheets')
    <style>
            .modal { 
                width: 40% !important;
                max-height: 40% !important;
              }
    </style>
@endsection
@section('content')
<br>

  <ul id="tabs-swipe-demo" class="tabs light-blue lighten-1">
    <li class="tab col s4 "><a href="#test-swipe-1" class="white-text waves-effect waves-light">School</a></li>
    <li class="tab col s4"><a href="#test-swipe-2" class="white-text waves-effect waves-light">Course</a></li>
    <li class="tab col s4"><a href="#test-swipe-3" class="white-text waves-effect waves-light">Papers</a></li>
  </ul>

  <div id="test-swipe-1" class="col s12 card">
  		<a style="margin:15px 5px 0px 0px" href="#createSchool" class="btn-floating btn-small waves-effect waves-light blue right tooltipped" data-position="bottom" data-delay="50" data-tooltip="ADD SCHOOL"><i class="material-icons">add</i></a>
	  	<table class="table bordered centered highlight responsive-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Schools</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach( $schools as $school )
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $school->school }}</td>
					<td>
						<a data-target="editSchool{{ $school->id }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="EDIT COURSE"><i class="material-icons orange-text">mode_edit</i></a>
					</td>
				</tr>
				@include('modal._editAndCreateSchool')
				@endforeach
			</tbody>
		</table>
		  <div id="createSchool" class="modal modal-fixed-footer">
		  	<form method="POST" action="{{ route('school.store') }}">
			    <div class="modal-content">
			      <h4>Add School</h4>
					{{ csrf_field() }}  
		        	<div class="row">
		        		<div class="col s12">
		            		<div class="input-field col s12">
						        <input type="text" name="school" id="school" class="validation"> 
						        <label for="school">School</label>
						    </div>
		            	</div>
		            </div>	            	
			    </div>
				@include('partials._otherFooter')
			</form>
		  </div>
  </div>

  <div id="test-swipe-2" class="col s12 card">
  		<a style="margin:15px 5px 0px 0px" href="#createCourse" class="btn-floating btn-small waves-effect waves-light blue right tooltipped" data-position="bottom" data-delay="50" data-tooltip="ADD COURSE"><i class="material-icons">add</i></a>
			<table class="table bordered centered highlight responsive-table">
				<thead>
					<tr>
						<th>ID#</th>
						<th>Courses</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $courses as $course )
						<tr>
							<td>{{ $count2++ .'.' }}</td>
							<td>{{ $course->course }}</td>
							<td>
								<a data-target="editCourse{{ $course->id }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="EDIT COURSE"><i class="material-icons orange-text">mode_edit</i></a>
							</td>
						</tr>
						@include('modal._editAndCreateCourse')
					@endforeach
				</tbody>
			</table>

			<div id="createCourse" class="modal modal-fixed-footer">
				<form method="POST" action="{{ route('course.store') }}">
				    <div class="modal-content">
				      <h4>Add Course</h4>
				  	  	
								{{ csrf_field() }}  
				            	<div class="row">
				            		<div class="col s12">
					            		<div class="input-field col s12">
									        <input type="text" name="course" id="course" class="validation"> 
									        <label for="course">Course</label>
									    </div>
					            	</div>
					            </div>	            	
				    </div>
					@include('partials._otherFooter')
				</form>
			</div>
  </div>

  <div id="test-swipe-3" class="col s12 card">
  	<a style="margin:15px 5px 0px 0px" href="#createPapers" class="btn-floating btn-small waves-effect waves-light blue right tooltipped" data-position="bottom" data-delay="50" data-tooltip="ADD PAPERS"><i class="material-icons">add</i></a>
			<table class="table bordered centered highlight responsive-table">
				<thead>
					<tr>
						<th>ID#</th>
						<th>Papers</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach($papers as $paper )
						<tr>
							<td>{{ $count3++ .'.' }}</td>
							<td>{{ $paper->name }}</td>
							<td>
								<a data-target="editPaper{{ $paper->id }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="EDIT COURSE"><i class="material-icons orange-text">mode_edit</i></a>
							</td>
						</tr>
						@include('modal._editAndCreatePaper')
					@endforeach
				</tbody>
			</table>

			<div id="createPapers" class="modal modal-fixed-footer">
				<form method="POST" action="{{ route('papers.store') }}">
				    <div class="modal-content">
				      <h4>Add Papers</h4>
								{{ csrf_field() }}  
				            	<div class="row">
				            		<div class="col s12">
					            		<div class="input-field col s12">
									        <input type="text" name="papers" id="papers" class="validation"> 
									        <label for="papers">Papers</label>
									    </div>
					            	</div>
					            </div>	            	
				    </div>
				    @include('partials._otherFooter')
				</form>
			</div>
  </div>
</div> 
 
@endsection
