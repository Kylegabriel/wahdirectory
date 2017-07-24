@extends('layouts.app')
@section('stylesheets')
    <style>
            .scroll{
                height: 380px;
                overflow-y: auto;
            }
            .modal { 
                width: 35% !important;
                max-height: 60% !important;
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
						<td>{{ substr($intern->courses['course'],0,4) }} {{  strlen($intern->courses['course']) > 4 ? "..." : "" }}</td>
						<td>{{ substr($intern->schools['school'],0,4) }} {{  strlen($intern->schools['school']) > 4 ? "..." : "" }}</td>
						<td>
							{{ str_replace('$intern->tags','','...') }}
						</td>
						<td>{{ date('F j, Y', strtotime($intern->date_start)) }}</td>
						<td>{{ date('F j, Y', strtotime($intern->date_end)) }}</td>
						<td>
							<a href="{{ route('interns.edit',$intern->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a>
							<a data-target="show{{ $intern->id }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="View"><i class="material-icons">visibility</i></a>
						</td>
					</tr>

					  <!-- Modal Structure -->
						  <div id="show{{ $intern->id }}" class="modal modal-fixed-footer">
						    <div class="modal-content">
							    <div class="row">
							      <div class="col s12">
							        <div class="card-panel">
							        	<span class="card-title"><b>Intern Information</b></span><br>
							        	<b>Name:</b> {{ $intern->last_name .', ' . $intern->first_name . ' ' . $intern->middle_name }}<br>
							        	<b>Contact Number:</b> {{ $intern->primary_contact }}<br>
										<b>Email:</b> {{ $intern->email }}<br>
										<b>Course:</b> {{ $intern->courses['course'] }}<br>
										<b>School:</b> {{ $intern->schools['school'] }}<br>
										<b>Papers:</b>@foreach($intern->tags as $tag )
										      	{{ $tag->name . ', ' }} 
										    @endforeach <br>
										<b>Date Start:</b> {{ date('F j, Y', strtotime($intern->date_start)) }}<br>
										<b>Date End:</b> {{ date('F j, Y', strtotime($intern->date_end)) }}
							        </div>
							      </div>
							    </div>
						    </div>
						    <div class="modal-footer">
						      <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Close</a>
						    </div>
						  </div>
				@endforeach	  
			</tbody>
		</table>		
	</div>	
</div>
@endsection
