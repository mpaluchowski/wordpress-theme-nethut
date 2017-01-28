<?php get_header(); ?>

<div id="container">
<div id="listing">
    <p>Wygląda na to, że takiej strony u nas nie ma. W sierpniu 2009 nethut.pl przeszedł gruntowną przemianę, która wymiotła wszystkie stare i niezbyt już świeże teksty. W ich miejsce publikuję teraz nowe, opisujące moje przygody i doświadczenia w prowadzeniu projektów informatycznych. Poniżej znajdziesz kilka przykładowych artykułów. Może któryś zainteresuje?</p>

<?php $posts = get_posts( ['posts_per_page' => 0, 'orderby' => 'rand'] ); ?>
<?php foreach ( $posts as $post ) : setup_postdata( $post ); ?>
    <?php the_title( '<h1><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' ); ?>
    <div class="excerpt"><?php the_content( "" ); ?></div>
    <div class="articleInfo">
        <?php echo the_date(); ?>,
        <?php echo the_tags( "" ); ?>
    </div>
<?php endforeach; ?>
</div>
</div>

<div id="sidebar">
    <?php dynamic_sidebar( 'sidebar-right-column' ); ?>
</div>

<?php get_footer();
