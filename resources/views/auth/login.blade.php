<DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parking-System | Login</title>

    <link rel="shortcut icon" href="dist/favicon.ico" type="image/x-icon" />

    <!-- Scripts -->
    <script src="js/app.js" defer></script>
    <script src="js/functions.js" defer></script>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="css/login.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker3.min.css" />
</head>
<body>

<div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content" style="background-color: #3b4652;">
                <div class="col-12 user-img">
                    <img src="../dist/user.jpg"/>
                </div>
                <form class="col-12" method="POST" action="{{route('login')}}" class="clearfix">
                    @csrf

                    <div class="form-group {{$errors->has('username')? 'has-error': '' }}" id="user-group">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" 
                        placeholder="Nombre de usuario" name="username" required="required" value="{{ old('username') }}" 
                        autocomplete="username"/>
                    </div>
                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" 
                        placeholder="Contrasena" name="password" required="required" value="{{ old('password') }}" 
                        autocomplete="password"/>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div style="background-color: #E57B79; margin-bottom: 15px;">
                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong style="color: #fff;">{{ $message }}</strong>
                            </span>
                         @enderror
                    </div>
                   

                    <button type="submit" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>  Ingresar </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
