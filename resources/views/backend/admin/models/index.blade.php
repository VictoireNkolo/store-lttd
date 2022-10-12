@extends('backend.layout.dashboard')

@section('title', 'Gestion des mannequins | LTDD Administration')
@section('dashboard_section', 'Mannequins')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.model.create') }}" class="btn btn-primary" >
                        <i class="fa fa-plus-square"></i>&nbsp; Ajouter un mannequin
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-user-circle"></i> Liste des mannequins</div>
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
                    <th>T&eacute;l&eacute;phone</th>
                    <th>Produit(s) achet&eacute;s</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Image</th>
                    <th>Nom</th>
                    <th>T&eacute;l&eacute;phone</th>
                    <th>Produit(s) achet&eacute;s</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($models as $model)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>
                        <div class="small mt-1 mb-1 ml-1 mr-1">
                            <img
                                src="{{ asset('images/thumbs/' . $model->image) }}"
                                alt="{{ $model->name }}" width="5%"
                            >
                        </div>
                    </td>
                    <td>{{ $model->name }}</td>
                    <td>{{ $model->phone }}</td>
                    <td>{{ $model->products_purchased }}</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.model.edit', $model->id) }}" title="Modifier">
                            <i class="fa fa-edit text-primary"></i>
                        </a>
                        <a href="{{ route('lb_admin.admin.model.show', $model->id) }}" title="Détails">
                            <i class="fa fa-eye text-success"></i>
                        </a>
                        <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.model.delete', 'elementId' => $model->id ])
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des mannequins</div>
    </div>


@endsection
