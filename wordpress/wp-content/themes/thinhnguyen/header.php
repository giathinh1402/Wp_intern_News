<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
   
    <div id="container">
        <header id="header">
            <?php site_logo(); ?>
            <?php site_menu( 'primary-menu' ); ?>
        </header>
    