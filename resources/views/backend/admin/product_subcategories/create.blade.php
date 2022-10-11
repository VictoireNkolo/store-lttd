@extends('backend.layout.dashboard')

@section('title', 'Ajouter une sous-catégorie | LTDD Administration')
@section('dashboard_section', 'Nouvelle sous-catégorie de produits')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.product_subcategory.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des sous-cat&eacute;gories
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header">Nouvelle sous-cat&eacute;gorie de produits</div>
                <div class="card-body">
                    @if(session()->exists('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                    <!--button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button -->
                    <form action="{{ route('lb_admin.admin.product_subcategory.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="product_category_id">Categorie(s) de produits</label>
                            <select
                                name="product_category_id"  class="form-control @error('product_category_id') is-invalid @enderror"
                                id="product_category_id" required
                            >
                                <option
                                    value=""
                                >
                                    S&eacute;lectionnez la cat&eacute;gorie parente
                                </option>
                                @foreach($productCategories as $productCategory)
                                    <option
                                        value="{{ $productCategory->id }}"
                                        {{ $productCategory->id === old('product_category_id') ? 'selected' : '' }}>
                                        {{ $productCategory->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                type="text" name="name" placeholder="Nom" id="name" required
                            >
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                aria-describedby="descriptionHelp" placeholder="Description" id="description" required rows="10"
                            >
                                {{ old('description') }}
                            </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
                            <label for="image">Image</label>
                            @if(isset($productSubcategory) && !$errors->has('image'))
                              <div>
                                <p><img src="{{ asset('images/thumbs/' . $productSubcategory->image) }}"></p>
                                <button id="changeImage" class="btn btn-warning">Changer d'image</button>
                              </div>
                            @endif
                            <div id="wrapper">
                              @if(!isset($product) || $errors->has('image'))
                                <div class="custom-file">
                                  <input type="file" id="image" name="image"
                                        class="{{ $errors->has('image') ? ' is-invalid ' : '' }}custom-file-input" required>
                                  <label class="custom-file-label" for="image"></label>
                                  @if ($errors->has('image'))
                                    <div class="invalid-feedback">
                                      {{ $errors->first('image') }}
                                    </div>
                                  @endif
                                </div>
                              @endif
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Enr&eacute;gistrer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-2"></div>
    </div>

@endsection

@section('js')
  <script>
    $(document).ready(() => {
      $('form').on('change', '#image', e => {
        $(e.currentTarget).next('.custom-file-label').text(e.target.files[0].name);
      });
      $('#changeImage').click(e => {
        $(e.currentTarget).parent().hide();
        $('#wrapper').html(`
          <div id="image" class="custom-file">
            <input type="file" id="image" name="image" class="custom-file-input" required>
            <label class="custom-file-label" for="image"></label>
          </div>`
        );
      });
    });
  </script>
@endsection
