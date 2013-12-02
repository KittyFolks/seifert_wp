<?php get_header(); ?>
<?php

$terms = get_the_terms( $post->ID , 'art_category' );
foreach( $terms as $term ) {
	$term_ID = $term->term_id;
}
$prevPost = get_previous_post();	
$prevURL = $prevPost->ID;
$nextPost = get_next_post();	
$nextURL = $nextPost->ID;

$prevTerms = get_the_terms($prevURL, 'art_category');
foreach( $prevTerms as $prev ) {
  $prev_ID = $prev->term_id;
}
$nextTerms = get_the_terms($nextURL, 'art_category');
foreach( $nextTerms as $next ) {
  $next_ID = $next->term_id;
}
//echo $term_name , ' ' , $term_ID , ' ' , $term_parent , ' ' , $post->ID, ' ', $prevURL, ' ', $prev_ID; 
?>

<div id="bcrumb">
  <span class="back floater"><?php if($prevPost && $prev_ID == $term_ID) { ?><a href="<?php echo get_permalink($prevURL); ?>"></a><?php } ?></span>
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <!-- <a href="">Forsiden</a> &raquo; <a href="">Bloggiblogg</a> &raquo; Engledans -->
  <span class="forw floater"><?php if($nextPost && $next_ID == $term_ID) { ?><a href="<?php echo get_permalink($nextURL); ?>"></a><?php } ?></span>
</div>
<div id="container" class="white_bg">
<?php// print_r($term); $term = get_the_terms($post->ID, 'art_category'); print_r($term->slug); print_r($term_list->parent); ?>
  <div id="content" class="floater">
  <?php the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php 
      if ( has_post_thumbnail() ) { echo '<a href="'; echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); echo '">';
        the_post_thumbnail('artwork', array('alt' => 'featured image icon', 'class' => 'img_shadow_overall', 'title' => ''.get_the_title().'')); echo '</a>';
      } 
      ?>
      <?php the_content(); ?>
      <div class="entry-meta">
        <p><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr> <?php edit_post_link( __( 'Edit', 'seifert' ), "<span class=\"meta-sep\"> // </span>\n\t\t\t\t\t\t", "\n\t\t\t\t\t" ) ?>
        </p>
      </div>
    </div>
  </div>
  <div class="fb"><fb:like href="www.seifert.no" send="true" layout="button_count" width="450" show_faces="false" action="recommend" font="lucida grande"></fb:like></div>
  <?php { include (TEMPLATEPATH . "/art-sidebar.php"); } ?>
</div>
<?php { include (TEMPLATEPATH . "/bottom-feed.php"); } ?>
<?php get_footer(); ?>