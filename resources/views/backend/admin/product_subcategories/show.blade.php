@extends('backend.layout.dashboard')

@section('title', 'Détails sous-catégorie | LTDD Administration')
@section('dashboard_section', 'Détails sous-catégorie de produits / '.$productSubcategory->name)

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.product_subcategory.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des sous-cat&eacute;gories
                    </a>
                </div>
            </section>
        </div>
    </div>

<div class="row mt-2">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-eye"></i> Image de la sous-cat&eacute;gorie
            </div>
            <div class="list-group list-group-flush small mt-1 mb-1 ml-1 mr-1">
                <img src="{{ asset('images/' . $productSubcategory->image) }}" alt="{{ $productSubcategory->name }}" width="100%">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-shopping-cart"></i><strong>&nbsp;{{ $productSubcategory->name }}</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    Description&nbsp;:&nbsp;<div class="text-justify">{{ $productSubcategory->description }}</div>
                </div>
                <hr class="mt-2">
            </div>
            <div class="card-footer small text-muted">
                <p class="d-inline-block float-left">
                    Est actif : @if ($productSubcategory->is_active === 1)
                        <i class="fa fa-thumbs-o-up text-success"></i>
                    @else
                        <i class="fa fa-thumbs-o-up text-danger"></i>
                    @endif  |
                    <a
                        href="{{ route('lb_admin.admin.product_subcategory.edit', $productSubcategory->id) }}"
                        title="Modifier"
                    >
                        <i class="fa fa-edit text-primary"></i>
                    </a>&nbsp;|
                    <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                        <i class="fa fa-trash-o text-danger"></i>
                    </a>
                </p>
                <p class="d-inline-block float-right">Cr&eacute;&eacute;e le : {{ $productSubcategory->created_at }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bell-o"></i> Cat&eacute;gorie associ&eacute;e
            </div>
            <div class="list-group list-group-flush small">
                <ul>
                    <li>
                        <a
                            class="list-group-item list-group-item-action"
                            href="{{ route('lb_admin.admin.product_category.show', $productSubcategory->product_category->id) }}"
                        >
                            <div class="media">
                                <div class="media-body">
                                    <strong>{{ $productSubcategory->product_category->name }}</strong>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="media">
                            <div class="media-body">
                                <p>{{ $productSubcategory->product_category->description }}</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.product_subcategory.delete', 'elementId' => $productSubcategory->id ])
@endsection
