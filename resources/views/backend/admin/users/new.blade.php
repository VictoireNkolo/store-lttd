@extends('backend.layout.dashboard')

@section('title', 'Ajouter un utilisateur | LaraBlog')
@section('dashboard_section', 'Nouvel utilisateur')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nouvel utilisateur</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.user.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <select
                        name="role"
                        class="form-control @error('name') is-invalid @enderror" required="required"
                    >
                        <option value="{{ old('role') }}">S&eacute;lectionnez un r&ocirc;le...</option>
                        <option value="admin">Administrateur</option>
                        <option value="user">Utilisateur</option>
                    </select>
                    @error('role')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        type="text" name="name" placeholder="Nom" required
                    >
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <input
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                        type="email" aria-describedby="emailHelp" placeholder="Email" required
                    >
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="form-row">
                        <div class="col-md-6">
                            <input
                                class="form-control @error('password') is-invalid @enderror" name="password"  type="password"
                                placeholder="Password" required
                            >
                            @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <input
                                class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                type="password" placeholder="Confirm password" required
                            >
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enr&eacute;gistrer</button>
            </form>
        </div>
    </div>

@endsection
