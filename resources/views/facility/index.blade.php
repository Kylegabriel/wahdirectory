@extends('settings.index')
@section('settings') 
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">FACILITY CONFIG</a>
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
          <a href="{{ route('facility.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="ADD PARTNER" >  
            <i class="fa fa-user-plus fa-2x"></i> ADD FACILITY CONFIG
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
          <th>Region</th>
          <th>Province</th>
          <th>Municipality</th>
          <th>Barangay</th>
          <th>Facility Name</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($facilities as $facility)
        <tr>
          <td>{{ $facility->id }}</td>
          <td>{{ $facility->region['region_name'] }}</td>
          <td>{{ $facility->province['province_name'] }}</td>
          <td>{{ $facility->municipality['muncity_name'] }}</td>
          <td>{{ $facility->barangay['brgy_name'] }}</td>
          <td>{{ $facility->facilities['hfhudname'] }}</td>
          <td>
            <a  href="{{ route('facility.edit',$facility->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
            <a data-toggle="modal" data-target="#activeInactive{{ $facility->id }}"  data-toggle="tooltip" data-placement="left"
                  class="btn btn-link text-{{ $facility->is_active == 'Y' ? 'primary' : 'danger' }}" 
                  title="{{ $facility->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
                <i class="fa {{ $facility->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
            </a>
          </td>
        </tr>

            <!-- Modal -->
            <div class="modal fade" id="activeInactive{{ $facility->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Please Confirm!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <h5>Would you like to {{ $facility->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
                    <h5>Site Personnel under this Facility Record will also {{ $facility->is_active == 'N' ? 'Activated' : 'Deactived' }}?</h5>
                    {!! Form::model($facility, ['route' => ['facilityActivation', $facility->id], 'method' => 'PUT']) !!}
                    <input type="hidden" name="is_active" id="is_active" value="{{ $facility->is_active == 'N' ? 'Y' : 'N' }}">
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                  {!! Form::close() !!}
                </div>
              </div>
            </div>
            <!-- Modal -->

        @endforeach         
      </tbody>
    </table>
  </div>  
</div>

@endsection
@section('scripts')        
    @include('partials._sitesScript')
@endsection
