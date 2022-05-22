<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="<?= $this->config->item("HTML_TITLE_403"); ?>">
  <meta name="author" content="Rittichai Charoenkorn (rittichai.c@gmail.com)">
  <link rel="icon" href="<?php echo base_url(); ?>public/favicon.png">
  <title><?= $this->config->item("HTML_TITLE_403"); ?></title>
  <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url(); ?>public/vendor/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="<?php echo base_url(); ?>public/vendor/material-icons/iconfont/material-icons.css" rel="stylesheet">
  <link href="<?php echo base_url(); ?>public/css/home.css" rel="stylesheet">

  <style>
  body {
    height: 100%;
    min-height: 100vh;
    background-size: 100px auto;
  }

  .intro {
    min-height: 100vh;
  }

  .container,
  .intro,
  .row {
    min-height: 100vh;
  }
  </style>
</head>

<body class="bg-light">
  <div class="intro border border-danger">
    <div class="container h-100">
      <div class="row justify-content-center">
        <div class="col-lg-8 align-self-center text-center">
          <?php if (!@$userStatus) { ?>
          <div class="jumbotron shadow">
            <h1 class="text-info">ACCESS NOT GRANTED</h1>
            <h3>You are not authorized to access this application, Please contact your administrator</h3>
            <h3></h3> <a class="btn btn-info" href="logout">LOGOUT</a>

          </div>
          <?php } else { ?>
          <div class="jumbotron shadow">
            <h1 class="text-info">YOUR ACCOUNT IS INACTIVE</h1>
            <h3>Sorry, Your account is inactive, Please contact your administrator</h3>
            <h3></h3>
            <a class="btn btn-info" href="logout">LOGOUT</a>
          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>

</html>