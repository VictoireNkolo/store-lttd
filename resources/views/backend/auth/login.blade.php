@extends('backend.layout.auth')

@section('title', 'Connexion | LTDD Aministration')

@section('content')
    <div class="card card-login mx-auto mt-5">
        <div class="card-header text-center">
            <i class="fa fa-fw fa-user-secret"></i>
            <span class="nav-link-text">
                Connexion
            </span>
        </div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            @if(session()->exists('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            <form action="{{ route('login.save') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">
                        <i class="fa fa-fw fa-envelope text-primary"></i>
                        <span class="nav-link-text">
                            Email
                        </span>
                    </label>
                    <input
                        class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"
                        type="email"  name="email" aria-describedby="emailHelp" placeholder="Enter email"
                        id="email" required
                    >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">
                        <i class="fa fa-fw fa-lock text-primary"></i>
                        <span class="nav-link-text">
                            Password
                        </span>
                    </label>
                    <input
                        class="form-control @error('password') is-invalid @enderror" type="password"
                        placeholder="Password" name="password" id="password" required
                    >
                    @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="checkbox"> Se souvenir de moi</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
            </form>
            <div class="text-center">
                <a class="d-block small mt-3" href="{{ route('password.request') }}">Mot de passe oubli&eacute; ?</a>
            </div>
        </div>
    </div>
@endsection
