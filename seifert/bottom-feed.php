<?php/*
  ?>


<?php if ( is_active_sidebar('third-widget-area') ) : ?>
<div class="comments white_bg">
  <div class="posts gray_bg">
  <?php dynamic_sidebar('third-widget-area'); ?>
  </div>
</div>
<?php endif; 
*/?>

<?php

$query = 'posts_per_page=3';
$queryObject = new WP_Query(array('post_type' => 'post')); 
echo ' <div class="comments white_bg"><h1>Siste Bloggnyheter</h1><div class="posts gray_bg">';
// The Loop...

if ($queryObject->have_posts()) {
	while ($queryObject->have_posts()) {
		$queryObject->the_post();
		echo '<ul class="gray_white_bg"><li><h4>' , get_the_category_list(', ') , '</h4><h5><a href="' , the_permalink() , '">' , the_title() , '</a></h5>' , '<span>lagt inn kl ' , the_time('H:i // d/M/y') , '</span></li></ul>';
	}
} echo '</div>
</div>'; wp_reset_query();
if ( is_active_sidebar('secondary-widget-area') ) : ?>
<div class="comments white_bg">
  <div class="posts gray_bg">
  <?php dynamic_sidebar('secondary-widget-area'); ?>
  </div>
</div>
<?php endif; ?>



