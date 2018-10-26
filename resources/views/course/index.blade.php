@extends('settings.index')
@section('settings')	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
	    <a class="navbar-brand" href="">Course</a>
	    @include('partials._headerNav')
	    		<a data-toggle="modal" data-target="#createCourse" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Course">
	            <span class="btn-inner--icon"></span>
	            <span class="btn-inner--text"><i class="fa fa-graduation-cap"></i>Add Course</span>
	      		</a>
	        </li>
	      </ul>
	    </div>
	</nav> 

	<div class="card shadow border-0">
		<div class="card-body">  <!-- div card body -->
			<table id="example" class="table-striped" style="width:100%">
				<thead>
					<tr>
						<th>No.</th>
						<th>Courses</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $courses as $course )
						<tr>
							<td>{{ $count ++ .'.' }}</td>
							<td>{{ $course->course }}</td>
							<td>
								<a data-toggle="modal" data-target="#editCourse{{ $course->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#deleteCourse{{ $course->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
							</td>
						</tr>

						<!--modal -->
						<div class="modal fade" id="editCourse{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal- modal-dialog modal-" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-default">Edit Course</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
					                  <div class="modal-body">
				                        <form method="POST" action="{{ route('course.update',$course->id) }}">
						    				{{ csrf_field() }}  
						                	<div class="row">
						                		<div class="col s12">
						    	            		<div class="input-field col s12">
						    	            			<label for="course">Course</label>
						    					        <input type="text" name="course" id="course" class="form-control" value="{{ $course->course }}"> 
						    					    </div>
						    	            	</div>
						    	            </div>	    
					                  </div>
					                  @include('partials._footerEditModal')
					                  </form>
					                </div>
			              		</div>
			            	</div>
			           	</div>
			           	<!--modal -->

			           	<!--modal -->
						<div class="modal fade" id="deleteCourse{{ $course->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal- modal-dialog modal-" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-default">Please Confirm!</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
						                 <div class="modal-body">
					                        <form method="POST" action="{{ route('course.destroy',$course->id) }}">
							    				{{ csrf_field() }}  
							    			<h5>Would you like to Delete this record?</h5>
						                 </div>
					                  
												<div class="modal-footer">
													<button type="submit" class="btn btn-primary">Save changes</button>
							                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							                        {{ method_field('DELETE') }}
							                    </div>
					                  		</form>

					                </div>
			              		</div>
			            	</div>
			           	</div>
			           	<!--modal -->
					@endforeach
				</tbody>
			</table>
	</div><!-- end div card body -->
</div>

		<div class="modal fade" id="createCourse" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Create Course</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
	                  <div class="modal-body">
                        <form method="POST" action="{{ route('course.store') }}">
		    				{{ csrf_field() }}  
		                	<div class="row">
		                		<div class="col s12">
		    	            		<div class="input-field col s12">
		    	            			<label for="course">Course</label>
		    					        <input type="text" name="course" id="course" class="form-control"> 
		    					    </div>
		    	            	</div>
		    	            </div>	    
	                  </div>
	                 	@include('partials._footerCreateModal')
	                  </form>
	                </div>
          		</div>
        	</div>
       	</div>
@endsection