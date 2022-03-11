<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>The Blacklist - beta v1.0</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/B.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-styles.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/select2.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/iconfont/tabler-icons.css" />
</head>

<body class="h-100" onLoad="defaultTheme()">
  <script src="<?php echo base_url(); ?>public/js/jquery.min.js"></script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
    <div class="container-fluid">
      <img src="<?php echo base_url(); ?>public/img/B.png" style="width: 36px; height: 36px; margin-right: 6px" alt="" />
      <a class="navbar-brand" href="#">THE BLACKLIST</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <?php echo @$menubar; ?>

        <div class="d-flex text-light">
          <?php echo @$userProfile; ?>
        </div>
      </div>
    </div>
  </nav>


  <main class="flex-shrink-0 container pb-4">
    <?php echo @$content; ?>
  </main>

<!-- Modal -->
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
  <script src="<?php echo base_url(); ?>public/js/select2.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/common.js"></script>

</body>

</html>