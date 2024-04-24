<?php

require get_theme_file_path('/inc/search-route.php');

function lc_custom_rest() {
  register_rest_field('post', 'authorName', array(
    'get_callback' => function() {return get_the_author();}
  ));
}

add_action('rest_api_init', 'lc_custom_rest');

function lc_files() {
  wp_enqueue_script('main-lc-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_script('font-awesome-kit', '//kit.fontawesome.com/5ff7de27f2.js', array(), null, true);
  wp_enqueue_style('lc_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('lc_extra_styles', get_theme_file_uri('/build/index.css'));

  wp_localize_script('main-lc-js', 'lcData', array(
    'root_url' => get_site_url(),
    'ajax_url' => admin_url('admin-ajax.php'),
    'nonce' => wp_create_nonce('wp_rest')
  ));
}

add_action('wp_enqueue_scripts', 'lc_files');

function lc_features() {
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_image_size('pageBanner', 1500, 350, true);
}

add_action('after_setup_theme', 'lc_features');

// Redirect subscriber accounts out of admin and onto homepage
add_action('admin_init', 'redirectSubsToFrontend');

function redirectSubsToFrontend() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    wp_redirect(site_url('/'));
    exit;
  }
}

add_action('wp_loaded', 'noSubsAdminBar');

function noSubsAdminBar() {
  $ourCurrentUser = wp_get_current_user();

  if (count($ourCurrentUser->roles) == 1 AND $ourCurrentUser->roles[0] == 'subscriber') {
    show_admin_bar(false);
  }
}

// Customize Login Screen
add_filter('login_headerurl', 'ourHeaderUrl');

function ourHeaderUrl() {
  return esc_url(site_url('/'));
}

add_action('login_enqueue_scripts', 'ourLoginCSS');

function ourLoginCSS() {
  wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('lc_main_styles', get_theme_file_uri('/build/style-index.css'));
  wp_enqueue_style('lc_extra_styles', get_theme_file_uri('/build/index.css'));
}

add_filter('login_headertitle', 'ourLoginTitle');

function ourLoginTitle() {
  return get_bloginfo('name');
}

// Custom function to calculate estimated reading time
function get_estimated_reading_time($content) {
  $words_per_minute = 238;
  $word_count = str_word_count(strip_tags($content));
  $reading_time = ceil($word_count / $words_per_minute);

  return $reading_time;
}

add_filter( 'comment_form_default_fields', 'wpse_62742_comment_placeholders' );

/**
 * Change default fields, add placeholder and change type attributes.
 *
 * @param  array $fields
 * @return array
 */
function wpse_62742_comment_placeholders( $fields )
{

    $fields['author'] = str_replace(
        '<input',
        '<input placeholder="'
            . _x(
                'Name*',
                'comment form placeholder',
                'latent-clarity-theme'
                )
            . '"',
        $fields['author']
    );
    $fields['email'] = str_replace(
        '<input id="email" name="email" type="text"',
        '<input type="email" placeholder="Email*"  id="email" name="email"',
        $fields['email']
    );
    $fields['url'] = str_replace(
        '<input id="url" name="url" type="text"',
        '<input placeholder="Website" id="url" name="url" type="url"',
        $fields['url']
    );

    return $fields;
}

add_filter( 'comment_form_defaults', 'wpse_67503_textarea_insert' );

function wpse_67503_textarea_insert( $fields )
{
      $fields['comment_field'] = str_replace(
        '<textarea id="comment" name="comment"',
        '<textarea placeholder="Enter your comment*" id="comment" name="comment"',
          $fields['comment_field']
      );

    return $fields;
}

// For logged-in users
add_action('wp_ajax_my_filter', 'my_filter_function');

// For non logged-in users
add_action('wp_ajax_nopriv_my_filter', 'my_filter_function');

function my_filter_function() {
  if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'wp_rest')) {
      echo 'Permission denied';
      wp_die();
  }

  $category_filter = isset($_POST['categoryfilter']) ? $_POST['categoryfilter'] : '';

  $recent_posts_args = array(
      'post_type' => 'post',
      'posts_per_page' => 12,
      'orderby' => 'date',
      'order' => 'DESC',
      'post_status' => 'publish'
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
                  <span><?php the_author_posts_link(); ?><br><?php the_time('M j, Y'); ?>
                  <?php
                  $reading_time = get_estimated_reading_time(get_the_content());
                  echo '• ' . $reading_time . ' min read</span>';
                  ?>
              </p>
          </div>
          <div class="post-excerpt"><?php the_excerpt(); ?></div>
      </div>
      <?php
  }
  wp_reset_postdata();
  wp_die();
}

// ACF Display Custom Fields
add_filter('acf/settings/remove_wp_meta_box', '__return_false');

?>


