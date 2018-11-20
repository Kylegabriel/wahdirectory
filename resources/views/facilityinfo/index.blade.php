@extends('layouts.app')
@section('content')

<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">FACILITY INFO</a>
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
          <a href="{{ route('facilityinfo.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD FACILITY INFO" >  
            <i class="fa fa-building fa-2x"></i> ADD FACILITY INFO
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
					<th>ID.</th>
					<th>Facility Name</th>
					<th>Email</th>
					<th>Contact</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
			@foreach($facility as $info)
				<tr>
					<td>{{ $info->id }}</td>
					<td>{{ $info->facilityConfig->facilities->hfhudname }}</td>
					<td>{{ $info->email . '/' . $info->secondary_email }}</td>
					<td>{{ $info->primary_contact . '/' . $info->secondary_contact }}</td>					
					<td>
						<a  href="{{ route('facilityinfo.edit',$info->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
						<a  href="{{ route('facilityinfo.show',$info->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-clipboard fa-2x"></i></a>
						<a data-toggle="modal" data-target="#activeInactive{{ $info->id }}"  data-toggle="tooltip" data-placement="left"
							class="btn btn-link text-{{ $info->is_active == 'Y' ? 'primary' : 'danger' }}" 
							title="{{ $info->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
						<i class="fa {{ $info->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
						</a>
					</td>
				</tr>

						<!-- Modal -->
						<div class="modal fade" id="activeInactive{{ $info->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						  <div class="modal-dialog modal-dialog-centered" role="document">
						    <div class="modal-content">
						      <div class="modal-header">
						        <h5 class="modal-title" id="exampleModalLongTitle">Please Confirm!</h5>
						        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
						          <span aria-hidden="true">&times;</span>
						        </button>
						      </div>
						      <div class="modal-body">
						        <h5>Would you like to {{ $info->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
						        {!! Form::model($info, ['route' => ['FacilityInfoActivation', $info->id], 'method' => 'PUT']) !!}
						        <input type="hidden" name="is_active" id="is_active" value="{{ $info->is_active == 'N' ? 'Y' : 'N' }}">
						      </div>
						      <div class="modal-footer">
						      	<button type="submit" class="btn btn-primary">Save changes</button>
						        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						      </div>
						      {!! Form::close() !!}
						    </div>
						  </div>
						</div>

			 @endforeach					  
			</tbody>
		</table>
	</div>	
</div>
@endsection
