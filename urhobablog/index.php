<?PHP
include_once 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="<?PHP echo $fontawesome_location; ?>" />
  <link href="<?PHP echo $bootstrap_css_location; ?>" rel="stylesheet" />
  <link href="<?PHP echo $css_location; ?>" rel="stylesheet" />

  <title><?PHP $site->SiteName(); ?></title>
</head>

<body>

  <div class="<?PHP $design->ContainerControl(); ?>">
    <?PHP
    include_once 'components/header.php';
    include_once 'components/index_main.php';
    include_once 'components/footer.php';
    ?>
  </div>
  <script src="<?PHP echo $jquery_js_location; ?>"></script>
  <script src="<?PHP echo $popper_js_location; ?>"></script>
  <script src="<?PHP echo $bootstrap_js_location; ?>"></script>
</body>

</html>