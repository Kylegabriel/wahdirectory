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
			<thead>
				<tr>
					<th>No.</th>
					<th>Name</th>
					<th>Gender</th>
					<th>Organization</th>
					<th>Designation</th>
					<th>Status</th>
					<th><i class="material-icons prefix">phone</i></th>
					<th><i class="material-icons prefix">mail_outline</i></th>
					<th>Date of Birth</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>

			</tbody>
		</table>
	</div>	
</div>
@endsection
