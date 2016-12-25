<?php
function nethut_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'custom-header', [
        'uploads' => true,
        'flex-width' => true,
        'flex-height' => true,
        'header-text' => false
    ] );
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

function nethut_tag_cloud( $before = null, $sep = ', ', $after = '' ) {
    $tags = get_terms( array(
        'taxonomy' => 'post_tag',
        'hide_empty' => false,
    ) );

    $tagLinks = array_map(
        function( $tag ) {
            return '<a href="' . get_tag_link( $tag->term_id ) . '" rel="tag">' . $tag->name . '</a>';
        },
        $tags
    );
    echo $before . implode( $sep, $tagLinks ) . $after;
}
