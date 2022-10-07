@extends('backend.layout.dashboard')

@section('title', $post->slug.' | LaraBlog')
@section('dashboard_section', 'Articles / '.$post->slug)

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-newspaper-o"></i><strong>&nbsp;{{ $post->title }}</strong>
            </div>
            <div class="card-body">
                <div class="text-secondary">
                    <div class="text-justify">{{ $post->description }}</div>
                </div>
                <hr class="mt-2">
            </div>
            <div class="card-footer small text-muted">
                <p class="d-inline-block float-left">
                    Est active : @if ($post->is_active === 1)
                        <i class="fa fa-thumbs-o-up text-success"></i>
                    @else
                        <i class="fa fa-thumbs-o-up text-danger"></i>
                    @endif  |
                    <a href="{{ route('lb_admin.admin.post.edit', $post->slug) }}" title="Modifier"><i class="fa fa-edit text-primary"></i></a>&nbsp;|
                    <a onclick="return confirm('Voulez vous vraiment supprimer cet élément?');" href="{{ route('lb_admin.admin.post.delete', $post->slug) }}" title="Supprimer">
                    <i class="fa fa-trash-o text-danger"></i></a>
                </p>
                <p class="d-inline-block float-right">R&eacute;dig&eacute; le : {{ $post->created_at }}</p>
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
                    @foreach ($post->categories as $category)
                        <li>
                            <a class="list-group-item list-group-item-action" href="{{ route('lb_admin.admin.posts.category', $category->slug) }}">
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
