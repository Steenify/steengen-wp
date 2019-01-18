<?php
get_header();
$categories = get_the_category();
$post_date = get_the_date( 'd M Y' ); 
$post = get_queried_object();
$cat = new stdClass();
if ($categories) {
    $cat = $categories[0];
}
?>


<main class="news__page news__article">
    <div class="news__nav oexpo__nav">
    <div class="container">
      <ul class="news__nav__list oexpo__nav__list">
        <li class="news__nav__item oexpo__nav__item <?php echo $cat->slug == 'san-pham' ? 'active': ''; ?>">
            <a href="/category/san-pham" title="news__nav__item">
            sản phẩm
            </a>
        </li>
        <!-- <li class="news__nav__item oexpo__nav__item <?php echo $cat->slug == 'xu-huong' ? 'active': ''; ?>">
            <a href="/category/xu-huong" title="news__nav__item">
            xu hướng
            </a>
        </li> -->
        <li class="news__nav__item oexpo__nav__item <?php echo $cat->slug == 'cong-ty' ? 'active': ''; ?>">
            <a href="/category/cong-ty" title="news__nav__item">
            công ty
            </a>
        </li>
        <li class="news__nav__item oexpo__nav__item <?php echo $cat->slug == 'cong-dong' ? 'active': ''; ?>">
            <a href="/category/cong-dong" title="news__nav__item">
            cộng đồng
            </a>
        </li>
        <li class="news__nav__item oexpo__nav__item <?php echo $cat->slug == 'tin-tuc' ? 'active': ''; ?>">
            <a href="/category/tin-tuc" title="news__nav__item">
            tin tức
            </a>
        </li>
        </ul>
    </div>
    </div>
    
    <div class="news__content news__article__container container">
    <div class="row">

        <div class="col-lg-9">
        <div class="news__article__content">
            <h1 class="news__article__name">
                <?php echo get_the_title(); ?>
            </h1>
            <div class="news__article__meta">
            <strong class="news__article__cat">
                <?php echo strtoupper($cat->name); ?>
            </strong>
            <time class="news__article__date">
                <?php echo the_time('d/m/Y'); ?>
            </time>
            </div>
            <div class="news__article__body">
                <?php echo get_field('content', get_the_ID())?>
            </div>

        </div>
        </div>
        <div class="col-lg-3">
        <div class="news__sidebar">
            <h4 class="news__sidebar__title">
            Tin tức liên quan
            </h4>

            <div class="news__sidebar__list">
              <?php
                $args = array(
                  'posts_per_page' => 4,
                  'post__not_in' => array(get_the_ID()),
                  'post_type' => 'post',
                  'orderby' => 'id',
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'slug',
                        'terms' => $cat->slug
                    )
                  )
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                  while ($loop->have_posts()) {
                    $loop->the_post();
                    $post = $loop->post;
                    $post_id = $post->ID;
                    ?>
                      <div class="news__sidebar__item">
                        <div class="news__sidebar__img">
                        <a href="<?php echo the_permalink(); ?>">
                          <img src="<?php echo get_field('image', get_the_ID())?>" alt="news__sidebar__img">
                        </a>
                        </div>
                        <div class="news__sidebar__info">
                        <a href="<?php echo the_permalink(); ?>">
                          <h5 class="news__sidebar__name">
                            <?php echo trim_text(get_the_title(), 75); ?>
                          </h5>
                          </a>
                        <time class="news__sidebar__date"><?php echo the_time('d/m/Y'); ?> </time>
                        </div>
                      </div>
                    <?php
                  }
                }
                wp_reset_query();
              ?> 	 
            </div>

            <h4 class="news__sidebar__title">
            Tin tức phổ biến
            </h4>

            <div class="news__sidebar__list">
            <?php 
              $popular = new WP_Query(array('posts_per_page'=>4, 'meta_key'=>'popular_posts', 'orderby'=>'meta_value_num', 'order'=>'DESC'));
              while ($popular->have_posts()) : $popular->the_post(); ?>

              <div class="news__sidebar__item">
                <div class="news__sidebar__img">
                <a href="<?php echo the_permalink(); ?>">
                  <img src="<?php echo get_field('image', get_the_ID())?>" alt="news__sidebar__img">
                </a>
                </div>
                <div class="news__sidebar__info">
                <a href="<?php echo the_permalink(); ?>">
                  <h5 class="news__sidebar__name">
                    <?php echo trim_text(get_the_title(), 75); ?>
                  </h5>
                </a>
                <time class="news__sidebar__date"><?php echo the_time('d/m/Y'); ?></time>
                </div>
              </div>
              <?php endwhile; wp_reset_postdata();
            ?>
          </div>
        </div>
        </div>

    </div>

    </div>

</main>

<?php get_footer()?>