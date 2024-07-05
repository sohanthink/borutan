<ul class="metismenu" id="menu">
    {{-- <li class="{{ request()->is('user/dashboard*') ? 'mm-active' : '' }}">
        <a href="{{ route('user.dashboard') }}">
            <div class="parent-icon"><i class="bx bx-home-circle"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li> --}}
    {{-- <li class="{{request()->is('user/apartment')?'mm-active':''}}">
        <a href="{{ route('user.apartment.index') }}">
            <div class="parent-icon"><i class="bx bx-buildings"></i>
            </div>
            <div class="menu-title">Apartment</div>
        </a>
    </li> --}}
    <li class="{{ request()->is('user/apartment/create*') ? 'mm-active' : '' }}">
        <a href="{{ route('user.apartment.create') }}">
            <div class="parent-icon"><i class="bx bx-buildings"></i>
            </div>
            <div class="menu-title">Hyresprofil</div>
        </a>
    </li>
    {{-- <li class="{{request()->is('user/invoice*')?'mm-active':''}}">
        <a href="{{ route('user.invoice.index') }}">
            <div class="parent-icon"><i class="bx bx-file"></i>
            </div>
            <div class="menu-title">Invoice</div>
        </a>
    </li>
    <li class="{{request()->is('user/notification*')?'mm-active':''}}">
        <a href="{{ route('user.notification.index') }}">
            <div class="parent-icon"><i class="bx bx-bell"></i>
            </div>
            <div class="menu-title">Notification</div>
        </a>
    </li> --}}
    <li class="{{ request()->is('user/profile*') ? 'mm-active' : '' }}">
        <a href="{{ route('user.profile.index') }}">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Profil</div>
        </a>
    </li>
    <li>
        <a href="{{ route('pricing') }}">
            <div class="parent-icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-user-check">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                    <polyline points="16 11 18 13 22 9"></polyline>
                </svg>


            </div>
            <div class="menu-title">Medlemskap</div>
        </a>
    </li>

    <li>
        <a href="{{ route('user.invoice.active') }}">
            <div class="parent-icon">
                <i class="bx bx-package"></i>
            </div>
            <div class="menu-title">Aktif Paket</div>
        </a>
    </li>


    <li>
        <a href="{{ url('/') }}#faq">
            <div class="parent-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-help-circle">
                    <circle cx="12" cy="12" r="10"></circle>
                    <path d="M9.09 9a3 3 0 1 1 5.82 1c-.28.94-1.11 1.57-2.05 1.84a1.34 1.34 0 0 0-.87 1.28v.5"></path>
                    <line x1="12" y1="17" x2="12.01" y2="17"></line>
                </svg>

            </div>
            <div class="menu-title">FAQ</div>
        </a>
    </li>
    <li>
        <a href="{{ route('contact') }}">
            <div class="parent-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-mail">
                    <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                    <polyline points="22,6 12,13 2,6"></polyline>
                </svg>


            </div>
            <div class="menu-title">Kontakt</div>
        </a>
    </li>
    @if (Session::has('orig_user'))
        <li class="{{ request()->is('user/rollback*') ? 'mm-active' : '' }}">
            <a href="{{ route('user.rollback') }}">
                <div class="parent-icon"><i class="bx bx-log-out"></i>
                </div>
                <div class="menu-title">Roll Back</div>
            </a>
        </li>
    @else
        <li>

            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <div class="parent-icon"><i class="bx bx-log-out"></i>
                </div>
                <div class="menu-title">Logga ut</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    @endif

</ul>
