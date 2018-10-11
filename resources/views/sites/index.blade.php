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
         	<a href="{{ route('sites.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner" >  
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
					<td>{{ $site->gender }}</td>
					<td>{{ $site->designations['sites_desc'] }}</td>
					<td>{{ $site->region['region_name'] . ", " . $site->province['province_name'] . ", " . $site->municipality['muncity_name'] . ", " }}</td>
					<td>{{ $site->primary_contact . ' ' .$site->secondary_contact}}</td>
					<td>{{ $site->email . ' ' . $site->secondary_email }}</td>
					<td>{{ $site->birthdate }}</td>
					<td>
						<a  href="{{ route('sites.edit',$site->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
						<!-- <a data-toggle="modal" data-target="#sitesActivation" class="btn btn-link text-primary" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-eye fa-2x"></i></a> -->
						</a>
					</td>
				</tr>
			@endforeach				  
			</tbody>
		</table>
	</div>			
</div>
@endsection
