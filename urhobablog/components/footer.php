<footer class="bg-<?PHP $design->BgColorControl(); ?> text-center text-white border-top">
    <div class="container p-4">
        <section class="mb-4">
            <?PHP
            $socialMedia->FooterSocialMedia();
            ?>
        </section>

        <section class="mb-4">
            <p>
                <?PHP
                $site->FooterText();
                ?>
            </p>
        </section>

    </div>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        <?PHP
            $site->FooterCopyright();
        ?>
    </div>
</footer>