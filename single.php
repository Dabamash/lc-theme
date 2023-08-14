<?php
  
get_header(); ?>

<div class="page-banner">
</div>

<?php
while (have_posts()) {
  the_post();
?>

<div class="container container--narrow page-section">
  <div>
    <a href="<?php echo site_url('/guides'); ?>">← back to all guides</a>
  </div><br>
  <div class="featured-image">
    <?php the_post_thumbnail('large'); ?>
  </div>
  <h1 class="headline--medium"><?php the_title(); ?></h1>
  <?php the_excerpt(); ?><br>
  <div class="metabox metabox--with-home-link">
    <div>
      <?php echo get_avatar(get_the_author_meta('ID'), 96, '', '', array('class' => 'metabox__author-image')); ?>
    </div>
    <p>
      <span><?php the_author_posts_link(); ?><br><?php the_time('M j, Y'); ?>
        <?php
          $reading_time = get_estimated_reading_time(get_the_content());
          echo '• ' . $reading_time . ' min read</span>';
        ?>
    </p>
  </div>
  <hr>
  <div class="generic-content"><?php the_content(); ?></div>
</div>

<div class="full-width-container">
  <div class="full-width-container__column">
    <div class="full-width-container__inner t-center">
      <div class="cta-banner--post">
        <h1 class="headline headline--medium">Become a <span>better marketer</span>, one email at a time.</h1>
        <h2 class="headline headline--smaller">Empowering new & solo marketers with straight-talking, practical (and sometimes funny 🤷) advice. <br><br> Get the Clarity newsletter for free each week.</h2>
        <script async data-uid="1d348d83d0" src="https://latent-clarity.ck.page/1d348d83d0/index.js"></script>
      </div>
    </div>
  </div>
</div>

<div class="container container--narrow page-section">
  <!-- a section which displays information about the author of the post -->
  <h1 class="headline--small">Written By</h1>
  <div class="metabox metabox--with-home-link">
    <div>
      <?php echo get_avatar(get_the_author_meta('ID'), 96, '', '', array('class' => 'metabox__author-image')); ?>
    </div>
    <p>
      <span><?php the_author_posts_link(); ?> - <a style="font-weight:300;color:#ed6d46;" href="https://www.linkedin.com/in/davnash/">LinkedIn</a> | <a style="font-weight:300;color:#ed6d46;" href="https://davnash.com">Website</a>
    </p>
  </div>
  <p><?php echo nl2br(get_the_author_meta('description')); ?></p><br>
  <a style="text-decoration:none;" href="http://latentclarity.abc/author/dav/">See my other posts</a>
  <hr>
  <div class="comments-section">
    <?php comments_template(); ?>
  </div>
</div>

<div class="back-to-top">
  <a href="#top"><i class="fa-solid fa-angles-up"></i></a>
</div>

<?php }

get_footer();

?>