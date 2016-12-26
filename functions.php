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

    register_nav_menus( array(
        'main' => __( 'Main Menu', 'nethut' ),
    ) );
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

/* Disable comments feed */
add_filter( 'feed_links_show_comments_feed', '__return_false' );

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

/**
* Display just the post summary, up to the <code><!--more--></code> link, or if
* that one's not found, display Wordpress's generated excerpt.
*/
function nethut_post_summary() {
    global $page, $pages;

    if ( $page > count( $pages ) ) { // if the requested page doesn't exist
        $page = count( $pages );
    }

    $content = $pages[$page - 1];
    if ( preg_match( '/<!--more(.*?)?-->/', $content, $matches ) ) {
        $content = explode( $matches[0], $content, 2 )[0];
    } else {
        $content = get_the_excerpt();
    }

    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    echo $content;
}
