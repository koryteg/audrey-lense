<?php

// ==================================================================
// Widget - Footer
// ==================================================================
function footer_left_widgets_init() {
  register_sidebar( array(
    'name'          => __('Footer Left Widget','ace'),
    'id'            => 'footer-left-widget',
    'class'         => '',
    'description'   => 'Footer left widget area.',
    'before_widget' => '<article class="footer-widget">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'footer_left_widgets_init' );

// ==================================================================
// Widget - Footer
// ==================================================================
function footer_right_widgets_init() {
  register_sidebar( array(
    'name'          => __('Footer Right Widget','ace'),
    'id'            => 'footer-right-widget',
    'class'         => '',
    'description'   => 'Footer right widget area.',
    'before_widget' => '<article class="footer-widget">',
    'after_widget'  => '</article>',
    'before_title'  => '<h4>',
    'after_title'   => '</h4>',
  ) );
}
add_action( 'widgets_init', 'footer_right_widgets_init' );