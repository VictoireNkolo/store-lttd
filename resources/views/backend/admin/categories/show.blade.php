@extends('backend.layout.dashboard')

@section('title', 'Catégories | LaraBlog')
@section('dashboard_section', 'Categories / '.$category->slug)

@section('content')

    <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-eye"></i> {{ $category->name }}</div>
        <div class="card-body">
            <div class="card-body text-secondary">
            <p>{{ $category->description }}</p>
            </div>
        </div>
        <div class="card-footer text-muted">
            Est active : {{ $category->is_active }} |
            <a href="{{ route('lb_admin.admin.category.edit', $category->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a> |
            <a onclick="return confirm('Voulez vous vraiment supprimer cet �l�ment?');" href="{{ route('lb_admin.admin.category.delete', $category->id) }}" title="Supprimer">
                <i class="fa fa-trash-o text-danger"></i>
            </a>
        </div>
    </div>

@endsection
