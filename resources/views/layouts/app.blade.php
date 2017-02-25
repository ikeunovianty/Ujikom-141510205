<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>


                    

                    <!-- Collapsed Hamburger -->

                    <link href="css/bootstrap.css" rel="stylesheet" />
              <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />
              <link href="css/ct-navbar.css" rel="stylesheet" />

              <script src="js/jquery-1.10.2.js"></script>
              <script src="js/bootstrap.js"></script>
              <script src="js/ct-navbar.js"></script>
              
              <nav class="navbar navbar-ct-blue navbar-fixed-top navbar-transparent navbar-default" role="navigation">
        <div class="container">
        <div class="panel panel-blue">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand navbar-brand-logo" href="http://www.creative-tim.com">
                <div class="logo">
                    <image src="https://s3.amazonaws.com/creativetim_bucket/new_logo.png">
                </div>
                <div class="brand"> Ikeu Novianty </div>
              </a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav navbar-right">
                    <li class="fa fa-paw" aria-hidden="true">
                        <a href="javascript:void(0)" data-toggle="search">
                            <i class="pe-7s-search"></i>
                            <p>Search</p>
                        </a>
                    </li>
                    <li class="fa fa-paw" aria-hidden="true">
                        <a href="#">
                            <i class="pe-7s-mail">
                                <span class="label"> 23 </span>
                            </i>
                            <p>Messages</p>
                        </a>
                    </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="pe-7s-user"></i>
                        <p>Account</p>
              </a>
              <ul class="dropdown-menu">
                <li class="fa fa-paw" aria-hidden="true"><a href="#">Action</a></li>
                <li class="fa fa-paw" aria-hidden="true"><a href="#">Another action</a></li>
                <li class="fa fa-paw" aria-hidden="true"><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li><a href="#">Separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
    
<!--  end navbar -->

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <blockquote>

                    </blockquote>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>

                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>

                                </ul>
                            </li>

                                
    


                                    
                                


                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
