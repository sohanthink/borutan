<ul class="metismenu" id="menu">
    <li class="{{request()->is('admin/dashboard*')?'mm-active':''}}">
        <a href="{{ route('admin.dashboard') }}">
            <div class="parent-icon"><i class="bx bx-home-circle"></i>
            </div>
            <div class="menu-title">Dashboard</div>
        </a>
    </li>


    <li class="{{request()->is('admin/user*')?'mm-active':''}}">
        <a href="{{ route('admin.user.index') }}">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">User</div>
        </a>
    </li>
    <li class="{{request()->is('admin/apartment*')?'mm-active':''}}">
        <a href="{{ route('admin.apartment.index') }}">
            <div class="parent-icon"><i class="bx bx-buildings"></i>
            </div>
            <div class="menu-title">Apartment Inquery</div>
        </a>
    </li>
    <li class="{{request()->is('admin/invoice*')?'mm-active':''}}">
        <a href="{{ route('admin.invoice.index') }}">
            <div class="parent-icon"><i class="bx bx-file"></i>
            </div>
            <div class="menu-title">Invoice</div>
        </a>
    </li>
    <li class="{{request()->is('admin/contact*')?'mm-active':''}}">
        <a href="{{ route('admin.contact.index') }}">
            <div class="parent-icon"><i class="bx bx-chat"></i>
            </div>
            <div class="menu-title">Contact</div>
        </a>
    </li>

    <li class="{{request()->is('admin/notification*')?'mm-active':''}}">
        <a href="{{ route('admin.notification.index') }}">
            <div class="parent-icon"><i class="bx bx-bell"></i>
            </div>
            <div class="menu-title">Notification</div>
        </a>
    </li>

    <li class="{{request()->is('admin/login-log*')?'mm-active':''}}">
        <a href="{{ route('admin.loginlog.index') }}">
            <div class="parent-icon"><i class="bx bx-chip"></i>
            </div>
            <div class="menu-title">Login Log</div>
        </a>
    </li>
    <li class="{{request()->is('admin/profile*')?'mm-active':''}}">
        <a href="{{ route('admin.profile.index') }}">
            <div class="parent-icon"><i class="bx bx-user-circle"></i>
            </div>
            <div class="menu-title">Profile</div>
        </a>
    </li>
    <li class="{{request()->is('admin/settings*')?'mm-active':''}}">
        <a href="{{ route('admin.settings.general.index') }}">
            <div class="parent-icon"><i class="bx bx-cog"></i>
            </div>
            <div class="menu-title">Settings</div>
        </a>
    </li>
</ul>
