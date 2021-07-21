<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <h1>Tech Inc</h1>
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
                {{-- <li class="sidebar-item @if ($sidebar == 'pengunjung') {{ 'active' }} @endif">
                    <a href="{{ route('pengunjung.index') }}" class='sidebar-link'>
                        <i class="bi bi-people-fill"></i>
                        <span>Pengunjung</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'kritiksaran') {{ 'active' }} @endif">
                    <a href="{{ route('kritiksaran.index') }}" class='sidebar-link'>
                        <i class="bi bi-inbox-fill"></i>
                        <span>Kritik & Saran</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'booking') {{ 'active' }} @endif">
                    <a href="{{ route('booking.index') }}" class='sidebar-link'>
                        <i class="bi bi-calendar2-check"></i>
                        <span>Booking</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'donasi') {{ 'active' }} @endif">
                    <a href="{{ route('donasi.index') }}" class='sidebar-link'>
                        <i class="bi bi-cash-stack"></i>
                        <span>Donasi</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'merchandise') {{ 'active' }} @endif">
                    <a href="{{ route('merchandise.index') }}" class='sidebar-link'>
                        <i class="bi bi-basket-fill"></i>
                        <span>Merchandise</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'koleksi') {{ 'active' }} @endif">
                    <a href="{{ route('koleksi.index') }}" class='sidebar-link'>
                        <i class="bi bi-archive-fill"></i>
                        <span>Koleksi</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'majalah') {{ 'active' }} @endif">
                    <a href="{{ route('majalah.index') }}" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Majalah</span>
                    </a>
                </li> --}}

                {{-- <li class="sidebar-item @if ($sidebar == 'berita') {{ 'active' }} @endif">
                    <a href="{{ route('berita.index') }}" class='sidebar-link'>
                        <i class="bi bi-newspaper"></i>
                        <span>Berita</span>
                    </a>
                </li> --}}




                <li class="sidebar-item"><br><br></li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
