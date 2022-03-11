        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><i class="ti ti-device-desktop-analytics icon"></i> <?php echo @lang("MENU_DASHBOARD"); ?></a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-users icon"></i>
              <?php echo @lang("MENU_PERSON");?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <div>
                <div>
                <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/search-personal-list"><?php echo @lang("MENU_PERSON_SEARCH");?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/person"><?php echo @lang("MENU_PERSON_MAINTAIN");?></a></li>
                  <div class="dropdown-divider"></div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/upload-personal-list"><?php echo @lang("MENU_PERSON_UPLOAD");?></a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-file-analytics icon"></i>
              <?php echo @lang("MENU_REPORT"); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <div>
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/user"><?php echo @lang("MENU_REPORT_1"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/role"><?php echo @lang("MENU_REPORT_2"); ?></a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-box icon"></i>
              <?php echo @lang("MENU_FOUNDATION"); ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div style="display:flex">
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/group-company"><?php echo @lang("MENU_FND_GROUP_COMPANY"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/business-unit"><?php echo @lang("MENU_FND_BUSINESS_UNIT"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/company"><?php echo @lang("MENU_FND_COMPANY"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/branch"><?php echo @lang("MENU_FND_BRANCH"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/country"><?php echo @lang("MENU_FND_COUNTRY"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/province"><?php echo @lang("MENU_FND_PROVINCE"); ?></a></li>
                </div>
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/district"><?php echo @lang("MENU_FND_DISTRICT"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/allegation-type"><?php echo @lang("MENU_FND_ALLEGAION_TYPE"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/person-type"><?php echo @lang("MENU_FND_PERSON_TYPE"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/privilege-type"><?php echo @lang("MENU_FND_PRIVILEGE_TYPE"); ?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/time"><?php echo @lang("MENU_FND_TIME"); ?></a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-shield-check icon"></i>
              <?php echo @lang("MENU_PERMISSION");?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <div>
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/user"><?php echo @lang("MENU_PERMISSION_USER");?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/role"><?php echo @lang("MENU_PERMISSION_ROLE");?></a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/security-profile"><?php echo @lang("MENU_PERMISSION_SECURITY");?></a></li>
                </div>
              </div>
            </ul>
          </li>
        </ul>