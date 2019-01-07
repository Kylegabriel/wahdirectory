@extends('settings.index')
@section('settings')	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
	    <a class="navbar-brand" href="">Partner Designation</a>
	    @include('partials._headerNav')
	    		<a data-toggle="modal" data-target="#createCourse" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Partner Designation">
	            	<i class="fa fa-building"></i>
	            	Add Partner Designation
	      		</a>
	        </li>
	      </ul>
	    </div>
	</nav> 

	<div class="card shadow border-0" id="example2" style="display:none">
		<div class="card-body">  <!-- div card body -->
			<table id="example" class="table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Partner Designation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $partnerDesig as $partnerDsg )
						<tr>
							<td>{{ $count ++ .'.' }}</td>
							<td>{{ $partnerDsg->designation }}</td>
							<td>
								<a data-toggle="modal" data-target="#editPartDesig{{ $partnerDsg->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#deletePartDesig{{ $partnerDsg->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
							</td>
						</tr>

						<!--modal -->
						<div class="modal fade" id="editPartDesig{{ $partnerDsg->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal-dialog-centered" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h5 class="modal-title">Edit Partner Designation</h5>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
					                  <div class="modal-body">
				                        <form method="POST" action="{{ route('partnerDesignation.update',$partnerDsg->id) }}">
						    				{{ csrf_field() }}  
						                	<div class="row">
						                		<div class="col s12">
						    	            		<div class="input-field col s12">
						    	            			<label for="designation">Partner Designation</label>
						    					        <input type="text" name="designation" id="designation" class="form-control" value="{{ $partnerDsg->designation }}"> 
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
						<div class="modal fade" id="deletePartDesig{{ $partnerDsg->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              	<div class="modal-dialog modal-dialog-centered" role="document">
			                	<div class="modal-content">
					                <div class="modal-header">
					                    <h5 class="modal-title">Please Confirm!</h5>
					                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					                      <span aria-hidden="true">×</span>
					                    </button>
					                </div>
						            <div class="modal-body">
					                    <form method="POST" action="{{ route('partnerDesignation.destroy',$partnerDsg->id) }}">
							    		{{ csrf_field() }}  
							    		<h5>Would you like to Delete this record?</h5>
						            </div>
									<div class="modal-footer">
										{{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
										{{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
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
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Partner Designation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
	                  <div class="modal-body">
                        <form method="POST" action="{{ route('partnerDesignation.store') }}">
		    				{{ csrf_field() }}  
		                	<div class="row">
		                		<div class="col s12">
		    	            		<div class="input-field col s12">
		    	            			{{ Form::label('designation','Partner Designation') }}
	            						{{ Form::text('designation',null,['class'=>'form-control','id'=>'designation','required' => 'required']) }}
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
<!-- @section('scripts')
	<script>

		$("#saveData").click(function() {

			$.ajax({
				type: 'POST',
				url: " {{ route('siteDesignation.store') }}",
				dataType: 'json',
		        data: {
		            '_token': $('input[name=_token]').val(),
		            'designation': $('input[name=designation]').val()
		        },
		        success: function(data) {
		        	console.log(data);
		        }
			})

		    $('#designation').val('');
		});

	</script>
@endsection -->