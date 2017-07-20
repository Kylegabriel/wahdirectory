@extends('layouts.app')
@section('stylesheets')
    <style>
            .modal { 
                width: 40% !important;
                max-height: 50% !important;
              }
            .scroll{
                height: 380px;
                overflow-y: auto;
            }
    </style>
@endsection
@section('content')
<div class="card z-depth-5" style="padding:5px">
<div class="row  indigo lighten-5">
	<div class="col s4"><h5>Interns</h5></div>
	<div class="col s8">
		<form method="GET" action="{{ route('interns.index') }}">
			@include('partials._search')
		</form>	
	</div>
</div>	
	<div class="scroll card" style="margin-top:-15px"> 
		<table class="table bordered centered highlight responsive-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th><i class="material-icons prefix">phone</i></th>
					<th><i class="material-icons prefix">mail_outline</i></th>
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
						<td>{{ $intern->last_name .', ' . $intern->first_name . ' ' . $intern->middle_name }}</td>
						<td>{{ $intern->primary_contact }}</td>
						<td>{{ $intern->email }}</td>
						<td>{{ $intern->courses['course'] }}</td>
						<td>{{ $intern->schools['school'] }}</td>
						<td>@foreach($intern->tags as $tag )
						      	{{ $tag->name . ', ' }} 
						    @endforeach
						</td>
						<td>{{ date('F j, Y', strtotime($intern->date_start)) }}</td>
						<td>{{ date('F j, Y', strtotime($intern->date_end)) }}</td>
						<td><a href="{{ route('interns.edit',$intern->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a></td>
					</tr>
				@endforeach	  
			</tbody>
		</table>		
	</div>	
</div>
@endsection
