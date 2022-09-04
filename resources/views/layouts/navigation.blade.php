<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    {{--<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
    <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
    </a>
    </div>

    <!-- Navigation Links -->
    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
            {{ __('Dashboard') }}
        </x-nav-link>
    </div>
    </div>

    <!-- Settings Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>{{ Auth::user()->first_name }}</div>

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>

    <!-- Hamburger -->
    <div class="-mr-2 flex items-center sm:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>--}}

    <div class="iq-top-navbar">
        <div class="container">
            <div class="iq-navbar-custom">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="iq-navbar-logo d-flex align-items-center justify-content-between">
                        <i class="ri-menu-line wrapper-menu"></i>
                        <a href="{{route('dashboard')}}" class="header-logo">
                            <img src="../assets/images/logo.png" class="img-fluid rounded-normal light-logo" alt="logo">
                            <img src="../assets/images/logo-white.png" class="img-fluid rounded-normal darkmode-logo" alt="logo">
                        </a>
                    </div>
                    <div class="iq-menu-horizontal">
                        <nav class="iq-sidebar-menu">
                            <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
                                <a href="index.html" class="header-logo">
                                    <img src="../assets/images/logo.png" class="img-fluid rounded-normal" alt="logo">
                                </a>
                                <div class="iq-menu-bt-sidebar">
                                    <i class="las la-bars wrapper-menu"></i>
                                </div>
                            </div>
                            <ul id="iq-sidebar-toggle" class="iq-menu d-flex">
                                <li class="active">
                                    <a href="{{route('dashboard')}}" class="">
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="#" class="">
                                        <span>My Schedule</span>
                                    </a>
                                </li>
                                <li class=" ">
                                    <a href="#" class="">
                                        <span>FAQs</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <div class="change-mode">
                            <div class="custom-control custom-switch custom-switch-icon custom-control-indivne">
                                <div class="custom-switch-inner">
                                    <p class="mb-0"> </p>
                                    <input type="checkbox" class="custom-control-input" id="dark-mode" data-active="true">
                                    <label class="custom-control-label" for="dark-mode" data-mode="toggle">
                                        <span class="switch-icon-left"><i class="a-left ri-moon-clear-line"></i></span>
                                        <span class="switch-icon-right"><i class="a-right ri-sun-line"></i></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-label="Toggle navigation">
                            <i class="ri-menu-3-line"></i>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ml-auto navbar-list align-items-center">
                                <li class="nav-item nav-icon dropdown ml-3">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="las la-envelope"></i>
                                        <span class="badge badge-primary count-mail rounded-circle">2</span>
                                        <span class="bg-primary"></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <h5 class="mb-0">All Messages</h5>
                                                </div>
                                                <div class="p-2">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card p-2">
                                                            <div class="">
                                                                <img class="avatar-40 rounded-small" src="../assets/images/user/u-1.jpg" alt="01">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <h6 class="mb-0">Barry Emma Watson</h6>
                                                                <small class="mb-0">We Want to see you On..</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a class="right-ic btn-block position-relative p-3 border-top text-center" href="#" role="button">
                                                    View All
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item nav-icon dropdown">
                                    <a href="#" class="search-toggle dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="las la-bell"></i>
                                        <span class="badge badge-primary count-mail rounded-circle">2</span>
                                        <span class="bg-primary"></span>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <div class="card shadow-none m-0">
                                            <div class="card-body p-0 ">
                                                <div class="cust-title p-3">
                                                    <h5 class="mb-0">Notifications</h5>
                                                </div>
                                                <div class="p-2">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center cust-card p-2">
                                                            <div class="">
                                                                <img class="avatar-40 rounded-small" src="../assets/images/user/u-1.jpg" alt="01">
                                                            </div>
                                                            <div class="media-body ml-3">
                                                                <div class="d-flex align-items-center justify-content-between">
                                                                    <h6 class="mb-0">Anne Effit</h6>
                                                                    <small class="mb-0">02 Min Ago</small>
                                                                </div>
                                                                <small class="mb-0">Manager</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <a class="right-ic btn-block position-relative p-3 border-top text-center" href="#" role="button">
                                                    See All Notification
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="caption-content">
                                    <a href="#" class="search-toggle dropdown-toggle d-flex align-items-center" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="../assets/images/user/01.jpg" class="avatar-40 img-fluid rounded" alt="user">
                                        <div class="caption ml-3">
                                            <h6 class="mb-0 line-height">{{ Auth::user()->first_name }}<i class="las la-angle-down ml-3"></i></h6>
                                        </div>
                                    </a>
                                    <div class="iq-sub-dropdown dropdown-menu user-dropdown" aria-labelledby="dropdownMenuButton3">
                                        <div class="card m-0">
                                            <div class="card-body p-0">
                                                <div class="py-3">
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <i class="ri-user-line mr-3"></i>
                                                            <h6>Account Settings</h6>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <i class="ri-calendar-line mr-3"></i>
                                                            <h6>Calender Connections</h6>
                                                        </div>
                                                    </a>
                                                    <a href="#" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <i class="ri-lock-line mr-3"></i>
                                                            <h6>Privacy & Security Settings</h6>
                                                        </div>
                                                    </a>
                                                    <a href="#popup1" data-toggle="modal" data-target="#exampleModalCenter" class="iq-sub-card">
                                                        <div class="media align-items-center">
                                                            <i class="ri-links-line mr-3"></i>
                                                            <h6>Share Your Link</h6>
                                                        </div>
                                                    </a>
                                                </div>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf
                                                    <a class="right-ic p-3 border-top btn-block position-relative text-center" href="{{route('logout')}}" onclick="event.preventDefault();
                                        this.closest('form').submit();" role="button">
                                                        Logout
                                                    </a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</nav>