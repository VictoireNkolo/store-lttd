<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a
        class="navbar-brand"
        href="{{ \Illuminate\Support\Facades\Auth::user()->role == 'admin' ? route('lb_admin.admin.dashboard.index') : route('lb_admin.user.dashboard.index') }}"
    >
        <i class="fa fa-fw fa-area-chart"></i>
        <span class="nav-link-text">
            Tableau de bord
        </span>
    </a>
    <button
        class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
        data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
        aria-label="Toggle navigation"
    >
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'users' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Utilisateurs">
                    <a class="nav-link" href="{{ route('lb_admin.admin.user.index') }}">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">
                            Utilisateurs
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'pages' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Pages">
                    <a class="nav-link" href="{{ route('lb_admin.admin.pages.index') }}">
                        <i class="fa fa-fw fa-paypal"></i>
                        <span class="nav-link-text">
                            Pages du site
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'product_categories' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Cat&eacute;gories des produits">
                    <a class="nav-link" href="{{ route('lb_admin.admin.product_category.index') }}">
                        <i class="fa fa-fw fa-product-hunt"></i>
                        <span class="nav-link-text">
                            Cat&eacute;gories des produits
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'products' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Produits"
                >
                    <a class="nav-link" href="{{ route('lb_admin.admin.products.index') }}">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                        <span class="nav-link-text">
                            Produits
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'models' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Cat&eacute;gories d'articles">
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa-user-circle"></i>
                        <span class="nav-link-text">
                            Mannequins
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'categories' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Cat&eacute;gories d'articles">
                    <a class="nav-link" href="{{ route('lb_admin.admin.category.index') }}">
                        <i class="fa fa-fw fa-paper-plane-o"></i>
                        <span class="nav-link-text">
                            Cat&eacute;gories d'articles
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'posts' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Articles"
                >
                    <a class="nav-link" href="{{ route('lb_admin.admin.posts.index') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">
                            Articles
                        </span>
                    </a>
                </li>
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'settings' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Paramètres"
                >
                    <a class="nav-link" href="#">
                        <i class="fa fa-fw fa-cogs"></i>
                        <span class="nav-link-text">
                            Paramètres de la boutique
                        </span>
                    </a>
                </li>
            @else
                <li class="nav-item {{ substr(Route::current()->uri(), 14) === 'posts' ? 'active' : '' }}"
                    data-toggle="tooltip" data-placement="right" title="Articles"
                >
                    <a class="nav-link"
                       href="{{ route('lb_admin.user.post.get_user_posts', \Illuminate\Support\Facades\Auth::user()->id) }}">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">
                        Articles
                    </span>
                    </a>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-fw fa-user"></i>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-fw fa-power-off text-danger"></i>Se d&eacute;connecter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }} " target="_blank">
                    <i class="fa fa-fw fa-eye text-primary"></i>Voir le site
                </a>
            </li>
        </ul>
    </div>
</nav>
