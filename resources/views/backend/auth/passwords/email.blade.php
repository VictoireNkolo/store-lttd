@extends('backend.layout.auth')

@section('title', 'Password reset | LaraBlog')

@section('content')
    <div class="card card-register mx-auto mt-5">
        <div class="card-header">R&eacute;initialisation du mot de passe</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            @if(session()->exists('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if(!session()->exists('success'))
                <div class="text-center mt-4 mb-5">
                    <h4>Mot de passe oubli&eacute;?</h4>
                    <p>
                        Entrez votre addresse email et nous vous enverrons un mail avec les instructions &agrave;&nbsp;suivre pour r&eacute;initialiser
                        votre mot de passe.
                    </p>
                </div>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <input
                            class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}" type="email"
                            name="email" aria-describedby="emailHelp" placeholder="Votre adresse email" required
                        >
                        @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Envoyer</button>
                </form>
            @endif
        </div>
    </div>
@endsection
