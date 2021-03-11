<?PHP
include_once 'config/config.php';
include_once 'config/language.php';

$language = new Language();
$lang = $language->Turkish();

function PageDedect()
{
    return basename($_SERVER['SCRIPT_NAME']);
}

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

function ConvertSEOFriendText($text)
{
    $text = trim($text);
    $text = html_entity_decode($text);
    $text = strip_tags($text);
    $text = strtolower($text);
    $text = preg_replace('~[^ a-z0-9_.]~', ' ', $text);
    $text = preg_replace('~ ~', '-', $text);
    $text = preg_replace('~-+~', '-', $text);
    $text .= "/";
    return $text;
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

    function BackToTopButtonColorControl()
    {
        echo $GLOBALS["site"]->BackToTopButtonColor();
    }

    function LinkColorControl()
    {
        echo $GLOBALS["site"]->SiteLinkColor();
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

class ErrorPages
{
    function NoShowedPost()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_nopostshow")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
            echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
            echo '<div class="card-header"><h3>
            ' .  $GLOBALS["lang"]["notFoundPost"] . '</h3>
          </div>';
            echo '<img class="card-img-top" src="' . $query["dd_image"] . '" alt="' . $query["dd_header"] . '">';
            echo ' <div class="card-body">
            <h5 class="card-title">' . $query["dd_header"] . '</h5>';
            echo '<p class="card-text">' . $query["dd_content"] . '</p>';
            echo '<div class="row">';
            echo '<div class="col-lg-6  mb-2"><a href="' . $GLOBALS["site_url"] . '" class="mt-2 mb-2 btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">' . $GLOBALS["lang"]["mainPage"] . '</a></div>';
            echo '<div class="col-lg-6  mb-2"><span class="form-inline"><input id="search404" class="form-control mt-2 mb-2 mr-2" name="search" type="search" placeholder="' . $GLOBALS["lang"]["search"] . '" aria-label="Search">
            <button onClick="search404Navigate(this);" class="btn btn-outline-' . $query["dd_buttonColor"] . ' mt-2 mb-2" type="submit">' . $GLOBALS["lang"]["search"] . ' <i class="fas fa-search"></i></button>
          </span></div>';
            echo '</div>';
            echo '</div></div></div></div></div></div>';
        }
        DBClose();
    }

    function SearchNotFound($search = null)
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_s404")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
            echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
            echo '<div class="card-header"><h3>
            ' . $search . ' ' .  $GLOBALS["lang"]["notFoundSearch"] . '</h3>
          </div>';
            echo '<img class="card-img-top" src="' . $query["dd_image"] . '" alt="' . $query["dd_header"] . '">';
            echo ' <div class="card-body">
            <h5 class="card-title">' . $query["dd_header"] . '</h5>';
            echo '<p class="card-text">' . $query["dd_content"] . '</p>';
            echo '<div class="row">';
            echo '<div class="col-lg-6  mb-2"><a href="' . $GLOBALS["site_url"] . '" class="mt-2 mb-2 btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">' . $GLOBALS["lang"]["mainPage"] . '</a></div>';
            echo '<div class="col-lg-6  mb-2"><span class="form-inline"><input id="search404" class="form-control mt-2 mb-2 mr-2" name="search" type="search" placeholder="' . $GLOBALS["lang"]["search"] . '" aria-label="Search">
            <button onClick="search404Navigate(this);" class="btn btn-outline-' . $query["dd_buttonColor"] . ' mt-2 mb-2" type="submit">' . $GLOBALS["lang"]["search"] . ' <i class="fas fa-search"></i></button>
          </span></div>';
            echo '</div>';
            echo '</div></div></div></div></div></div>';
        }
        DBClose();
    }

    function NotFoundPage()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_404")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
            echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
            echo '<div class="card-header"><h3>
            ' . $GLOBALS["lang"]["notFoundPage"] . '</h3>
          </div>';
            echo '<img class="card-img-top" src="' . $query["dd_image"] . '" alt="' . $query["dd_header"] . '">';
            echo ' <div class="card-body">
            <h5 class="card-title">' . $query["dd_header"] . '</h5>';
            echo '<p class="card-text">' . $query["dd_content"] . '</p>';
            echo '<div class="row">';
            echo '<div class="col-lg-6  mb-2"><a href="' . $GLOBALS["site_url"] . '" class="mt-2 mb-2 btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">' . $GLOBALS["lang"]["mainPage"] . '</a></div>';
            echo '<div class="col-lg-6  mb-2"><span class="form-inline"><input id="search404" class="form-control mt-2 mb-2 mr-2" name="search" type="search" placeholder="' . $GLOBALS["lang"]["search"] . '" aria-label="Search">
            <button onClick="search404Navigate(this);" class="btn btn-outline-' . $query["dd_buttonColor"] . ' mt-2 mb-2" type="submit">' . $GLOBALS["lang"]["search"] . ' <i class="fas fa-search"></i></button>
          </span></div>';
            echo '</div>';
            echo '</div></div></div></div></div></div>';
        }
        DBClose();
    }
}

