<?php
/*
 * 
 * Template name: Golf Archive
 * 
 */
?>


<div class="page-container">

  <div class="page-title" data-aos="fade-in" data-aos-delay="200" data-aos-duration="2000">
    <h1><?php the_title(); ?></h1>
  </div>

  <div class="container">
    <div class="row archive-row">
      <?php
      $args = array(
        'post_type' => 'golf',
        'orderby' => 'date',
        'order' => 'DESC',
        'post_status' => 'publish',
        'posts_per_page' => -1,
      );
      ?>

      <?php $loop = new WP_Query($args);

      if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();

          $main_thumb = get_field('post-main-img');
          $special_thumb = get_field('extra-img');
          $post_ingress = get_field('post-ingress');
          $post_content = get_field('post-text');

          $thumb = ($special_thumb) ? $special_thumb : $main_thumb;

          ?>


          <div class="col-12 col-sm-6" data-aos="fade-up" data-aos-delay="200">
            <div class="card-obj">
              <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                <div class="card-thumb" style="background-image:url(<?php echo $thumb['url']; ?>)"></div>
              </a>

              <div class="card-text">

                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                  <h2 class="font-size-3"><?php the_title(); ?></h2>
                </a>

                <span class="card-posted">
                  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/calendar.svg" alt="calendar">
                  <time datetime="<?php echo get_the_date(); ?>">
                    <?php echo get_the_date(); ?>
                  </time>
                </span>

                <a class="read-icon-link" href="<?php the_permalink(); ?>" title="Read">
                 <img class="read-icon" src="<?php echo get_template_directory_uri() ?>/assets/images/read.png" alt="Read the blog post">
                </a>

              </div>

            </div>
          </div>

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_query(); ?>
    </div> <!-- END LOOP CONTAINER -->

  </div>
</div>
