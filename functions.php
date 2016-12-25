<?php
function nethut_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );
}
add_action( 'after_setup_theme', 'nethut_setup' );

function nethut_scripts() {
    wp_enqueue_style( 'nethut-style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'nethut_scripts' );

function nethut_widgets_init() {
    register_sidebar( [
        'name' => 'Sidebar',
        'id' => 'sidebar-right-column',
        'before_widget' => '',
        'after_widget' => '',
    ] );
}
add_action( 'widgets_init', 'nethut_widgets_init' );
