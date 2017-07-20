@extends('layouts.app')
@section('stylesheets')
    <style>
            .modal { 
                width: 80% !important;
                max-height: 87% !important;
              }
              .scroll{
                height: 380px;
                overflow-y: auto;
              }
    </style>
@endsection
@section('content')

<div class="card z-depth-5" style="padding:5px">
    <div class="row indigo lighten-5"><div class="col s4"><h5>WAH-NGO</h5></div>
        <div class="col s8">
            <form method="GET" action="{{ route('profile.index') }}">
                @include('partials._search')
            </form> 
        </div>
    </div>
            <div class="scroll card" style="margin-top:-15px">
                <table class="bordered centered highlight responsive-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>Designation</th>
                            <th><i class="material-icons prefix">local_phone</i></th>
                            <th><i class="material-icons prefix">mail_outline</i></th>
                            <th>Date of Birth</th>
                            <th>Date of Hired</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user as $users)
                        <tr>
                            <td>{{ $count++ . '.' }}</td>
                            <td>{{ $users->last_name . ", " . $users->first_name . " " . $users->middle_name . " " }}@if($users->suffix_name == 'NOTAP') @else {{ $users->suffix['suffix_desc'] }} @endif</td>
                            @if($users->gender == 'M')<td>Male</td>@elseif($users->gender == 'F')<td>Female</td>@else<td></td>@endif
                            <td>{{ $users->designations['role_name'] }}</td>
                            <td>{{ $users->primary_contact . ' ' . $users->secondary_contact }}</td>
                            <td>{{ $users->email . ' ' . $users->secondary_email }}</td>
                            @if($users->birthdate == '0000-00-00' || $users->birthdate == NULL)
                            <td></td>
                            @else
                            <td>{{ date('F j, Y', strtotime($users->birthdate)) }}</td>
                            @endif
                            @if($users->datehired == '0000-00-00' || $users->datehired == NULL)
                            <td></td>
                            @else
                            <td>{{ date('F j, Y', strtotime($users->datehired)) }}</td>
                            @endif
                            <td>
                                <a href="{{ route('profile.edit',$users->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="small material-icons red-text text-darken-1">mode_edit</i></a>
                                <a data-toggle="modal" data-target="partnerIsactive-{{ $users->is_active }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $users->is_active == 'Y' ? 'Active' : 'In Active' }}">@if( $users->is_active == 'Y' )<i class="material-icons">visibility</i>@else<i class="material-icons deep-orange-text text-lighten-2">visibility_off</i>@endif</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection
