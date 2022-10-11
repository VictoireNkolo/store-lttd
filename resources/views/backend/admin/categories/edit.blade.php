@extends('backend.layout.dashboard')

@section('title', 'Gestion categories-articles | LTDD Administration')
@section('dashboard_section', 'Mise à jour catégorie-articles / '.$category->slug)

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
        <div class="card-header">Mise &agrave; jour <i>{{ $category->name }}</i></div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.category.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">
                        <i class="fa fa-fw fa-edit text-primary"></i>
                        <span class="nav-link-text">
                            Nom
                        </span>
                    </label>
                    <input
                        class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}"
                        type="text" name="name" id="name" required
                    >
                    <input type="hidden" name="id" value="{{ $category->id }}">
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
                        class="form-control @error('description') is-invalid @enderror"
                        name="description" id="description" rows="15" required
                    >
                        {{ $category->description }}
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
