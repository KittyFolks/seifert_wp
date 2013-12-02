<?php get_header(); ?>
    <div id="carousel_holder" class="shadow_overall">
      <div class="images">
        <ul class="slides">
          <?php global $wp_query;
          $args = array_merge( $wp_query->query, array( 'post_type' => 'art' ) );
          query_posts( $args ); ?>
          <?php while ( have_posts() ) : the_post(); ?>
            <li>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('featured_slide', array('alt' => 'featured image icon', 'class' => 'img_shadow_overall', 'title' => ''.get_the_title().'')); ?>
              </a>
            </li>
          <?php endwhile; ?>
        </ul>
      </div>
      <div id="buttons">
        <a id="prev" href="#"><div class="back"></div></a>
				<a id="next" href="#"><div class="forw"></div></a>
      </div>
    </div>
<?php get_footer(); ?>