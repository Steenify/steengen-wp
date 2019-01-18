<?php get_header(); ?>

<main class="page__search">
  <div class="container page__search__content">
  <?php if ($_GET['s']) : ?>
    <?php if (have_posts()) : ?>
        <?php
        global $wp_query;
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
          's' => $_GET['s'],
          'post_type' => 'Product',
          'posts_per_page' => 8,
          'paged' => $_GET['t'],
        );
        global $wp_query;
        $loop = new WP_Query($args);
        $temp_query = $wp_query;
            // wipe it
        $wp_query = null;
            // replace it
        $wp_query = $loop;

        $i = 1;
        ?>

          <h3 class="page__search__title">Kết quả tìm kiếm của "<?php echo $_GET['s'] ?>"</h3>

          <div class="row"> 
            <?php while (have_posts()) : the_post(); ?>
              <?php global $post;
              $color = from_hex_to_rgb(get_field('color', $post->ID));
              $hex_color = $color['r'] . ',' . $color['g'] . ',' . $color['b'];
              ?>
              <div class="col-md-4 col-lg-3 col-sm-6">
                <div class="product-item">
                  <div class="product-item__color-gradient" style="background: rgb(<?php echo $hex_color; ?>);
                    background: linear-gradient(180deg,
                      rgba(<?php echo $hex_color; ?>,0) 0%, 
                      rgba(<?php echo $hex_color; ?>,0.1) 40%,
                      rgba(<?php echo $hex_color; ?>,0.3) 55%, 
                      rgba(<?php echo $hex_color; ?>,1) 65%, 
                      rgba(<?php echo $hex_color; ?>,0.1) 75%,
                      rgba(<?php echo $hex_color; ?>,0) 80%,
                      rgba(<?php echo $hex_color; ?>,0) 100%);
                      "></div>

                  <div class="product-item__color-gradient product-item__color-gradient__active" style="background: rgb(<?php echo $hex_color; ?>);
                    background: linear-gradient(180deg,
                      rgba(<?php echo $hex_color; ?>,0) 0%, 
                      rgba(<?php echo $hex_color; ?>,0.5) 40%,
                      rgba(<?php echo $hex_color; ?>,0.7) 55%, 
                      rgba(<?php echo $hex_color; ?>,1) 65%, 
                      rgba(<?php echo $hex_color; ?>,0.3) 75%,
                      rgba(<?php echo $hex_color; ?>,0.1) 80%,
                      rgba(<?php echo $hex_color; ?>,0) 100%);
                      "></div>

                  <div class="product-item__img">
                    <a href="<?php the_permalink(); ?>" title="product detail">
                      <img src="<?php echo get_field('image', get_the_ID()) ?>" alt="">
                    </a>
                  </div>
                  <a href="<?php the_permalink(); ?>" style="color: initial">
                    <h4 class="product-item__title">
                      <?php echo strtoupper(the_title()); ?>
                    </h4>
                    <p class="product-item__des"><?php echo get_field('sub_name', get_the_ID()) ?></p>
                  </a>
                </div>
              </div>   
              <?php $i++; ?>
            <?php endwhile; ?>
          </div>
          <nav class="steen-pagination text-center">
            <ul>
                <?php 
                pagination();
                wp_reset_query();
                ?>
            </ul>
          </nav>
    <?php else : ?>
    <div class="page__search__not_found">
      <div class="page__search__info text-center">

        <h1>Không tìm thấy kết quả</h1>
        <p>
          Không tìm thấy kết quả cho từ khóa "<?php echo $_GET['s'] ?>"
        </p>

        <a href="/" class="color_select__btn oexpo-btn link">
          Quay lại
          <svg width="26" height="15" viewBox="0 0 26 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M17.3967 14L23.9999 7.56455L17.2643 0.999999" stroke="currentcolor" stroke-width="2" />
            <line y1="-1" x2="23.894" y2="-1" transform="matrix(-1 0 0 1 23.894 8.41138)" stroke="currentcolor"
              stroke-width="2" />
          </svg>
        </a>
      </div>
    </div>
    <?php endif; ?>
  <?php else : ?>
  <div class="page__search__not_found">
    <div class="page__search__info text-center">

      <h1>Không tìm thấy kết quả</h1>
      <p>
        Không tìm thấy kết quả cho từ khóa "<?php echo $_GET['s'] ?>"
      </p>

      <a href="/" class="color_select__btn oexpo-btn link">
        Quay lại
        <svg width="26" height="15" viewBox="0 0 26 15" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M17.3967 14L23.9999 7.56455L17.2643 0.999999" stroke="currentcolor" stroke-width="2" />
          <line y1="-1" x2="23.894" y2="-1" transform="matrix(-1 0 0 1 23.894 8.41138)" stroke="currentcolor"
            stroke-width="2" />
        </svg>
      </a>
    </div>
  </div>

  <?php endif; ?>

  </div>
</main>

<style>
  .page__search {
    padding-top: 110px;
    background: #ffffff;
  }

  .page__search__title {
    margin-bottom: 30px;
    font-style: normal;
    font-weight: bold;
    line-height: normal;
    font-size: 36px;
    color: #202020;
  }

  .page__search__content {
    min-height: calc(100vh - 340px);
    padding-top: 30px;
    padding-bottom: 30px;
    /* text-align: center; */
  }

  .page__search__content .steen-pagination {
    margin-top: 20px;
  }

  .page__search__not_found {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .page__search__info {
    margin-top: 15px;
    margin-bottom: 30px;
  }

  .page__search__info h1 {
    font-style: normal;
    font-weight: 800;
    line-height: normal;
    font-size: 30px;
    text-align: center;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #000000;
  }

  .page__search__info p {
    font-style: normal;
    font-weight: 400;
    line-height: normal;
    font-size: 24px;
    text-align: center;
    letter-spacing: 0.05em;
    text-transform: uppercase;
    color: #000000;
    margin-bottom: 30px;
  }

  .header-main {
    background: #C9E4EC;
  }

  .header-main .navbar-nav__child {
    background: #C9E4EC;
  }

  .header-main .navbar-nav__child li:first-child:after {
    border-bottom-color: #C9E4EC;
  }
  .page__search__content .product-item {
    height: 100%;
    transform: translate3d(0,-1px,0);
  }
  .page__search__content .product-item:hover .product-item__des, 
  .page__search__content .product-item:hover .product-item__title {
      color: #000;
  }

  @media (max-width: 991px) {
    .page__search {
      padding-top: 0;
    }
  }

</style>

<?php get_footer(); ?>
