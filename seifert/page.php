<?php get_header(); ?>
<div id="bcrumb">
  <span class="back floater"><?php previous_post_link( '%link', '<span class="meta-nav">&laquo;</span>', true ) ?></span>
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <!-- <a href="">Forsiden</a> &raquo; <a href="">Bloggiblogg</a> &raquo; Engledans -->
  <span class="forw floater"><?php next_post_link( '%link', '<span class="meta-nav">&raquo;</span>', true ) ?></span>
</div>
<div id="container" class="white_bg">
  <div id="content" class="floater">
  <?php the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php 
      if ( has_post_thumbnail() ) { echo '<a href="'; echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); echo '">';
        the_post_thumbnail('article', array('alt' => 'featured image icon', 'class' => 'img_shadow_overall', 'title' => ''.get_the_title().'')); echo '</a>';
      } 
      ?>
      <?php the_content(); ?>
    </div>
  </div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>