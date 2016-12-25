<?php get_header(); ?>

<div id="container">
    <?php the_post(); ?>

    <div class="summary">
        <?php the_excerpt(); ?>
    </div>

    <div class="signature">
        <?php the_author(); ?>,
        <?php the_date(); ?>
    </div>

    <div id="text">
        <?php the_content( "", true ); ?>
    </div>

    <div class="textFooter">
        <?php next_post_link( "%link", "Następny: %title" ); ?>
    </div>
</div>

<div id="sidebar">
    <?php dynamic_sidebar( 'sidebar-right-column' ); ?>
</div>

<?php get_footer(); ?>
