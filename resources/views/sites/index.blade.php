@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-2">
		<div class="card shadow border-0 border-primary">
		  <div class="card-body">
		    <h5 class="card-title" style="text-align: center;text-decoration: underline;">ADMINISTRATOR FUNCTIONS</h5>
		    <p><i class="fas fa-square fa-2x" style="background-color:blue;color:blue;"></i> SUPERVISORY</p>
		    <p><i class="fas fa-square fa-2x" style="background-color:green;color:green"></i> REPORTS OFFICER</p>
		    <p><i class="fas fa-square fa-2x" style="background-color:yellow;color:yellow"></i> DATA QUALITY CHECK</p>
		    <p><i class="fas fa-square fa-2x" style="background-color:purple;color:purple"></i> TECHNICAL SUPPORT</p>
		  </div>
		</div>
	</div>
	<div class="col-md-10">
		<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
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
		         	<a href="{{ route('sites.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD SITE PERSONNEL" >  
		            <i class="fa fa-globe fa-2x"></i> ADD SITES PERSONNEL
		      		</a>
		        </li>
		      </ul>
		    </div>
		</nav>
		<div class="card shadow border-0 border-primary">
			<div class="card-body">
				<table id="example" class="table-striped ">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Designation</th>
							<th>Facility Name</th>
							<th>Primary Contact</th>
							<th>Email</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach($sites as $site)
						<tr>
							<td>{{ $count++ .'.' }}</td>
							<td style="border: 5px solid 
		                        @if($site->system_admin_id == 1) blue 
		                        @elseif($site->system_admin_id == 2) Lime 
		                        @elseif($site->system_admin_id == 3) yellow
		                        @elseif($site->system_admin_id == 4) purple
		                        @endif;font-size:20px;padding: 0 0 0 10px">
		                     	{{ $site->last_name . ", " . $site->first_name . " " . $site->middle_name . " " }} 
		                     	{{ $site->suffix_name == 'NOTAP' ? ' ' : $site->siteSuffix['suffix_desc'] }}</td>
							<td>{{ $site->designations['sites_desc'] }}</td>
							<td>{{ $site->facilities['hfhudname'] }}</td>
							<td>{{ $site->primary_contact }}</td>
							<td>{{ $site->email }}</td>
							<td>
								<a  href="{{ route('sites.edit',$site->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
								<a data-toggle="modal" data-target="#disable{{ $site->id }}" class="btn btn-link text-primary" data-toggle="tooltip" data-placement="left" title="Activate"><i class="fa fa-eye fa-2x"></i></a>
								</a>
								<a  href="{{ route('sites.show',$site->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-clipboard fa-2x"></i></a>
							</td>
						</tr>
						@include('partials._activeInactiveSites')
						@endforeach				  
					</tbody>
				</table>
			</div>			
		</div>
	</div>
</div>
@endsection