<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        @yield('title', 'Accueil | LTDD Administration')
    </title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/sb-admin.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body class="fixed-nav sticky-footer bg-dark">

<div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>

@include('backend.partials.navbar')

<div class="content-wrapper" id="app">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('lb_admin.admin.dashboard.index') }}">Tableau de bord</a>
            </li>
            <li class="breadcrumb-item active">@yield('dashboard_section', 'Administration')</li>
        </ol>

        @yield('content')

    </div>
    <!-- /.container-fluid-->
    @include('backend.ui.logoutModal')
    @include('backend.partials.footer')

</div>

<!-- Bootstrap core JavaScript-->
<script src="{{ asset('backend/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('backend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Page level plugin JavaScript-->
<script src="{{ asset('backend/vendor/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/jquery.dataTables.js') }}"></script>
<script src="{{ asset('backend/vendor/datatables/dataTables.bootstrap4.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('backend/js/sb-admin.min.js') }}"></script>
<!-- Custom scripts for this page-->
<script src="{{ asset('backend/js/sb-admin-datatables.min.js') }}"></script>
<script src="{{ asset('backend/js/sb-admin-charts.min.js') }}"></script>
@yield('js')
</body>

</html>
