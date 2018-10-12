<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>WAH Directory</title>

    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="/toastr/build/toastr.css">
    <link rel="stylesheet" href="/font-awesome/css/font-awesome.css">
    <link type="text/css" href="/argon-design/argon-design/assets/css/argon.css" rel="stylesheet">
    <link type="text/css" href="/DataTables/Data/css/dataTables.bootstrap4.min.css" rel="stylesheet"> 
    @yield('stylesheets')
</head>
<body>  
<div class="row">
  <div class="col-md-12" style="padding:0px 30px 0px 30px">
                <!-- Navbar primary -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary mt-2">
            <a class="navbar-brand" href="#">WAH DIRECTORY</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
              <div class="navbar-collapse-header">
                <div class="row">
                  <div class="col-6 collapse-brand">
                  </div>
                  <div class="col-6 collapse-close">
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                      <span></span>
                      <span></span>
                    </button>
                  </div>
                </div>
              </div>
              <ul class="navbar-nav ml-lg-auto">
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/partner')}}">Partners
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/profile')}}">WAH-NGO
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/sites')}}">Sites
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/warmleads')}}">Warm Leads
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/interns')}}">Interns</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="{{ url('/others')}}">Others</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbar-primary_dropdown_1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="nav-link-inner--text">{{ Auth::user()->first_name }}</span>
                      <i class="fa fa-ellipsis-v"></i>
                  </a>    
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbar-primary_dropdown_1">
                    @if(Auth::user()->is_admin == 'Y')
                    <a class="dropdown-item" href="{{ url('/settings')}}">Setting</a>
                    <div class="dropdown-divider"></div>
                    @else
                    @endif
                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                  </div>
                </li>
              </ul>
            </div>
        </nav>
         <br>
          @yield('content')
  </div>

</div>      
   
    <script src="/jquery/dist/jquery.min.js"></script>
    <script src="/jquery-validation/dist/jquery.validate.js"></script>
    <script src="/DataTables/datatables.js"></script>
    <script src="/DataTables/Data/js/dataTables.bootstrap4.min.js"></script>
    <script src="/node_modules/popper/popper.min.js"></script>
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/toastr/toastr.js"></script>
    <script src="/argon-design/argon-design/assets/js/argon.js"></script>
    <script src="/js/_script.js"></script>
    @yield('scripts')
    <script>
            @if(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
            @if(Session::has('repeat'))
                toastr.warning('{{ Session::get('repeat') }}');
            @endif
    </script>
</body>
</html>
