<?php if ( is_active_sidebar('primary-widget-area') ) : ?>
<div id="right_sb_menu" class="floater article">
<ul class="listing gray_bg">
  <?php dynamic_sidebar('primary-widget-area'); ?>
  <?php if(is_single()) { ?>
  <li id="commentstemplate" class="closed"><?php comments_template('', true); ?></li>
  <li class="fb">
    <fb:like href="www.seifert.no" send="true" layout="button_count" width="450" show_faces="false" action="recommend" font="lucida grande"></fb:like>
  </li>
  <?php } ?>
</ul>
</div>
<?php endif; ?>