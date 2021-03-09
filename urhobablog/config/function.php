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

function TextShorter($text, $text_lenght)
{
    $new_text = substr($text, 0, $text_lenght);
    $new_text = $new_text . "...";
    return $new_text;
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
    function TextColorControl()
    {
        echo $GLOBALS["site"]->SiteTextColor();
    }

    function ButtonColorControl()
    {
        echo $GLOBALS["site"]->SiteButtonColor();
    }
    function SocialButtonColorControl()
    {
        echo $GLOBALS["site"]->SocialButtonColor();
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

class Post
{
    function MainPageMostShowingPostsShow()
    {
    }
    function MainPageShowPosts()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_posts ORDER BY post_id DESC LIMIT 10", PDO::FETCH_ASSOC);

        if ($query->rowCount()) {
            echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
            foreach ($query as $row) {
                echo '<div class="col-lg-6 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
                echo '<img class="card-img-top" src="' . $row["post_image_url"] . '" alt="' . $row["post_header"] . '">';
                echo ' <div class="card-body">
                <h5 class="card-title">' . $row["post_header"] . '</h5>';
                echo '<p class="card-text">' . TextShorter($row["post_content"], 150) . '</p>';
                echo '<a href="' . $row["post_url"] . '" class="btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">Devamını oku</a>';
                echo '</div></div></div>';
            }
            echo "</div></div></div>";
        }

        DBClose();
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

    function SiteTextColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_siteTextColor"];
        }
        DBClose();
    }

    function SiteButtonColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_siteButtonColor"];
        }
        DBClose();
    }

    function SocialButtonColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_socialButtonColor"];
        }
        DBClose();
    }

    function SiteMainPagePostCount()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_showedPostNumer"];
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
                echo '<a class="btn btn-outline-' . $GLOBALS["site"]->SocialButtonColor() . ' btn-floating m-1" href="' . $row["ub_mediaURL"] . '" role="button"
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
                echo '<a class="btn btn-outline-' . $GLOBALS["site"]->SocialButtonColor() . ' btn-floating m-1" href="' . $row["ub_mediaURL"] . '" role="button"
                ><i class="fab fa-' . $row["ub_mediaName"] . '"></i
              ></a>';
            }
        }
        DBClose();
    }
}
