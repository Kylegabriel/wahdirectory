@extends('layouts.app')
@section('stylesheets')
  {!! Html::style('/css/show.css') !!}
@endsection
@section('content')

<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="card shadow">
          <div class="card-header">
              WAH-STAFF RECORD
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="{{ isset( $profile->image ) ? asset('img/' . $profile->image) : asset('img/default.png') }}" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $profile-> first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name }}</h4>
                {{ $profile->designations['role_name'] }}<br>
                 This record is {{ $profile->is_active == 'Y' ? 'Active' : 'Inactive' }}<br>
                 Birtdate: {{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}<br>
                 Date Hired: {{ $profile->datehired == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->datehired)) }}<br>
                 Gender: {{ $profile->gender == 'M' ? 'Male' : 'Female' }}<br>
                 Registered by : {{ $profile->user->first_name . ' ' . $profile->user->middle_name . ' ' . $profile->user->last_name . ' ' }}
                 @if($profile->user->suffix_name == 'NOTAP') @else {{ $profile->user->suffix_name }} @endif
              </div>
            </div>
            <div class="profile-comments__controls">
            <a href="{{ route('profile.edit',$profile->id) }}"><i class="fa fa-edit"></i></a>
            </div>
          </div>
        </div>

        <br>
        <!-- User info -->
        <div class="card shadow">
          <div class="card-header">
              Other Details
          </div>
          <div class="card-body">
            <table class=" profile__table">
              <tbody>
                <tr>
                  <th><strong>MAILING ADDRESS :</strong></th>
                  <td>{{ $profile->mailing_address }}</td>
                </tr>
                <tr>
                  <th><strong>PHILHEALTH :</strong></th>
                  <td>{{ $profile->philhealth }}</td>
                </tr>
                <tr>
                  <th><strong>WAH EMPLOYEE NUMBER : </strong></th>
                  <td>{{ $profile->wahemployeenumber }}</td>
                </tr>
                <tr>
                  <th><strong>PGT EMPLOYEE NUMBER : </strong></th>
                  <td>{{ $profile->pgtemployeenumber }}</td>
                </tr>
                <tr>
                  <th><strong>METROBANK ACCOUNT : </strong></th>
                  <td>{{ $profile->metrobankaccount }}</td>
                </tr>
                <tr>
                  <th><strong>LANDBANK ACCOUNT : </strong></th>
                  <td>{{ $profile->landbankaccount }}</td>
                </tr>
                <tr>
                  <th><strong>SSS :</strong></th>
                  <td>{{ $profile->sss }}</td>
                </tr>
                <tr>
                  <th><strong>TIN :</strong></th>
                  <td>{{ $profile->tin }}</td>
                </tr>
                <tr>
                  <th><strong>MID NO :</strong></th>
                  <td>{{ $profile->pagibigmidno }}</td>
                </tr>
                <tr>
                  <th><strong>RTN NO :</strong></th>
                  <td>{{ $profile->pagibigrtn }}</td>
                </tr>
                <tr>
                  <th><strong>MABUHAY MILES NO : </strong></th>
                  <td>{{ $profile->mabuhaymilespal }}</td>
                </tr>
                <tr>
                  <th><strong>CEBU PAC GET GO NO : </strong></th>
                  <td>{{ $profile->getgocebupac }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- start of row -->
      <div class="col-xs-12 col-sm-3">
        
        <!-- Edit user -->
        <p>
          <a href="{{ route('profile.index') }}" class="profile__contact-btn btn btn-lg btn-block btn-primary">
            BACK
          </a>
        </p>

        <hr class="profile__contact-hr">
        
        <!-- Contact info -->
        <div class="profile__contact-info">
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Primary Number</h5>
              {{ $profile->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile Number</h5>
              {{ $profile->secondary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              {{ $profile->email }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Secondary Email address</h5>
              {{ $profile->secondary_email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>



@endsection