<!DOCTYPE html>
<!--[if IE 7]><html id="ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<meta name="description" content="<?php echo bloginfo('description'); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=9; IE=8; IE=7; IE=EDGE" />

<title>
<?php
  global $page, $paged;
    wp_title('|', true, 'right'); bloginfo('name');
    $site_description = get_bloginfo('description', 'display');
    if ( $site_description && ( is_home() || is_front_page() ) ) echo " | $site_description";
    if( $paged >= 2 || $page >= 2 ) echo ' | ' . sprintf( __('Page %s','ace'), max( $paged, $page ) );
?>
</title>

<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php if( get_option("ace_favicon") ) { echo get_option("ace_favicon"); } else { echo get_stylesheet_directory_uri(); echo "/images/favicon.gif"; } ?>?<?php echo date('l jS \of F Y h:i:s A'); ?>" type="image/x-icon" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo date('l jS \of F Y h:i:s A'); ?>" type="text/css" />

<!--[if lt IE 7]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE7.js"></script><![endif]-->
<!--[if lt IE 8]><script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE8.js"></script><![endif]-->
<!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<!--[if lt IE 9]><script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script><![endif]-->

<?php if( is_singular() && get_option('thread_comments') ) wp_enqueue_script('comment-reply'); wp_head(); ?>

<?php wp_enqueue_script('jquery'); ?>

<?php wp_enqueue_script('jquery-ui-widget'); ?>

<?php echo ace_header_scripts() || ace_css(); ?>

</head>
<body <?php body_class(); ?>>

<section class="container">

  <header class="header" role="banner">

    <?php echo ace_heading(); ?>

  </header><!-- .header -->
<nav>
                    <?php
                    $mainMenu = array(
                    'theme_location' => 'main_menu',
                    'depth'      => 1,
                    'container'  => false,
                    'menu_class'     => 'nav'
                    
                );

                     wp_nav_menu($mainMenu); ?>

</nav>


