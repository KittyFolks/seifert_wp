<?php
/*
Plugin Name: Demo Tax meta class
Plugin URI: http://en.bainternet.info
Description: Tax meta class usage demo
Version: 1.4
Author: Bainternet, Ohad Raz
Author URI: http://en.bainternet.info
*/

//include the main class file
require_once("Tax-meta-class.php");
if (is_admin()){
	/* 
	 * prefix of meta keys, optional
	 * use underscore (_) at the beginning to make keys hidden, for example $prefix = '_ba_';
	 *  you also can make prefix empty to disable it
	 * 
	 */
	$prefix = 'ba_';
	/* 
	 * configure your meta box
	 */
	$config = array(
		'id' => 'demo_meta_box',					// meta box id, unique per meta box
		'title' => 'Demo Meta Box',					// meta box title
		'pages' => array('art_category'),				// taxonomy name, accept categories, post_tag and custom taxonomies
		'context' => 'normal',						// where the meta box appear: normal (default), advanced, side; optional
		'fields' => array(),						// list of meta fields (can be added by field arrays)
		'local_images' => false,					// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false					//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);
	
	
	/*
	 * Initiate your meta box
	 */
	$my_meta =  new Tax_Meta_Class($config);
	
	/*
	 * Add fields to your meta box
	 */
	
	//Image field
	$my_meta->addImage($prefix.'image_field_id',array('name'=> 'My Image '));
	//wysiwyg field
	$my_meta->addWysiwyg($prefix.'wysiwyg_field_id',array('name'=> 'My wysiwyg Editor '));
	
	/*
	 * Don't Forget to Close up the meta box decleration
	 */
	//Finish Meta Box Decleration
	$my_meta->Finish();
}