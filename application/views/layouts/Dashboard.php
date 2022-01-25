<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>THE BLACKLIST</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/B.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-styles.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-select.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/iconfont/tabler-icons.css" />
</head>

<body onLoad="defaultTheme()">
<script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <img src="<?php echo base_url(); ?>public/img/B.png" style="width: 36px; height: 36px; margin-right: 6px" alt="" />
      <a class="navbar-brand" href="#">THE BLACKLIST</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#"><i class="ti ti-device-desktop-analytics icon"></i> Dashboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/page/person"><i class="ti ti-user-plus icon"></i> Persons</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-box icon"></i>
              Foundations
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div class="d-flex">
                <div>
                  <li><a class="dropdown-item" href="/page/group-of-company">Group of Company</a></li>
                  <li><a class="dropdown-item" href="/page/business-unit">Business Unit</a></li>
                  <li><a class="dropdown-item" href="/page/company">Company</a></li>
                  <li><a class="dropdown-item" href="/page/branch">Branch</a></li>
                  <li><a class="dropdown-item" href="/page/country">Country</a></li>
                  <li><a class="dropdown-item" href="/page/province">Province</a></li>
                </div>
                <div>
                  <li><a class="dropdown-item" href="/page/district">District</a></li>
                  <li><a class="dropdown-item" href="/page/allegation-type">Allegation Type</a></li>
                  <li><a class="dropdown-item" href="/page/person-type">Person Type</a></li>
                  <li><a class="dropdown-item" href="/page/privilege-type">Privilege Type</a></li>
                  <li><a class="dropdown-item" href="/page/time">Time</a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-users icon"></i>
              Permissions
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <div class="d-flex">
                <div>
                  <li><a class="dropdown-item" href="/page/user">User</a></li>
                  <li><a class="dropdown-item" href="/page/role">Role</a></li>
                  <li><a class="dropdown-item" href="/page/security-profile">Security Profile</a></li>
                </div>
              </div>
            </ul>
          </li>
        </ul>
        <div class="d-flex text-light">
          <a href="#" onClick="toggleThemes('dark')" class="px-3 hide-theme-dark" title="Enable dark mode" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="ti ti-moon icon"></i></a>
          <a href="#" onClick="toggleThemes('light')" class="px-3 hide-theme-light text-warning" title="Enable light mode" data-bs-toggle="tooltip" data-bs-placement="bottom"><i class="ti ti-sun icon"></i></a>
          <span class="text-light"><i class="ti ti-user-circle icon"></i> CodingSometime@gmail.com</span>
        </div>
      </div>
    </div>
  </nav>

  <main class="container pb-4">
    <?php echo @$breadcrumbs; ?>
    <?php echo @$content; ?>
  </main>

  <script src="<?php echo base_url(); ?>public/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/common.js"></script>
</body>

</html>