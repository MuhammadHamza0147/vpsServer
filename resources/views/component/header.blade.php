<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a href="{{url('/dashboard')}}" class="brand-logo">
                    ready<span>R5</span>Server
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
            <ul class="navbar-mobile__list list-unstyled">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{url('/dashboard')}}">
                        <span style="font-size: 23px">&#9814;</span>
                        Home
                    </a>
                </li>
                
                <li class="{{ request()->is('servers') ? 'active' : '' }}">
                    <a href="{{url('servers')}}">
                        &#9776;
                        Servers
                    </a>
                </li>
                
                <li class="{{ request()->is('server/activities') ? 'active' : '' }}">
                    <a href="{{url('server/activities')}}">
                        &#9782;
                        Server Activities
                    </a>
                </li>
                
                <li class="{{ request()->is('server/template') ? 'active' : '' }}">
                    <a href="{{url('server/template')}}">
                        <span style="font-size: 23px">&#9860;</span>
                        Server Template
                    </a>
                </li>
                
                <li class="{{ request()->is('server/os') ? 'active' : '' }}">
                    <a href="{{url('server/os')}}">
                        <span style="font-size: 25px">&#9863;</span>
                        Operating System
                    </a>
                </li>
                
                <li class="{{ request()->is('regions') ? 'active' : '' }}">
                    <a href="{{url('regions')}}">
                        <span style="font-size: 23px">&#9775;</span>
                        Server Regions
                    </a>
                </li>
                
                <li class="{{ request()->is('credit') ? 'active' : '' }}">
                    <a href="{{url('credit')}}">
                        &#8644;
                        Credit & Upcoming
                    </a>
                </li>
                
            </ul>
        </div>
    </nav>
</header>