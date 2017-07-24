@extends('layouts.app')
@section('stylesheets')
    <style>
            .modal { 
                width: 40% !important;
                max-height: 90% !important;
              }
              .scroll{
                height: 380px;
                overflow-y: auto;
              }
    </style>
@endsection
@section('content')

<div class="card z-depth-5" style="padding:3px">

	<div class="row indigo lighten-5">
		<div class="col s4"><h5>Partner Organization</h5></div>
		<div class="col s8">
			<form method="GET" action="{{ route('partner.index') }}">
				<div class="row">
			        <div class="input-field col s10">
			          <input type="search" id="search" name="search" placeholder="Search">
			          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
			          <i class="material-icons">close</i>
			        </div>
			        <div class="input-field col s2">
			        	<button type="submit" class="waves-effect waves-light btn"><i class="material-icons">search</i></button>
			        </div>
				</div>
			</form>	
		</div>
	</div>
	<hr>
	<div class="scroll card"> 
		<table class="table bordered centered highlight responsive-table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Organization</th>
					<th>Designation</th>
					<th>Province</th>
					<th><i class="material-icons prefix">phone</i></th>
					<th><i class="material-icons prefix">mail_outline</i></th>
					<th>Date of Birth</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($partner as $partners)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $partners->last_name . ", " . $partners->first_name . " " . $partners->middle_name . " " }} @if($partners->suffix_name == 'NOTAP') @else {{ $partners->suffix_name }} @endif</td>
					@if($partners->gender == 'M')<td>Male</td>@elseif($partners->gender == 'F')<td>Female</td>@else<td></td>@endif
					<td>{{ $partners->organization }}</td>
					<td>{{ $partners->designation }}</td>
					<td>{{ $partners->province }}</td>
					<td>{{ $partners->primary_contact . ' ' .$partners->secondary_contact}}</td>
					<td>{{ $partners->email . ' ' . $partners->secondary_email }}</td>
					@if($partners->birthdate == '0000-00-00' || $partners->birthdate == NULL)
					<td></td>
					@else
					<td>{{ date('F j, Y', strtotime($partners->birthdate)) }}</td>
					@endif
					<td>
						<a href="{{ route('partner.edit',$partners->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a>
						@if($partners->is_active == '')
						@else
						<a data-target="{{ route('partner.edit',$partners->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click Edit to Change {{ $partners->is_active == 'Y' ? ' Inactive' : 'Active' }}">@if( $partners->is_active == 'Y' )<i class="material-icons">visibility</i>@else<i class="material-icons deep-orange-text text-lighten-2">visibility_off</i>@endif</a>
						@endif
					</td>
				</tr>
			@endforeach					  
			</tbody>
		</table>
	</div>	
	
</div>
@endsection
