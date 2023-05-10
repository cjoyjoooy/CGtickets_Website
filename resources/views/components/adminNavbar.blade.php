        <nav class="navigation-bar">
            <div class="menu-content">
                <i class="fa-solid fa-bars fa-2xl menu-burger"></i>
                <div class="logo-container"><a href="AdminDashboard"><img class="logo" src="/resource/logo_version2.png"
                            alt="logo"></a></div>
                <ul class="menulist">
                  
                    <li class="side-menu-items"><a href="{{ url('AdminDashboard') }}"><i
                                class="fa-brands fa-microsoft side-bar-icon"></i>Dashboard</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminMovie') }}"><i
                                class="fa-solid fa-clapperboard side-bar-icon"></i>Movies</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminShowSchedule') }}"><i
                                class="fa-solid fa-calendar-days side-bar-icon"></i>Schedule</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminCinema') }}"><i
                                class="fa-solid fa-ticket side-bar-icon"></i>Cinemas</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminTransaction') }}"><i
                                class="fa-solid fa-credit-card side-bar-icon"></i>Transaction</a></li>
                    <li class=" logout side-menu-items"><a href="{{ url('login') }}"><i
                                class="fa-solid fa-right-to-bracket side-bar-icon"></i>Log out</a></li>
                </ul>
            </div>
        </nav>
        <div class="menu-sidebar">
            <div class="close-menu">
                <i><img src="/resource/close-menu.png" alt=""></i>
            </div>
            <div class="side-menubar">
                <ul class="menu-list">
                    <li class="side-menu-items"><a href="{{ url('AdminDashboard') }}"><i
                                class="fa-solid fa-table-cells-large side-bar-icon"></i>Dashboard</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminMovie') }}"><i
                                class="fa-solid fa-film side-bar-icon"></i>Movies</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminShowSchedule') }}"><i
                                class="fa-solid fa-tv side-bar-icon"></i>Shows</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminCinema') }}"><i
                                class="fa-solid fa-ticket side-bar-icon"></i>Cinemas</a></li>
                    <li class="side-menu-items"><a href="{{ url('AdminTransaction') }}"><i
                                class="fa-solid fa-money-bill-transfer side-bar-icon"></i>Transaction</a></li>
                    <li class=" logout side-menu-items"><a href="{{ url('login') }}"><i
                                class="fa-solid fa-arrow-right-from-bracket side-bar-icon"></i>Log out</a></li>

                </ul>
            </div>
        </div> <!-- menu-sidebar -->
