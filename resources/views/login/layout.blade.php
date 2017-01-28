<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login/Signup</title>

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en" rel="stylesheet">
    <link type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'bootstrap.css') }}" rel="stylesheet">
    <!-- App CSS -->
    <link type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'style.min.css') }}" rel="stylesheet">

    <link type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'custom-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">

</head>

<body>
    <header class="login-page-nav">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <a href="#" class="navbar-brand">Green Guru Ticketing</a>
                </div>
                <div class="col-xs-12 col-md-3 col-md-push-3">
                    <div class="pull-xs-left">
                        <i class="material-icons md-36 text-primary">phone</i>
                    </div>
                    <div class="d-inline">
                        <div class="contact-add">
                            <small>Need Help? Call us!</small>
                            <br>
                            <small>1234567890</small>
                        </div>
                        

                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="login">
        <div class="row">
            @yield('content')
        </div>
    </div>
    

<!-- jQuery -->
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'tether.min.js') }}"></script>
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'bootstrap.min.js') }}"></script>

<!-- AdminPlus -->
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'adminplus.js') }}"></script>

<!-- App JS -->
<script src="{{ asset(config('neptrox.asset_path.admin.js').'main.min.js') }}"></script>

</body>

</html>
