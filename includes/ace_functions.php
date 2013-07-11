<?php

// ==================================================================
// Theme custom css
// ==================================================================
function ace_css() {

  if( get_option( 'ace_css' ) ) { ?>

    <style type="text/css">
      <?php echo stripslashes( get_option( 'ace_css' ) ); ?>
    </style>

  <?php }

}

// ==================================================================
// Progress bar
// ==================================================================
function ace_progress() {

if( get_option('ace_site_progress_enable')  ) { ?> 
  <div class="site-progress-wrap">
    <span class="site-progress-num"><?php echo get_option('ace_site_progress') ; ?> &#37;</span>
    <div class="site-progress radius-4">
      <div class="site-progress-bar" style="width: <?php echo get_option('ace_site_progress') ; ?>%; background-color: <?php echo get_option( 'ace_site_progress_color' ); ?>;">&nbsp;</div>
    </div>
  </div>
<?php }

}

// ==================================================================
// Heading
// ==================================================================
function ace_heading() {

  if( get_header_image() == true ) { ?>
    <a href="<?php echo esc_url( home_url('/') ); ?>">
      <img src="<?php header_image(); ?>" class="header-title" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo('name'); ?>" title="<?php bloginfo('name'); ?>" />
    </a>
  <?php } elseif( is_home() || is_front_page() ) { ?>
      <h1><a href="<?php echo esc_url( home_url('/') ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h1>
  <?php } else { ?>
      <h5><a href="<?php echo esc_url( home_url('/') ); ?>" class="header-title"><?php bloginfo('name'); ?></a></h5>
  <?php }

}

// ==================================================================
// Header scripts
// ==================================================================
function ace_header_scripts() {
  if( get_option( 'ace_header_scripts' ) ) { echo stripslashes( get_option( 'ace_header_scripts' ) ); }
}

// ==================================================================
// Footer scripts
// ==================================================================
function ace_footer_scripts() {
  if( get_option( 'ace_footer_scripts' ) ) { echo stripslashes( get_option( 'ace_footer_scripts' ) ); }
}