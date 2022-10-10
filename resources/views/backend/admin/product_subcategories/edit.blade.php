@extends('backend.layout.dashboard')

@section('title', 'Editer un produit | MOB')
@section('dashboard_section', 'Mise à jour produit')

@section('content')

    <div class="row">
        <div class="col col-lg-12">
            <section class="card">
                <div class="card-body text-secondary">
                    <a href="{{ route('lb_admin.admin.products.index') }}" class="btn btn-primary" >
                        <i class="fa fa-arrow-left"></i>&nbsp; Retour à la liste des produits
                    </a>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-8">
            <div class="card mt-3">
                <div class="card-header">
                    <i class="fa fa-fw fa-pencil-square-o text-primary"></i> Mise à jour produit
                </div>
                <div class="card-body">
                    @if(session()->exists('error'))
                        <div class="alert alert-danger">{{ session()->get('error') }}</div>
                    @endif
                    <!--button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button -->
                    <form action="{{ route('lb_admin.admin.product.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="categories">Categorie(s)</label>
                            <select name="categories[]" multiple  class="form-control @error('categories[]') is-invalid @enderror" id="categories" required>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ in_array($category->id, old('categories') ?: $product->categories->pluck('id')->toArray()) ? 'selected' : '' }}
                                >
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Nom</label>
                            <input
                                class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}"
                                type="text" name="name" placeholder="Nom" id="name" required
                            >
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea
                                class="form-control @error('description') is-invalid @enderror" name="description"
                                aria-describedby="descriptionHelp" placeholder="Description" id="description" required rows="5"
                            >
                            {{ $product->description }}
                            </textarea>
                            @error('description')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="price">Prix</label>
                            <input
                                class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}"
                                type="text" name="price" placeholder="Prix en FCFA" id="price" required
                            >
                            @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="weight">Poids</label>
                            <input
                                class="form-control @error('weight') is-invalid @enderror" value="{{ $product->weight }}"
                                type="text" name="weight" placeholder="Poids en KG" id="weight" required
                            >
                            @error('weight')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantit&eacute; en stock</label>
                            <input
                                class="form-control @error('quantity') is-invalid @enderror" value="{{ $product->quantity }}"
                                type="number" name="quantity" placeholder="Quantité disponible" id="quantity" required
                            >
                            @error('quantity')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="quantity_alert">Quantit&eacute; pour alerte rupture stock</label>
                            <input
                                class="form-control @error('quantity_alert') is-invalid @enderror" value="{{ $product->quantity_alert }}"
                                type="number" name="quantity_alert" placeholder="Quantité pour alerte stock" id="quantity_alert" required
                            >
                            @error('quantity_alert')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group{{ $errors->has('image') ? ' is-invalid' : '' }}">
                            <label for="image">Image</label>
                            @if(isset($product) && !$errors->has('image'))
                              <div>
                                <p><img src="{{ asset('images/thumbs/' . $product->image) }}"></p>
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

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" @if(old('is_active', isset($product) ? $product->is_active : false)) checked @endif>
                              <label class="custom-control-label" for="is_active">Produit actif  ?</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Mettre &agrave; jour</button>
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
