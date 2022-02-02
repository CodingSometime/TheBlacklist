<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Blacklist - beta v1.0</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/B.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-styles.css" />
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
            <a class="nav-link cursor-pointer" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/person"><i class="ti ti-user-plus icon"></i> Persons</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-box icon"></i>
              Foundations
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <div style="display:flex">
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/group-company">Group of Company</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/business-unit">Business Unit</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/company">Company</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/branch">Branch</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/country">Country</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/province">Province</a></li>
                </div>
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/district">District</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/allegation-type">Allegation Type</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/person-type">Person Type</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/privilege-type">Privilege Type</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/time">Time</a></li>
                </div>
              </div>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="ti ti-shield-check icon"></i>
              Permissions
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
              <div>
                <div>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/user">User</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/role">Role</a></li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/security-profile">Security Profile</a></li>
                </div>
              </div>
            </ul>
          </li>
        </ul>
        <div class="d-flex text-light">

          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="ti ti-user-circle icon"></i>
                CodingSometime@gmail.com
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <div>
                  <li><a class="dropdown-item" href="<?php echo $_SERVER['PATH_INFO']  ?>?language-toggle=yes"><i class="ti ti-toggle-left icon"></i> Thai / Eng</a></li>
                  <li><a href="#" onClick="toggleThemes('dark')" class="dropdown-item hide-theme-dark"><i class="ti ti-toggle-right icon"></i> Dark / Light</a>
                    <a href="#" onClick="toggleThemes('light')" class="dropdown-item hide-theme-light"><i class="ti ti-toggle-left icon"></i> Dark / Light</a>
                  </li>
                  <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#pageModalLoading" data-bs-action="page/logout"><i class="ti ti-logout icon"></i> Logout</a></li>
                </div>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main class="container pb-4">
    <?php echo @$content; ?>
  </main>

  <div class="modal fade" id="pageModalLoading" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title" id="pageModalLoadingTitle">PLEASE WAIT</h6>
        </div>
        <div class="modal-body">
          <div class="d-flex align-items-center">
            <div id="loading" class="spinner-border spinner-border-lg text-secondary me-2" role="status">
            </div>
            <span class="align-middle h5"> Operations are in progress, please wait... </span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    var pageAction = "<?php echo base_url(); ?>";
    var pageModalLoading = document.getElementById("pageModalLoading");
    pageModalLoading.addEventListener("shown.bs.modal", function(event) {
      try {
        // getting attributes
        var button = event.relatedTarget;
        var modalAction = button.getAttribute("data-bs-action");
        window.location = `${pageAction}${modalAction}`;
      } catch (error) {
        console.log("pageModalLoading.addEventListener");
      }
    });
  </script>

  <script src="<?php echo base_url(); ?>public/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/common.js"></script>
</body>

</html>