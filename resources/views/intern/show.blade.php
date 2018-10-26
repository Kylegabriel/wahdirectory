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
                <h4>{{ $tag-> first_name . ' ' . $tag->middle_name . ' ' . $tag->last_name }}</h4>
                <small>This record is {{ $tag->is_active == 'Y' ? 'Active' : 'Inactive' }}</small>
                <p class="text-muted">
                 <small>Birtdate: {{ $tag->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($tag->birthdate)) }}<br>
                 Gender: {{ $tag->gender == 'M' ? 'Male' : 'Female' }}<br>
                 Start of OJT: {{ $tag->date_start == '0000-00-00' ? '' : date('F j, Y', strtotime($tag->date_start)) }} <br>
                 End of OJT: {{ $tag->date_start == '0000-00-00' ? '' : date('F j, Y', strtotime($tag->date_end)) }}</small>
                </p>

              </div>
            </div>
            <div class="profile-comments__controls">
              <!-- <a href="#"><i class="fa fa-share-square-o"></i></a>
  -->         <a href="{{ route('interns.edit',$tag->id) }}"><i class="fa fa-edit"></i></a>
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
                  <th><strong>Course :</strong></th>
                  <td>{{ $tag->courses['course'] }}</td>
                </tr>
                <tr>
                  <th><strong>School :</strong></th>
                  <td>{{ $tag->schools['school'] }}</td>
                </tr>
                <tr>
                  <th><strong>Papers :</strong></th>
                  <td>
                    @foreach($tag->tags as $tag)
                        <span class="badge badge-pill badge-primary text-uppercase">{{ $tag->name }}</span>
                    @endforeach
                  </td>
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
          <a href="{{ route('interns.index') }}" class="profile__contact-btn btn btn-lg btn-block btn-primary">
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
              <h5 class="profile__contact-info-heading">Mobile number</h5>
              {{ $tag->primary_contact }}
            </div>
          </div>
          <div class="profile__contact-info-item">
            <div class="profile__contact-info-icon">
              <i class="fa fa-envelope-square"></i>
            </div>
            <div class="profile__contact-info-body">
              <h5 class="profile__contact-info-heading">E-mail address</h5>
              {{ $tag->email }}
            </div>
          </div>
        </div>
        <!-- end of Contact info -->.
      </div> <!-- end of row -->
    </div>



@endsection