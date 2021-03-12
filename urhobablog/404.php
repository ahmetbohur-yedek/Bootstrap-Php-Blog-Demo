<?PHP
include_once 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <link rel="stylesheet" href="<?PHP echo $fontawesome_location; ?>" />
  <link href="<?PHP echo $bootstrap_css_location; ?>" rel="stylesheet" />
  <link href="<?PHP echo $css_location; ?>" rel="stylesheet" />
  
  <link rel="icon" href="<?PHP echo $favicon_location; ?>" type="image/x-icon" />
  <link rel="shortcut icon" href="<?PHP echo $favicon_location; ?>" type="image/x-icon" />

  <title><?PHP $site->SiteName(); ?> - 404</title>
</head>

<body>

  <div class="<?PHP $design->ContainerControl(); ?>">
    <?PHP
    include_once 'components/header.php';
    include_once 'components/main.php';
    include_once 'components/footer.php';
    ?>
  </div>
    <?PHP
    include_once 'components/back_to_top.php';
    ?>
  <script src="<?PHP echo $jquery_js_location; ?>"></script>
  <script src="<?PHP echo $popper_js_location; ?>"></script>
  <script src="<?PHP echo $bootstrap_js_location; ?>"></script>
  <script src="<?PHP echo $js_location; ?>"></script>
</body>

</html>