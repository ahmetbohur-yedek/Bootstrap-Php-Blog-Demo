<?PHP
## Classes
$socialMedia = new SocialMedia;
$site = new Site;
$menu = new Menu;
$design = new Design;
$post = new Post;
$error = new ErrorPages;


## Site URL
$site_url = "http://192.168.1.31/"; ## Site URLsini lütfen / ile birlikte yazın.

## Database Connection Settings
$db_host = "localhost";
$db_username = "root";
$db_password = "root";
$db_database = "urhobablog";

## JQuery Manager
$jquery_js_location = "" . $site_url . "other/jquery/jquery-3.6.0/jquery-3.6.0.min.js";

## Popper Manager
$popper_js_location = "" . $site_url . "other/popper/popper-1.16/popper.min.js";

## Bootstrap Manager
$bootstrap_css_location = "" . $site_url . "other/bootstrap/bootstrap-4.0.0/css/bootstrap.min.css";
$bootstrap_js_location = "" . $site_url . "other/bootstrap/bootstrap-4.0.0/js/bootstrap.min.js";

## Font Awesome Manager
$fontawesome_location = "" . $site_url . "other/fontawesome/fontawesome-free-5.15.2-web/css/all.css";

## CSS Manager
$css_location = "".$site_url."other/css/style.css";

## JS Manager
$js_location = "".$site_url."other/js/javascript.js";
