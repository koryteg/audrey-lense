<?php

// ==================================================================
// Theme stylesheets
// ==================================================================
function theme_styles() { 

  wp_register_style( 'stylesheet', get_template_directory_uri() . '/stylesheet.css', date('l jS \of F Y h:i:s A'), array(), 'all' );
  wp_enqueue_style( 'stylesheet' );

  wp_register_style( 'google-webfont', 'http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic|Montserrat:400,700', '', 'all' );
  wp_enqueue_style( 'google-webfont' );

}
add_action('wp_enqueue_scripts', 'theme_styles');

// ==================================================================
// Theme scripts
// ==================================================================
function theme_scripts(){

  wp_register_script( 'respond', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), '1.0.1', true );
  wp_enqueue_script( 'respond' );

  wp_register_script( 'jquery-tweet', get_template_directory_uri() . '/js/jquery.tweet.min.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'jquery-tweet' );

  wp_register_script( 'fitvids', get_template_directory_uri() . '/js/fitvids.min.js', array( 'jquery' ), '1.0', true );
  wp_enqueue_script( 'fitvids');

  wp_register_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), null, true );
  wp_enqueue_script( 'scripts');

}
add_action('wp_footer', 'theme_scripts');

// ==================================================================
// Add "Theme Options" on admin bar
// ==================================================================
function my_admin_bar_menu() {

  global $wp_admin_bar;

  $home_url = get_home_url();
	if ( !is_super_admin() || !is_admin_bar_showing() )
  return;

	$wp_admin_bar->add_menu( array(
    'parent'  => 'appearance',
    'title'   => __( 'Theme Options','ace'),
    'href'    => ''.$home_url.'/wp-admin/themes.php?page=ace_options.php',
    'id'      => 'theme_options'
    ) );

}
add_action('admin_bar_menu', 'my_admin_bar_menu', 100);

// ==================================================================
// Custom header
// ==================================================================
if( function_exists('get_custom_header') ) {

  add_theme_support( 'custom-header', array(
	'default-image'          => get_template_directory_uri() . '/images/header_title.gif',
	'random-default'         => false,
	'width'                  => 340,
	'height'                 => 85,
	'flex-height'            => true,
	'flex-width'             => true,
	'default-text-color'     => '',
	'header-text'            => false,
	'uploads'                => true,
	'wp-head-callback'       => '',
	'admin-head-callback'    => '',
	'admin-preview-callback' => '',
  ));

}

// ==================================================================
// Content width
// ==================================================================
if ( ! isset( $content_width ) )
	$content_width = 840;
	
// ==================================================================
// Custom background
// ==================================================================
if( function_exists('get_custom_header') ) {

  add_theme_support('custom-background');

}

// ==================================================================
// Language
// ==================================================================
load_theme_textdomain('ace', get_template_directory() . '/languages');

// ==================================================================
// Add default posts and comments RSS feed links to head
// ==================================================================
add_theme_support( 'automatic-feed-links' );

// ==================================================================
// Remove auto format
// ==================================================================

function my_formatter($content) {

	$new_content = '';
	$pattern_full = '{(\[raw\].*?\[/raw\])}is';
	$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
	$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);

	foreach ($pieces as $piece) {
		if (preg_match($pattern_contents, $piece, $matches)) {
			$new_content .= $matches[1];
		} else {
			$new_content .= wptexturize(wpautop($piece));
		}
	}

	return $new_content;

}
remove_filter('the_content', 'wpautop');
remove_filter('the_content', 'wptexturize');
add_filter('the_content', 'my_formatter', 99);

// ==================================================================
// Visual editor stylesheet
// ==================================================================
add_editor_style('styles/editor.css');

// ==================================================================
// Shortcode in excerpt
// ==================================================================
add_filter('the_excerpt', 'do_shortcode');

// ==================================================================
// Shortcode in widget
// ==================================================================
add_filter('widget_text', 'do_shortcode');

// ==================================================================
// Clickable link in content
// ==================================================================
add_filter('the_content', 'make_clickable');

// ==================================================================
// Remove version generator
// ==================================================================
remove_action('wp_head', 'wp_generator');

// ==================================================================
// Login error message
// ==================================================================
function failed_login() {

  return 'The login information you have entered is incorrect.';

}
add_filter('login_errors', 'failed_login');

