<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>@yield('title') | Consumo energético</title>

    <!-- Fontfaces CSS-->
    <link href="/css/font-face.css" rel="stylesheet" media="all">
    <link href="/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/css/bootstrap4.1.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/css/animsition.min.css" rel="stylesheet" media="all">
    <link href="/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/css/animate.css" rel="stylesheet" media="all">
    <link href="/css/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/css/slick.css" rel="stylesheet" media="all">
    <link href="/css/select2.min.css" rel="stylesheet" media="all">
    <link href="/css/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/css/theme.css" rel="stylesheet" media="all">

    <!-- Jquery JS-->
    <script src="/js/jquery-3.2.1.min.js"></script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a href="#">
                            <i class="fa-flash"></i>CONSUMO ENERGÉTICO
                        </a>
                    </div>
                </div>
            </div>
        <!-- HEADER CONTINUA NO ARQUIVO DE MENU PARA PERMITIR PERSONALIZAÇÃO PARA OS DOIS TIPOS DE USUÁRIO ADMINISTRADOR E USUÁRIO COMUM -->

        <!-- verificar se é adm se for usar o include 1 se não o include 2 -->
        <!-- include('administrativo.menu') -->
        @yield('menu')

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="account-wrap">
                                <div class="account-item clearfix js-item-menu">
                                    <nav class="navbar navbar-dark navbar-expand-md">
                                        <div class="container">
                                            <ul class="navbar-nav ml-auto">
                                                <!-- Authentication Links -->
                                                @guest
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>
                                                    </li>
                                                @else
                                                    <li class="account-item clearfix js-item-menu">
                                                        <a id="navbarDropdown" class="js-acc-btn">
                                                            {{ Auth::user()->name }} <i class="fa fa-angle-down"></i>
                                                        </a>

                                                        <div class="account-dropdown js-dropdown">
                                                            <div class="account-dropdown__item">
                                                                <a href="{{ route('user.edit', Auth::user()->id) }}">
                                                                    {{ __('Alterar dados') }}
                                                                </a>
                                                            </div>

                                                            <div class="account-dropdown__item">
                                                                <a href="{{ route('logout') }}"
                                                                   onclick="event.preventDefault();
                                                                            document.getElementById('logout-form').submit();">
                                                                    {{ __('Logout') }}
                                                                </a>
                                                            </div>

                                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                                @csrf
                                                            </form>
                                                        </div>
                                                    </li>
                                                @endguest
                                            </ul>
                                        </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->
            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">                    
                        @if(Session::has('mensagem'))
                            <div class="alert alert-warning" role="alert">
                                {{ Session::get('mensagem') }}
                            </div>
                        @endif
                        @yield('conteudo')
                        @include('layout.footer')
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Bootstrap JS-->
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap4.1.min.js"></script>
    <!-- Vendor JS       -->
    <script src="/js/slick.min.js">
    </script>
    <script src="/js/wow.min.js"></script>
    <script src="/js/animsition.min.js"></script>
    <script src="/js/bootstrap-progressbar.min.js">
    </script>
    <script src="/js/jquery.waypoints.min.js"></script>
    <script src="/js/jquery.counterup.min.js">
    </script>
    <script src="/js/circle-progress.min.js"></script>
    <script src="/js/perfect-scrollbar.js"></script>
    <script src="/js/Chart.bundle.min.js"></script>
    <script src="/js/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="/js/main.js"></script>

</body>

</html>
<!-- end document-->
