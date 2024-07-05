<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ setting('site_favicon') != null ? Storage::url(setting('site_favicon')) : '' }}"
        type="image/png" />
    <!--plugins-->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('user.includes.style')
    <title>@stack('title', 'borutan')</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <a href="{{ url('/') }}">
                        <img src="{{ setting('site_logo') != null ? Storage::url(setting('site_logo')) : '' }}"
                            alt="" width="110">
                    </a>
                </div>
                <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
                </div>
            </div>
            <!--navigation-->
            @include('user.includes.left_sidebar')
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            {{-- <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="#"> <i class='bx bx-search'></i>
                                </a>
                            </li> --}}
                            @isset(auth()->user()->package)
                                <li class="nav-item mx-2 ">
                                    Paketnamn : <span class="badge bg-primary">{{ auth()->user()->package->name }}</span>
                                </li>
                            @endisset
                            @isset(auth()->user()->expire_date)
                                <li class="nav-item mx-2">
                                    Expire date :
                                    <span
                                        class="badge bg-info">{{ \Carbon\Carbon::parse(auth()->user()->expire_date)->format('Y-m-d') }}</span>
                                </li>
                            @endisset
                            <li class="nav-item mx-2">
                                Återstående förslag :
                                <span
                                    class="badge bg-primary">{{ auth()->user()->contract ? auth()->user()->contract : 0 }}</span>
                            </li>

                            {{-- <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative"
                                    href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span
                                        class="alert-count">{{ auth()->user()->notification->where('is_read', '')->count() }}</span>
                                    <i class='bx bx-bell'></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        @forelse (auth()->user()->notification->where('is_read','') as $notification)
                                            <a class="dropdown-item"
                                                href="{{ route('user.notification.show', $notification->id) }}">
                                                <div class="d-flex align-items-center">
                                                    <div class="notify bg-light-primary text-primary"><i
                                                            class="bx bx-group"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="msg-name">{{ $notification->title }}<span
                                                                class="msg-time float-end">{{ $notification->created_at->diffForHumans() }}</span>
                                                        </h6>
                                                        <p class="msg-info">
                                                            {{ substr($notification->message, 0, 35) }}...</p>
                                                    </div>
                                                </div>
                                            </a>
                                        @empty
                                            <p class="dropdown-item">No Notification</p>
                                        @endforelse
                                    </div>
                                    <a href="{{ route('user.notification.index') }}">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ auth()->user()->image ? asset('uploads/user/' . auth()->user()->image) : asset('default.webp') }}"
                                class="user-img" alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ auth()->user()->first_name }}</p>
                                <p class="designattion mb-0">{{ auth()->user()->role }}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('user.profile.index') }}"><i
                                        class="bx bx-user"></i><span>Profil</span></a>
                            </li>
                            <li>
                                <div class="dropdown-divider mb-0"></div>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                        class='bx bx-log-out-circle'></i><span>Logga ut</span></a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                @yield('content')
            </div>
        </div>
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        @include('user.includes.footer')
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    @include('user.includes.script')
</body>

</html>
