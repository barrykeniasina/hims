  <header id="page-topbar" style="background-color:#85C1E9;">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">

                            <a href="#" class="logo logo-light"  style="color:#ccc;">
                            <span class="d-none d-xl-inline-block ms-1" style="color:#000;">HIMS EMERGENCY</span>
                            </a>
                        </div>

    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
        <i class="ri-menu-2-line align-middle" style="color:#000;"></i>
    </button>



    
</div>

<div class="d-flex">



    <div class="dropdown d-none d-lg-inline-block ms-1">
        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
            <i class="ri-fullscreen-line"></i>
        </button>
    </div>

    @php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
    @endphp

    <div class="dropdown d-inline-block user-dropdown">
        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

            <span class="d-none d-xl-inline-block ms-1" style="color:#000;">{{ $adminData->name }}</span>
            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-end">
            <!-- item-->
            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="ri-lock-unlock-line align-middle me-1"></i> Log out</a>
            <div class="dropdown-divider"></div>

        </div>
    </div>

                        
            
                    </div>
                </div>
            </header>