class Post
{
    function PostShow($search)
    {
        echo "böyle bir şeyyoh";
    }

    function SearchedPostShow($page, $search)
    {
        $max_page = $GLOBALS["post"]->MaxPage($search);
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $max_page) {
            $page = $max_page;
        }

        $post_started = ($page - 1) * $GLOBALS["site"]->SiteMainPagePostCount();
        DBConnect();

        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_posts WHERE  CONCAT(post_content, post_header) COLLATE UTF8_GENERAL_CI LIKE '%{$search}%' ORDER BY post_id DESC LIMIT {$post_started} , {$GLOBALS["site"]->SiteMainPagePostCount()}", PDO::FETCH_ASSOC);
        if ($query) {
            if ($query->rowCount()) {

                echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
                foreach ($query as $row) {
                    echo '<div class="col-lg-6 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
                    echo '<img class="card-img-top" src="' . $row["post_image_url"] . '" alt="' . $row["post_header"] . '">';
                    echo ' <div class="card-body">
                <h5 class="card-title">' . $row["post_header"] . '</h5>';
                    echo '<p class="card-text">' . TextShorter($row["post_content"], 150) . '</p>';
                    echo '<a href="/post/' . $row["post_url"] . '" class="btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">' . $GLOBALS["lang"]["readAbout"] . '</a>';
                    echo '</div></div></div>';
                }
                echo '</div></div></div>';
            }
        } else {
            $GLOBALS["error"]->SearchNotFound($search);
        }
        DBClose();
    }

    function LastPostShow()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_posts ORDER BY post_id DESC")->fetch(PDO::FETCH_ASSOC);
        if ($query) {

            echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
            echo '<div class="card-header"><h3>
            ' . $GLOBALS["lang"]["lastPost"] . '</h3>
          </div>';
            echo '<div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteBgColor() . ' m-4">';
            echo '<img class="card-img-top" src="' . $query["post_image_url"] . '" alt="' . $query["post_header"] . '">';
            echo ' <div class="card-body">
            <h5 class="card-title">' . $query["post_header"] . '</h5>';
            echo '<p class="card-text">' . TextShorter($query["post_content"], 75) . '</p>';
            echo '<a href="/post/' . $query["post_url"] . '" class="btn w-100 btn-' . $GLOBALS["site"]->SitePopulerPostButtonColor() . '">' . $GLOBALS["lang"]["readAbout"] . '</a>';
            echo '</div></div></div></div>';
        }
        DBClose();
    }
    function MostShowingPostShow()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_posts ORDER BY post_reads DESC LIMIT {$GLOBALS["site"]->SitePopulerPostCount()} ", PDO::FETCH_ASSOC);
        if ($query) {
            if ($query->rowCount()) {
                $count = $query->rowCount();
                echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
                if ($GLOBALS["site"]->SitePopulerPostCount() > 1 && $count > 1) {
                    echo '<div class="card-header"><h3>
                ' . $GLOBALS["lang"]["populerPosts"] . '</h3>
              </div>';
                } else {
                    echo '<div class="card-header"><h3>
                ' . $GLOBALS["lang"]["populerPost"] . '</h3>
              </div>';
                }

                foreach ($query as $row) {
                    echo '<div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteBgColor() . ' m-4">';
                    echo '<img class="card-img-top" src="' . $row["post_image_url"] . '" alt="' . $row["post_header"] . '">';
                    echo ' <div class="card-body">
            <h5 class="card-title">' . $row["post_header"] . '</h5>';
                    echo '<p class="card-text">' . TextShorter($row["post_content"], 75) . '</p>';
                    echo '<a href="/post/' . $row["post_url"] . '" class="btn w-100 btn-' . $GLOBALS["site"]->SitePopulerPostButtonColor() . '">' . $GLOBALS["lang"]["readAbout"] . '</a>';
                    echo '</div></div>';
                }
                echo '</div></div>';
            }
        } else {
        }
        DBClose();
    }
    function MainPageShowPosts($page)
    {
        $max_page = $GLOBALS["post"]->MaxPage();
        if ($page < 1) {
            $page = 1;
        }
        if ($page > $max_page) {
            $page = $max_page;
        }

        $post_started = ($page - 1) * $GLOBALS["site"]->SiteMainPagePostCount();
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_posts ORDER BY post_id DESC LIMIT {$post_started} , {$GLOBALS["site"]->SiteMainPagePostCount()}", PDO::FETCH_ASSOC);
        if ($query) {
            if ($query->rowCount()) {
                echo '<div class="row mt-4 mb-4"><div class="col-12"><div class="card-group">';
                foreach ($query as $row) {
                    echo '<div class="col-lg-6 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
                    echo '<img class="card-img-top" src="' . $row["post_image_url"] . '" alt="' . $row["post_header"] . '">';
                    echo ' <div class="card-body">
                <h5 class="card-title">' . $row["post_header"] . '</h5>';
                    echo '<p class="card-text">' . TextShorter($row["post_content"], 150) . '</p>';
                    echo '<a href="/post/' . $row["post_url"] . '" class="btn btn-' . $GLOBALS["site"]->SiteButtonColor() . '">' . $GLOBALS["lang"]["readAbout"] . '</a>';
                    echo '</div></div></div>';
                }
                echo '</div>
           
            </div></div>';
            }
        } else {
            $GLOBALS["error"]->NoShowedPost();
        }

        DBClose();
    }

    function PostNumber()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT COUNT(*) FROM ub_posts")->fetchColumn();
        if ($query) {
            return $query;
        }
        DBClose();
    }
    function SearchedPostNumber($search)
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT COUNT(*) FROM ub_posts WHERE  CONCAT(post_content, post_header) COLLATE UTF8_GENERAL_CI LIKE '%{$search}%'")->fetchColumn();
        if ($query) {
            return $query;
        }
        DBClose();
    }

    function MaxPage($search = null)
    {
        if (PageDedect() == "index.php") {
            $max_page = ceil($GLOBALS["post"]->PostNumber() / $GLOBALS["site"]->SiteMainPagePostCount());
            return $max_page;
        }
        if (PageDedect() == "search.php") {
            $max_page = ceil($GLOBALS["post"]->SearchedPostNumber($search) / $GLOBALS["site"]->SiteMainPagePostCount());
            return $max_page;
        }
    }

    function PostPageCountShow($page, $search = null)
    {
        if (PageDedect() == "index.php" && $GLOBALS["post"]->MaxPage() > 0) {
            echo ' <div class="bg-' . $GLOBALS["site"]->SiteNavColor() . ' rounded col-lg-12 mt-4 mb-4 pt-1 pb-1 text-center text-' . $GLOBALS["site"]->SiteTextColor() . '">
        ';
            $GLOBALS["post"]->CreatePageCount($page);
            echo '
        </div>';
        }
        if (PageDedect() == "search.php" && $GLOBALS["post"]->MaxPage($search) > 0) {
            echo ' <div class="bg-' . $GLOBALS["site"]->SiteNavColor() . ' rounded col-lg-12 mt-4 mb-4 pt-1 pb-1 text-center text-' . $GLOBALS["site"]->SiteTextColor() . '">
            ';
            $GLOBALS["post"]->CreateSearchPageCount($page, $search);
            echo '
            </div>';
        }
    }

    function CreatePageCount($page)
    {
        $max_page = $GLOBALS["post"]->MaxPage();

        if ($page < 1) {
            $page = 1;
        }
        if ($page > $max_page) {
            $page = $max_page;
        }

        $showed_page = 11;

        $min_middle = ceil($showed_page / 2);
        $max_middle = ($max_page + 1) - $min_middle;

        $page_middle = $page;
        if ($page_middle < $min_middle) $page_middle = $min_middle;
        if ($page_middle > $max_middle) $page_middle = $max_middle;

        $left_pages = round($page_middle - (($showed_page - 1) / 2));
        $right_pages = round((($showed_page - 1) / 2) + $page_middle);

        if ($left_pages < 1) $left_pages = 1;
        if ($right_pages > $max_page) $right_pages = $max_page;

        if ($page != 1) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/page/1"><i class="fas fa-angle-double-left"></i></a> ';
        if ($page != 1) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/page/' . ($page - 1) . '"><i class="fas fa-angle-left"></i></a> ';

        for ($s = $left_pages; $s <= $right_pages; $s++) {
            if ($page == $s) {
                echo ' <i class ="text-' . $GLOBALS["site"]->BackToTopButtonColor() . ' fas fa-map-marker-alt"></i> ';
            } else {
                echo '<a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/page/' . $s . '">' . $s . '</a> ';
            }
        }

        if ($page != $max_page) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/page/' . ($page + 1) . '"><i class="fas fa-angle-right"></i></a> ';
        if ($page != $max_page) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/page/' . $max_page . '"><i class="fas fa-angle-double-right"></i></a>';
    }

    function CreateSearchPageCount($page, $search)
    {
        $max_page = $GLOBALS["post"]->MaxPage($search);

        if ($page < 1) {
            $page = 1;
        }
        if ($page > $max_page) {
            $page = $max_page;
        }

        $showed_page = 11;

        $min_middle = ceil($showed_page / 2);
        $max_middle = ($max_page + 1) - $min_middle;

        $page_middle = $page;
        if ($page_middle < $min_middle) $page_middle = $min_middle;
        if ($page_middle > $max_middle) $page_middle = $max_middle;

        $left_pages = round($page_middle - (($showed_page - 1) / 2));
        $right_pages = round((($showed_page - 1) / 2) + $page_middle);

        if ($left_pages < 1) $left_pages = 1;
        if ($right_pages > $max_page) $right_pages = $max_page;

        if ($page != 1) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/search/' . $search . '/page/1"><i class="fas fa-angle-double-left"></i></a> ';
        if ($page != 1) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/search/' . $search . '/page/' . ($page - 1) . '"><i class="fas fa-angle-left"></i></a> ';

        for ($s = $left_pages; $s <= $right_pages; $s++) {
            if ($page == $s) {
                echo ' <i class ="text-' . $GLOBALS["site"]->BackToTopButtonColor() . ' fas fa-map-marker-alt"></i> ';
            } else {
                echo '<a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/search/' . $search . '/page/' . $s . '">' . $s . '</a> ';
            }
        }

        if ($page != $max_page) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/search/' . $search . '/page/' . ($page + 1) . '"><i class="fas fa-angle-right"></i></a> ';
        if ($page != $max_page) echo ' <a class ="text-' . $GLOBALS["site"]->SiteLinkColor() . '" href="/search/' . $search . '/page/' . $max_page . '"><i class="fas fa-angle-double-right"></i></a>';
    }
}

