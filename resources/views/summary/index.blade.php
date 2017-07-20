@extends('layouts.app')
@section('stylesheets')
    <style>
              .scroll{
                height: 340px;
                overflow-y: auto;
              }
    </style>
@endsection
@section('content')

<div class="card z-depth-5" style="padding:10px">
        <div class="indigo lighten-5">
                <form method="GET" action="{{ route('summary.index') }}">
                    <div class="row">
                        <div class="input-field col s3">
                            <select type="text" id="sites" name="sites">
                              <option value="" disabled selected>Choose your option</option>
                              <option value="L">Luzon</option>
                              <option value="V">Visayas</option>
                              <option value="M">Mindanao</option>
                            </select>
                            <label for="sites">Sites</label>
                        </div>
                        <div class="input-field col s3">
                            <i class="material-icons prefix">add_location</i>
                            <select type="text" id="partnerDesignation" name="partnerDesignation">
                              <option value="" disabled selected>Choose your option</option>
                              @foreach( App\PartnerDesignation::get() as $designation ) { ?>
                                    <option value="{{ $designation['designation_id'] }}">{{ $designation['designation'] }}</option>
                              @endforeach  
                            </select>
                            <label for="partnerDesignation">Designation</label>
                        </div>
                        <div class="input-field col s4">
                            <i class="material-icons prefix">place</i>
                            <select type="text" id="partnerOrganization" name="partnerOrganization">
                              <option value="" disabled selected>Choose your option</option>
                              @foreach( App\PartnerOrganization::get() as $organization ) { ?>
                                    <option value="{{ $organization['organization_id'] }}">{{ $organization['organization'] }}</option>
                              @endforeach  
                            </select>
                            <label for="partnerOrganization">Organization</label>
                        </div>
                        <div class="input-field col s2">
                             <button type="submit" class="waves-effect waves-light btn"><i class="material-icons md-26">search</i></button>
                        </div>
                    </div>
                    </form>
        </div>
        <h6>Registered {{ $count }}</h6>
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
                                    <th>Sites</th>
                                    <th><i class="material-icons prefix">phone</i></th>
                                    <th><i class="material-icons prefix">mail_outline</i></th>
                                    <th>Date of Birth</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($summary as $summ)
                                <tr>
                                    <td>{{ $count2++ .'.' }}</td>
                                    <td>{{ $summ->last_name . ", " . $summ->first_name . " " . $summ->middle_name . " " }} @if($summ->suffix_name == 'NOTAP') @else {{ $summ->suffix_name }} @endif</td>
                                    @if($summ->gender == 'M')<td>Male</td>@elseif($summ->gender == 'F')<td>Female</td>@else<td></td>@endif
                                    <td>{{ $summ->partnerOrganization['organization'] }}</td>
                                    <td>{{ $summ->partnerDesignation['designation'] }}</td>
                                    <td>@if($summ->sites == 'L') Luzon @elseif($summ->sites == 'V') Visayas @elseif($summ->sites == 'M') Mindanao @endif</td>
                                    <td>{{ $summ->primary_contact . ', ' .$summ->secondary_contact}}</td>
                                    <td>{{ $summ->email . ', ' . $summ->secondary_email }}</td>
                                    @if($summ->birthdate == '0000-00-00' || $summ->birthdate == NULL)
                                    <td></td>
                                    @else
                                    <td>{{ date('F j, Y', strtotime($summ->birthdate)) }}</td>
                                    @endif
                                    <th>
                                        <a href="{{ route('partner.edit',$summ->id) }}" class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="Edit"><i class="material-icons red-text text-darken-1">mode_edit</i></a>
                                        <a class="waves-effect waves-light tooltipped" data-position="bottom" data-delay="50" data-tooltip="{{ $summ->is_active == 'Y' ? 'Active' : 'In Active' }}"><i class="material-icons {{ $summ->is_active == 'Y' ? '' : 'deep-orange-text text-lighten-2' }}">{{ $summ->is_active == 'Y' ? 'visibility' : 'visibility_off' }}</i></a>
                                    </th>
                                </tr> 
                                @endforeach   
                            </tbody>
                        </table>
                    </div>     

@endsection
