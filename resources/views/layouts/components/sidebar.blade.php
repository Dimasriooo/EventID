{{-- @php
    $menus = [
        (object) [
        'title' => '',
        'icon' => 'fas fa-search fa-fw',
        'path' => '/',
        ],
        (object) [
        'title' => '',
        'icon' => 'fas fa-search fa-fw',
        'path' => '/packages',
        ],
        (object) [
        'title' => '',
        'icon' => 'fas fa-search fa-fw',
        'path' => '/Bookings',
        ],
    ];
    $bookings = [
        (object) [
        'title' => 'Booking',
        'icon' => 'fas fa-search fa-fw',
        'path' => '/Bookings',
        ],
    ];

        
        
@endphp --}}



<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Dashboard</div>
                {{-- @foreach ($menus as $menu )  --}}
                {{-- <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ $menu->path }}">
                    <i class="sb-nav-link-icon" {{ $menu->icon }}></i>
                    <p>
                        {{ $menu->title }}
                    </p>
                </a> --}}
                {{-- @endforeach --}}
                <a class="nav-link" href="/">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-house"></i></div>
                    Dashboard
                </a>
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link" href="/packages">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                    packages
                </a>
                <a class="nav-link" href="/Features">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    packagesFeatures
                </a>
                {{-- @foreach  ($bookings as $booking ) --}}
                <a class="nav-link" href="/Bookings">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-bell"></i></i></div>
                    booking
                </a>
                {{-- @endforeach --}}
                
            </div>
        </div>
    </nav>
</div>