@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
    <a class="navbar-brand" href="">Partner</a>
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
          <a href="{{ route('partner.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner" >  
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add Partner</span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 
<div class="card shadow border-0">
	<div class="card-body">  
		<table id="example" class="table-striped" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Organization</th>
					<th>Designation</th>
					<th>Province</th>
					<th>Phone</th>
					<th>Email</th>
					<th>Birthdate</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($partner as $partners)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $partners->last_name . ", " . $partners->first_name . " " . $partners->middle_name . " " }} @if($partners->suffix_name == 'NOTAP') @else {{ $partners->suffix_name }} @endif</td>
					<td>{{ $partners->gender }}</td>
					<td>{{ $partners->organization }}</td>
					<td>{{ $partners->designation }}</td>
					<td>{{ $partners->partnerProvince['province_name'] }}</td>
					<td>{{ $partners->primary_contact . ' ' .$partners->secondary_contact}}</td>
					<td>{{ $partners->email . ' ' . $partners->secondary_email }}</td>
					<td>{{ $partners->birthdate }}</td>
					<td>
						<a  href="{{ route('partner.edit',$partners->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
            			@if($partners->is_active == '')
						@else
						@endif
					</td>
				</tr>
			 @endforeach					  
			</tbody>
		</table>
	</div>	
</div>
@endsection
