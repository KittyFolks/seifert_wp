<?php 
/* 
Plugin Name: Search Context
Description: Use search context on single post pages when they're reached from a search results page to adjust the prev/next post links.
Author: Otto
*/

add_action('init','search_context_setup');
function search_context_setup() {
    global $wp;
    $wp->add_query_var('sq');

    add_filter('previous_post_link','search_context_previous_post_link');
    add_filter('next_post_link','search_context_next_post_link');

    //if (is_search()) {
        add_filter('post_type_link','search_context_add_search_context',10,2);
    //}   
}

function search_context_add_search_context($link, $post) {
    if ($post->post_type != 'art') return $link;
    $sq = get_search_query();
    if ( !empty( $sq ) )
        $link = add_query_arg( array( 'sq' => $sq ), $link );
    return $link;
}


function search_context_previous_post_link($link) {
    $sq = get_query_var('sq');
    if (empty($sq)) return $link;

    return get_search_context_adjacent_link($link, $sq, true);
}

function search_context_next_post_link($link) {
    $sq = get_query_var('sq');
    if (empty($sq)) return $link;
    return get_search_context_adjacent_link($link, $sq, false);
}

function get_search_context_adjacent_link($link, $sq, $previous) {
    global $post, $search_context_query;
    if ( !$post ) return $link;

    if (empty($search_context_query)) {
        $search_context_query = get_posts(array(
            'posts_per_page' => -1,
            'post_type' => 'art',
            'post_status' => 'publish',
            'fields' => 'ids',
            's' => $sq,
            )
        );
    }

    $key = array_search($post->ID, $search_context_query);

    if ($previous) $key--;
    else $key++;

    if (!isset($search_context_query[$key])) return '';

    $adjpost = get_post($search_context_query[$key]);

    $title = $previous ? 'Previous Post' : 'Next Post';
    $rel = $previous ? 'prev' : 'next';
    $permalink = add_query_arg( array( 'sq' => $sq ), get_permalink($adjpost) );

    $string = '<a href="'.$permalink.'" rel="'.$rel.'">';
    $output = $string . $title . '</a>';

    return $output;
}
