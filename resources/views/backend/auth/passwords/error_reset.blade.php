@extends('backend.layout.auth')

@section('title', 'Erreur | LTDD Administration')

@section('content')

    <div class="card card-register mx-auto mt-5">
    <div class="card-header">{{ session()->exists('expired_error') ? 'Lien de réinitialisation expiré' : 'Lien non valide' }}</div>
        <div class="card-body">
            @if(session()->exists('expired_error'))
                <div class="alert alert-danger">{{ session()->get('expired_error') }}</div>
            @elseif(session()->exists('faketoken_error'))
                <div class="alert alert-danger">{{ session()->get('faketoken_error') }}</div>
            @endif
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('password.request') }}">Reprendre l'op&eacute;ration de r&eacute;initialisation ?</a>
            </div>
        </div>
    </div>

@endsection
