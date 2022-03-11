  <!--  BEGIN SIDEBAR  -->
  <div class="sidebar-wrapper sidebar-theme">

      <nav id="sidebar">
          <div class="profile-info">
              <figure class="user-cover-image"></figure>
              <div class="user-info">
                  <img src="{{asset('backend')}}/assets/img/profile-17.jpeg" alt="avatar">
                  <h6 class="">Sonia Shaw</h6>
                  <p class="">Project Leader</p>
              </div>
          </div>
          <div class="shadow-bottom"></div>
          <ul class="list-unstyled menu-categories" id="accordionExample">
              <li class="menu {{ request()->is('admin/dashboard') ? 'active' : ''}}">
                  <a href="{{ url('/admin/dashboard') }}" aria-expanded="{{ request()->is('admin/dashboard') ? 'true' : ''}}" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>Dashboard</span>
                      </div>
                  </a>
              </li>
              <li class="menu {{ request()->is('admin/appointments') ? 'active' : ''}}">
                  <a href="{{ url('/admin/appointments') }}" aria-expanded="{{ request()->is('admin/appointments') ? 'true' : ''}}" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>Appointments</span>
                      </div>
                  </a>
              </li>
              <li class="menu {{ request()->is('admin/users') ? 'active' : ''}}">
                  <a href="{{ url('/admin/users') }}" aria-expanded="{{ request()->is('admin/users') ? 'true' : ''}}" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>Users</span>
                      </div>
                  </a>
              </li>
              <li class="menu {{ request()->is('admin/settings') ? 'active' : ''}}">
                  <a href="{{ url('/admin/settings') }}" aria-expanded="{{ request()->is('admin/settings') ? 'true' : ''}}" class="dropdown-toggle">
                      <div class="">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                          </svg>
                          <span>Settings</span>
                      </div>
                  </a>
              </li>
          </ul>

      </nav>

  </div>
  <!--  END SIDEBAR  -->