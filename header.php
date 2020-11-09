<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
				<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <title><?php wp_title(); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
        <?php wp_head(); ?>
    </head>
		<body <?php body_class(); ?> >
        <!-- Codul programatorului vine aici -->
        <div class="loader" id="loader">Loading... </div>
        <?php require_once('template-parts/navigation/navigation-top.php'); ?>
        <?php //wp_nav_menu(); ?>
        <div class="container"> <!-- this div will close in footer-->
          
          