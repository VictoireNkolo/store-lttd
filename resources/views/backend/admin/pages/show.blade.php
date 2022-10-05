@extends('backend.layout.dashboard')

@section('title', 'Détails de la page | LaraBlog')
@section('dashboard_section', 'Page / '.$page->slug)

@section('content')

    <div class="card mb-3">
        <div class="card-header">
        <i class="fa fa-eye"></i> {{ $page->title }}</div>
        <div class="card-body">
            <div class="card-body text-secondary">
            <p>{{ $page->text }}</p>
            </div>
        </div>
        <div class="card-footer text-muted">
            Est active : @if ($page->is_active === 1)
                    <i class="fa fa-thumbs-o-up text-success"></i>
                @else
                    <i class="fa fa-thumbs-o-up text-danger"></i>
                @endif  |
            <a href="{{ route('lb_admin.admin.page.edit', $page->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a> |
            <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.page.delete', $page->id) }}" title="Supprimer">
                <i class="fa fa-trash-o text-danger"></i>
            </a>
        </div>
    </div>

@endsection
