<?php $is_what = (is_home() || is_front_page()) ? 'is-home' : 'is-other'; ?>

<header class="header-menu-desktop <?php echo $is_what; ?>">

  <div class="header-logo-desktop">
    <a href="<?php echo home_url('/'); ?>" class="font-head main-logo">
      <span class="font-bold">Coveta Fumá</span>
      <span class="source">a new chapter</span>
    </a>
  </div>

  <div class="container h-100">
    <div class="row h-100">
      <div class="col-12 h-100">

        <nav id="nav-main" class="h-100 d-flex justify-content-between align-items-center <?php echo $is_what; ?>">
          <?php if (have_rows('menu-left', 'option')) : ?>
            <div class="nav-main-links nav-main-left">
              <?php while (have_rows('menu-left', 'option')) : the_row(); ?>

                <?php $link = get_sub_field('left-link'); ?>

                <?php if ($link) : ?>
                  <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
                <?php endif; ?>

              <?php endwhile; ?>
            </div>
          <?php endif; ?>

          <?php if (have_rows('menu-right', 'option')) : ?>
            <div class="nav-main-links nav-main-left">
              <?php while (have_rows('menu-right', 'option')) : the_row(); ?>

                <?php $link = get_sub_field('right-link'); ?>

                <?php if ($link) : ?>
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

<header class="header-menu-mobile">

  <div class="header-logo-mobile">
    <a href="<?php echo home_url('/'); ?>" class="font-head main-logo">
      <span class="font-normal">Coveta Fumá</span>
      <span class="source">a new chapter</span>
    </a>
  </div>

  <div class="ziploc">
    <div id="sandwich">
      <div class="butter top"></div>
      <div class="butter bottom"></div>
    </div>
  </div>

  <ul class="menu">
    <?php if (have_rows('menu-left', 'option')) : ?>
      <?php while (have_rows('menu-left', 'option')) : the_row(); ?>

        <?php $link = get_sub_field('left-link'); ?>

        <?php if ($link) : ?>
          <li class="menu-item">
            <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
          </li>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>

    <?php if (have_rows('menu-right', 'option')) : ?>
      <?php while (have_rows('menu-right', 'option')) : the_row(); ?>

        <?php $link = get_sub_field('right-link'); ?>

        <?php if ($link) : ?>
          <li class="menu-item">
            <a href="<?php echo $link['url']; ?>"><?php echo $link['title'] ?></a>
          </li>
        <?php endif; ?>

      <?php endwhile; ?>
    <?php endif; ?>
  </ul>

</header>
