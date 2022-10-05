@extends('frontend.layout.front')

@section('title', $page->slug.' | Mon Ouvrage Bois')

@section('content')

    <div class="row">
        <p>{!! $page->text !!}</p>
    </div>

@endsection
