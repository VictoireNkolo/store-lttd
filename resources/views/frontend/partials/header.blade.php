<header class="header-area bg-1" id="sticky-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-9 col-sm-8 col-6">
                <div class="logo">
                    <a href="#"><img src="{{asset('frontend/images/logo.png')}}" alt="MOB"></a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <div class="mainmenu">
                    <ul id="navigation">

                        @foreach ($menu_items as $menu_item)
                            <li class="{{ Route::current()->uri() === $menu_item->slug ? 'active' : '' }}">
                                <a href="{{ route($menu_item->slug) }}">{{ $menu_item->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-1 col-md-2 col-sm-3 col-4">
                <div class="search-wrapper">
                    <ul>
                        <li><a href="javascript:void(0);"><i class="fa fa-search"></i></a>
                            <ul>
                                <li>
                                    <form action="#">
                                        <input type="text" placeholder="Vous recherchez...">
                                        <button><i class="fa fa-search"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-1 col-sm-1 col-2 d-lg-none d-sm-block">
                <div class="responsive-menu-wrap floatright"></div>
            </div>
        </div>
    </div>
</header>
