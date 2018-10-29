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
              WAH-Staff Record
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $profile-> first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name }}</h4>
                <small>{{ $profile->designations['role_name'] }}<br>
                This record is {{ $profile->is_active == 'Y' ? 'Active' : 'Inactive' }}
                 Birtdate: {{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}<br>
                 Date Hired: {{ $profile->datehired == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->datehired)) }}<br>
                 Gender: {{ $profile->gender == 'M' ? 'Male' : 'Female' }}<br>
                 Registered by : {{ $profile->user->first_name . ' ' . $profile->user->middle_name . ' ' . $profile->user->last_name . ' ' }}
                 @if($profile->user->suffix_name == 'NOTAP') @else {{ $profile->user->suffix_name }} @endif
                </small>
  <!--               <p>
                  <a href="#">bootdey.com</a>
                </p> -->
              </div>
            </div>
            <div class="profile-comments__controls">
              <!-- <a href="#"><i class="fa fa-share-square-o"></i></a>
  -->         <a href="{{ route('profile.edit',$profile->id) }}"><i class="fa fa-edit"></i></a>
              <!-- <a href="#"><i class="fa fa-trash-o"></i></a> -->
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
                  <th><strong>Address :</strong></th>
                  <td>{{ $profile->region['region_name'] . ", " 
                    . $profile->province['province_name'] . ", " 
                    . $profile->municipality['muncity_name'] . " "
                    . $profile->barangay['brgy_name'] }}</td>
                </tr>
                <tr>
                  <th><strong>PhilHealth :</strong></th>
                  <td>{{ $profile->philhealth }}</td>
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

<!--     Latest posts
        <div class="panel panel-default">
          <div class="panel-heading">
          <h4 class="panel-title">Latest posts</h4>
          </div>
          <div class="panel-body">
            <div class="profile__comments">
              <div class="profile-comments__item">
                <div class="profile-comments__controls">
                  <a href="#"><i class="fa fa-share-square-o"></i></a>
                  <a href="#"><i class="fa fa-edit"></i></a>
                  <a href="#"><i class="fa fa-trash-o"></i></a>
                </div>
                <div class="profile-comments__avatar">
                  <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="...">
                </div>
                <div class="profile-comments__body">
                  <h5 class="profile-comments__sender">
                    Richard Roe <small>2 hours ago</small>
                  </h5>
                  <div class="profile-comments__content">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, corporis. Voluptatibus odio perspiciatis non quisquam provident, quasi eaque officia.
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->

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
              <h5 class="profile__contact-info-heading">Work number</h5>
              {{ $profile->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile number</h5>
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
              <h5 class="profile__contact-info-heading">Work address</h5>
              {{ $profile->secondary_email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>



@endsection