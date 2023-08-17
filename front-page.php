<?php get_header(); ?>

<div class="page-banner">
</div>

<!-- Section One -->
<div class="full-width-split group">
  <div class="full-width-split__one">
    <div class="full-width-split__inner">
      <img class="hero-image-mobile" src="/wp-content/uploads/2023/08/hero-image-mobile.webp" alt="Image Description" height="320" width="320">
      <h1 class="headline headline--medium">Become a <span>Better Marketer</span> without the jargon.</h1><br>
      <h2 class="headline headline--smaller">Empowering new & solo marketers with straight-talking, practical (and sometimes funny 🤷) advice. <br><br> Get the <strong>Clarity newsletter</strong> for free twice a month.</h2>
      <script async data-uid="e66a897c18" src="https://latent-clarity.ck.page/e66a897c18/index.js"></script>
    </div>
  </div>
  <div class="full-width-split__two">
    <div class="full-width-split__inner">
      <img class="hero-image" src="/wp-content/uploads/2023/08/hero-image-lossless.webp" alt="Image Description" height="500" width="500">
    </div>
  </div>
</div>

<!-- Section Two -->

<div class="full-width-container">
  <div class="full-width-container__column">
    <div class="full-width-container__inner">
      <div class="testimonials-container">
        <div class="testimonial-box quote-bg">
          <p class="testimonial-content">Of all the heads of digital I have worked with, Dav has something unique. 

          Not only is he highly knowledgeable and successful. He is also a remarkable motivator, coach and inspiration whose boundless energy drives transformation and performance across our business

          It has been a privilege to work with such a top talent.</p>
          <div class="testimonial-author">Mark Niblett</div>
          <div class="testimonial-company">Managing Director | <strong>MTM</strong></div>
        </div>
        <div class="testimonial-box quote-bg">
          <p class="testimonial-content">Dav has been a pleasure to work with, educating myself and the team on search engine optimisation and Google analytics in a clear and simple way. Dav is extremely knowledgeable in his area of expertise and he will add value to any company he works with.</p>
          <div class="testimonial-author">Updesh Bhogal</div>
          <div class="testimonial-company">Advisor | <strong>Visionary</strong></div>
        </div>
        <div class="testimonial-box quote-bg">
          <p class="testimonial-content">I've worked with Dav for a number of years and consider him to be one of the best digital strategists I have encountered. 
          Not only does he really know his stuff but he also cares passionately about getting the best results for clients.</p>
          <div class="testimonial-author">Steve Hall</div>
          <div class="testimonial-company">Comms Director | <strong>Purpose Media</strong></div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Section Three -->

<div class="full-width-container">
  <div class="full-width-container__column">
    <div class="full-width-container__inner">
      <div class="heading-with-link">
        <h1 class="headline headline--medium">Most Recent Guides</h1>
        <a href="http://latentclarity.abc/guides" class="view-more-link">View More →</a>
      </div>
      <div class="recent-posts-container">
        <?php
        $recent_posts = new WP_Query(array(
          'post_type' => 'post',
          'posts_per_page' => 3,
          'orderby' => 'date',
          'order' => 'DESC'
        ));

        while ($recent_posts->have_posts()) {
          $recent_posts->the_post();
        ?>
          <div class="recent-post-box">
            <div class="featured-image">
              <?php the_post_thumbnail('large'); ?>
            </div>
            <a href="<?php the_permalink(); ?>" class="post-link">
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
        ?>
      </div>
    </div>
  </div>
</div>

<!-- Section Four -->

<div class="full-width-container">
  <div class="full-width-container__column">
    <div class="full-width-container__inner t-center">
      <div class="cta-banner">
        <h1 class="headline headline--medium">Become a <strong>better marketer</strong>, one email at a time.</h1>
        <h2 class="headline headline--smaller" style="padding-top:20px;color:#fff !important">Empowering new & solo marketers with straight-talking, practical (and sometimes funny 🤷‍♀️) advice. <br><br> Get the Clarity newsletter for free twice a month.</h2>
        <button class="btn" data-formkit-toggle="5cfc01ee28">Get Clarity | Subscribe</button>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
