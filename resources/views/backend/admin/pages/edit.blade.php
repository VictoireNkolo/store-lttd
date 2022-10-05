@extends('backend.layout.dashboard')

@section('title', 'Editer une page | MOB')
@section('dashboard_section', 'Mise à jour page')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Editer la page</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.page.update') }}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{ $page->id }}">
                <div class="form-group">
                    <select name="parent_id" simple  class="form-control @error('parent_id') is-invalid @enderror" required>
                        <option value="">Choix de la page parente...</option>
                        <option value="0" {{ ($page->parent_id === 0) ? 'selected' : '' }}>Self</option>
                        @foreach($pages as $parent_page)
                            <option value="{{ $parent_page->id }}" {{ ($page->parent_id === $parent_page->id)  ? 'selected' : '' }}>{{ $parent_page->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="menu_position" simple  class="form-control @error('menu_position') is-invalid @enderror" required>
                        <option value="">Choix de la position dans le menu...</option>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{ $i }}" {{ ($page->menu_position === $i)  ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <select name="sub_menu_position" simple  class="form-control @error('sub_menu_position') is-invalid @enderror" required>
                        <option value="">Choix de la position dans le sous menu...</option>
                        @for ($i = 0; $i < 10; $i++)
                            <option value="{{ $i }}" {{ ($page->sub_menu_position === $i)  ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <input
                        class="form-control @error('title') is-invalid @enderror" value="{{ $page->title }}"
                        type="text" name="title" placeholder="Titre de la page" required
                    >
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea
                        class="form-control @error('text') is-invalid @enderror" name="text"
                        id="text" required rows="5"
                    >{{ $page->text }}
                    </textarea>
                    @error('text')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="checkbox">
                        <label>
                            Active ?
                            <input
                                type="checkbox" name="is_active" class="form-control @error('is_active') is-invalid @enderror"
                                value="{{ $page->is_active }}"
                            >
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Mettre &agrave; jour</button>
            </form>
        </div>
    </div>

@endsection

@section('js')

@endsection
