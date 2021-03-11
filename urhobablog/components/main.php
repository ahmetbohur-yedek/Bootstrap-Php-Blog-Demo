<div class="col-lg-12 border mb-4 mt-4 rounded-top rounded-bottom bg-<?PHP $design->BgColorControl(); ?>">
    <div class="row">
        <div class="col-lg-8 w-100">
            <?PHP

            if (PageDedect() == "index.php") {
                $post->MainPageShowPosts($_GET["page"]);
            }
            if (PageDedect() == "post.php") {
                $post->PostShow($GET["link"]);
            }
            if(PageDedect() == "search.php"){
                $post->SearchedPostShow($_GET["page"], $_GET["search"]);
            }
            if (PageDedect() == "404.php") {
                $error->NotFoundPage();
            }
            ?>
        </div>
        <div class="col-lg-4 w-100">
            <div class="row mt-4 mb-4">
                <div class="col-12">
                    <div class="card-group">
                        <?PHP
                        $post->LastPostShow();
                        $post->MostShowingPostShow();
                        ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-8 w-100">
            <?PHP
            $GLOBALS["post"]->PostPageCountShow($_GET["page"], $_GET["search"]);
            ?>
        </div>
    </div>
</div>