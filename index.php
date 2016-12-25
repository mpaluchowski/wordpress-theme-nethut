<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml') ?>>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo get_option( 'blog_charset' ) ?>" />

    <?php wp_head() ?>
</head>

<body>

<div id="topMenu">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Strona główna"><?php bloginfo( 'name' ); ?></a>

    <ul id="tagMenu">
        <li><strong>tagi\&gt;</strong>

            <ul id="tagSubmenu">
                <li><?php nethut_tag_cloud(); ?></li>
            </ul>
        </li>
    </ul>

    <a class="rss" href="<?php echo get_feed_link(); ?>" title="RSS Feed">rss</a>
</div>

<div id="header">
    <a id="headimg" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" alt="<?php bloginfo( 'name' ); ?>" /></a>

    <form id="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <fieldset>
        <input type="text" class="query" value="Szukaj..." name="s" onfocus="if (this.value == 'Szukaj...') this.value='';" onblur="if (this.value == '') this.value='Szukaj...';" />
        <input type="image" class="button" src="<?php echo get_parent_theme_file_uri( '/img/search.png' ); ?>" alt="Submit button" />
    </fieldset>
    </form>
</div>

<div id="title">
    <?php
        wp_nav_menu( array(
            'theme_location' => 'main',
            'depth' => 1,
            'menu_id' => 'pageMenu',
        ) );
    ?>
</div>


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

<div id="footer">
    <a class="logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>

    <a rel="license" href="http://creativecommons.org/licenses/by/3.0/deed.pl"><img src="//creativecommons.org/images/public/somerights20.png" width="88" height="31" alt="Creative Commons License" /></a>

    <div id="copyright">
        Poza wyszczególnionymi przypadkami treść tej strony<br />podlega licencji <a rel="external" href="http://creativecommons.org/licenses/by/3.0/deed.pl" class="subfoot">Creative Commons Uznanie Autorstwa 3.0</a>.
    </div>
</div>
<?php wp_footer(); ?>

</body>
</html>
