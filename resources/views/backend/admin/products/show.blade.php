@extends('backend.layout.dashboard')

@section('title', $product->slug.' | MOB')
@section('dashboard_section', 'Produits / '.$product->name)

@section('content')

<div class="row">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-eye"></i> Image du produit:
            </div>
            <div class="list-group list-group-flush small">
                <img src="{{ asset('images/thumbs/' . $product->image) }}">
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
                    <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.product.delete', $product->id) }}" title="Supprimer">
                    <i class="fa fa-trash-o text-danger"></i></a>
                </p>
                <p class="d-inline-block float-right">C&eacute;&eacute; le : {{ $product->created_at }}</p>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-bell-o"></i> Cat&eacute;gories associ&eacute;es:
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

@endsection
