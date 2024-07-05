<div class="email-navigation">
    <div class="list-group list-group-flush"> 
        <a href="{{ route('admin.settings.general.index') }}" 
            class="list-group-item d-flex align-items-center 
            {{ Route::is('admin.settings.general.index') ? 'active' : '' }}">
            <i class='bx bx-cog me-3 font-20'></i><span>General</span>
        </a>
        <a href="{{ route('admin.settings.appearance') }}" 
            class="list-group-item d-flex align-items-center 
            {{ Route::is('admin.settings.appearance') ? 'active' : '' }}">
            <i class='bx bx-images me-3 font-20'></i><span>Logo</span>
        </a>  
    </div>
</div>