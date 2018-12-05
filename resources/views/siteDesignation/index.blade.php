@extends('settings.index')
@section('settings')	
	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
	    <a class="navbar-brand" href="">Site Designation</a>
	    @include('partials._headerNav')
	    		<a data-toggle="modal" data-target="#createSite" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Course">
	            <span class="btn-inner--icon"></span>
	            <span class="btn-inner--text">
	            	<i class="fa fa-handshake-o"></i>
	            	Add Site Designation
	            </span>
	      		</a>
	        </li>
	      </ul>
	    </div>
	</nav> 

	<div class="card shadow border-0">
		<div class="card-body">  <!-- div card body -->
			<table id="example" class="table-striped">
				<thead>
					<tr>
						<th>No.</th>
						<th>Site Designation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody id="example2" style="display:none">
					@foreach( $sitesDesig as $sitesDes )
						<tr>
							<td>{{ $count ++ .'.' }}</td>
							<td>{{ $sitesDes->sites_desc }}</td>
							<td>
								<a data-toggle="modal" data-target="#editSite{{ $sitesDes->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#deleteSite{{ $sitesDes->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
							</td>
						</tr>

						<!--modal -->
						<div class="modal fade" id="editSite{{ $sitesDes->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal- modal-dialog modal-" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-default">Edit Site Designation</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
					                  <div class="modal-body">
				                        <form method="POST" action="{{ route('siteDesignation.update',$sitesDes->id) }}">
						    				{{ csrf_field() }}  
						                	<div class="row">
						                		<div class="col s12">
						    	            		<div class="input-field col s12">
						    	            			<label for="sites_desc">Site Designation</label>
						    					        <input type="text" name="sites_desc" id="sites_desc" class="form-control" value="{{ $sitesDes->sites_desc }}"> 
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
						<div class="modal fade" id="deleteSite{{ $sitesDes->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
			              <div class="modal-dialog modal- modal-dialog modal-" role="document">
			                <div class="modal-content">
			                  <div class="modal-header">
			                    <h6 class="modal-title" id="modal-title-default">Please Confirm!</h6>
			                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			                      <span aria-hidden="true">×</span>
			                    </button>
			                  </div>
						                 <div class="modal-body">
					                        <form method="POST" action="{{ route('siteDesignation.destroy',$sitesDes->id) }}">
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

		<div class="modal fade" id="createSite" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal- modal-dialog modal-" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h6 class="modal-title" id="modal-title-default">Create Site Designation</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
	                  <div class="modal-body">
                        <form method="POST" action="{{ route('siteDesignation.store') }}">
		    				{{ csrf_field() }}  
		                	<div class="row">
		                		<div class="col s12">
		    	            		<div class="input-field col s12">
		    	            			<label for="sites_desc">Site Designation</label>
		    					        <input type="text" name="sites_desc" id="sites_desc" class="form-control"> 
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