<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head>
        @include('layouts.head')
    </head>
	<!--end::Head-->
	<!--begin::Body-->
    <div id="app">
        <body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed toolbar-tablet-and-mobile-fixed aside-enabled aside-fixed" style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
            <!--begin::Theme mode setup on page load-->
            <!--end::Theme mode setup on page load-->
            <!--begin::Main-->
            <!--begin::Root-->
            <div class="d-flex flex-column flex-root">
                <!--begin::Page-->
                <div class="page d-flex flex-row flex-column-fluid">
                    <!--begin::SIDEBAR-->
                    <div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                        <!--begin::Brand-->
                        <div class="aside-logo flex-column-auto" id="kt_aside_logo">
                            <!--begin::Logo-->
                            <a href="/kartoni">
                                <img alt="Logo" src="{{ asset('assets/media/logos/image8.png') }}" class="logo" />
                            </a>
                            <!--end::Logo-->
                            <!--begin::Aside toggler-->
                            <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle me-n2" data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
                                <i class="ki-outline ki-double-left fs-1 rotate-180"></i>
                            </div>
                            <!--end::Aside toggler-->
                        </div>
                        <!--end::Brand-->
                        <!--begin::Aside menu-->
                        <div class="aside-menu flex-column-fluid">
                            <!--begin::Aside Menu-->
                            <div class="hover-scroll-overlay-y" id="kt_aside_menu_wrapper" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
                                <!--begin::Menu-->
                                <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500" id="#kt_aside_menu" data-kt-menu="true">
                                    <!--begin:Menu item-->
                                    <div class="menu-item">
                                        <!--begin:Menu link-->
                                        <a class="menu-link" href="/kartoni" target="_blank">
                                            <span class="menu-icon">
                                                <i class="ki-outline ki-notepad-bookmark fs-2x"></i>
                                            </span>
                                            <span class="menu-title">Kartoni</span>
                                        </a>
                                        <!--end:Menu link-->
                                    </div>
                                    <!--end:Menu item-->
                                </div>
                                <!--end::Menu-->
                            </div>
                        </div>
                        <!--end::Aside menu-->
                    </div>
                    <!--end::SIDEBAR-->
                    <!--begin::Wrapper-->
                    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                        <!--begin::Header-->
                        <div id="kt_header" style="" class="header align-items-stretch">
                            <!--begin::Container-->
                            <div class="container-fluid d-flex align-items-stretch justify-content-between">
                                <!--begin::Aside mobile toggle-->
                                <div class="d-flex align-items-center d-lg-none ms-n4 me-1" title="Show aside menu">
                                    <div class="btn btn-icon btn-active-color-white" id="kt_aside_mobile_toggle">
                                        <i class="ki-outline ki-burger-menu fs-1"></i>
                                    </div>
                                </div>
                                <!--end::Aside mobile toggle-->
                                <!--begin::Mobile logo-->
                                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                                    <a href="index.html" class="d-lg-none">
                                        <img alt="Logo" src="{{ asset('assets/media/logos/demo13-small.svg') }}" class="h-25px" />
                                    </a>
                                </div>
                                <!--end::Mobile logo-->
                                <!--begin::Wrapper-->
                                <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                                    <!--begin::Navbar-->
                                    <div class="d-flex align-items-stretch" id="kt_header_nav">
                                        <!--begin::Menu wrapper-->
                                        
                                        <!--end::Menu wrapper-->
                                    </div>
                                    <!--end::Navbar-->
                                    <!--begin::Toolbar wrapper-->
                                    <div class="topbar d-flex align-items-stretch flex-shrink-0">
                                        @if (Auth::user() && Auth::user()->role == 0)
                                        <!--begin:ADMIN PANEL-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Menu toggle-->
                                            <a href="#" class="topbar-item px-3 px-lg-4" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                <i class="ki-outline ki-abstract-29 fs-2"></i>
                                            </a>
                                            <!--end::Menu toggle-->
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-350px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="/register" class="menu-link px-3 py-2">
                                                        <span class="menu-icon">
                                                            <i class="ki-duotone ki-security-user fs-2x">
                                                                <span class="path1"></span>
                                                                <span class="path2"></span>
                                                            </i>
                                                        </span>
                                                        <span class="menu-title">Registruj novog korisnika</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end:ADMIN PANEL-->
                                        @endif
                                        <!--begin::Theme mode-->
                                        <div class="d-flex align-items-center">
                                            <!--begin::Menu toggle-->
                                            <a href="#" class="topbar-item px-3 px-lg-4" data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
                                                <i class="ki-outline ki-night-day theme-light-show fs-1"></i>
                                                <i class="ki-outline ki-moon theme-dark-show fs-1"></i>
                                            </a>
                                            <!--begin::Menu toggle-->
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px" data-kt-menu="true" data-kt-element="theme-mode-menu">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-night-day fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Svetlo</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-moon fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Tamno</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3 my-0">
                                                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                                                        <span class="menu-icon" data-kt-element="icon">
                                                            <i class="ki-outline ki-screen fs-2"></i>
                                                        </span>
                                                        <span class="menu-title">Sistemsko</span>
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::Menu-->
                                        </div>
                                        <!--end::Theme mode-->
                                        <!--begin::User-->
                                        <div class="d-flex align-items-stretch" id="kt_header_user_menu_toggle">
                                            <!--begin::Menu wrapper-->
                                            <div class="topbar-item cursor-pointer symbol px-3 px-lg-5 me-n3 me-lg-n5 symbol-30px symbol-md-35px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                                <img src="{{ asset('assets/media/avatars/blank.png') }}" alt="metronic" />
                                            </div>
                                            <!--begin::User account menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-350px" data-kt-menu="true">
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-3">
                                                    <div class="menu-content d-flex align-items-center px-3">
                                                        <!--begin::Avatar-->
                                                        <div class="symbol symbol-50px me-5">
                                                            <img alt="Logo" src="{{ asset('assets/media/avatars/blank.png') }}" />
                                                        </div>
                                                        <!--end::Avatar-->
                                                        <!--begin::Username-->
                                                        <div class="d-flex flex-column">
                                                            <div class="fw-bold d-flex align-items-center fs-5"> {{ Auth::user()->name }} {{ Auth::user()->lastName }}
                                                                <span class="badge fw-bold fs-8 px-2 py-1 ms-2
                                                                    {{ Auth::user()->role == 0 ? 'badge-danger' : 'badge-light-success' }}">
                                                                    {{ Auth::user()->role == 0 ? 'Admin' : 'Korisnik' }}
                                                                </span>
                                                                </div>
                                                            <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::user()->email }}</a>
                                                        </div>
                                                        <!--end::Username-->
                                                    </div>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu separator-->
                                                <div class="separator my-2"></div>
                                                <!--end::Menu separator-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <a href="/errorPage" class="menu-link px-5"><i class="ki-outline ki-setting fs-2x"></i>&nbsp;Podešavanja profila</a>
                                                </div>
                                                <!--end::Menu item-->
                                                <!--begin::Menu item-->
                                                <div class="menu-item px-5">
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                    <a href="#" class="menu-link px-5" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="ki-outline ki-exit-right fs-2x"></i>&nbsp;Odjava
                                                    </a>
                                                </div>
                                                <!--end::Menu item-->
                                            </div>
                                            <!--end::User account menu-->
                                            <!--end::Menu wrapper-->
                                        </div>
                                        <!--end::User -->
                                        <!--begin::Heaeder menu toggle-->
                                        <div class="d-flex align-items-stretch d-lg-none px-3 me-n3" title="Show header menu">
                                            <div class="topbar-item" id="kt_header_menu_mobile_toggle">
                                                <i class="ki-outline ki-burger-menu-2 fs-1"></i>
                                            </div>
                                        </div>
                                        <!--end::Heaeder menu toggle-->
                                    </div>
                                    <!--end::Toolbar wrapper-->
                                </div>
                                <!--end::Wrapper-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Content-->
                        <div class="container">
                            {{-- begin: MAIN CONTENT --}}
                            @yield('content')
                            {{-- end: MAIN CONTENT --}}
                        </div>
                        <!--end::Content-->
                        <!--begin::Footer-->
                        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
                            <!--begin::Container-->
                            <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                                <!--begin::Copyright-->
                                <div class="text-gray-900 order-2 order-md-1">
                                    <span class="text-muted fw-semibold me-1">2024&copy;</span>
                                    <a href="" target="_blank" class="text-gray-800 text-hover-primary">Savo Novaković</a>
                                </div>
                                <!--end::Copyright-->
                                <!--begin::Menu-->
                                <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                                    <li class="menu-item">
                                        <a href="/errorPage" target="_blank" class="menu-link px-2">O nama</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/errorPage" target="_blank" class="menu-link px-2">Podrška</a>
                                    </li>
                                    <li class="menu-item">
                                        <a href="/errorPage" target="_blank" class="menu-link px-2">Kontakt</a>
                                    </li>
                                </ul>
                                <!--end::Menu-->
                            </div>
                            <!--end::Container-->
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>
            <!--end::Root-->
            <!--end::Main-->
            <!--begin::Scrolltop-->
            <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
                <i class="ki-outline ki-arrow-up"></i>
            </div>
            <!--end::Scrolltop-->
            
        </body>
    </div>
	<!--end::Body-->
    @include('layouts.scripts')
    <style>
        .logo {
            height: 300px; /* Adjust this value to your preferred height */
            width: auto;  /* Maintain aspect ratio, or use a specific width like width: 100px; */
            margin-top: 60px;
            margin-left: -20px;
        }
    </style>
</html>