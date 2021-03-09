<nav class="navbar navbar-expand-lg navbar-<?PHP $design->NavColorControl(); ?> bg-<?PHP $design->BgColorControl(); ?> border border-top-0 rounded-bottom">
  <a class="navbar-brand" href="<?PHP $site->SiteURL(); ?>"><?PHP $site->SiteName(); ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <?PHP $menu->HeaderMenu(); ?>
    </ul>
  </div>
</nav>