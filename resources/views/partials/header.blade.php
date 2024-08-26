<!-- resources/views/partials/header.blade.php -->


<header class="pc-header">
  <div class="header-wrapper">
    <!-- [Mobile Media Block] start -->
    <div class="me-auto pc-mob-drp">
      <ul class="list-unstyled">
        <!-- [Restul codului din header] -->
      </ul>
    </div>
    <!-- [Mobile Media Block end] -->
    
    <div class="ms-auto">
      <ul class="list-unstyled d-flex align-items-center">
        <!-- Butonul Add Client -->
        <li class="pc-h-item me-3">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addClientModal">
            <i class="ti ti-user-plus"></i> {{ __('messages.add_client') }}
          </button>
        </li>
        
        <!-- [Restul elementelor din top bar] -->

        
        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-setting-2"></use></svg>
          </a>
          <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
            <a href="#!" class="dropdown-item"><i class="ti ti-user"></i><span>My Account</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-settings"></i><span>Settings</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-headset"></i><span>Support</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-lock"></i><span>Lock Screen</span></a>
            <a href="#!" class="dropdown-item"><i class="ti ti-power"></i><span>Logout</span></a>
          </div>
        </li>
        <li class="pc-h-item">
          <a href="#" class="pc-head-link me-0" data-bs-toggle="offcanvas" data-bs-target="#announcement" aria-controls="announcement">
            <svg class="pc-icon"><use xlink:href="#custom-flash"></use></svg>
          </a>
        </li>
        <li class="dropdown pc-h-item">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <svg class="pc-icon"><use xlink:href="#custom-notification"></use></svg><span class="badge bg-success pc-h-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-notification dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <h5 class="m-0">Notifications</h5>
              <a href="#!" class="btn btn-link btn-sm">Mark all read</a>
            </div>
            <div class="dropdown-body text-wrap header-notification-scroll position-relative" style="max-height: calc(100vh - 215px)">
              <p class="text-span">Today</p>
              <!-- [Restul notificărilor] -->
            </div>
            <div class="text-center py-2"><a href="#!" class="link-danger">Clear all Notifications</a></div>
          </div>
        </li>
        <li class="dropdown pc-h-item header-user-profile">
          <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
            <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar" />
          </a>
          <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between"><h5 class="m-0">Profile</h5></div>
            <div class="dropdown-body">
              <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                <div class="d-flex mb-1">
                  <div class="flex-shrink-0"><img src="{{ asset('assets/images/user/avatar-2.jpg') }}" alt="user-image" class="user-avtar wid-35" /></div>
                  <div class="flex-grow-1 ms-3"><h6 class="mb-1">Carson Darrin 🖖</h6><span>carson.darrin@company.io</span></div>
                </div>
                <!-- [Restul profilului] -->
              </div>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </div>
</header>
