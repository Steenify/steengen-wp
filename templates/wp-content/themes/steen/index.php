<?php get_header(); ?>

<h1>Content here</h1>
<!-- end block blog -->
<?php wp_enqueue_script('home-bundle', get_template_directory_uri() . '/app/src/dist/home.bundle.js', [], 1.0, true); ?>
<?php get_footer(); ?>
