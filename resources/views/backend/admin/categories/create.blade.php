@extends('backend.layout.dashboard')

@section('title', 'Ajouter une catégorie | LaraBlog')
@section('dashboard_section', 'Nouvelle catégorie')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nouvelle cat&eacute;gorie</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.category.store') }}" method="post">
                @csrf
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
                    <textarea
                        class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"
                        aria-describedby="descriptionHelp" placeholder="Description" required rows="5"
                    >
                    </textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enr&eacute;gistrer</button>
            </form>
        </div>
    </div>

@endsection
