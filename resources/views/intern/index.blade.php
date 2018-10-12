@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-success rounded">
    <a class="navbar-brand" href="">Interns</a>
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
          <a href="{{ route('interns.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add Partner" >  
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add Intern</span>
      		</a>
        </li>
      </ul>
    </div>
</nav> 
<div class="card shadow border-0  border-primary">
	<div class="card-body">   
		<table id="example" class="table-striped" style="width:100%">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Phone</th>
					<th>Mail</th>
					<th>Course</th>
					<th>School</th>
					<th>Papers</th>
					<th>Date Start</th>
					<th>Date End</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($interns as $intern)
					<tr>
						<td>{{ $count++ .'.' }}</td>
						<td>{{ $intern->last_name . ", " . $intern->first_name . " " . $intern->middle_name . " " }} @if($intern->suffix_name == 'NOTAP') @else {{ $intern->suffix_name }} @endif</td>
						<td>{{ $intern->primary_contact }}</td>
						<td>{{ $intern->email }}</td>
						<td>{{ $intern->courses['course'] }}</td>
						<td>{{ $intern->schools['school'] }}</td>
						<td>
							@foreach($intern->tags as $tag)
								<span class="badge badge-pill badge-primary text-uppercase">{{ $tag->name }}</span>
							@endforeach
						</td>
						<td>{{ date('F j, Y', strtotime($intern->date_start)) }}</td>
						<td>{{ date('F j, Y', strtotime($intern->date_end)) }}</td>
						<td>
							<a  href="{{ route('interns.edit',$intern->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
						</td>
					</tr>
				@endforeach	  
			</tbody>
		</table>			
	</div>
</div>


@endsection