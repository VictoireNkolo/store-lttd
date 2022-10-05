<div class="breadcumb-area black-opacity bg-img-6">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcumb-wrap">
                    <h2>Mob-{{ Route::current()->uri() }}</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Accueil</a></li>
                        <li>/</li>
                        <li>{{ Route::current()->uri() }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
