<div class="sidebar {{Auth::user()->openSideBar == '0' ? 'close' : ''}}">
    <div class="openclose-button">
        <i class='bx bx-chevron-right toggle'></i>
    </div>

    <ul class="nav-links"> 
        
        {{-- ============== TOP SIDE BAR ============= --}}     
        <li>
        <div class="profile-details">
            <div class="profile-content">
                <img class="fotoProfil" alt="Foto Profil">
            </div>
            <div class="name-job">
            <div class="profile_name">{{ Auth::user()->name }}</div>
            <div class="job">
                {{Auth::user()->role == 1 ? 'Admin PED' : ''}}
                {{Auth::user()->role == 2 ? 'Admin' : ''}}
                {{Auth::user()->role != 1 && Auth::user()->role != 2 ? 'Unknown' : ''}}
            </div>
            </div>
        </div>        
        </li>

        {{-- ============== MID (KOMPONEN) SIDE BAR ============= --}} 

        
        {{-- ============== Contoh Dropdown ============= --}} 

        
        {{-- <li>
            <div class="iocn-link">
                <a href="/dosen">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">Dosen</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name">Dosen</a></li>
                <li><a href="/dosen">Profile Dosen</a></li>
                <li><a href="/dosen/profile">Beban Dosen</a></li>
            </ul>
        </li> --}}

        {{-- ============== Contoh Standart ============= --}} 

        
        {{-- <li>
            <a href="/">
                <i class='bx bx-grid-alt'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/">Dashboard</a></li>
            </ul>
        </li> --}}

        
        {{-- ============== Active Component Sidebar ============= --}} 

        @if(Auth::user()->role == 1)
        <li class="{{Request::segment(1) == 'dashboard' || Request::segment(1) == '' ? 'active' : ''}}">
            <a href="/">
                <i class='bx bxs-dashboard icon'></i>
                <span class="link_name">Dashboard</span>
            </a>
            <ul class="sub-menu blank">
                <li><a class="link_name" href="/">Dashboard</a></li>
            </ul>
        </li>
        
        <li>
            <div class="iocn-link">
                <a href="/khs">
                    <i class='bx bx-collection'></i>
                    <span class="link_name">KHS</span>
                </a>
                <i class='bx bxs-chevron-down arrow' ></i>
            </div>
            <ul class="sub-menu">
                <li><a class="link_name">KHS</a></li>
                <li><a href="/khs">KHS</a></li>
                <li><a href="/khs/designator">Designator</a></li>
            </ul>
        </li>
        @endif

        {{-- ============== LOGOUT DAN BOTTOM SIDE BAR ================ --}}
        <li>
            <div class="sidebar-footer">
                <span class='bx bx-moon moon'></span>
                <span class="link_name">Dark mode</span>
                <ul class="sub-menu blank">
                    <li><a class="link_name">Dark Mode</a></li>
                </ul>
                <div class="toggle-switch">
                    <span class="switch"></span>
                </div>
            </div>        
        </li>
        
        <li>        
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                                        class="logout-footer">
                <i class='bx bx-log-out icon'></i>
                <span class="link_name">Logout</span>
                <ul class="sub-menu logout-button">
                    Logout
                </ul>
                </x-responsive-nav-link>
            </form>   
        </li>

        

        {{-- ============== END LOGOUT DAN BOTTOM SIDE BAR ============== --}}
    </ul>
</div>