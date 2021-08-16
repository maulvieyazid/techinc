<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h1>Tech.Inc</h1>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>
                <li class="sidebar-item @if ($sidebar=='home' ) {{ 'active' }} @endif">
                    <a href="{{ route('home') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item @if (collect(['carouselImage' ])->
                    contains($sidebar)) {{ 'active' }} @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-front"></i>
                        <span>Front</span>
                    </a>
                    <ul class="submenu @if (collect(['carouselImage' ])->
                        contains($sidebar)) {{ 'active' }} @endif">
                        <li class="submenu-item @if ($sidebar=='carouselImage' ) {{ 'active' }} @endif">
                            <a href="{{ route('carousel-image.index') }}">Carousel</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if ($sidebar=='event' ) {{ 'active' }} @endif">
                    <a href="{{ route('event.index') }}" class='sidebar-link'>
                        <i class="bi bi-calendar3"></i>
                        <span>Event</span>
                    </a>
                </li>

                <li class="sidebar-item @if (collect(['kategoriNews', 'news' ])->
                    contains($sidebar)) {{ 'active' }} @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>News</span>
                    </a>
                    <ul class="submenu @if (collect(['kategoriNews', 'news' ])->
                        contains($sidebar)) {{ 'active' }} @endif">
                        <li class="submenu-item @if ($sidebar=='kategoriNews' ) {{ 'active' }} @endif">
                            <a href="{{ route('kategori-news.index') }}">Kategori News</a>
                        </li>
                        <li class="submenu-item @if ($sidebar=='news' ) {{ 'active' }} @endif">
                            <a href="{{ route('news.index') }}">Daftar News</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if (collect(['startup', 'timStartup' ])->
                    contains($sidebar)) {{ 'active' }} @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-lightbulb"></i>
                        <span>Startup</span>
                    </a>
                    <ul class="submenu @if (collect(['startup', 'timStartup' ])->
                        contains($sidebar)) {{ 'active' }} @endif">
                        <li class="submenu-item @if ($sidebar=='startup' ) {{ 'active' }} @endif">
                            <a href="{{ route('startup.index') }}">Daftar Startup</a>
                        </li>
                        <li class="submenu-item @if ($sidebar=='timStartup' ) {{ 'active' }} @endif">
                            <a href="{{ route('tim-startup.index') }}">Tim Startup</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if (collect(['member', 'jenisMember', 'roleMember' ])->
                    contains($sidebar)) {{ 'active' }} @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Member</span>
                    </a>
                    <ul class="submenu @if (collect(['member', 'jenisMember', 'roleMember' ])->
                        contains($sidebar)) {{ 'active' }} @endif">
                        <li class="submenu-item @if ($sidebar=='member' ) {{ 'active' }} @endif">
                            <a href="{{ route('member.index') }}">Daftar Member</a>
                        </li>
                        <li class="submenu-item @if ($sidebar=='jenisMember' ) {{ 'active' }} @endif">
                            <a href="{{ route('jenis-member.index') }}">Jenis Member</a>
                        </li>
                        <li class="submenu-item @if ($sidebar=='roleMember' ) {{ 'active' }} @endif">
                            <a href="{{ route('role-member.index') }}">Role Member</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if (collect(['kategori', 'galeri' ])->
                    contains($sidebar)) {{ 'active' }} @endif has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-images"></i>
                        <span>Galeri</span>
                    </a>
                    <ul class="submenu @if (collect(['kategori', 'galeri' ])->
                        contains($sidebar)) {{ 'active' }} @endif">
                        <li class="submenu-item @if ($sidebar=='kategori' ) {{ 'active' }} @endif">
                            <a href="{{ route('kategori.index') }}">Kategori</a>
                        </li>
                        <li class="submenu-item @if ($sidebar=='galeri' ) {{ 'active' }} @endif">
                            <a href="{{ route('galeri.index') }}">Galeri</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item @if ($sidebar=='partner' ) {{ 'active' }} @endif">
                    <a href="{{ route('partner.index') }}" class='sidebar-link'>
                        <i class="bi bi-briefcase-fill"></i>
                        <span>Partner</span>
                    </a>
                </li>


                <li class="sidebar-item"><br><br></li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
