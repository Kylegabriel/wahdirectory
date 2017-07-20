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
				@include('partials._search')
			</form>	
		</div>
	</div>

	<div class="scroll card" style="margin-top:-15px"> 
		<table class="table bordered centered highlight responsive-table">
			@include('partials._thead')
			<tbody>
				@foreach($partner as $partners)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $partners->last_name . ", " . $partners->first_name . " " . $partners->middle_name . " " }} @if($partners->suffix_name == 'NOTAP') @else {{ $partners->suffix_name }} @endif</td>
					@if($partners->gender == 'M')<td>Male</td>@elseif($partners->gender == 'F')<td>Female</td>@else<td></td>@endif
					<td>{{ $partners->organization }}</td>
					<td>{{ $partners->designation }}</td>
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
