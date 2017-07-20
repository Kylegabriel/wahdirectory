@extends('layouts.app')
@section('stylesheets')
    <style>
            .modal { 
                width: 80% !important;
                max-height: 87% !important;
              }
              .scroll{
                height: 450px;
                overflow-y: auto;
              }
    </style>
@endsection
@section('content')
<div class="card z-depth-5" style="padding:10px">
	<div class="scroll card"> 
		<table class="table bordered centered highlight responsive-table">
			@include('partials._thead')
			<tbody>
				@foreach($partner as $partners)
				<tr>
					<td>{{ $count++ .'.' }}</td>
					<td>{{ $partners->last_name . ", " . $partners->first_name . " " . $partners->middle_name . " " }} @if($partners->suffix_name == 'NOTAP') @else {{ $partners->partnerSuffix['suffix_desc'] }} @endif</td>
					@if($partners->gender == 'M')<td>Male</td>@elseif($partners->gender == 'F')<td>Female</td>@else<td></td>@endif
					<td>{{ $partners->partnerOrganization['organization'] }}</td>
					<td>{{ $partners->partnerDesignation['designation'] }}</td>
					<td>{{ $partners->primary_contact . ' ' .$partners->secondary_contact}}</td>
					<td>{{ $partners->email . ' ' . $partners->secondary_email }}</td>
					@if($partners->birthdate == '0000-00-00' || $partners->birthdate == NULL)
					<td></td>
					@else
					<td>{{ date('F j, Y', strtotime($partners->birthdate)) }}</td>
					@endif
					<td>
						<a href="{{ route('partner.edit',$partners->id ) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>	
</div>
@endsection
