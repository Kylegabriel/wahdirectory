@extends('layouts.app')
@section('stylesheets')
  <style>
      body{
          margin-top:20px;
          background:#f5f5f5;
      }
      /**
       * Panels
       */
      /*** General styles ***/
      .panel {
        box-shadow: none;
      }
      .panel-heading {
        border-bottom: 0;
      }
      .panel-title {
        font-size: 17px;
      }
      .panel-title > small {
        font-size: .75em;
        color: #999999;
      }
      .panel-body *:first-child {
        margin-top: 0;
      }
      .panel-footer {
        border-top: 0;
      }

      .panel-default > .panel-heading {
          color: #333333;
          background-color: transparent;
          border-color: rgba(0, 0, 0, 0.07);
      }

      /**
       * Profile
       */
      /*** Profile: Header  ***/
      .profile__avatar {
        float: left;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        margin-right: 20px;
        overflow: hidden;
      }
      @media (min-width: 768px) {
        .profile__avatar {
          width: 100px;
          height: 100px;
        }
      }
      .profile__avatar > img {
        width: 100%;
        height: auto;
      }
      .profile__header {
        overflow: hidden;
      }
      .profile__header p {
        margin: 20px 0;
      }
      /*** Profile: Table ***/
      @media (min-width: 992px) {
        .profile__table tbody th {
          width: 300px;
        }
      }
      /*** Profile: Recent activity ***/
      .profile-comments__item {
        position: relative;
        padding: 15px 16px;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
      }
      .profile-comments__item:last-child {
        border-bottom: 0;
      }
      .profile-comments__item:hover,
      .profile-comments__item:focus {
        background-color: #f5f5f5;
      }
      .profile-comments__item:hover .profile-comments__controls,
      .profile-comments__item:focus .profile-comments__controls {
        visibility: visible;
      }
      .profile-comments__controls {
        position: absolute;
        top: 0;
        right: 0;
        padding: 5px;
        visibility: hidden;
      }
      .profile-comments__controls > a {
        display: inline-block;
        padding: 2px;
        color: #999999;
      }
      .profile-comments__controls > a:hover,
      .profile-comments__controls > a:focus {
        color: #333333;
      }
      .profile-comments__avatar {
        display: block;
        float: left;
        margin-right: 20px;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        overflow: hidden;
      }
      .profile-comments__avatar > img {
        width: 100%;
        height: auto;
      }
/*      .profile-comments__body {
        overflow: hidden;
      }*/
      .profile-comments__sender {
        color: #333333;
        font-weight: 500;
        margin: 5px 0;
      }
      .profile-comments__sender > small {
        margin-left: 5px;
        font-size: 12px;
        font-weight: 400;
        color: #999999;
      }
      @media (max-width: 767px) {
        .profile-comments__sender > small {
          display: block;
          margin: 5px 0 10px;
        }
      }
      .profile-comments__content {
        color: #999999;
      }
      /*** Profile: Contact ***/
      .profile__contact-btn {
        padding: 12px 20px;
        margin-bottom: 20px;
      }
      .profile__contact-hr {
        position: relative;
        border-color: rgba(0, 0, 0, 0.1);
        margin: 40px 0;
      }
      .profile__contact-hr:before {
        content: "x";
        display: block;
        padding: 10px;
        position: absolute;
        top: 50%;
        left: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #f5f5f5;
        color: #c6c6cc;
      }
      .profile__contact-info-item {
        margin-bottom: 30px;
      }
      .profile__contact-info-item:before,
      .profile__contact-info-item:after {
        content: " ";
        display: table;
      }
      .profile__contact-info-item:after {
        clear: both;
      }
      .profile__contact-info-item:before,
      .profile__contact-info-item:after {
        content: " ";
        display: table;
      }
      .profile__contact-info-item:after {
        clear: both;
      }
      .profile__contact-info-icon {
        float: left;
        font-size: 18px;
        color: #999999;
      }
      .profile__contact-info-body {
        overflow: hidden;
        padding-left: 20px;
        color: #999999;
      }
      .profile__contact-info-body a {
        color: #999999;
      }
      .profile__contact-info-body a:hover,
      .profile__contact-info-body a:focus {
        color: #999999;
        text-decoration: none;
      }
      .profile__contact-info-heading {
        margin-top: 2px;
        margin-bottom: 5px;
        font-weight: 500;
        color: #999999;
      }
  </style>
@endsection
@section('content')

<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="card shadow">
<!--           <div class="card-header">
              User profile
          </div> -->
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $profile-> first_name . ' ' . $profile->middle_name . ' ' . $profile->last_name }} <small>{{ $profile->designations['role_name'] }}</small></h4>
                <p class="text-muted">
                 Birtdate: {{ $profile->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->birthdate)) }}<br>
                 Date Hired: {{ $profile->datehired == '0000-00-00' ? '' :  date('F j, Y', strtotime($profile->datehired)) }}<br>
                 Gender: {{ $profile->gender }}
                </p>
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