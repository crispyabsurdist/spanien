<?php
/*
 * 
 * Template Name: Stories Single
 * Template Post Type: Stories
 */
?>

<div class="page-container">
  <?php if (have_posts()) : ?>
    <div class="page-wrapper">
      <?php while (have_posts()) : the_post(); ?>


        <div class="container">

          <div class="row">
            <div class="col col-md-12 d-flex align-items-center">
              <h1 class="divider-title"><?php the_title(); ?></h1>
            </div>
          </div>




        <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
