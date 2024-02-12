<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-N3VPFKNF');</script>
<!-- End Google Tag Manager -->
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon-32.png" type="image/x-icon">
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N3VPFKNF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
  <header class="site-header">
    <div class="container">
      <a href="<?php echo site_url() ?>" class="float-left">
        <img src="<?php echo get_template_directory_uri() ?>/images/lc-orange.webp" alt="Latent Clarity Logo" width="200" height="31">
      </a>
      <a href="<?php echo esc_url(site_url('/search')); ?>" class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-label="Search the site"></i></a>
      <div class="site-header__menu-trigger">
        <i class="fa fa-bars" aria-label="Open mobile menu"></i>
      </div>
      <div class="site-header__menu group">
        <nav class="main-navigation">
          <ul>
            <li <?php if (is_page('about') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about') ?>">Start Here</a></li>
            <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/guides'); ?>">Guides</a></li>
            <li <?php if (is_page('tools') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/tools') ?>">Tools</a></li>
            <li <?php if (is_page('products') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/products') ?>">eBooks & Products</a></li>
            <li><a href="https://mentorcruise.com/mentor/davnash/" target="_blank">⧉ Mentorship</a></li>
          </ul>
        </nav>
        <div class="site-header__util">
          <button class="btn btn--small btn--dark-orange float-left" data-formkit-toggle="5cfc01ee28">Subscribe</button>
          <a href="<?php echo esc_url(site_url('/search')); ?>" class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </header>
