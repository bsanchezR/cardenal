<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RAMAVE</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css" rel='stylesheet'
          type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.1/css/bootstrap-toggle.min.css">

    <!-- DataTable Bootstrap -->
    <link href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css" rel="stylesheet">

    <link href="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/css/simple-sidebar.css"
          rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

    <style type="text/css">
        .sidebar-nav li.active > a,
        .sidebar-nav li > a:focus {
            text-decoration: none;
            color: #fff;
            background: rgba(255, 255, 255, 0.2);
        }

        .header {
            width: 100%;
            background: #e7e7e7;
            color: #fff;
            height: 50px;

        }
    </style>
</head>
<body id="app-layout">

@if (Auth::guest())
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header right">
              <div class="black-text">
                <i class="fa fa-signal" aria-hidden="true"></i>&nbsp;<strong>RAMAVE</strong> |  Inventory Management DEV
              </div>
            </div>
        </div>
    </nav>
@else
    <div id="wrapper" class="toggled">
        <!-- Sidebar -->
            @include('layouts.sidebar')
        <!-- /#sidebar-wrapper -->
        <header class="header">
            <a href="#menu-toggle"
               style="margin-top: 8px;margin-left: 5px;background-color: #E7E7E7;border-color: #E7E7E7"
               class="btn btn-default" id="menu-toggle"><i class="fa fa-bars" aria-hidden="true"></i></a>
            @if (!Auth::guest())
            <span class="pull-right black-text" style="margin-right: 10px;margin-top: 15px"><a class="black-text decoration" href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></span>
            <div class="container flot">
                <div class="navbar-header right">
                  <div class="black-text">
                    <a href="{{ url('/home') }}" class="black-text decoration"><i class="fa fa-signal" aria-hidden="true"></i>&nbsp;<b> RAMAVE</b> |  Inventory Management DEV</a>
                  </div>
                </div>
            </div>
            <br>
            @endif
        </header>
    </div>
    @endif

    <!-- Page Content -->
    <div id="page-content-wrapper">


        <div class="container">

            <div class="row" id="main">
                <div class="col-lg-12">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/jquery.js"></script>
    <script src="http://blackrockdigital.github.io/startbootstrap-simple-sidebar/js/bootstrap.min.js"></script>
    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.1/js/bootstrap-toggle.min.js"></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <script>

        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>

    @yield('scripts')

</body>
</html>
