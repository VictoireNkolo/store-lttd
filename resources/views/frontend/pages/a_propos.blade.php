@extends('frontend.layout.front')

@section('title', $page->slug.' | Mon Ouvrage Bois')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="about-page-wrap">
            <div class="about-page-active next-prev-style">
                <div class="about-page-img">
                    <img src="{{ asset('frontend/images/about/7.jpg') }}" alt="">
                </div>
                <div class="about-page-img">
                    <img src="{{ asset('frontend/images/about/8.jpg') }}" alt="">
                </div>
            </div>
            <p>Le meilleur ouvrage en bois  est  réalisé « sur mesure » autrement dit, conçu en fonction du milieu ou il vivra, des moyens, de l’usage et des gouts de son propriétaire.</p>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="about-sidebar">
            <h3>Qui sommes-nous</h3>
            <div class="about-sidebar">
                <p>MOB (Mon Ouvrage en Bois) est un groupe, spécialisé dans  les métiers du bois. Dans ce cadre d’activité, il s’occupe : de la conception, la réalisation, l’entretien et la réfection de tout ouvrage en bois et dérivés.</p>
                <hr>
                <p>Travailler avec <b>MOB</b> présente des avantages en ce sens que chez nous, la <b>qualité</b> et la <b>collaboration</b> sont de rigueur. Nos clients peuvent visualiser en 3D leur futur ouvrage, lui apporté des modifications en fonction de leurs capitaux et leurs préférences.</p>
            </div>
            <div class="about-sidebar-img">
                <img src="{{ asset('frontend/images/about/sidebar.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>

@endsection