// ==================================================================
// Comment spam, prevention
// ==================================================================
function check_referrer() {

  if( !isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "" ) {
    wp_die( __('Please enable referrers in your browser.','ace') );
  }

}
add_action('check_comment_flood', 'check_referrer');

// ==================================================================
// Comment time
// ==================================================================
function time_ago( $type = 'comment' ) {

  $d = 'comment' == $type ? 'get_comment_time' : 'get_post_time';
  return human_time_diff($d('U'), current_time('timestamp')) . " " . __('ago','ace');

}

// ==================================================================
// Custom comment style
// ==================================================================
function comment_style($comment, $args, $depth) {

  $GLOBALS['comment'] = $comment; ?>
  <li <?php comment_class(); ?>>
    <article class="comment-content" id="comment-<?php comment_ID(); ?>">
      <div class="comment-meta">
        <?php echo get_avatar($comment, $size = '32'); ?>
        <?php printf( __('<h6>%s</h6>','ace' ), get_comment_author_link()) ?>
        <small><?php printf( __('%1$s at %2$s','ace'), get_comment_date(), get_comment_time()) ?> (<?php printf( __('%s','ace'), time_ago() ) ?>)</small>
      </div>
    <?php if ($comment->comment_approved == '0') : ?><em><?php _e('Your comment is awaiting moderation','ace') ?>.</em><br /><?php endif; ?>
    <?php comment_text() ?>
    <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
    </article>

<?php }

// ==================================================================
// Add internal lightbox
// ==================================================================
function add_themescript(){

  if( !is_admin() ){
    wp_enqueue_script('jquery');
    wp_enqueue_script('thickbox',null,array('jquery'));
  }

}

function wp_thickbox_script() {

  ?>
  <script type="text/javascript">
  if ( typeof tb_pathToImage != 'string' )
    {
      var tb_pathToImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/loadingAnimation.gif";
    }
  if ( typeof tb_closeImage != 'string' )
    {
      var tb_closeImage = "<?php echo home_url().'/wp-includes/js/thickbox'; ?>/tb-close.png";
    }
  </script>
  <?php
  wp_enqueue_style('thickbox.css', '/'.WPINC.'/js/thickbox/thickbox.css', null, '1.0');

}
add_action('init','add_themescript');
add_action('wp_head', 'wp_thickbox_script');

// ==================================================================
// Add colorbox
// ==================================================================
define( "IMAGE_FILETYPE", "(bmp|gif|jpeg|jpg|png)", true );

function colorbox_replace($string) {

  $pattern = '/(<a(.*?)href="([^"]*.)'.IMAGE_FILETYPE.'"(.*?)><img)/ie';
  $replacement = 'stripslashes(strstr("\2\5","rel=\class=") ? "\1" : "<a\2href=\"\3\4\"\5 rel=\"colorbox\" class=\"colorbox\"><img")';
  return preg_replace($pattern, $replacement, $string);

}
add_filter('the_content', 'colorbox_replace');


function add_colorbox_rel( $attachment_link ) {

  $attachment_link = str_replace( 'a href' , 'a rel="colorbox-cats" class="colorbox-cats" href' , $attachment_link );
  return $attachment_link;

}
add_filter('wp_get_attachment_link' , 'add_colorbox_rel');


function colorbox_script(){

  wp_register_script('colorbox', get_template_directory_uri() . '/js/colorbox/jquery.colorbox-min.js');
  wp_enqueue_script('colorbox');

}
add_action('wp_footer', 'colorbox_script');


function colorbox_css(){

  wp_register_style('colorbox', get_template_directory_uri() . '/js/colorbox/colorbox.css');
  wp_enqueue_style('colorbox');

}
add_action('wp_head', 'colorbox_css');

// ==================================================================
// Pagination (WordPress)
// ==================================================================
function get_pagination_links() {
  global $wp_query;
  $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
  $big = 999999999;
  return paginate_links( array(
    'base' => @add_query_arg('paged','%#%'),
    'format' => '?paged=%#%',
    'current' => $current,
    'total' => $wp_query->max_num_pages,
    'prev_next'    => true,
    'prev_text'    => __('Previous','ace'),
    'next_text'    => __('Next','ace'),
  ) );
}