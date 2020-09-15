<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parking-System | Home</title>

    <link rel="shortcut icon" href="{{asset('images/favicon.ico')}}" type="image/x-icon">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('https://pro.fontawesome.com/releases/v5.10.0/css/all.css')}}">

    <!--scripts-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

    <!--styles-->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">

</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{asset('dist/logo.png')}}" style="width: 150px; height: 57px;">
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="far fa-user-circle" style="font-size: 20px;"></i> {{ Auth::user()->username }} <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a><i class="fas fa-fw fa-user-check" style="font-size: 12px;"></i>{{Auth::User()->name}} {{Auth::User()->lastname}}</a>
                    </li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i>Editar perfil</a></li>
                    <li class="divider"></li>
                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                        <i class="fa fa-fw fa-power-off"></i>Salir</a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"> @csrf</form>  
                    </li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="/"><i class="fas fa-home"></i> PANEL DE CONTROL</a>
                </li>
                @can('Administrador')
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu">
                        <i class="fas fa-user-plus"></i>  Usuarios 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu" class="collapse">
                        <li><a href="/usuarios"
                            class="{{ Request::path() === '/usuarios' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Adminstrar usuarios</a>
                        </li>
                        <li><a href="/group"
                            class="{{ Request::path() === '/group' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Administrar rol</a>
                        </li>
                    </ul>
                </li>
                @endcan
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1">
                        <i class="fas fa-star"></i>  Registrar Vehículos 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="/automoviles"
                            class="{{ Request::path() === '/automoviles' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Automoviles </a>
                        </li>
                        <li><a href="/motos"
                            class="{{ Request::path() === '/motos' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Motos </a>
                        </li>
                        <li><a href="/bicicletas"
                            class="{{ Request::path() === '/bicicletas' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Bicicletas </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2">
                        <i class="fas fa-car"></i> Parking autos 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="/parkingAutos"
                            class="{{ Request::path() === '/parkingAutos' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Asignar puesto </a>
                        </li>
                        <li><a href="/salidaAutos"
                            class="{{ Request::path() === '/salidaAutos' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Registrar salidas </a>
                        </li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-3">
                        <i class="fas fa-motorcycle"></i> Parking motos 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-3" class="collapse">
                        <li><a href="/parkingMotos"
                            class="{{ Request::path() === '/parkingMotos' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Asignar puesto </a>
                        </li>
                        <li><a href="/salidaMotos"
                            class="{{ Request::path() === '/salidaMoto' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Registrar salidas </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-4">
                        <i class="fas fa-bicycle"></i> Parking Bicicletas 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-4" class="collapse">
                        <li><a href="/parkingCiclas"
                            class="{{ Request::path() === '/parkingCiclas' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Asiganar puesto </a>
                        </li>
                        <li><a href="/salidaCiclas"
                            class="{{ Request::path() === '/salidaCiclas' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Registrar salidas </a>
                        </li>
                    </ul>
                </li>
                @can('Administrador')
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-5">
                        <i class="fas fa-cogs"></i> Configuración 
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-5" class="collapse">
                        <li><a href="/parking"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> Administrar parqueadero  </a>
                        </li>
                        <li><a href="/tarifas"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i>Administrar tarifas </a>
                        </li>
                    </ul>
                </li>
                @endcan
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-6">
                        <i class="fas fa-folder-open"></i> Reportes
                        <i class="fa fa-fw fa-angle-down pull-right"></i>
                    </a>
                    <ul id="submenu-6" class="collapse">
                        <li><a href="/Parking"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> parking </a>
                        </li>
                        <li><a href="/in-out"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> entradas y salidas </a>
                        </li>
                        <li><a href="/Vehiculos"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> vehiculos </a>
                        </li>
                        <li><a href="/tarifas"
                            class="{{ Request::path() === '/product' ? 'nav-link active' : 'nav-link' }}">
                            <i class="fa fa-angle-double-right"></i> tarifas </a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row" id="main" >
                <div class="col-sm-12 col-md-12 well" id="content">
                    @yield('content')
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div><!-- /#wrapper -->
</body>
</html>