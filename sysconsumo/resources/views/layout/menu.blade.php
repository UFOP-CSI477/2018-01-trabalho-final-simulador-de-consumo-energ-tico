<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/">
                    <i class="fa-flash"></i>CONSUMO ENERGÉTICO
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            @guest
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                      <a href="{{ route('register') }}">Cadastrar</a>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">Entrar</a>
                    </li>
                </ul>
            @endguest
            @auth
                <ul class="navbar-mobile__list list-unstyled">
                @if(Auth::user()->type==1)
                    <li>
                        Distribuidora: <strong>{{ Auth::user()->distributor->name }}</strong>
                        <a href="{{ route('user.edit', Auth::user()->id) }}">Alterar distribuidora</a>
                    </li>
                    <hr>
                    <li class="has-sub">
                        <a class="js-arrow" href="#"><i class="fa fa-bars"></i>Cômodos</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('rooms.create') }}">Adicionar novo</a>
                            </li>
                            <li>
                                <a href="{{ route('rooms.index') }}"><i class="fa fa-plus"></i>Meus cômodos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('reports.index')}}">
                            <i class="fas fa-chart-bar"></i>Relatórios</a>
                    </li>
                @else
                    <li class="has-sub">
                        <a class="js-arrow" href="#"><i class="fa fa-bars"></i>Distribuidoras</a>
                        <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{ route('distributors.index') }}">Listar</a>
                            </li>
                            <li>
                                <a href="{{ route('distributors.create') }}">Cadastrar</a>
                            </li>
                        </ul>
                    </li>
                @endif
                </ul>
            @endauth
        </div>
    </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        @guest
            <a href="/">
        @else
            <a href="{{ route('user.index') }}">
        @endguest
                <div class="row">
                    <div class="col-md-3">
                        <h1 style="text-align: center;"><i class="fa fa-flash"></i></h1>
                    </div>
                    <div class="col-md-9">
                        <h3 class="pb-2 display-5"> CONSUMO ENERGÉTICO</h3>
                    </div>
                </div>
            </a>
    </div>

    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
             @guest
                <ul class="list-unstyled navbar__list">
                    <li>
                      <a href="{{ route('register') }}">Cadastrar</a>
                    </li>
                    <li>
                      <a href="{{ route('login') }}">Entrar</a>
                    </li>
                </ul>
            @endguest
            @auth
                <ul class="list-unstyled navbar__list">
                @if(Auth::user()->type==1)
                <li>
                    Distribuidora: <strong>{{ Auth::user()->distributor->name }}</strong>
                    <a href="{{ route('user.edit', Auth::user()->id) }}">Alterar distribuidora</a>
                </li>
                <hr>
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fa fa-bars"></i>Cômodos</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('rooms.create') }}"><i class="fa fa-plus"></i>Adicionar novo</a>
                        </li>
                        <li>
                            <a href="{{ route('rooms.index') }}">Meus cômodos</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('reports.index')}}">
                        <i class="fas fa-chart-bar"></i>Relatórios</a>
                </li>
                @else
                <li class="has-sub">
                    <a class="js-arrow" href="#"><i class="fa fa-bars"></i>Cômodos</a>
                    <ul class="list-unstyled navbar__sub-list js-sub-list">
                        <li>
                            <a href="{{ route('rooms.create') }}"><i class="fa fa-plus"></i>Adicionar cômodo</a>
                        </li>
                        <li>
                            <a href="{{ route('rooms.index') }}">Meus cômodos</a>
                        </li>
                    </ul>
                </li>

                @endif
            @endauth
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->