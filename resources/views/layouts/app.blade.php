<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>WAH Directory</title>

    <link rel="stylesheet" href="/materialize/css/materialize.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    @yield('stylesheets')
    <style> 
        .input-field label:after {
          -webkit-transform: translateY(-190%);
          transform: translateY(-190%);
          font-size: 0.8rem;
          transition: .2s ease-out;
          margin-top: 15px;
        }
        .input-field label.active:after {
          -webkit-transform: translateY(-50%);
          transform: translateY(-50%);
          transition: .2s ease-out;
        }
        .margin li{
          margin: 2px 0px;
        }
    </style>
</head>
<body>

    <div class="fixed-action-btn horizontal">
        <a class="btn-floating btn-large red">
          <i class="material-icons md-26">add</i>
        </a>
        <ul>
          <li><a href="{{ route('partner.create') }}" class="btn-floating waves-effect waves-light purple tooltipped right " data-position="top" data-tooltip="Partner Organization"><i class="material-icons">group_add</i></a></li>
          <li><a href="{{ route('profile.create') }}" class="btn-floating waves-effect waves-light green tooltipped right" data-position="top" data-tooltip="WAH-NGO"><i class="material-icons">people_outline</i></a></li>
          <li><a href="{{ route('interns.create') }}" class="btn-floating waves-effect waves-light yellow tooltipped right" data-position="top" data-tooltip="Interns"><i class="material-icons">group</i></a></li>
        </ul>
    </div>
    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
        <li><a href="{{ url('/logout') }}"></i>Logout</a></li>  
    </ul>


    <nav class="light-blue lighten-1 navbar-fixed" role="navigation">
      <div class="nav-wrapper">
        <a href="#!" class="brand-logo">WAH DIRECTORY</a>
          <ul class="right hide-on-med-and-down">

                  @if (Auth::guest())
                      <li><a href="{{ url('/login') }}">Login</a></li>
                      <li><a href="{{ url('/register') }}">Register</a></li>
                  @else
                  <li class="{{ Request::is('partner') ? 'active' : '' }}"><a href="{{url('/partner')}}" >Partners</a></li>
                  <li class="{{ Request::is('profile') ? 'active' : '' }}"><a href="{{ url('/profile') }}">WAH-NGO</a></li>
                  <li class="{{ Request::is('warmleads') ? 'active' : '' }}"><a href="{{ url('/warmleads')}}">Warm Leads</a></li>
                  <li class="{{ Request::is('interns') ? 'active' : '' }}"><a href="{{ url('/interns')}}">Interns</a></li>
                  <li class="{{ Request::is('summary') ? 'active' : '' }}"><a href="{{ url('/summary')}}">Summary</a></li>
                  <li class="{{ Request::is('others') ? 'active' : '' }}"><a href="{{ url('/others')}}">Others</a></li>
                  <!-- Dropdown Trigger --> 
                  <li><a class="dropdown-button" href="#!" data-activates="dropdown1"><b>{{ Auth::user()->first_name }}</b><i class="material-icons right md-26">face</i></a></li>
                @endif
          </ul>
      </div>
    </nav>

  
<div class="row">

  <div class="col s3">

              <div class="card z-depth-3">
                <div class="card-image">
                  <img src="/img/5.png">
                </div>
                @if(!Auth::guest())
                <div class="card-content" style="padding-top:5px">
                   <center>Today is <b>{{ date('D, F j, o') }}</b><br></center>
                      <ul class="margin">
                          <li><span class="new badge" data-badge-caption="">{{ App\Partner::where('status','=','Partner')->count() }}</span><i class="material-icons left">person</i>Partner Organization</li>
                          <li><span class="new badge" data-badge-caption="">{{ Auth::user()->count() }}</span><i class="material-icons left">group</i>WAH-NGO</li>
                          <li><span class="new badge" data-badge-caption="">{{ App\Partner::where('status','=','Warm Lead')->count() }}</span><i class="material-icons left">people</i>Warm Leads</li>
                          <li><span class="new badge" data-badge-caption="">{{ App\Intern::count() }}</span><i class="material-icons left">people_outline</i>Interns</li>
                      </ul>
                </div>
                 @endif

                <div class="card-content" style="padding-top:0px;margin-top:-20px">
                  <span class="card-title"><span class="new badge" data-badge-caption="">
                      <?php 
                          $date = date('Y-m-d'); 

                          $one = App\Partner::where("birthdate","=",$date)->get()->count();
                          $two = App\User::where("birthdate","=",$date)->get()->count();
                       ?>
                       {{ $one + $two }}
                    </span><i class="material-icons prefix">cake</i>Celebrator</span>
                  <?php 
                    $date = date('Y-m-d');
                    $partner = App\Partner::select('first_name','last_name','middle_name')->where("birthdate","=",$date)->get();
                    $user = App\User::select('first_name','last_name','middle_name')->where("birthdate","=",$date)->get();
                  ?> 
                    
                    <ul class="collapsible" data-collapsible="accordion">
                      <li>
                          <div class="collapsible-header">Partner<span class="badge">{{ App\Partner::where("birthdate","=",date('Y-m-d'))->count() }}</div>
                          <div class="collapsible-body">
                            @foreach( $partner as $bday )
                            <ul>
                              <li>{{ $bday->last_name . ', ' . $bday->first_name . ' ' . $bday->middle_name }}</li>
                            </ul>
                            @endforeach
                          </div>
                      </li>
                      <li>
                        <div class="collapsible-header">WAH-NGO<span class="badge">{{ App\User::where("birthdate","=",date('Y-m-d'))->count() }}</div>
                          <div class="collapsible-body">
                              @foreach( $user as $bday )
                              <ul class="collection">
                                <li class="collection-item">{{ $bday->last_name . ', ' . $bday->first_name . ' ' . $bday->middle_name }}</li>
                              </ul>
                              @endforeach
                          </div>
                      </li>
                  </ul> 
                </div>
          </div> <!-- end of card z-depth-3 -->

  </div>

    <div class="col s9">
      @yield('content')
    </div>

</div>


    
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.js"></script>
    <script src="/materialize/js/materialize.min.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
    <script>
            @if(Session::has('success'))
                Materialize.toast("<i class='material-icons md-36'>done</i>{{ Session::get('success') }}", 4000,'green lighten-5 rounded green-text')
            @endif
            @if(Session::has('repeat'))
            Materialize.toast("<i class='material-icons md-36'>error</i>{{ Session::get('repeat') }}", 4000,'red lighten-5 rounded red-text')
            @endif
    </script>
</body>
</html>