class Menu
{
    function SearchMenu()
    {
        echo '<div class="col-lg-12 mt-2 mb-2"><div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteNavColor() . '">';
        echo '<div class="card-header"><h3>
        ' . $GLOBALS["lang"]["searchIt"] . '</h3>
      </div>';
        echo '<div class="card text-' . $GLOBALS["site"]->SiteTextColor() . ' bg-' . $GLOBALS["site"]->SiteBgColor() . ' m-4">';
        echo '<img class="card-img-top" src="'.$GLOBALS["site"]->SiteSearcImage() . '" alt="' . $GLOBALS["lang"]["searchIt"] . '">';
        echo '<div class="card-body">';       
        echo '<p class="card-text">Umduğunu bulmanın en iyi yolu aramaktan geçer</p>';
        echo '<span class="form-inline">
        <input id="searchMenu" class="form-control mt-2 mb-2 w-100" name="search" type="search" placeholder="' . $GLOBALS["lang"]["search"] . '" aria-label="Search">
        <button onClick="searchMenuNavigate(this);" class="btn w-100 btn-outline-' . $GLOBALS["site"]->BackToTopButtonColor() . ' mt-2 mb-2" type="submit">' . $GLOBALS["lang"]["search"] . ' <i class="fas fa-search"></i></button>
      </span>';
        echo '</div></div></div></div>';
    }

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
    function SiteSearcImage()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
             return $query["ub_searchImage"];
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

    function SitePopulerPostCount()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_populerPostCount"];
        }
        DBClose();
    }
    function SitePopulerPostButtonColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_populerPostButtonColor"];
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
    function SiteLinkColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_siteLinkColor"];
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
    function BackToTopButtonColor()
    {
        DBConnect();
        $query = $GLOBALS["db_connection"]->query("SELECT * FROM ub_sites")->fetch(PDO::FETCH_ASSOC);
        if ($query) {
            return $query["ub_backToTopButtonColor"];
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
