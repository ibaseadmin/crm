<!-- resources/views/partials/sidebar.blade.php -->
<nav class="pc-sidebar">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="{{ url('/dashboard') }}" class="b-brand text-primary">
        <img src="{{ asset('assets/images/logo-dark.png') }}" class="img-fluid logo-lg" alt="logo" />
        <span class="badge bg-light-success rounded-pill ms-2 theme-version">v1.2024</span>
      </a>
    </div>
    <div class="navbar-content">
      <div class="card pc-user-card">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <div class="flex-shrink-0">
              <img src="{{ asset('assets/images/user/avatar-1.jpg') }}" alt="user-image" class="user-avtar wid-45 rounded-circle" />
            </div>
            <div class="flex-grow-1 ms-3 me-2">
              <h6 class="mb-0">{{ Auth::user()->name }}</h6>
              <small>{{ Auth::user()->role }}</small>
            </div>
            <a class="btn btn-icon btn-link-secondary avtar" data-bs-toggle="collapse" href="#pc_sidebar_userlink">
              <svg class="pc-icon">
                <use xlink:href="#custom-sort-outline"></use>
              </svg>
            </a>
          </div>
          <div class="collapse pc-user-links" id="pc_sidebar_userlink">
            <div class="pt-3">
              <a href="#!"><i class="ti ti-user"></i><span>{{ __('messages.my_account') }}</span></a>
              <a href="#!"><i class="ti ti-settings"></i><span>{{ __('messages.settings') }}</span></a>
              <a href="#!"><i class="ti ti-lock"></i><span>{{ __('messages.lock_screen') }}</span></a>
              <a href="#!" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="ti ti-power"></i><span>{{ __('messages.logout') }}</span>
</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

            </div>
          </div>
        </div>
      </div>

      <ul class="pc-navbar">
      <li class="pc-item"><a href="{{ url('/dashboard') }}" class="pc-link"><span class="pc-micon"><svg class="pc-icon"><use xlink:href="#custom-row-vertical"></use></svg></span><span class="pc-mtext">Dashboard</span></a></li>

        <li class="pc-item pc-caption"><label>{{ __('messages.clients_dashboad') }}</label></li>

<!-- Leads Button -->
<li class="pc-item pc-hasmenu">
  <a href="javascript:void(0);" class="pc-link">
    <span class="pc-micon">
      <svg class="pc-icon">
        <use xlink:href="#custom-profile-2user-outline"></use>
      </svg>
    </span>
    <span class="pc-mtext">{{ __('messages.leads') }}</span>
    <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
  </a>
  <ul class="pc-submenu">
    <li class="pc-item">
      <a href="{{ route('leads.index') }}" class="pc-link">{{ __('messages.all_leads') }}</a>
    </li>
    <li class="pc-item">
      <a href="{{ route('leads.unqualified.index') }}" class="pc-link">{{ __('messages.unqualified_leads') }}</a>
    </li>
  </ul>
</li>
        <li class="pc-item">
  <a href="{{ route('clients.index') }}" class="pc-link">
    <span class="pc-micon">
      <svg class="pc-icon">
        <use xlink:href="#custom-user-square"></use>
      </svg>
    </span>
    <span class="pc-mtext">{{ __('messages.clients') }}</span>
  </a>
</li>

<li class="pc-item pc-hasmenu">
    <a href="#" class="pc-link">
        <span class="pc-micon">
            <svg class="pc-icon">
                <use xlink:href="#custom-notification-status"></use>
            </svg>
        </span>
        <span class="pc-mtext">Oferte</span>
        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
    </a>
    <ul class="pc-submenu">
        <li class="pc-item">
            <a href="{{ route('offers.index') }}" class="pc-link">Vezi toate ofertele</a>
        </li>
        <li class="pc-item">
            <a href="{{ route('templates.index') }}" class="pc-link">Template-uri Oferte</a>
        </li>
    </ul>
</li>

        <li class="pc-item pc-caption"><label>Other</label><svg class="pc-icon"><use xlink:href="#custom-notification-status"></use></svg></li>


        
        <li class="pc-item"><a href="#!" class="pc-link"><span class="pc-micon"><svg class="pc-icon"><use xlink:href="#custom-notification-status"></use></svg></span><span class="pc-mtext">Sample page</span></a></li>
      </ul>
    
</nav>
