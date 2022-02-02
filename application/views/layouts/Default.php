<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>THE BLACKLIST - beta v1.0</title>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>public/img/B.png" type="image/x-icon" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap-styles.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>public/iconfont/tabler-icons.css" />
</head>

<body onLoad="defaultTheme()" class="text-center">
  <main class="container pb-4">
    <?php echo @$content; ?>
  </main>

  <script src="<?php echo base_url(); ?>public/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url(); ?>public/js/common.js"></script>
</body>

</html>