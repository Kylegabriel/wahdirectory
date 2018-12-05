@extends('settings.index')
@section('settings')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">School</a>
    @include('partials._headerNav')
    		<a data-toggle="modal" data-target="#createSchool" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-university"></i>Add School</span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 
<div class="card shadow border-0"> <!-- start of card div -->
	<div class="card-body">  
		<table id="example" class="table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>School</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody id="example2" style="display:none">
				@foreach( $schools as $school )
					<tr>
						<td>{{ $count ++ .'.' }}</td>
						<td>{{ $school->school }}</td>
						<td>

							<a data-toggle="modal" data-target="#editSchool{{ $school->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
							<a data-toggle="modal" data-target="#deleteSchool{{ $school->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
						</td>
					</tr>

					<div class="modal fade" id="editSchool{{ $school->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
		              <div class="modal-dialog modal- modal-dialog modal-" role="document">
		                <div class="modal-content">
		                  <div class="modal-header">
		                    <h6 class="modal-title" id="modal-title-default">Edit School</h6>
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		                      <span aria-hidden="true">×</span>
		                    </button>
		                  </div>
		                  <div class="modal-body">
	                        <form method="POST" action="{{ route('school.update',$school->id) }}">
			    				{{ csrf_field() }}  
			                	<div class="row">
			                		<div class="col s12">
			    	            		<div class="input-field col s12">
			    	            			<label for="schools">School</label>
			    					        <input type="text" name="schools" id="schools" class="form-control" value="{{ $school->school }}"> 
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
						<div class="modal fade" id="deleteSchool{{ $school->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal- modal-dialog modal-" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-default">Please Confirm!</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
						                 <div class="modal-body">
					                        <form method="POST" action="{{ route('school.destroy',$school->id) }}">
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
	</div>
</div>

<div class="modal fade" id="createSchool" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="modal-title-default">Create School</h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
              <div class="modal-body">
                <form method="POST" action="{{ route('school.store') }}">
    				{{ csrf_field() }}  
                	<div class="row">
                		<div class="col s12">
    	            		<div class="input-field col s12">
    	            			<label for="school">School</label>
    					        <input type="text" name="school" id="school" class="form-control"> 
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