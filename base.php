<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
<?php get_template_part('templates/head'); ?>

<body <?php body_class(); ?>>

  <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
  <?php
  do_action('get_header');
  get_template_part('templates/main-header');
  ?>

  <div class="wrap" role="document">
    <main class="main">
      <?php include Wrapper\template_path(); ?>
    </main><!-- /.main -->
  </div><!-- /.wrap -->
  <?php
  do_action('get_footer');
  get_template_part('templates/main-footer');
  wp_footer();
  ?>

</body>

</html>
