<?php
load_theme_textdomain( 'seifert', TEMPLATEPATH . '/languages' );
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if ( is_readable($locale_file) )
require_once($locale_file);
require_once('functions/gallery-post.php');
require_once('functions/breadcrumbs.php');
function seifert_get_page_number() {
if (get_query_var('paged')) {
print ' | ' . __( 'Page ' , 'seifert') . get_query_var('paged');
}
}
add_action( 'after_setup_theme', 'seifert_theme_setup' );
function seifert_theme_setup() {
add_theme_support( 'automatic-feed-links' );
}
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
}
add_image_size( 'article',  370, 9999 );
add_image_size( 'artwork',  490, 9999 );
add_image_size( 'featured_slide',  304, 390, false);
if ( ! isset( $content_width ) ) $content_width = 640;
add_filter('the_title', 'seifert_title');
function seifert_title($title) {
if ($title == '') {
return 'Untitled';
} else {
return $title;
}
}
function seifert_register_menus() {
register_nav_menus(
array( 'main-menu' => __( 'Main Menu', 'seifert' ))
);
}
add_action( 'init', 'seifert_register_menus' );
function seifert_theme_widgets_init() {
register_sidebar( array (
'name' => 'Primary Widget Area',
'id' => 'primary-widget-area',
'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
'after_widget' => "</li>",
'before_title' => '',
'after_title' => '',
) );
register_sidebar( array (
'name' => 'Secondary Widget Area',
'id' => 'secondary-widget-area',
'before_widget' => '<ul id="%1$s" class="gray_white_bg %2$s"><li>',
'after_widget' => "</li></ul>",
'before_title' => '<h1 class="widget-title">',
'after_title' => '</h1>',
) );
register_sidebar( array (
'name' => 'Third Widget Area',
'id' => 'third-widget-area',
'before_widget' => '<div id="_%1$s" class="%2$s">',
'after_widget' => "</div>",
'before_title' => '<h1 class="header">',
'after_title' => '</h1>',
) );
}
function custom_excerpt_length( $length ) {
	return 10;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
function new_excerpt_more($excerpt) {
	return str_replace('[...]', '...', $excerpt);
}
add_filter('wp_trim_excerpt', 'new_excerpt_more');

add_action( 'init', 'seifert_theme_widgets_init' );
$preset_widgets = array (
'primary-aside'  => array( 'search', 'pages', 'categories', 'archives' ),
);
if ( isset( $_GET['activated'] ) ) {
update_option( 'sidebars_widgets', $preset_widgets );
}
function seifert_cats($glue) {
$current_cat = single_cat_title( '', false );
$separator = "\n";
$cats = explode( $separator, get_the_category_list($separator) );
foreach ( $cats as $i => $str ) {
if ( strstr( $str, ">$current_cat<" ) ) {
unset($cats[$i]);
break;
}
}
if ( empty($cats) )
return false;
return trim(join( $glue, $cats ));
}
function seifert_tags($glue) {
$current_tag = single_tag_title( '', '',  false );
$separator = "\n";
$tags = explode( $separator, get_the_tag_list( "", "$separator", "" ) );
foreach ( $tags as $i => $str ) {
if ( strstr( $str, ">$current_tag<" ) ) {
unset($tags[$i]);
break;
}
}
if ( empty($tags) )
return false;
return trim(join( $glue, $tags ));
}
function seifert_commenter_link() {
$commenter = get_comment_author_link();
if ( ereg( '<a[^>]* class=[^>]+>', $commenter ) ) {
$commenter = preg_replace( '/(<a[^>]* class=[\'"]?)/', '\\1url ' , $commenter );
} else {
$commenter = preg_replace( '/(<a )/', '\\1class="url "' , $commenter );
}
$avatar_email = get_comment_author_email();
$avatar = str_replace( "class='avatar", "class='photo avatar", get_avatar( $avatar_email, 80 ) );
echo $avatar . ' <span class="fn n">' . $commenter . '</span>';
}
function seifert_custom_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
$GLOBALS['comment_depth'] = $depth;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author vcard"><?php seifert_commenter_link() ?></div>
<div class="comment-meta"><?php printf(__('Posted %1$s at %2$s <span class="meta-sep"> | </span> <a href="%3$s" title="Permalink to this comment">Permalink</a>', 'seifert'),
get_comment_date(),
get_comment_time(),
'#comment-' . get_comment_ID() );
edit_comment_link(__('Edit', 'seifert'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e("\t\t\t\t\t<span class='unapproved'>Your comment is awaiting moderation.</span>\n", 'seifert') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php
if($args['type'] == 'all' || get_comment_type() == 'comment') :
comment_reply_link(array_merge($args, array(
'reply_text' => __('Reply','seifert'),
'login_text' => __('Log in to reply.','seifert'),
'depth' => $depth,
'before' => '<div class="comment-reply-link">',
'after' => '</div>'
)));
endif;
?>
<?php }
function seifert_custom_pings($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
?>
<li id="comment-<?php comment_ID() ?>" <?php comment_class() ?>>
<div class="comment-author"><?php printf(__('By %1$s on %2$s at %3$s', 'seifert'),
get_comment_author_link(),
get_comment_date(),
get_comment_time() );
edit_comment_link(__('Edit', 'seifert'), ' <span class="meta-sep"> | </span> <span class="edit-link">', '</span>'); ?></div>
<?php if ($comment->comment_approved == '0') _e('\t\t\t\t\t<span class="unapproved">Your trackback is awaiting moderation.</span>\n', 'seifert') ?>
<div class="comment-content">
<?php comment_text() ?>
</div>
<?php }