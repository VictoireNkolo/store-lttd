@extends('backend.layout.dashboard')

@section('title', $product->slug.' | MOB')
@section('dashboard_section', 'Produits / '.$product->name)

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.products.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des produits
                    </a>
                </div>
            </section>
        </div>
    </div>

<div class="row mt-2">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-eye"></i> Image du produit:
            </div>
            <div class="list-group list-group-flush small mt-1 mb-1 ml-1 mr-1">
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100%">
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-newspaper-o"></i><strong>&nbsp;{{ $product->name }}</strong>
            </div>
            <div class="card-body">
                <div class="row">
                    Description&nbsp;:&nbsp;<div class="text-justify">{{ $product->description }}</div>
                </div>
                <hr class="mt-2">
                <div class="row">
                    Prix&nbsp;en&nbsp;XFA:&nbsp;<div class="text-justify">{{ $product->price }}</div>
                </div>
                <hr class="mt-2">
                <div class="row">
                    Poids&nbsp;:&nbsp;<div class="text-justify">{{ $product->weight }}</div>
                </div>
                <hr class="mt-2">
                <div class="row">
                    En stock&nbsp;:&nbsp;<div class="text-justify">{{ $product->quantity }}</div>
                </div>
                <hr class="mt-2">
            </div>
            <div class="card-footer small text-muted">
                <p class="d-inline-block float-left">
                    Est actif : @if ($product->is_active === 1)
                        <i class="fa fa-thumbs-o-up text-success"></i>
                    @else
                        <i class="fa fa-thumbs-o-up text-danger"></i>
                    @endif  |
                    <a href="{{ route('lb_admin.admin.product.edit', $product->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a>&nbsp;|
                    <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                        <i class="fa fa-trash-o text-danger"></i>
                    </a>
                </p>
                <p class="d-inline-block float-right">Cr&eacute;&eacute; le : {{ $product->created_at }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bell-o"></i> Cat&eacute;gorie(s) associ&eacute;e(s):
            </div>
            <div class="list-group list-group-flush small">
                <ul>
                    @foreach ($product->categories as $category)
                        <li>
                            <a class="list-group-item list-group-item-action" href="{{ route('lb_admin.admin.products.category', $category->slug) }}">
                                <div class="media">
                                    <div class="media-body">
                                        <strong>{{ $category->name }}</strong>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.product.delete', 'elementId' => $product->id ])
@endsection
