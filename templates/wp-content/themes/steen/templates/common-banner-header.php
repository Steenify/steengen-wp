<!-- home main slider -->
<section class="main-slider_block">
  <!-- home main slider item -->
  <div class="main-slider_item">
    <div class="main-slider_item_wrapper">
      <picture>
        <source media="(min-width: 1680px)" srcset="<?php echo get_field('banner_1920', false); ?>">
        <source media="(max-width: 768px)" srcset="<?php echo get_field('banner_mobile', false); ?>">
        <img src="<?php echo get_field('banner_1440', false); ?>" class="w-100" alt="dyb-banner">
      </picture>
      <h4 class="main-slider_item_des">
        <?php echo get_field('sologan', false); ?>
      </h4>
    </div>
  </div>
  <!-- home main slider item -->
</section>