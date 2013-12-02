<!DOCTYPE html>
<html <?php language_attributes(); ?> xmlns:fb="http://ogp.me/ns/fb#">
<head>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title(' // ', true); ?></title>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
<!--[if lte IE 8]>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/styles/style_noncss.css" media="screen" />
<![endif]-->
<script type="text/javascript" src="http://www.google.com/jsapi"></script>

<script type="text/javascript"> 
google.load("jquery", "1.5.1");
google.load("jqueryui", "1.8.3");
</script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/commons.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.carouFredSel-5.0.7.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.fancybox-1.3.4.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.easing-1.3.pack.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-31062828-1']);
  _gaq.push(['_setDomainName', 'seifert.no']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body <?php body_class(); ?>>
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=142087512550081";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>
  <!-- header -->
    
  <div id="header" class="shadow_overall">
    <div class="head_foot_center">
      <div id="home_dir">
        <a href="<?php echo home_url() ?>/" title="<?php bloginfo( 'name' ) ?>" rel="home">
          <img src="<?php bloginfo('template_url'); ?>/gfx/logo.png" />
        </a>
      </div>
      <div id="info_head" class="shadow_overall"><p>&copy; <?php echo date("Y") ?> Ole A. Seifert // post@seifert.no // Stjernelaget, Lagveien 21 // N-145o Nesoddtangen</p></div>
      <?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'menu' => 'Top menu', 'menu_id' => 'top_menu' ) ); ?>      
    </div>
  </div>
  
  <!-- header end -->
