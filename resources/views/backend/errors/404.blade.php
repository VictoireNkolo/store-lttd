@extends('backend.layout.page')

@section('title', 'Erreur 404 | LTDD Administration')

@section('content')

    <div class="card card-register mx-auto mt-5">
    <div class="card-header text-center">Erreur 404 :  Page introuvable</div>
        <div class="card-body">
            <div class="text-center">
                <a class="btn btn-primary" href="{{ route('home') }}">Accueil</a>
            </div>
        </div>
    </div>

@endsection
