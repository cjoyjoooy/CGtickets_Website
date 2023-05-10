<nav class="navigation-bar">
    <i class="menu-burger"><img src="/resource/burgermenu.png" alt=""></i>
    <div class="logo-container"><a href=""><img class="logo" src="/resource/logo_version2.png" alt="logo"></a></div>
    <div class="search-icon"><img class="search-btn" src="/resource/magnifying glasses.png" alt="search icon"></div>
    <div class="search-menu">
        <input type="text" class="search-input" id="filter" placeholder="search">
    </div>
    <ul class="menulist">
        <li class="menu-items"><a href="{{ url('Homepage') }}">HOME</a></li>
        <li class="menu-items"><a href="{{ url('Homepage') }}">MOVIES</a></li>
        {{-- <li class="menu-items"><a href="{{ url('Homepage') }}">CONTACT</a></li> --}}
    </ul>
</nav>
<div class="menu-sidebar">
    <div class="close-menu">
        <i><img src="/resource/close-menu.png" alt=""></i>
    </div>
    <div class="side-menubar">
        <ul class="menu-list">
            <li class="side-menu-items"><a href="{{ url('Homepage') }}">HOME</a></li>
            <li class="side-menu-items"><a href="{{ url('Homepage') }}">MOVIES</a></li>
            {{-- <li class="side-menu-items"><a href="{{ url('Homepage') }}">CONTACT</a></li> --}}
        </ul>
    </div>
</div>