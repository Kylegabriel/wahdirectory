@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
    <a class="navbar-brand" href="">Sites</a>
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
         	<a role="button" data-toggle="modal" data-target="#createSites" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Sites" >
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-globe fa-2x"></i> Add Sites</span>
      		</a>
        </li>
      </ul>
    </div>
</nav>
<div class="card shadow border-0 border-primary">
	<div class="card-body">
		<table id="example" class="table-striped">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Designation</th>
					<th>Place</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Birthdate</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($sites as $site)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $site->last_name . ", " . $site->first_name . " " . $site->middle_name . " " }} @if($site->suffix_name == 'NOTAP') @else {{ $site->suffix_name }} @endif</td>
					@if($site->gender == 'M')<td>Male</td>@elseif($site->gender == 'F')<td>Female</td>@else<td></td>@endif
					<td>{{ $site->designations['sites_desc'] }}</td>
					<td>{{ $site->region['region_name'] . ", " . $site->province['province_name'] . ", " . $site->municipality['muncity_name'] . ", " }}</td>
					<td>{{ $site->primary_contact . ' ' .$site->secondary_contact}}</td>
					<td>{{ $site->email . ' ' . $site->secondary_email }}</td>
					<td>{{ $site->birthdate }}</td>
					<td>
						<a data-toggle="modal" data-target="#editSites{{ $site->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
						<!-- <a data-toggle="modal" data-target="#sitesActivation" class="btn btn-link text-primary" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-eye fa-2x"></i></a> -->
						</a>
					</td>
				</tr>


				<div class="modal fade" id="editSites{{ $site->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog modal-lg" role="document">
					    <div class="modal-content">
					      <div class="modal-header bg-primary">
					        <h5 class="modal-title text-white" id="exampleModalLabel">Edit Sites Partner</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        {!! Form::model($site, ['route' => ['sites.update', $site->id], 'method' => 'PUT']) !!}
					                {{ csrf_field() }} 
											<div class="row">
					                            <div class="col-md-3">
					                                {{ Form::label('last_name','Last Name*') }}
					                                {{ Form::text('last_name',null,['class'=>'form-control','id'=>'last_name']) }} 
					                            </div>
					                            <div class="col-md-3">
					                                {{ Form::label('first_name','First Name*') }}
					                                {{ Form::text('first_name',null,['class'=>'form-control','id'=>'first_name']) }} 
					                            </div>
					                            <div class="col-md-3">
					                                {{ Form::label('middle_name','Middle Name*') }}
					                                {{ Form::text('middle_name',null,['class'=>'form-control','id'=>'middle_name']) }} 
					                            </div>
					                            <div class="col-md-3">
													{{ Form::label('suffix_name', "Suffix Name") }}
													{{ Form::select('suffix_name', $suffix,null, ['class' => 'form-control','id' => 'suffix_name','name' => 'suffix_name']) }}
					                            </div>
					                    </div>    

					                    <div class="row">
					                        <div class="col-md-3">
					                            {{ Form::label('site','Site*') }}
					                            <select type="text" id="site" name="site" class="form-control">
					                                <option value="" disabled selected>Choose your option</option>
					                                <option value="L">Luzon</option>
					                                <option value="V">Visayas</option>
					                                <option value="M">Mindanao</option>
					                            </select>
					                        </div>
					                        <div class="col-md-3">
					                            {{ Form::label('region','Region*') }}
					                            <select type="text" id="region" name="region" class="form-control">
					                            </select>
					                        </div>
					                        <div class="col-md-3">
					                            {{ Form::label('province','Province*') }}
					                            <select type="text" id="province" name="province" class="form-control">
					                            </select>
					                        </div>
					                        <div class="col-md-3">
					                            {{ Form::label('municipality','Municipality*') }}
					                            <select type="text" id="municipality" name="municipality" class="form-control">
					                            </select>
					                        </div>
					                    </div>
					                     
					                    <div class="row">
					                        <div class="col-md-4">
					                            {{ Form::label('primary_contact','Primary Contact*') }}
					                            {{ Form::text('primary_contact',null,['class'=>'form-control','id'=>'primary_contact','data-length'=>'11','placeholder'=>'0930*******']) }} 
					                        </div>
					                        <div class="col-md-4">
					                            {{ Form::label('secondary_contact','Secondary Contact*') }}
					                            {{ Form::text('secondary_contact',null,['class'=>'form-control','id'=>'secondary_contact','data-length'=>'11','placeholder'=>'0906*******']) }} 
					                        </div>
					                        <div class="col-md-4">
					                            {{ Form::label('sitDesignation','Designation*') }}
					                            <select type="text" id="sitDesignation" name="sitDesignation" class="form-control">
					                              <option value="" disabled selected>Choose your option</option>
					                             @foreach($siteDesig as $desig)
					                              <option value="{{ $desig['sites_code'] }}">{{ $desig['sites_desc'] }}</option>  
					                              @endforeach
					                            </select>
					                        </div>
					                    </div> 

					                    <div class="row">
					                        <div class="col-md-6">
					                            {{ Form::label('email','Email*') }}
					                            {{ Form::email('email',null,['class'=>'form-control','id'=>'email']) }} 
					                        </div>
					                        <div class="col-md-6">
					                            {{ Form::label('secondary_email','Secondary Email*') }}
					                            {{ Form::email('secondary_email',null,['class'=>'form-control','id'=>'secondary_email']) }} 
					                        </div> 
					                    </div>  
					                    <div class="row">
					                        <div class="col-md-4">
					                            {{ Form::label('status','Status*') }}
					                            <select type="text" id="status" name="status" class="form-control">
					                                <option value="" disabled selected>Choose your option</option>
					                                <option value="Y">Site Partner</option>
					                                <option value="N">Warm Leads</option>
					                            </select>
					                        </div>
					                        <div class="col-md-4">
					                            {{ Form::label('date_of_birth','Date of Birth**') }}
					                            <input type="date" name="date_of_birth" id="date_of_birth" class="form-control">
					                        </div> 
					                        <input type="hidden" name="is_active" id="is_active" value="{{ $site->is_active == 'Y' ? 'Y' : 'N' }}">
					                        <div class="col-md-4">
					                            {{ Form::label('gender','Gender*') }}
					                            <select type="text" id="gender" name="gender" class="form-control">
					                                <option value="" disabled selected>Choose your option</option>
					                                <option value="M">Male</option>
					                                <option value="F">Female</option>
					                            </select>
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



											<div class="modal fade" id="sitesActivation" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
								              <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
								                <div class="modal-content">
								                  <div class="modal-header">
								                    <h6 class="modal-title" id="modal-title-default">Edit School</h6>
								                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                      <span aria-hidden="true">×</span>
								                    </button>
								                  </div>
								                  <div class="modal-body">
							                        <form method="POST" action="">
									    				{{ csrf_field() }}  
									                	<div class="row">
									                		<div class="col s12">
									    	            		<div class="input-field col s12">
									    	            			<label for="schools">School</label>
									    					        <input type="text" name="schools" id="schools" class="form-control" value=""> 
									    					    </div>
									    	            	</div>
									    	            </div>	    
								                  </div>
								              	  <div class="modal-footer">
								                    <button type="submit" class="btn btn-primary">Save changes</button>
								                    <button type="button" class="btn btn-link  ml-auto" data-dismiss="modal">Close</button>
								                  	{{ method_field('PUT') }}
								                  </div>
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
@endsection
