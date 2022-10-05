@extends('backend.layout.auth')

@section('title', 'nouveau mot de passe | LaraBlog')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Entrez le nouveau mot de passe</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('password.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input
                                class="form-control @error('password') is-invalid @enderror" name="password"  type="password"
                                placeholder="Nouveau mot de passe" required
                            >
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input
                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                type="password" placeholder="Confirmez mot de passe" required
                            >
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">R&eacute;initialiser</button>
            </form>
        </div>
    </div>

@endsection
