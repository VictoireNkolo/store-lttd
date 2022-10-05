@extends('backend.layout.dashboard')

@section('title', 'Ajouter une page | MOB')
@section('dashboard_section', 'Nouvelle page')

@section('content')

    <div class="card card-register mx-auto mt-5">
        <div class="card-header">Nouvelle page</div>
        <div class="card-body">
            @if(session()->exists('error'))
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            @endif
            <form action="{{ route('lb_admin.admin.page.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <select name="parent_id" simple  class="form-control @error('parent_id') is-invalid @enderror" required>
                        <option value="">Choix de la page parente...</option>
                        <option value="0" {{ (old('parent_id') === 0) ? 'selected' : '' }}>Self</option>
                        @foreach($pages as $page)
                            <option value="{{ $page->id }}" {{ (old('parent_id') === $page->id)  ? 'selected' : '' }}>{{ $page->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="menu_position" simple  class="form-control @error('menu_position') is-invalid @enderror" required>
                        <option value="">Choix de la position dans le menu...</option>
                        @for ($i = 1; $i < 10; $i++)
                            <option value="{{ $i }}" {{ (old('menu_position') === $i)  ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <select name="sub_menu_position" simple  class="form-control @error('sub_menu_position') is-invalid @enderror" required>
                        <option value="">Choix de la position dans le sous menu...</option>
                        @for ($i = 0; $i < 10; $i++)
                            <option value="{{ $i }}" {{ (old('sub_menu_position') === $i)  ? 'selected' : '' }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <input
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                        type="text" name="title" placeholder="Titre de la page" required
                    >
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <textarea
                        class="form-control @error('text') is-invalid @enderror" name="text" value="{{ old('text') }}"
                        id="text" required rows="5"
                    >
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
                                value="1"
                            >
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Enr&eacute;gistrer</button>
            </form>
        </div>
    </div>

@endsection

@section('js')

@endsection
