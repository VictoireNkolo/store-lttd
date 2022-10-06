@extends('backend.layout.dashboard')

@section('title', 'Gestion des utilisateurs | LaraBlog')
@section('dashboard_section', 'Utilisateurs')

@section('content')

    <!-- Icon Cards-->

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                <a href="{{ route('lb_admin.admin.user.new') }}" class="btn btn-primary" ><i class="fa fa-plus-square"></i>&nbsp; Ajouter un utilisateur</a>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header text-primary">
            <i class="fa fa-users"></i> Liste des utilisateurs
        </div>
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
                    <th>Email</th>
                    <th>Role</th>
                    <th>Cr&eacute;&eacute; le</th>
                    <th>Est actif</th>
                    <th>Est suspendu</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Cr&eacute;&eacute; le</th>
                    <th>Est actif</th>
                    <th>Est suspendu</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->is_active}}</td>
                    <td>{{$user->is_suspend}}</td>
                    <td>
                        <a href="" title="Modifier"><i class="fa fa-edit text-primary"></i></a>
                        <a href="" title="Détails"><i class="fa fa-eye text-success"></i></a>
                    <a
                        onclick="return confirm('Confirmez-vous la suppression de cet élément?');"
                        href="{{ route('lb_admin.admin.user.delete', $user->id) }}" title="Supprimer"
                    >
                        <i class="fa fa-trash-o text-danger"></i>
                    </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Gestion des utilisateurs</div>
    </div>

    {{ $users->links() }}

@endsection
