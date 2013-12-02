<?php
/*
Plugin Name: is_category_parent()
Plugin URI: http://wordpress.org/support/topic/69002
Description: Conditional for category and child categories. Accepts category ID only as argument.
Author: Kaf Oseo
Version: 0.1
Author URI: http://szub.net

    Copyright (c) 2006 Kaf Oseo (http://szub.net)
    is_category_parent() is released under the GNU General Public
    License (GPL) http://www.gnu.org/licenses/gpl.txt

    This is a WordPress plugin (http://wordpress.org).
*/

function is_category_parent($category_id='') {
    global $wp_query;

    if (!$wp_query->is_category)
        return false;

    $catobj = $wp_query->get_queried_object();

    if( ($category_id == $catobj->cat_ID) || ($category_id == $catobj->category_parent) )
        return true;

    return false;
}




?> 