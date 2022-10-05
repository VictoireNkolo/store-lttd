@extends('frontend.layout.front')

@section('title', $page->slug.' | Mon Ouvrage Bois')

@section('content')

<!--div class="service-area bg-1"-->
<div class="row">
    <div class="col-lg-8 col-12">
        <div class="spacial-wrap">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-6">
                        <div class="service-wrap spacial-item">
                            <div class="service-img ">
                                <img src="{{ asset('images/thumbs/' . $product->image) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="service-content">
                                <h4>{{ $product->name }}</h4>
                                <p class="text-justify">{{ $product->price }} XFA</p>
                                <a href="{{ route('shop_product_details', $product->id) }}">
                                    <i class="fa fa-eye"></i> &nbsp; D&eacute;tails
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-12">
        <div class="spacial-wrap">
            <div class="row list-group-item list-group-item-action">
                @foreach ($categories as $category)
                    <div class="col-12">
                        <a  href="{{ route('shop_category_products', $category->slug) }}">
                            <div class="spacial-item">
                                <i class="flaticon-house-3"></i>&nbsp;&nbsp;{{ $category->name }}
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
