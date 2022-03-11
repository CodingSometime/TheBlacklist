          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-user-circle icon"></i>
                CodingSometime@gmail.com
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <div>
                  <li><a class="dropdown-item" href="<?php echo $_SERVER['PATH_INFO']  ?>?language-toggle=yes"><i class="ti ti-toggle-left icon me-1"></i> Thai / Eng</a></li>
                  <li><a href="#" onClick="toggleThemes('dark')" class="dropdown-item hide-theme-dark"><i class="ti ti-toggle-right icon me-1"></i> Dark / Light</a>
                    <a href="#" onClick="toggleThemes('light')" class="dropdown-item hide-theme-light"><i class="ti ti-toggle-left icon me-1"></i> Dark / Light</a>
                  </li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/logout"><i class="ti ti-book icon me-1"></i> Documentation</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/logout"><i class="ti ti-logout icon me-1"></i> Logout</a></li>
                </div>
              </ul>
            </li>
          </ul>
