@extends('backend.layout.dashboard')

@section('title', 'Gestion categories de produits | LTDD Administration')
@section('dashboard_section', 'Mise à jour catégorie-produits')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.product_category.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des cat&eacute;gories de produits
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card card-register mx-auto mt-3">
        <div class="card-header">Mise &agrave; jour <i>{{ $productCategory->name }}</i></div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.product_category.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                        <span class="nav-link-text">
                            Nom
                        </span>
                    </label>
                    <input
                        class="form-control @error('name') is-invalid @enderror" value="{{ $productCategory->name }}"
                        type="text" name="name" id="name" required
                    >
                    <input type="hidden" name="id" value="{{ $productCategory->id }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="icon">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                        <span class="nav-link-text">
                            Ic&ocirc;ne
                        </span>
                    </label>
                    <input
                        class="form-control @error('icon') is-invalid @enderror" value="{{ $productCategory->icon }}"
                        type="text" name="icon" id="icon" required
                    >
                    @error('icon')
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
                        class="form-control @error('description') is-invalid @enderror"
                        name="description" id="description" rows="15" required
                    >
                        {{ $productCategory->description }}
                    </textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Mettre &agrave; jour</button>
            </form>
        </div>
    </div>

@endsection
