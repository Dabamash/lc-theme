<?php
header("HTTP/1.1 404 Not Found");
get_header(); ?>

<div class="page-banner">
</div>

<div class="container container--narrow page-section">
  <h1 class="headline--medium t-center">404 - Page Not Found 😭</h1><br>
  <div class="generic-content">
    <p class="t-center">Uh oh! This page doesn't exist.</p>
    <p class="t-center">It wishes it did and it's sorry it's disappointed you.</p> 
    <p class="t-center">Check your URL or head back to the <a href="<?php echo site_url(); ?>">homepage</a>. Alternatively, you can search for what you're looking for by clicking this icon.     <a href="http://latent-clarity-backup.local/search" class="search-trigger search-trigger-404 js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
    </p>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>

</div>

<?php 
get_footer();

?>