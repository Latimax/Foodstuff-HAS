<!-- Sidebar Start -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="text-nowrap logo-img">
          <img src="{{  asset('storage/home/assets/img/logo.png') }}" width="180" alt="" />
        </a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">Home</span>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('user/dashboard*') || Request::is('user/profile') ? 'active' : '' }}" href="{{ route('user.dashboard') }}" aria-expanded="false">
              <span>
                <i class="ti ti-layout-dashboard"></i>
              </span>
              <span class="hide-menu" >Dashboard</span>
            </a>
          </li>
          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">SITE PAGES</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('order/*') || Request::is('user/order/*')  ? 'active' : '' }}" href="{{ route('user.orders.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-receipt"></i>
              </span>
              <span class="hide-menu">Orders</span>
            </a>
          </li>

          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">EXTRA</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('support*') ? 'active' : '' }}" href="{{ route('user.support.create') }}" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Support</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('user/settings*') ? 'active' : '' }}" href="{{ route('user.settings.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-settings"></i>
              </span>
              <span class="hide-menu">Settings</span>
            </a>
          </li>
          
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('user.logout') }}" aria-expanded="false">
              <span>
                <i class="ti ti-logout"></i>
              </span>
              <span class="hide-menu">Logout</span>
            </a>
          </li>
          
        </ul>
        
      </nav>
      <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
  </aside>
  <!--  Sidebar End -->