<?php get_header(); ?>

<div id="container">
    <?php the_post(); ?>

    <div id="text">
        <?php the_content( "", true ); ?>
    </div>
</div>

<div id="sidebar">
    <?php dynamic_sidebar( 'sidebar-right-column' ); ?>
</div>

<?php get_footer(); ?>
