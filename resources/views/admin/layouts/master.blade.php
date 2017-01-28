<!DOCTYPE html>
<html class="bootstrap-layout">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Set a meta reference to the CSRF token for use in AJAX request -->
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <title>{{ AppHelper::getValueByKey($infos, 'COMPANY_NAME') }} | {{ $page_title }}</title>

    <!-- Prevent the demo from appearing in search engines (REMOVE THIS) -->
    <meta name="robots" content="noindex">

    <!-- Material Design Icons  -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Roboto Web Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en"
          rel="stylesheet">

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/fontawesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'bootstrap.css') }}">

    <!-- App CSS -->
    <link type="text/css" href="{{ asset(config('neptrox.asset_path.admin.css').'style.min.css') }}" rel="stylesheet">

    @yield('page_specific_styles')

    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset(config('neptrox.asset_path.admin.css').'custom-style.css') }}">

    <!-- jQuery -->
    <script src="{{ asset('assets/admin/assets/vendor/jquery.min.js') }}"></script>


</head>

{{--<body class="layout-container ls-top-navbar si-l3-md-up {{ ($is_super_admin)?'si-r3-lg-up':'' }} new-concept">--}}
<body class="layout-container ls-top-navbar si-l3-md-up new-concept">

<!-- Navbar -->
@include('admin.partials.navbar')
<!-- // END Navbar -->

<!-- Right Sidebars -->

<!-- Sidebar -->
@include('admin.partials.sidebar')
{{--@include('admin.partials.right_side_bar')--}}
<!-- // END Sidebar -->

<!-- Content -->

<div class='layout-content' data-scrollable>

    @yield('top-bar')

    <div class='container-fluid'>

        @yield('content')

    </div>

</div>

<!-- jQuery -->
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'jquery.min.js') }}"></script>

<!-- Bootstrap -->
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'tether.min.js') }}"></script>
<script src="{{ asset(config('neptrox.asset_path.admin.vendor').'bootstrap.min.js') }}"></script>

<!-- AdminPlus -->
<script  src="{{ asset(config('neptrox.asset_path.admin.vendor').'adminplus.js') }}"></script>

<!-- App JS -->
<script src="{{ asset(config('neptrox.asset_path.admin.js').'main.min.js') }}"></script>

<!-- Theme Colors -->
<script src="{{ asset(config('neptrox.asset_path.admin.js').'colors.js') }}"></script>


@yield('page_specific_scripts')
<script>
    $('.sidebar-menu-item.active').parents('li').addClass('open');
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<!-- include modal body -->
@include('admin.partials._modal_body')


</body>

</html>