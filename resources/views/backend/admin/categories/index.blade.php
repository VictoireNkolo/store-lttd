@extends('backend.layout.dashboard')

@section('title', 'Gestion des catégories-articles | LTDD Administration')
@section('dashboard_section', 'Catégories d\'articles')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                <a href="{{ route('lb_admin.admin.category.create') }}" class="btn btn-primary" >
                    <i class="fa fa-plus-square"></i>&nbsp; Ajouter une cat&eacute;gorie d'articles
                </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Liste des cat&eacute;gories d'articles</div>
        <div class="card-body">
            @if(session()->exists('success'))
                <div class="alert alert-success">{{ session()->get('success') }}</div>
            @endif
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Est active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Slug</th>
                    <th>Est active</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($categories as $category)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>
                        {!! $category->is_active ? '<i class="fa fa-thumbs-up text-primary"></i>' : '<i class="fa fa-thumbs-down text-danger"></i>' !!}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('lb_admin.admin.category.edit', $category->id) }}" title="Modifier">
                            <i class="fa fa-edit text-primary"></i>
                        </a> -
                        <a href="{{ route('lb_admin.admin.category.show', $category->id) }}" title="Détails">
                            <i class="fa fa-eye text-success"></i>
                        </a> -
                        <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.category.delete', 'elementId' => $category->id ])
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des cat&eacute;gories des articles</div>
    </div>

@endsection
