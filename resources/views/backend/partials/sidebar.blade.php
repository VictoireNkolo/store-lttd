<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{ \Illuminate\Support\Facades\Auth::user()->role == 'admin' ? route('lb_admin.admin.dashboard.index') : route('lb_admin.user.dashboard.index') }}">Tableau de bord</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            @if(\Illuminate\Support\Facades\Auth::user()->role == 'admin')
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Utilisateurs">
                <a class="nav-link" href="{{ route('lb_admin.admin.user.index') }}">
                        <i class="fa fa-fw fa-users"></i>
                        <span class="nav-link-text">
                        Utilisateurs
                    </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pages">
                    <a class="nav-link" href="{{ route('lb_admin.admin.pages.index') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">
                            Pages
                        </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cat&eacute;gories">
                <a class="nav-link" href="{{ route('lb_admin.admin.category.index') }}">
                        <i class="fa fa-fw fa-paper"></i>
                        <span class="nav-link-text">
                            Cat&eacute;gories
                        </span>
                    </a>
                </li>
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Articles">
                <a class="nav-link" href="{{ route('lb_admin.admin.posts.index') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">
                            Articles
                        </span>
                    </a>
                </li>
                <li class="nav-item active" data-toggle="tooltip" data-placement="right" title="Produits">
                    <a class="nav-link" href="{{ route('lb_admin.admin.products.index') }}">
                        <i class="fa fa-fw fa-newspaper-o"></i>
                        <span class="nav-link-text">
                            Produits
                        </span>
                    </a>
                </li>
            @else
                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Articles">
                <a class="nav-link" href="{{ route('lb_admin.user.post.get_user_posts', \Illuminate\Support\Facades\Auth::user()->id) }}">
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
                <a class="nav-link"  href="#">
                    <i class="fa fa-fw fa-user"></i>{{ \Illuminate\Support\Facades\Auth::user()->name }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="modal" href="{{ route('lb_admin.logout') }}">
                    <i class="fa fa-fw fa-sign-out"></i>Se d&eacute;connecter
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }} " target="_blank">
                    <i class="fa fa-fw fa-eye"></i>Voir le site
                </a>
            </li>
        </ul>
    </div>
</nav>
