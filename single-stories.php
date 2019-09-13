<?php
/*
 * 
 * Template Name: Stories Single
 * Template Post Type: historier
 */
?>

<div class="page-container post-singel">
  <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
      <?php
          $main_thumb = get_field('post-main-img');
          $special_thumb = get_field('extra-img');
          $post_ingress = get_field('post-ingress');
          $post_content = get_field('post-text');

          $hero = ($special_thumb) ? $special_thumb : $main_thumb;
          ?>

      <div class="container">

        <div class="row">
          <div class="col col-12">
            <div class="post-singel-hero" style="background-image:url(<?php echo $hero['url']; ?>)"></div>
          </div>
        </div>

        <div class="row row-eq-height justify-content-center">
          <div class="col col-10 text-center post-singel">
            <time datetime="<?php echo get_the_date(); ?>">
              <?php echo get_the_date(); ?>
            </time>
            <h1 class="post-singel-title reveal-text"><?php the_title(); ?></h1>
            <?php if ($post_ingress) : ?>
              <div class="post-singel-ingress">
                <p class="">
                  <?php echo $post_ingress; ?>
                </p>
                <div class="post-singel-ingress-divider"></div>
              </div>
            <?php endif; ?>
          </div>
          <div class="col-md-8 justify-content-center">
            <div class="post-singel-content">
              <?php echo $post_content; ?>
              <div class="author">
                <span class="pre">Skrivet av</span>
                <span class="name"><?php echo get_author_name(); ?></span>
              </div>
            </div>
          </div>
        </div>

      </div>

    <?php endwhile; ?>
  <?php endif; ?>
</div>
