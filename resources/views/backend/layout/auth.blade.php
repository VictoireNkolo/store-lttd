<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>
        @yield('title', 'Home page')
    </title>
    <!-- Bootstrap core CSS-->
    <link href="{{ asset('css/plugin_admin.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Custom fonts for this template-->

</head>

<body class="bg-dark">
<div class="container">
    @yield('content')
</div>

</body>


</html>
