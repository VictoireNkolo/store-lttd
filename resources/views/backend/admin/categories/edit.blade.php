@extends('backend.layout.dashboard')

@section('title', 'Gestion categories | LaraBlog')
@section('dashboard_section', 'Update catégorie')

@section('content')

    <div class="card card-register mx-auto mt-5">
    <div class="card-header">Mise &agrave; jour <i>{{ $category->name }}</i></div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.category.update') }}" method="post">
                @csrf
                <div class="form-group">
                    <input
                        class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}"
                        type="text" name="name" required
                    >
                    <input type="hidden" name="id" value="{{ $category->id }}">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea
                        class="form-control @error('description') is-invalid @enderror" name="description" required
                    >{{ $category->description }}</textarea>
                    @error('description')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block">Mettre &agrave; jour</button>
            </form>
        </div>
    </div>

@endsection
