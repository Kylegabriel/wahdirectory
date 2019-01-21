@extends('layouts.app')
@section('stylesheets')
  {!! Html::style('/css/show.css') !!}
@endsection
@section('content')
<div class="row">
      <div class="col-xs-12 col-sm-9">
        
        <!-- User profile -->
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
              Partner Record
          </div>
          <div class="profile-comments__item">
            <div class="card-body">
              <div class="profile__avatar">
                <img src="{{ isset( $partner->image ) ? asset('img/' . $partner->image) : asset('img/default.png') }}" alt="...">
              </div>
              <div class="profile__header">
                <h4>{{ $partner-> first_name . ' ' . $partner->middle_name . ' ' . $partner->last_name }}</h4>
                {{ $partner->partnerDesignation['designation'] }}<br>
                This record is {{ $partner->is_active == 'Y' ? 'Active' : 'Inactive' }}<br>
                Birtdate: {{ $partner->birthdate == '0000-00-00' ? '' :  date('F j, Y', strtotime($partner->birthdate)) }}<br>
                Gender: {{ $partner->gender == 'M' ? 'Male' : 'Female' }}<br>
                Registered by : {{ $partner->user->first_name . ' ' . $partner->user->middle_name . ' ' . $partner->user->last_name . ' ' }}
                @if($partner->user->suffix_name == 'NOTAP') @else {{ $partner->user->suffix_name }} @endif  
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

    <br>
<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary rounded">
      <a class="navbar-brand" href="">Add Comments</a>
      @include('partials._headerNav')
          <a data-toggle="modal" data-target="#createComment" class="btn btn-link text-white" data-toggle="tooltip" data-placement="left" title="Add Comments">
                <i class="fa fa-building"></i>
                Add Comments
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="card shadow border-0" id="example2" style="display:none">
      <div class="card-body"> 
        <table class="table" id="example">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Email</th>
              <th>Comment</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            @foreach($partner->comments as $comment)
            <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $comment->name }}</td>
              <td>{{ $comment->email }}</td>
              <td>{{ $comment->comment }}</td>
              <td>
                <a data-toggle="modal" data-target="#editComment{{ $comment->id }}" class="btn btn-link text-info" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-pencil fa-2x"></i></a>
                <a  href="{{ route('comments.show',$comment->id) }}" class="btn btn-link text-primary" data-toggle="tooltip" data-placement="left" title="Show"><i class="fa fa-eye fa-2x"></i></a>
                <a data-toggle="modal" data-target="#deleteComment{{ $comment->id }}" class="btn btn-link text-warning" data-toggle="tooltip" data-placement="left" title="Delete"><i class="fa fa-trash fa-2x"></i></a>
              </td>
            </tr>

            <!--modal Edit -->
            <div class="modal fade" id="editComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white">EDIT COMMENT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true" class="text-white">×</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    {!! Form::model($comment, ['route' => ['comments.update', $comment->id], 'method' => 'PUT']) !!}
                      {{ csrf_field() }} 
                      <div class="row">
                        <div class="col-md-6">
                            {{ Form::label('name','NAME') }}
                            {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required' => 'required']) }} 
                        </div>
                        <div class="col-md-6">
                            {{ Form::label('email','EMAIL') }}
                            {{ Form::text('email',null,['class'=>'form-control','id'=>'email','required' => 'required']) }} 
                        </div>
                      </div>  
                      <div class="row">
                            <div class="col-md-12">
                              {{ Form::label('comment','COMMENT') }}
                              {{ Form::textarea('comment',null,['class'=>'form-control','id'=>'comment','rows'=>'2','required' => 'required']) }} 
                            </div>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                    {!! Form::close() !!}    
                </div>
              </div>
            </div>
            <!--modal Edit -->

            <!--modal Delete -->
            <div class="modal fade" id="deleteComment{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-primary">
                      <h5 class="modal-title text-white">Please Confirm!</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{ route('comments.destroy',$comment->id) }}">
                    {{ csrf_field() }}  
                    <h5>Would you like to Delete this record?</h5>
                  </div>
                  <div class="modal-footer">
                    {{ Form::button('Save', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
                    {{ Form::button('Close', ['type' => 'submit', 'class' => 'btn btn-secondary' , 'data-dismiss' => 'modal'] )  }}
                    {{ method_field('DELETE') }}
                  </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!--modal Delete -->

            @endforeach
          </tbody>  
        </table>
      </div>  
    </div>
  </div>
</div>  

    <div class="modal fade" id="createComment" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
              <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">ADD COMMENT</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true" class="text-white">×</span>
                </button>
              </div>
              <div class="modal-body">
                {!! Form::open(['route' => ['comments.store', $partner->id], 'method' => 'POST']) !!}
                  {{ csrf_field() }} 
                  <div class="row">
                    <div class="col-md-6">
                        {{ Form::label('name','NAME') }}
                        {{ Form::text('name',null,['class'=>'form-control','id'=>'name','required' => 'required']) }} 
                    </div>
                    <div class="col-md-6">
                        {{ Form::label('email','EMAIL') }}
                        {{ Form::text('email',null,['class'=>'form-control','id'=>'email','required' => 'required']) }} 
                    </div>
                  </div>  
                  <div class="row">
                        <div class="col-md-12">
                          {{ Form::label('comment','COMMENT') }}
                          {{ Form::textarea('comment',null,['class'=>'form-control','id'=>'comment','rows'=>'2','required' => 'required']) }} 
                        </div>
                  </div>

                  
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
                {!! Form::close() !!}    
            </div>
          </div>
        </div>

@endsection