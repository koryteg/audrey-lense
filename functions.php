<?php
// ==================================================================
// Included libraries
// ==================================================================
require_once( get_template_directory() . '/includes/ace_functions.php' );
require_once( get_template_directory() . '/includes/ace_options.php' );
require_once( get_template_directory() . '/includes/ace_updates.php' );
require_once( get_template_directory() . '/includes/custom_widgets.php' );
require_once( get_template_directory() . '/includes/modules.php' );
require_once( get_template_directory() . '/includes/widgets.php' );

	$menuList = array(
		'main_menu' => 'Main navigation menu',
		'util_menu' => 'Util menu upper right',
		'footer_menu' => 'footer menu bottom'
	 );
	register_nav_menus($menuList);
?>