@extends('backend.layout.dashboard')

@section('title', 'Ajouter une catégorie d\'articles | LTDD Administration')
@section('dashboard_section', 'Nouvelle catégorie d\'articles')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.category.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des cat&eacute;gories pour articles
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card card-register mx-auto mt-3">
        <div class="card-header">Nouvelle cat&eacute;gorie d'artcicle</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.category.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                        <span class="nav-link-text">
                            Nom
                        </span>
                    </label>
                    <input
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        type="text" name="name" id="name" placeholder="Nom" required
                    >
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                        <span class="nav-link-text">
                            Description
                        </span>
                    </label>
                    <textarea
                        class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"
                        aria-describedby="descriptionHelp" id="description" placeholder="Description" required rows="15"
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
