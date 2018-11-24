<?php get_header(); ?>

	<?php 
	// function filterReview($cat) {
	// 	return $cat->slug == 'danh-gia';
	// }
	// function filterActivity($cat) {
	// 	return $cat->slug == 'khuyen-mai' || $cat->slug == 'su-kien';
	// }
	// if (have_posts()): while (have_posts()) : the_post(); 
	// 	$post_type = get_post_type();
	// 	$cat = get_the_category();
	// 	$reviews = array_filter($cat,"filterReview");
	// 	$activities = array_filter($cat,"filterActivity");
	// 	// var_dump($reviews);

	// 	// Detect post type to choose template for rendering
	// 	if ($post_type === 'product') {
	// 		get_template_part('templates/product-detail');
	// 	} else if (count($reviews) > 0){
	// 		get_template_part('templates/review-detail');
	// 	} else if (count($activities) > 0){
	// 		get_template_part('templates/activity-detail');
	// 	} else {
	// 		get_template_part('templates/blog-detail');
	// 	}
	
	?>
	<?php // endwhile; ?>

	<?php // else: ?>


	<?php // endif; ?>


<?php //get_sidebar(); ?>

<?php get_footer(); ?>
