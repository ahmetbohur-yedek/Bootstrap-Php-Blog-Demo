<?PHP
include_once 'config/config.php';

function MobileDetect()
{
    return preg_match(
        "/(android|avantgo|blackberry|bolt|boost|cricket|docomo 
    |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i",
        $_SERVER["HTTP_USER_AGENT"]
    );
}

function DBConnect()
{
    try {
        global $db_connection;
        $db_connection = new PDO("mysql:host=" . $GLOBALS["db_host"] . ";dbname=" . $GLOBALS["db_database"] . "", $GLOBALS["db_username"], $GLOBALS["db_password"]);
    } catch (PDOException $e) {
        print $e->getMessage();
    }
}

function DBClose()
{
    $GLOBALS["db_connection"] = null;
}

class Design
{
    function BgColorControl()
    {
        echo $GLOBALS["site"]->SiteBgColor();
    }
    function NavColorControl()
    {
        echo $GLOBALS["site"]->SiteNavColor();
    }

    function ContainerControl()
    {
        if (MobileDetect()) {
            if ($GLOBALS["site"]->MobileContainerControl() == 0) {
                echo "";
            } else {
                echo "container";
            }
        } else {
            if ($GLOBALS["site"]->ContainerControl() == 0) {
                echo "";
            } else {
                echo "container";
            }
        }
    }
}

class Post{
    function MainPageMostShowingPostsShow(){

    }
    function MainPageShowPosts(){

    }
}

class Menu
{
    function HeaderMenu()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_headermenu WHERE ub_menuParent = '0'", PDO::FETCH_ASSOC);
        if ($query->rowCount()) {            
            foreach ($query as $row) {                
                $query2 = $GLOBALS["db_connection"]->query("SELECT * FROM ub_headermenu WHERE ub_menuParent = '{$row["ub_menuID"]}'", PDO::FETCH_ASSOC);
                if ($query2->rowCount()) {
                    echo ' <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"  href="' . $row["ub_menuURL"] . '" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  ' . $row["ub_menuName"] . '</a><div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">';
                    foreach ($query2 as $row2) {
                        echo ' <a class="dropdown-item" href="' . $row2["ub_menuURL"] . '">' . $row2["ub_menuName"] . '</a>';
                    }
                    echo '</div></li>';
                } else {
                    echo ' <li class="nav-item"><a class="nav-link" href="' . $row["ub_menuURL"] . '">' . $row["ub_menuName"] . '</a></li>';
                }
            }
        }
        DBClose();
    }
}

class Site
{
    function SiteName()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '' . $query["ub_siteName"] . '';
        }
        DBClose();
    }

    function SiteBgColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_siteBgColor"];
        }
        DBClose();
    }
    function SiteNavColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_siteNavColor"];
        }
        DBClose();
    }

    function SiteURL()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '' . $query["ub_siteURL"] . '';
        }
        DBClose();
    }
    function FooterText()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '' . $query["ub_footerText"] . '';
        }
        DBClose();
    }
    function FooterCopyright()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '' . $query["ub_footerCopyright"] . '';
        }
        DBClose();
    }

    function MobileContainerControl()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_mobileContainerCheck"];
        }
        DBClose();
    }
    function ContainerControl()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_containerCheck"];
        }
        DBClose();
    }
}

class SocialMedia
{
    function FooterSocialMedia()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_socialmedias WHERE ub_mediaLocation = 'footer'", PDO::FETCH_ASSOC);
        if ($query->rowCount()) {
            foreach ($query as $row) {
                echo '<a class="btn btn-outline-light btn-floating m-1" href="' . $row["ub_mediaURL"] . '" role="button"
                ><i class="fab fa-' . $row["ub_mediaName"] . '"></i
              ></a>';
            }
        }
        DBClose();
    }

    function HeaderSocialMedia()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_socialmedias WHERE ub_mediaLocation = 'header'", PDO::FETCH_ASSOC);
        if ($query->rowCount()) {
            foreach ($query as $row) {
                echo '<a class="btn btn-outline-light btn-floating m-1" href="' . $row["ub_mediaURL"] . '" role="button"
                ><i class="fab fa-' . $row["ub_mediaName"] . '"></i
              ></a>';
            }
        }
        DBClose();
    }
}
