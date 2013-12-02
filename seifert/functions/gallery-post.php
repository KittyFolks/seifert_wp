<?php 

add_action( 'init', 'create_post_type', 0 );
function create_post_type() {
  /** new lines for hot-fix start */
  //global $wp_rewrite;

  //$wp_rewrite->matches = 'matches';
  /** new lines for hot-fix end */
	register_post_type( 'art',
		$args = array(
		'labels' => array(
			'name' => __( 'Arts' ),
			'singular_name' => __( 'Art' ),
			'add_new' => __( 'Add New Art' ),
    	'add_new_item' => __( 'Add New Art' ),
    	'edit' => __( 'Edit' ),
    	'edit_item' => __( 'Edit Art' ),
    	'new_item' => __( 'New Art' ),
    	'view' => __( 'View Art' ),
    	'view_item' => __( 'View Art' ),
    	'search_items' => __( 'Search Arts' ),
    	'not_found' => __( 'No Arts found' ),
    	'not_found_in_trash' => __( 'No Arts found in Trash' )
			),
		'public' => true,
		'has_archive' => true,
		'taxonomies' => array('category' => 'Art Category', 'post_tag'),
		'menu_position' => 5,
		//'query_var' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail', 'comments', 'tags' ),
		'show_ui' => true,
		//'map_meta_cap' => true,
    //'capability_type' => 'post',
    //'hierarchical' => false,
    'rewrite' => true
    )
	);
	register_post_type( 'art', $args );
  flush_rewrite_rules();
}

add_action( 'arts_meta_options', 'seifert_theme_setup' );
function arts_meta_options(){
  global $post;
  if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;
  $custom = get_post_custom($post->ID);
  $size = $custom['size'][0];
  $tech = $custom['tech'][0];
  $year = $custom['year'][0];
  $sign = $custom['sign'][0];
  $item = $custom['items'][0];
  $inShop = $custom['inShop'][0];
  $proName = $custom['proName'][0];
  $price = $custom['price'][0];
}

add_action( 'init', 'art_tax_init', 0 );
function art_tax_init() {
	// create a new taxonomy
	register_taxonomy(
		'art_category',
		'art',
    array(
			'hierarchical' => true, 
  		//'context' => 'normal', 
  		//'show_ui' => true,
  		'label' => 'Art Categories', 
  		'singular_label' => 'Art Category', 
  		'query_var' => true,
  		'rewrite' => true,
		)
	);
	//register_taxonomy( 'art_category', $args );
	flush_rewrite_rules();
}


//require_once('more_meta.php');

/*
add_action('art_category_edit_form_fields','category_edit_form_fields');
add_action('art_category_edit_form', 'category_edit_form');
add_action('art_category_add_form_fields','category_edit_form_fields');
add_action('art_category_add_form','category_edit_form');


function category_edit_form() {
?>
<script type='text/javascript'>
jQuery(document).ready(function(){
jQuery('#edittag').attr( 'enctype', 'multipart/form-data' ).attr( 'encoding', 'multipart/form-data' );
        });
</script>
<?php 
}

function category_edit_form_fields () {
?>
    <tr class='form-field'>
            <th valign='top' scope='row'>
                <label for='catpic'><?php _e('Picture of the category', ''); ?></label>
            </th>
            <td>
                <input type='file' id='catpic' name='catpic'/>
            </td>
        </tr>
        <?php 
    }

*/
?>
