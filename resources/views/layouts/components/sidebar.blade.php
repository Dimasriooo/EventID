@php
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
    ];
    $bookings = [
        (object) [
        'title' => 'Booking',
        'icon' => 'fas fa-search fa-fw',
        'path' => '/bookings',
        ],
    ];

        
        
@endphp



<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                @foreach ($menus as $menu ) 
                <div class="sb-sidenav-menu-heading"></div>
                <a class="nav-link" href="{{ $menu->path }}">
                    <i class="sb-nav-link-icon" {{ $menu->icon }}></i>
                    <p>
                        {{ $menu->title }}
                    </p>
                </a>
                @endforeach
                <a class="nav-link" href="{{ $menu->path }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
               </a>
                 <a class="nav-link" href="{{ $menu->path }}">
                     <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                     packages
                </a>
                <a class="nav-link" href="index.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    packagesFeatures
                </a>
                @foreach  ($bookings as $booking )
                <a class="nav-link" href="{{ $booking-> path }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    booking
                </a>
                @endforeach
            </div>
        </div>
    </nav>
</div>