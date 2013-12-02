<?php get_header(); ?>
<div id="carousel_holder" class="shadow_overall">
  <div class="images">
    <ul class="slides">
      <?php if(is_tax('art', 'gallery')) {

      $catQuery = $wpdb->get_results("SELECT * FROM $wpdb->terms AS wterms INNER JOIN $wpdb->term_taxonomy AS wtaxonomy ON ( wterms.term_id = wtaxonomy.term_id ) WHERE wtaxonomy.taxonomy = 'art_category' AND wtaxonomy.count > 0");
/*  AND wtaxonomy.parent = 0 */
    	$catCounter = 0;
    	foreach ($catQuery as $category) {
    		$catCounter++;
    		$catStyle = '';
    		if (is_int($catCounter / 2)) $catStyle = ' class="even"';
      		$catLink = get_category_link($category);
      		$catID = $category->term_taxonomy_id;
      		$catSlug = $category->slug;
      		
      		$args=array(
            'post_status' => 'publish',
            'posts_per_page' => 1,
            'caller_get_posts'=> 1,
            'order' => 'DESC',
            'post_type' => 'art',
            'tax_query' => array(
              'field' => $catID
            )
          );
          
          $actionQ = null;
          $actionQ = new WP_Query();
          $actionQ->query($args);
    		  if( $actionQ->have_posts() ) {
      		echo '<li'.$catStyle.'>
      		  <h3><a href="'.$catLink.'" title="'.$category->name.'">'.$category->name.'</a></h3>';
            while ($actionQ->have_posts()) : $actionQ->the_post(); ?>
    				<a href="<?php echo $catLink; ?>" rel="bookmark" title="<?php $category->name; ?>"><?php the_post_thumbnail('featured_slide', array('alt' => 'featured image icon', 'class' => 'img_shadow_overall', 'title' => ''.$category->name.'')); ?></a>
  				</li>
    			<?php endwhile; } wp_reset_query(); ?>
		
        <?php } ?>

     <?php } else { ?>
     <h3><?php $term = $wp_query->queried_object; echo '<h3>'.$term->name.'</h3>'; ?></h3>
     <?php while ( have_posts() ) : the_post(); ?>
        
        <li>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('featured_slide', array('alt' => 'featured image icon', 'class' => 'img_shadow_overall', 'title' => ''.get_the_title().'')); ?>
          </a>
        </li>
      <?php endwhile; wp_reset_query(); } ?>
    </ul>
  </div>
  <div id="buttons">
    <a id="prev" href="#"><div class="back"></div></a>
		<a id="next" href="#"><div class="forw"></div></a>
  </div>
</div>
<!--

    <div id="carousel_holder" class="shadow_overall">
      <div class="images">
        <ul class="slides">
          
        </ul>
      </div>
      <div id="buttons">
        <a id="prev" href="#"><div class="back"></div></a>
				<a id="next" href="#"><div class="forw"></div></a>
      </div>
    </div>
-->
<?php get_footer(); ?>