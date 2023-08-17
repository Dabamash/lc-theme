<footer class="site-footer">
  <div class="site-footer__inner container container--narrow">
    <div class="group">
      <div class="site-footer__col-one">
        <img src="<?php echo get_template_directory_uri() ?>/images/lc-orange-black.webp" alt="Latent Clarity Logo" width="175" height="27">
        <script async data-uid="a6cdf2c3ce" src="https://latent-clarity.ck.page/a6cdf2c3ce/index.js"></script>
      </div>
      <div class="site-footer__col-two-three-group">
        <div class="site-footer__col-two">
          <h3 class="headline headline--small">Explore</h3>
          <nav class="nav-list">
            <ul>
              <li <?php if (is_page('about') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/about') ?>">Start Here</a></li>
              <li <?php if (get_post_type() == 'post') echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/guides'); ?>">Guides</a></li>
              <li <?php if (is_page('tools') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/tools') ?>">Tools</a></li>
              <li><a href="https://mentorcruise.com/mentor/davnash/" target="_blank">⧉ Mentorship</a></li>
            </ul>
          </nav>
        </div>
        <div class="site-footer__col-three">
          <h3 class="headline headline--small">Legal</h3>
          <nav class="nav-list">
            <ul>
              <li <?php if (is_page('privacy-policy') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/privacy-policy') ?>">Privacy Policy</a></li>
              <li <?php if (is_page('terms') or wp_get_post_parent_id(0) == 16) echo 'class="current-menu-item"' ?>><a href="<?php echo site_url('/terms') ?>">Terms of Use</a></li>
            </ul>
          </nav>
        </div>
      </div>
      <div class="site-footer__col-four">
        <h3 class="headline headline--small">Social</h3>
        <nav class="nav-list">
          <ul>
            <li><a href="https://www.linkedin.com/in/davnash/">LinkedIn</a></li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
<script async data-uid="5cfc01ee28" src="https://latent-clarity.ck.page/5cfc01ee28/index.js"></script>
<div class="sticky-bottom-button">
  <button class="btn btn--small btn--dark-orange float-left" data-formkit-toggle="5cfc01ee28">Get Clarity <i class="fa-regular fa-paper-plane"></i> </button>
</div>
</body>
</html>
