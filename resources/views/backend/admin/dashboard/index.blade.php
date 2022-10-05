@extends('backend.layout.dashboard')

@section('title', 'Accueil | LaraBlog')
@section('dashboard_section', 'Accueil')

@section('content')

    <!-- Icon Cards-->

    <list-user
        :users="{{ json_encode($users) }}"
    >

    </list-user>

@endsection
