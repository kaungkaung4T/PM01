  <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar">
      <div class="sidebar-header">
        <a class="sidebar-brand">
          <img src="" alt="" style="width: 50px;">
          <span style="font-size: 0.9rem;"></span> 
        </a>
        <div class="sidebar-toggler not-active">
          <i class="bi bi-chevron-left admin-sidebar-icon"></i>
        </div>
      </div>
      <div class="sidebar-body">
        <ul class="nav">
          <!-- <li class="nav-item nav-category">Category</li> -->
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon bi bi-bar-chart-steps"></i>
              <span class="link-title">Dashboard</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.customer') }}" class="nav-link">
            <i class="link-icon bi bi-person"></i>
              <span class="link-title">Customers</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.deposit') }}" class="nav-link">
            <i class="link-icon bi bi-coin"></i>
              <span class="link-title">Deposits</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.withdrawal') }}" class="nav-link">
            <i class="link-icon bi bi-pass"></i>
              <span class="link-title">Withdrawals</span>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('admin.subscriptions') }}" class="nav-link">
            <i class="link-icon bi bi-card-checklist"></i>
              <span class="link-title">Subscriptions</span>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#my-setting" role="button" aria-expanded="false"
              aria-controls="my-setting">
              <i class="link-icon bi bi-gear"></i>
              <!-- <span class="link-title" style="margin-left: 16.5px;">My Setting</span> -->
                <span class="link-title">My Setting</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="my-setting">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('admin.setting', Auth::id()) }}" class="nav-link">Setting</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#system-setting" role="button" aria-expanded="false"
              aria-controls="system-setting">
              <i class="link-icon bi bi-gear-wide-connected"></i>
                <span class="link-title">System Setting</span>
              <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="system-setting">
              <ul class="nav sub-menu">
                <li class="nav-item">
                  <a href="{{ route('admin.system') }}" class="nav-link">System User</a>
                </li>
              </ul>
            </div>
          </li>

          <li class=" bottom-item">    
            <label class="nav-link">
            <div class="nav-left-group">
              <i class="link-icon bi bi-person"></i>
              <label>Main<label>
            </div>
              <form action="{{ route('logout') }}" method="POST">
                  @csrf
              <button type="submit" class="link-title" style="border: none;background: transparent;margin-left: 24.6px;">Logout</button>
              </form>
            </label>
          </li>


        </ul>
      </div>
    </nav>
    {{-- <nav class="settings-sidebar">
      <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
          <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
          <h6 class="text-muted mb-2">Light Theme:</h6>
          <a class="theme-item" href="#">
            <img src="../assets/images/screenshots/light.jpg" alt="light theme">
          </a>
          <h6 class="text-muted mb-2">Dark Theme:</h6>
          <a class="theme-item active" href=".">
            <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
          </a>
        </div>
      </div>
    </nav> --}}
    <!-- partial -->