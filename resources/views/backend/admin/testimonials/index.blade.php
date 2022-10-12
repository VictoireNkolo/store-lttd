@extends('backend.layout.dashboard')

@section('title', 'Gestion des témoignages | LTDD Administration')
@section('dashboard_section', 'Témoignages')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.testimonial.create') }}" class="btn btn-primary" >
                        <i class="fa fa-plus-square"></i>&nbsp; Ajouter un t&eacute;moignage
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-thumbs-up"></i> Liste des t&eacute;moignages</div>
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
                    <th>Client</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Image</th>
                    <th>Client</th>
                    <th>Commentaire</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($testimonials as $testimonial)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>
                        <div class="small mt-1 mb-1 ml-1 mr-1">
                            <img
                                src="{{ asset('images/thumbs/' . $testimonial->image) }}"
                                alt="{{ $testimonial->client }}" width="5%"
                            >
                        </div>
                    </td>
                    <td>{{ $testimonial->client }}</td>
                    <td>{{substr($testimonial->comment, 0, 80)}}...</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.testimonial.edit', $testimonial->id) }}" title="Modifier">
                            <i class="fa fa-edit text-primary"></i>
                        </a>
                        <a href="{{ route('lb_admin.admin.testimonial.show', $testimonial->id) }}" title="Détails">
                            <i class="fa fa-eye text-success"></i>
                        </a>
                        <a data-toggle="modal" data-target="#deleteModal" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                    @include('backend.ui.deleteModal', ['route' => 'lb_admin.admin.testimonial.delete', 'elementId' => $testimonial->id ])
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des mannequins</div>
    </div>


@endsection
