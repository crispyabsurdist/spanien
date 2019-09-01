<header class="header-menu">

  <div class="header-logo">
    <a href="<?php echo home_url('/'); ?>" class="font-head main-logo"><span class="font-weight-400">Lost in</span>
      <span class="font-weight-700">Cuveta Fuma</span></a>
  </div>

  <div class="container h-100">
    <div class="row h-100">
      <div class="col-12 h-100">
        <nav id="nav-main" class="h-100 d-flex justify-content-between align-items-center">
          <?php if (have_rows('menu-left', 'option')): ?>
          <div class="nav-main-links nav-main-left">
            <?php while (have_rows('menu-left', 'option')): the_row(); ?>

	            <?php $link = get_sub_field('left-link'); ?>

	            <?php if ($link): ?>
	            <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
	            <?php endif; ?>

            <?php endwhile; ?>
          </div>
          <?php endif; ?>

          <?php if (have_rows('menu-right', 'option')): ?>
          <div class="nav-main-links nav-main-left">
            <?php while (have_rows('menu-right', 'option')): the_row(); ?>

	            <?php $link = get_sub_field('right-link'); ?>

	            <?php if ($link): ?>
	            <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
	            <?php endif; ?>

            <?php endwhile; ?>
          </div>
          <?php endif; ?>
        </nav>
      </div>
    </div>
  </div>

</header>
