@extends('settings.index')
@section('settings')	
                      	<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
						    <a class="navbar-brand" href="">Papers</a>
						    @include('partials._headerNav')
						    		<a data-toggle="modal" data-target="#createPaper" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
						            <span class="btn-inner--icon"></span>
						            <span class="btn-inner--text">
						            	<i class="fa fa-paperclip"></i>
						            	Add Paper
						            </span>
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
											<th>Papers</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach( $papers as $paper )
											<tr>
												<td>{{ $count ++ .'.' }}</td>
												<td>{{ $paper->name }}</td>
												<td>
	
													<a data-toggle="modal" data-target="#editPaper{{ $paper->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
												</td>
											</tr>

											<div class="modal fade" id="editPaper{{ $paper->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
								              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
								                <div class="modal-content">
								                  <div class="modal-header">
								                    <h6 class="modal-title" id="modal-title-default">Edit Paper</h6>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                      <span aria-hidden="true">×</span>
								                    </button>
								                  </div>
								                  <div class="modal-body">
							                        <form method="POST" action="{{ route('papers.update',$paper->id) }}">
									    				{{ csrf_field() }}  
									                	<div class="row">
									                		<div class="col s12">
									    	            		<div class="input-field col s12">
									    	            			<label for="paper">Paper</label>
									    					        <input type="text" name="paper" id="paper" class="form-control" value="{{ $paper->name }}"> 
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
										@endforeach
									</tbody>
								</table>
							</div>
						</div>	

	<div class="modal fade" id="createPaper" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-default">Create Papers</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('papers.store') }}">
	    				{{ csrf_field() }}  
	                	<div class="row">
	                		<div class="col s12">
	    	            		<div class="input-field col s12">
	    	            			<label for="paper">Paper</label>
	    					        <input type="text" name="paper" id="paper" class="form-control"> 
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