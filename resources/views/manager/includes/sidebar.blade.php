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
            <a class="sidebar-link {{ Request::is('manager/dashboard*') ? 'active' : '' }}" href="{{ route('manager.dashboard') }}" aria-expanded="false">
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
            <a class="sidebar-link {{ Request::is('manager/fooditems/*') && !Request::is('manager/fooditems/new')  ? 'active' : '' }}" href="{{ route('manager.fooditems.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-cards"></i>
              </span>
              <span class="hide-menu">Food Items</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('manager/fooditems/new') ? 'active' : '' }}" href="{{ route('manager.fooditems.new') }}" aria-expanded="false">
              <span>
                <i class="ti ti-plus"></i>
              </span>
              <span class="hide-menu">Add Food Item</span>
            </a>
          </li>
         
          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('manager/orders*') || Request::is('manager/orders/show*') ? 'active' : '' }}" href="{{ route('manager.orders.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-arrow-down"></i>
              </span>
              <span class="hide-menu">Orders</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('manager/voucher*') && !Request::is('manager/voucher/generate/new') ? 'active' : '' }}" href="{{ route('manager.vouchers.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-receipt"></i>
              </span>
              <span class="hide-menu">Vouchers</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('manager/voucher/generate/new') ? 'active' : '' }}" href="{{ route('manager.vouchers.generate') }}" aria-expanded="false">
              <span>
                <i class="ti ti-reload"></i>
              </span>
              <span class="hide-menu">Generate Voucher</span>
            </a>
          </li>
        

          <li class="nav-small-cap">
            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
            <span class="hide-menu">EXTRA</span>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('support*') ? 'active' : '' }}" href="{{ route('manager.support.create') }}" aria-expanded="false">
              <span>
                <i class="ti ti-mail"></i>
              </span>
              <span class="hide-menu">Support</span>
            </a>
          </li>

          <li class="sidebar-item">
            <a class="sidebar-link {{ Request::is('manager/settings*') ? 'active' : '' }}" href="{{ route('manager.settings.index') }}" aria-expanded="false">
              <span>
                <i class="ti ti-settings"></i>
              </span>
              <span class="hide-menu">Settings</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="{{ route('manager.logout') }}" aria-expanded="false">
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