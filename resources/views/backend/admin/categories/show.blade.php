@extends('backend.layout.dashboard')

@section('title', 'Catégories articles | LTDD administration')
@section('dashboard_section', 'Categories articles / '.$category->slug)

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

    <div class="card mb-3 mt-3">
        <div class="card-header">
        <i class="fa fa-eye"></i> {{ $category->name }}</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4 text-center my-auto">
                    <div class="h5 mb-0 text-secondary">Nom</div>
                    <hr>
                </div>
                <div class="col-sm-8 my-auto text-secondary">
                    <p>{{ $category->name }}</p>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 text-center my-auto">
                    <div class="h5 mb-0 text-secondary">Description</div>
                </div>
                <div class="col-sm-8 my-auto text-secondary">
                    <p>{{ $category->description }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            Est active : {!! $category->is_active ? '<i class="fa fa-thumbs-up text-success"></i>' : '<i class="fa fa-thumbs-down text-danger"></i>' !!} |
            <a href="{{ route('lb_admin.admin.category.edit', $category->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a> |
            <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                <i class="fa fa-trash-o text-danger"></i>
            </a>
        </div>
    </div>
    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.category.delete', 'elementId' => $category->id ])
@endsection
