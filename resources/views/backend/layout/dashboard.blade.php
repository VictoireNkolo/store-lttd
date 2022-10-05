<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        @yield('title', 'Accueil | LaraBlog')
    </title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/plugin_admin.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->
    @yield('css')

</head>

<body class="fixed-nav sticky-footer bg-dark">

<div id="loader" class="lds-ring"><div></div><div></div><div></div><div></div></div>

@include('backend.partials.sidebar')

<div class="content-wrapper" id="app">
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('lb_admin.admin.dashboard.index') }}">Tableau de bord</a>
            </li>
            <li class="breadcrumb-item active">@yield('dashboard_section', 'Accueil')</li>
        </ol>

        @yield('content')

    </div>
    <!-- /.container-fluid-->

    @include('backend.partials.footer')

</div>


<script src="{{  asset('js/admin.js')  }}"></script>
<script src="{{  mix('js/app.js')  }}"></script>
@yield('js')
</body>

</html>
