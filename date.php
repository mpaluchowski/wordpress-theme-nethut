<?php
/* Template Name: Montlhy Archive */
get_header();

if ( is_date() ) {
    $query = $wp_query;
} else {
    $query = new WP_Query( ["post_type" => "post"] );
}
?>

<div id="container">
<div id="listing">
<?php while ( $query->have_posts() ) : $query->the_post(); ?>
    <?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
    <div class="excerpt"><?php the_content( "" ); ?></div>
    <div class="articleInfo">
        <?php echo the_date(); ?>,
        <?php echo the_tags( "" ); ?>
    </div>
<?php endwhile; ?>
</div>
</div>

<div id="sidebar">
    <ul class="rssMenu">
        <?php wp_get_archives( ['type' => 'monthly'] ); ?>
    </ul>
    <?php dynamic_sidebar( 'sidebar-right-column' ); ?>
</div>

<?php get_footer();
