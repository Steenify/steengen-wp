##### Require
1. Node JS and npm
2. Docker
##### How to run
- Develop front-end

```
cd wp-content/themes/steen/app
```
```
npm install 
npm run dev
```

Build front-end app
```
npm run build
```

- Develop back-end
```
# Start app
docker-compose up
```
```
# Stop app
docker-compose down
```

##### Code boilerplate

1. Get post to show in home page

```php
// WP_Query arguments
// Ex with post type 'product'
$args = array(
	'post_type'              => array( 'product' ),
	'posts_per_page'         => '8',
);

// The Query
$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) {
	while ( $query->have_posts() ) {
    $query->the_post();

    ?>
		// Place html here
    <?php
	}
} else {
	// no posts found
}
wp_reset_postdata();

```
* Query with taxonomy
```php
// Ex: query products are in category which slug is 'cody'
// Url: http://localhost/cody 
$args = array(
  'post_type'               => array( 'product' ),
  'posts_per_page'          => 4,
  'tax_query'               => array(
    array(
      'taxonomy'            => 'product_category',
      'field'               => 'slug',
      'terms'               => 'cody'
    )
  ),
);
```
* Query with custom fields
```php
$args = array(
  'post_type'               => array( 'product' ),
  'posts_per_page'          => '8',
  'meta_query'              => array(
    array(
      'key'                 => 'on_top',
      'value'               => 1,
      'type'                => 'CHAR',
      'compare'             => '='
    )
  ),
);
```

* Sample html
```php
<div class="product-item">
  <a href="<?php echo get_permalink(); ?>">
    <div class="product-item__bg cody" style="background-image: url(<?php echo THEME_URL; ?>/public/img/home_cody_bg.jpg);"></div>
    <div style="background: <?php echo get_field('color', $item->ID); ?>;" class="product-item__bg product-item__bg_opacity"></div>
    <div style="background: linear-gradient(to bottom, rgba(255, 255, 255, 0) 0%, <?php echo get_field('color', $item->ID); ?> 85%);" class="product-item__bg product-item__bg_gradient"></div>

    <div class="product-item__img">
      <img src="<?php echo get_field('image', $item->ID) ?>" alt="home_cody_1">
    </div>
    <h4 class="product-item__title">
      <?php echo $item->post_title; ?>
    </h4>
    <p class="product-item__des">
      <?php echo get_field('short_description', $item->ID) ?>
    </p>
  </a>
</div>
```

