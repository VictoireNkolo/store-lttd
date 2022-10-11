@extends('backend.layout.dashboard')

@section('title', 'Editer un article | LaraBlog')
@section('dashboard_section', 'Mettre à jour un article / '.$post->slug)

@section('content')

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header">{{ $post->slug }}</div>
                <div class="card-body">
                    @if(session()->exists('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                    <form action="{{ route('lb_admin.admin.post.update') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <select name="categories[]" multiple  class="form-control @error('categories[]') is-invalid @enderror" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories') ?: $post->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input
                                class="form-control @error('title') is-invalid @enderror" value="{{ $post->title }}"
                                type="text" name="title" placeholder="Titre" required
                            >
                            <input type="hidden" name="id" value="{{ $post->id }}">
                            @error('title')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <textarea
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                aria-describedby="descriptionHelp" placeholder="Description" required rows="5"
                            >{{ $post->description }}
                            </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Mettre &agrave; jour</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

@endsection
