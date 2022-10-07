@extends('backend.layout.dashboard')

@section('title', 'Gestion des articles | LTDD Administration')
@section('dashboard_section', 'Articles')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <div class="d-inline-block">
                            <select onchange="window.location.href = this.value">
                            <option value="{{ route('lb_admin.admin.posts.index') }}" @unless($slug) selected @endunless>Toutes cat&eacute;gories</option>
                            @foreach($categories as $category)
                                <option value="{{ route('lb_admin.admin.posts.category', ['slug' => $category->slug]) }}" {{ $slug == $category->slug ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-inline-block">
                        <select onchange="window.location.href = this.value">
                            <option value="{{ route('lb_admin.admin.posts.index') }}" @unless($user_id) selected @endunless>Tous les utilisateurs</option>
                            @foreach($users as $user)
                        <option value="{{ route('lb_admin.admin.posts.user', ['user_id' => $user->id]) }}" {{ $user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <p class="d-inline-block float-right">
                        <a href="{{ route('lb_admin.admin.post.create') }}" class="btn btn-primary" ><i class="fa fa-plus-square"></i>&nbsp; Ajouter un article</a>
                    </p>
                </div>
            </section>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Liste des articles</div>
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
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>N°</th>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($posts as $post)
                    <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td>{{$post->title}}</td>
                    <td>{{substr($post->description, 0, 80)}}...</td>
                    <td class="text-justify">
                        <a href="{{ route('lb_admin.admin.post.edit', $post->slug) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a>
                        <a href="{{ route('lb_admin.admin.post.show', $post->slug) }}" title="Détails"><i class="fa fa-eye text-success"></i></a>
                        <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.post.delete', $post->id) }}" title="Supprimer">
                            <i class="fa fa-trash-o text-danger"></i>
                        </a>
                    </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Les articles par cat&eacute;gorie et par utilisateurs</div>
        </div>

    {{ $posts->links() }}

@endsection
