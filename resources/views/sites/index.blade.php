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
		<div class="col s4"><h5>Sites</h5></div>
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
					<th>Designation</th>
					<th>Region</th>
					<th>Province</th>
					<th>Municipality</th>
					<th>Site</th>
					<th><i class="material-icons prefix">phone</i></th>
					<th><i class="material-icons prefix">mail_outline</i></th>
					<th>Date of Birth</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($site as $site)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $site->last_name . ", " . $site->first_name . " " . $site->middle_name . " " }} @if($site->suffix_name == 'NOTAP') @else {{ $site->suffix_name }} @endif</td>
					@if($site->gender == 'M')<td>Male</td>@elseif($site->gender == 'F')<td>Female</td>@else<td></td>@endif
					<td>{{ $site->designations['sites_desc'] }}</td>
					<td>{{ $site->region->region_name }}</td>
					<td>{{ $site->province->province_name }}</td>
					<td>{{ $site->municipality->muncity_name }}</td>
					<td>@if($site->site == 'L') Luzon @elseif($site->site == 'V') Visayas @else Mindanao @endif</td>
					<td>{{ $site->primary_contact . ' ' .$site->secondary_contact}}</td>
					<td>{{ $site->email . ' ' . $site->secondary_email }}</td>
					@if($site->birthdate == '0000-00-00' || $site->birthdate == NULL)
					<td></td>
					@else
					<td>{{ date('F j, Y', strtotime($site->birthdate)) }}</td>
					@endif
					<td>
						<a href="{{ route('sites.edit',$site->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a>
						@if($site->is_active == '')
						@else
						<a data-target="{{ route('sites.edit',$site->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Click Edit to Change {{ $site->is_active == 'Y' ? ' Inactive' : 'Active' }}">@if( $site->is_active == 'Y' )<i class="material-icons">visibility</i>@else<i class="material-icons deep-orange-text text-lighten-2">visibility_off</i>@endif</a>
						@endif
					</td>
				</tr>	
			@endforeach					  
			</tbody>
		</table>
	</div>	
	
</div>
@endsection
