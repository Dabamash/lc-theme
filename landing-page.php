<?php
/*
Template Name: Landing Page
*/

include('header-dlp.php'); ?>

<?php
while (have_posts()) {
  the_post();
?>

<div class="container container--narrow page-section">
  <h1 class="headline--medium t-center"><?php the_title(); ?></h1><br>
  <?php
  $theParent = wp_get_post_parent_id(get_the_ID());
  if ($theParent) { ?>
    <div>
      <div><a href="<?php echo get_permalink($theParent); ?>">← back to <?php echo get_the_title($theParent); ?></a></div><hr>
    </div>
  <?php } ?>

  <div class="generic-content">
    <?php the_content(); ?>
  </div>

</div>

<?php }

?>