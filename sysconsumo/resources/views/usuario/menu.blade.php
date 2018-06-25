<nav class="navbar-mobile">
    <div class="container-fluid">
        <ul class="navbar-mobile__list list-unstyled">
            <li class="has-sub">
                <a class="js-arrow" href="#"><i class="fa fa-bars"></i>Cômodos</a>
                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                    <li>
                        <i class="fa fa-plus"></i><a href="{{ route('rooms.create') }}">Adicionar novo</a>
                    </li>
                    <li>
                        <a href="{{ route('rooms.index') }}"><i class="fa fa-plus"></i>Meus cômodos</a>
                    </li>
                    <!-- foreach($rooms as $r)
                        <li>
                            <a href="route('rooms.show', $r->id) }}">$r->name }}</a>
                        </li>
                    endforeach -->
                </ul>
            </li>
            <li>
                <a href="chart.html">
                    <i class="fas fa-chart-bar"></i>Relatórios</a>
            </li>
        </ul>
    </div>
</nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">
    <a class="logo" href="index.html">
        <h1 style="margin-right: 10px;"><i class="fa fa-flash"></i></h1>
        <h3 class="pb-2 display-5"> CONSUMO ENERGÉTICO</h3>
        
    </a>
</div>
<div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
        <ul class="list-unstyled navbar__list">
            <li class="active has-sub">
                <a class="js-arrow" href="#">
                    <i class="fa fa-bars"></i>Cômodos</a>
                <ul class="list-unstyled navbar__sub-list js-sub-list">
                    <li>
                        <a href="{{ route('rooms.create') }}"><i class="fa fa-plus"></i>Adicionar</a>
                    </li>
                    <li>
                        <a href="{{ route('rooms.index') }}">Meus cômodos</a>
                    </li>
                    <!-- foreach($rooms as $r)
                        <li>
                            <a href="route('rooms.show', $r->id) }}">$r->name }}</a>
                        </li>
                    endforeach -->
                </ul>
            </li>
            <li>
                <a href="/adm/relatorios"><i class="fas fa-chart-bar"></i>Relatórios</a>
            </li>
        </ul>
    </nav>
</div>
</aside>
<!-- END MENU SIDEBAR-->