@extends('backend.layout.dashboard')

@section('title', 'Gestion des pages | MOB')
@section('dashboard_section', 'Gestion des pages')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                <a href="{{ route('lb_admin.admin.page.create') }}" class="btn btn-primary" ><i class="fa fa-plus-square"></i>&nbsp; Ajouter une page</a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Liste des pages</div>
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
                    <th>Titre</th>
                    <th>Position menu</th>
                    <th>Est active</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Position menu</th>
                    <th>Est active</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($pages as $page)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$page->title}}</td>
                    <td>{{$page->menu_position}}</td>
                    <td>{{$page->is_active}}</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.page.edit', $page->id) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a>
                        <a href="{{ route('lb_admin.admin.page.show', $page->id) }}" title="Détails"><i class="fa fa-eye text-success"></i></a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.page.delete', $page->id) }}" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Les pages du site</div>
        </div>

    {{ $pages->links() }}

@endsection
