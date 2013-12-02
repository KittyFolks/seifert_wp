<?php $key; $themeta = get_post_meta($post->ID, $key, TRUE); 
  if($themeta != '') {
?>
<div id="right_sb_menu" class="floater artwork">
<ul class="listing gray_bg">
  <li>
  <?php 
    if(get_post_custom_values('size') != '') { echo '<ul><li><span>Motivformat</span><span>'; $key = get_post_custom_values('size'); echo $key[0] , '</span></li></ul>'; }
    if(get_post_custom_values('tech') != '') { echo '<ul><li><span>Teknikk</span><span>'; $key = get_post_custom_values('tech'); echo $key[0] , '</span></li></ul>'; }
    if(get_post_custom_values('year') != '') { echo '<ul><li><span>År</span><span>'; $key = get_post_custom_values('year'); echo $key[0] , '</span></li></ul>'; }
    if(get_post_custom_values('sign') != '') { echo '<ul><li><span>Signert</span><span>'; $key = get_post_custom_values('sign'); echo $key[0] , '</span></li></ul>'; }
    if(get_post_custom_values('items') != '') { echo '<ul><li><span>Opplag</span><span>'; $key = get_post_custom_values('items'); echo $key[0] , '</span></li></ul>'; } ?>
  </li>
</ul>
<?php
dynamic_sidebar('third-widget-area'); 
$key = get_post_custom_values('inShop');
$price = get_post_custom_values('price');
$proName = get_post_custom_values('proName');
if($key[0] != '') {
  echo print_wp_cart_button_for_product($proName[0], $price[0]);
} ?>
</div>
<?php } ?>