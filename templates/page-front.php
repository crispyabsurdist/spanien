<header class="header-menu">

  <div class="logo">
    <?php $header_logo = get_field('menu-logo'); ?>
    <img src="<?php echo $header_logo['alt'] ?>" alt="<?php echo $header_logo['alt'] ?>">
  </div>

  <nav id="primary-nav">
    <?php if (have_rows('repeater_field_name')) : ?>
      <?php while (have_rows('repeater_field_name')) : the_row(); ?>

        <?php $link = get_sub_field('image'); ?>

        <?php if ($link) : ?>
          <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>
  </nav>

</header>