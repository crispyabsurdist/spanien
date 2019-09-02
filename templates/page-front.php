<?php

$cover = get_field('cover-img');

?>

<div class="fullpage-cover" style="background-image:url(<?php echo $cover['url']; ?>);">

  <div class="fullpage-text-wrapper">

    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-md-8">

          <?php $title_one = get_field('fp-title-one'); ?>
          <?php $title_two = get_field('fp-title-two'); ?>

          <div class="fullpage-text-content" data-aos="fade-up">
            <h1>
              <?php echo $title_one; ?>
            </h1>
            <p class="ingress aos-init aos-animate" data-aos="fade-up"><?php the_field('fp-ingress'); ?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
