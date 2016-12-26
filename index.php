<?php get_header(); ?>

<div id="container">
<div id="listing">
<?php while ( have_posts() ) : the_post(); ?>
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
    <?php dynamic_sidebar( 'sidebar-right-column' ); ?>
</div>

<?php get_footer();
