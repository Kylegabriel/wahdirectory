@extends('layouts.app')
@section('content')
<nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
    <a class="navbar-brand" href="">WAH-NGO</a>
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
          <a href="{{ route('profile.create') }}" role="button" class="btn btn-link text-default text-white" data-toggle="tooltip" data-placement="left" title="Add WAH-NGO" >
            <span class="btn-inner--icon"></span>
            <span class="btn-inner--text"><i class="fa fa-user-plus fa-2x"></i> Add WAH-NGO</span>
            </a>
        </li>
      </ul>
    </div>
</nav>
<div class="card shadow border-0  border-primary">
    <div class="card-body">
                <table id="example" class="table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Birthdate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $profile)
                        <tr>
                            <td>{{ $count++ . '.' }}</td>
                            <td>{{ $profile->last_name . ", " . $profile->first_name . " " . $profile->middle_name . " " }}@if($profile->suffix_name == 'NOTAP') @else {{ $profile->suffix['suffix_desc'] }} @endif</td>
                            <td>{{ $profile->gender }}</td>
                            <td>{{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}</td>
                            <td>
                              <a  href="{{ route('profile.edit',$profile->id) }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
                              <a  href="{{ route('profile.show',$profile->id) }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-clipboard fa-2x"></i></a>
                              <a data-toggle="modal" data-target="#activeInactive{{ $profile->id }}"  data-toggle="tooltip" data-placement="left"
                                class="btn btn-link text-{{ $profile->is_active == 'Y' ? 'primary' : 'danger' }}" 
                                title="{{ $profile->is_active == 'Y' ? 'Deactivate' : 'Activate' }}">
                              <i class="fa {{ $profile->is_active == 'Y' ? 'fa-eye fa-2x' : 'fa-eye-slash fa-2x' }}"></i>
                              </a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="activeInactive{{ $profile->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Please Confirm!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <h5>Would you like to {{ $profile->is_active == 'N' ? 'Activate' : 'Deactive' }} this record?</h5>
                                    {!! Form::model($profile, ['route' => ['ProfileActivation', $profile->id], 'method' => 'PUT']) !!}
                                    <input type="hidden" name="is_active" id="is_active" value="{{ $profile->is_active == 'N' ? 'Y' : 'N' }}">
                                  </div>
                                  <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  </div>
                                  {!! Form::close() !!}
                                </div>
                              </div>
                            </div>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
       </div>   
    </div>   
@endsection