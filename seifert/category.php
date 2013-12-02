<?php get_header(); ?>

<div id="bcrumb">
  <?php if (function_exists('dimox_breadcrumbs')) dimox_breadcrumbs(); ?>
  <!-- <a href="">Forsiden</a> &raquo; <a href="">Bloggiblogg</a> &raquo; Engledans -->
</div>
<div id="container" class="white_bg">
  <div id="content" class="floater">
  <?php the_post(); ?>
<h1 class="page-title"><span><?php single_cat_title() ?></span></h1>
<?php $categorydesc = category_description(); if ( !empty($categorydesc) ) echo apply_filters( 'archive_meta', '<div class="archive-meta">' . $categorydesc . '</div>' ); ?>
<?php rewind_posts(); ?>

<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-above" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'seifert' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'seifert' )) ?></p>
</div>
<?php } $postPos=0; ?>
<?php while ( have_posts() ) : the_post(); $postPos++ ?>

<div id="post-<?php the_ID(); ?>" <?php if( $postPos % 2 ) { post_class('even shadow_overall'); } else { post_class('odd'); } ?>>
<h5 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'seifert'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h5>
<?php the_excerpt(); ?>
<div class="entry-meta">
<p><em><?php _e('By ', 'seifert'); ?><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'seifert' ), $authordata->display_name ); ?>"><?php the_author(); ?></a>
<span class="meta-sep"> // </span><?php _e('Published ', 'seifert'); ?><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr><?php edit_post_link( __( 'Edit', 'seifert' ), "<span class=\"meta-sep\"> // </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?></em></p>
</div>
<div class="entry-utility">
<?php if ( $seifert_cats = seifert_cats(', ') ) : // ?>
<p><?php printf( __( 'Also posted in %s', 'seifert' ), $seifert_cats ) ?><span class="meta-sep"> // </span>
<?php endif ?>
<?php the_tags( '<span class="tag-links"><span class="entry-utility-prep entry-utility-prep-tag-links">' . __('Tagged ', 'seifert' ) . '</span>', ", ", "\n\t\t\t\t\t\t<span class=\"meta-sep\"> // \n" ) ?>
<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'seifert' ), __( '1 Comment', 'seifert' ), __( '% Comments', 'seifert' ) ) ?></span>
<?php edit_post_link( __( 'Edit', 'seifert' ), "<span class=\"meta-sep\"> // </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t\n" ) ?></p>
</div>
</div>
<?php endwhile; ?>

<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
<div id="nav-below" class="navigation">
<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'seifert' )) ?></p>
<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'seifert' )) ?></p>
</div>
<?php } ?>

</div>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>