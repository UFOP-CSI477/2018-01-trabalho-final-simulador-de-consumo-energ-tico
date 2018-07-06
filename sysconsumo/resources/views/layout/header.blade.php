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
                                    @auth
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
                                    @endauth
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