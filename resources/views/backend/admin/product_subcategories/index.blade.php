@extends('backend.layout.dashboard')

@section('title', 'Gestion des sous-catégories | LTDD Administration')
@section('dashboard_section', 'Sous-catégories')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <div class="d-inline-block">
                        <select onchange="window.location.href = this.value">
                            <option
                                value="{{ route('lb_admin.admin.product_subcategory.index') }}"
                                @unless($productCategoryId) selected @endunless
                            >
                                Cat&eacute;gories parentes
                            </option>
                            @foreach($productCategories as $productCategory)
                                <option
                                    value="{{ route('lb_admin.admin.product_subcategory.product_category', ['product_category_id' => $productCategory->id]) }}"
                                    {{ $productCategoryId == $productCategory->id ? 'selected' : '' }}
                                >
                                    {{ $productCategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <p class="d-inline-block float-right">
                        <a href="{{ route('lb_admin.admin.product_subcategory.create') }}" class="btn btn-primary" >
                            <i class="fa fa-plus-square"></i>&nbsp; Ajouter une sous-cat&eacute;gorie
                        </a>
                    </p>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-tablet"></i> Liste des sous-catégories de produits</div>
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
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($productSubcategories as $productSubcategory)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>
                        <div class="small mt-1 mb-1 ml-1 mr-1">
                            <img
                                src="{{ asset('images/thumbs/' . $productSubcategory->image) }}"
                                alt="{{ $productSubcategory->name }}" width="5%"
                            >
                        </div>
                    </td>
                    <td>{{ $productSubcategory->name }}</td>
                    <td>{{ substr($productSubcategory->description, 0, 50) }} ...</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.product_subcategory.edit', $productSubcategory->id) }}" title="Modifier">
                            <i class="fa fa-edit text-primary"></i>
                        </a>
                        <a href="{{ route('lb_admin.admin.product_subcategory.show', $productSubcategory->id) }}" title="Détails">
                            <i class="fa fa-eye text-success"></i>
                        </a>
                        <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.product_subcategory.delete', 'elementId' => $productSubcategory->id ])
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des sous-cat&eacute;gories de produits</div>
    </div>


@endsection
