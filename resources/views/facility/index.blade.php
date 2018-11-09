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
          <td><a  href="{{ route('facility.edit',$facility->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a></td>
        </tr>
        @endforeach         
      </tbody>
    </table>
  </div>  
</div>

@endsection
@section('scripts')        
    @include('partials._sitesScript')
@endsection
