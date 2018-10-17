@extends('layouts.app')
@section('stylesheets')

@endsection
@section('content')
<div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-text" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-text-1-tab" data-toggle="tab" href="#tabs-text-1" role="tab" aria-controls="tabs-text-1" aria-selected="true">Course</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-2-tab" data-toggle="tab" href="#tabs-text-2" role="tab" aria-controls="tabs-text-2" aria-selected="false">School</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-text-3-tab" data-toggle="tab" href="#tabs-text-3" role="tab" aria-controls="tabs-text-3" aria-selected="false">Papers</a>
                  </li>
                </ul>
</div>
              <div class="card shadow">
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="tabs-text-1" role="tabpanel" aria-labelledby="tabs-text-1-tab">

                    </div>
                    <div class="tab-pane fade" id="tabs-text-2" role="tabpanel" aria-labelledby="tabs-text-2-tab">
						<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
						    <a class="navbar-brand" href="">School</a>
						    @include('partials._headerNav')
						    		<a data-toggle="modal" data-target="#createSchool" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
						            <span class="btn-inner--icon"></span>
						            <span class="btn-inner--text"><i class="fa fa-graduation-cap"></i> Add School</span>
						      		</a>
						        </li>
						      </ul>
						    </div>
						</nav> 
						<div class="card shadow border-0"> <!-- start of card div -->
							<div class="card-body">  
								<table class="table">
									<thead>
										<tr>
											<th>ID#</th>
											<th>School</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach( $schools as $school )
											<tr>
												<td>{{ $school->id }}</td>
												<td>{{ $school->school }}</td>
												<td>
	
													<a data-toggle="modal" data-target="#editSchool{{ $school->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
												</td>
											</tr>

											<div class="modal fade" id="editSchool{{ $school->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
								              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
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
										@endforeach
									</tbody>
								</table>
							</div>
						</div>	
                    </div>



                    <div class="tab-pane fade" id="tabs-text-3" role="tabpanel" aria-labelledby="tabs-text-3-tab">
                      	<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
						    <a class="navbar-brand" href="">Papers</a>
						    @include('partials._headerNav')
						    		<a data-toggle="modal" data-target="#createPaper" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner">
						            <span class="btn-inner--icon"></span>
						            <span class="btn-inner--text"><i class="fa fa-graduation-cap"></i> Add Papers</span>
						      		</a>
						        </li>
						      </ul>
						    </div>
						</nav> 
						<div class="card shadow border-0"> <!-- start of card div -->
							<div class="card-body">  
								<table class="table">
									<thead>
										<tr>
											<th>ID#</th>
											<th>Papers</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										@foreach( $papers as $paper )
											<tr>
												<td>{{ $paper->id }}</td>
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
                    </div>
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