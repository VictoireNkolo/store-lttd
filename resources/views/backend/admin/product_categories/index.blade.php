@extends('backend.layout.dashboard')

@section('title', 'Gestion des catégories de produits | LTDD Administration')
@section('dashboard_section', 'Catégories de produits')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                <a href="{{ route('lb_admin.admin.product_category.create') }}" class="btn btn-primary" >
                    <i class="fa fa-plus-square"></i>&nbsp; Ajouter une cat&eacute;gorie de produits
                </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Liste des cat&eacute;gories de produits</div>
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
                @foreach ($productCategories as $productCategory)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$productCategory->name}}</td>
                    <td>{{$productCategory->slug}}</td>
                    <td>
                        {!! $productCategory->is_active ? '<i class="fa fa-thumbs-up text-primary"></i>' : '<i class="fa fa-thumbs-down text-danger"></i>' !!}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('lb_admin.admin.product_category.edit', $productCategory->id) }}" title="Modifier">
                            <i class="fa fa-edit text-primary"></i>
                        </a> -
                        <a href="{{ route('lb_admin.admin.product_category.show', $productCategory->id) }}" title="Détails">
                            <i class="fa fa-eye text-success"></i>
                        </a> -
                        <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.product_category.delete', 'elementId' => $productCategory->id ])
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des cat&eacute;gories de produits</div>
    </div>

@endsection
