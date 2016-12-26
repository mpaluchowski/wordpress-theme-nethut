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
            <?php if ( is_single() ): the_tags( "" ); endif; ?>

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

    <?php if ( is_singular() ): echo "<h1>" . get_the_title() . "</h1>"; endif; ?>
    <?php if ( is_tag() ): echo "<h1>Tag: " . single_tag_title( "", false ) . "</h1>"; endif; ?>
</div>
