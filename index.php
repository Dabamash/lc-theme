<?php
get_header();
?>

<div class="page-banner">
</div>

<div class="full-width-container">
  <div class="full-width-container__column">
    <div class="full-width-container__inner">
      <h1 class="headline headline--medium">All Guides</h1>
      <p>If you're going it alone, or you're just starting off, here's a bunch of helpful resources to point you in the right direction.<br>Don't worry, I've got your back 👍</p>
      <h3>Choose categories</h3>
      <!-- Category Filter Form -->
      <form method="get" action="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>" class="category-filter-form">
          <?php
          $categories = get_categories();
          foreach ($categories as $category) {
            echo '<input type="checkbox" id="cat-' . $category->term_id . '" name="categoryfilter[]" value="' . $category->term_id . '" class="category-filter-checkbox"><label for="cat-' . $category->term_id . '" class="category-filter-label">' . $category->name . '</label>';
          }
          ?>
      </form>

      <div class="recent-posts-container">
        <?php
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        $category_filter = isset($_GET['categoryfilter']) ? $_GET['categoryfilter'] : '';

        $recent_posts_args = array(
            'post_type' => 'post',
            'posts_per_page' => 12,
            'orderby' => 'date',
            'order' => 'DESC',
            'paged' => $paged
        );

        if (!empty($category_filter)) {
            $recent_posts_args['category__in'] = $category_filter;
        }

        $recent_posts = new WP_Query($recent_posts_args);

        while ($recent_posts->have_posts()) {
          $recent_posts->the_post();
        ?>
          <div class="recent-post-box">
            <a href="<?php the_permalink(); ?>" class="post-link">
              <div class="featured-image">
                <?php the_post_thumbnail('large'); ?>
              </div>
              <h3 class="post-title"><?php the_title(); ?></h3>
            </a>
            <div class="metabox metabox--with-home-link">
              <div>
                <?php echo get_avatar(get_the_author_meta('ID'), 96, '', '', array('class' => 'metabox__author-image')); ?>
              </div>
              <p>
                <span><?php the_author_posts_link(); ?><br>
                  <?php
                  $reading_time = get_estimated_reading_time(get_the_content());
                  echo $reading_time . ' min read</span>';
                  ?>
              </p>
            </div>
            <div class="post-excerpt"><?php the_excerpt(); ?></div>
          </div>
        <?php
        }
        wp_reset_postdata();
        ?>
      </div>
      <?php
// Display pagination links
echo paginate_links(array(
  'total'        => $recent_posts->max_num_pages,
  'link_classes' => 'btn btn--small-page-number page-numbers' // Add your custom classes here
));
?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
