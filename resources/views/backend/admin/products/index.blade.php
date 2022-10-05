@extends('backend.layout.dashboard')

@section('title', 'Gestion des produits | MOB')
@section('dashboard_section', 'Produits')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <div class="d-inline-block">
                            <select onchange="window.location.href = this.value">
                            <option value="{{ route('lb_admin.admin.products.index') }}" @unless($slug) selected @endunless>Toutes cat&eacute;gories</option>
                            @foreach($categories as $category)
                                <option value="{{ route('lb_admin.admin.products.category', ['slug' => $category->slug]) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="d-inline-block float-right">
                        <a href="{{ route('lb_admin.admin.product.create') }}" class="btn btn-primary" ><i class="fa fa-plus-square"></i>&nbsp; Ajouter un produit</a>
                    </p>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Liste des produits</div>
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
                    <th>Qt&eacute;</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Qt&eacute;</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($products as $product)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->price}}</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.product.edit', $product->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a>
                        <a href="{{ route('lb_admin.admin.product.show', $product->id) }}" title="Détails"><i class="fa fa-eye text-success"></i></a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.product.delete', $product->id) }}" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Les produits par cat&eacute;gorie</div>
        </div>

    {{ $products->links() }}

@endsection
