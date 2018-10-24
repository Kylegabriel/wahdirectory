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
              Partner Record
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="https://bootdey.com/img/Content/avatar/avatar5.png" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $partner-> first_name . ' ' . $partner->middle_name . ' ' . $partner->last_name }}</h4>
                <small>{{ $partner->partnerDesignation['designation'] }}</small><br>
                <small>This record is {{ $partner->is_active == 'Y' ? 'Active' : 'Inactive' }}</small>
                <p class="text-muted">
                 Birtdate: {{ $partner->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($partner->birthdate)) }}<br>
                 Gender: {{ $partner->gender == 'M' ? 'Male' : 'Female' }}<br>
                </p>
  <!--               <p>
                  <a href="#">bootdey.com</a>
                </p> -->
              </div>
            </div>
            <div class="profile-comments__controls">
              <!-- <a href="#"><i class="fa fa-share-square-o"></i></a>
  -->         <a href="{{ route('partner.edit',$partner->id) }}"><i class="fa fa-edit"></i></a>
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
                  <td>
                   {{ 
                      $partner->region['region_name'] . ", " 
                    . $partner->provinces['province_name'] . ", " 
                    . $partner->municipality['muncity_name'] . " "
                    . $partner->barangay['brgy_name'] 
                  }}</td>
                </tr>
                <tr>
                  <th><strong>Organization :</strong></th>
                  <td>{{ $partner->partnerOrganization['organization'] }}</td>
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
          <a href="{{ route('partner.index') }}" class="profile__contact-btn btn btn-lg btn-block btn-primary">
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
              {{ $partner->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Mobile number</h5>
              {{ $partner->secondary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              {{ $partner->email }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-map-marker"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">Work address</h5>
              {{ $partner->secondary_email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>



@endsection