<?php

/**
 *khai báo hằng giá trị
    THEME_URL = lay duong dan thu muc theme
    CORE = lay duong dan cua thu muc core
**/
 define('THEME_URL', get_stylesheet_directory() );
 define('CORE', THEME_URL . "/core");

/**
  Nhung file /core/init.php
**/
require_once( CORE . "/init.php" );

/**
  Thiet lap chieu rong noi dung
**/
if (!isset ($content_width)  ) {
    $content_width = 620;
}

/**
  Khai bao chuc nang cua themes
**/

if( !function_exists('thinhnguyen_theme_setup')){

    function thinhnguyen_theme_setup(){
        /* thiet lap textdomain */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('thinhnguyen', $language_folder);

        /* Tu dong them link RSS len <head> */
        add_theme_support( 'automatic-feed-links' );

        /* them post thumbnails */
        add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 1568, 9999 );

        /* them title tag */
        add_theme_support( 'title-tag' );

        /* them custom background */
        $default_background = array(
            'default-color' => '#e8e8e8'
        );
        add_theme_support( 'custom-background', $default_background );

        /* them menu */
        register_nav_menus(
          array(
            'primary' => __( 'Primary', 'thinhnguyen' ),
            'footer' => __( 'Footer Menu', 'thinhnguyen' ),
            'social' => __( 'Social Links Menu', 'thinhnguyen' ),
            'nav' => __('Custom Menu', 'thinhnguyen')
        )
        );

        /* them sidebar */
        $sidebar = array(
            'name' => __('Main Sidebar','thinhnguyen'),
            'id' => 'main-sidebar',
            'description' => __('Default sidebar'),
            'class' => 'main-sidebar',
            'before_title' =>'<h3 class="widgettitle">',
            'after_title' => '</h3>'
        );
        register_sidebar( $sidebar );

    }
    add_action('init', 'thinhnguyen_theme_setup');
}


/* ------------------- 
Template function ----------------*/

/* hien thi header */
if ( ! function_exists( 'site_logo' ) ) {
  function site_logo() {?>
<div class="logo">

    <div class="site-name">
        <?php if ( is_home() ) {
          printf(
            '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } else {
          printf(
            '</p><a href="%1$s" title="%2$s">%3$s</a></p>',
            get_bloginfo( 'url' ),
            get_bloginfo( 'description' ),
            get_bloginfo( 'sitename' )
          );
        } // endif ?>
    </div>
    <div class="site-description"><?php bloginfo( 'description' ); ?></div>

</div>
<?php }
}

/* hien thi menu */
if ( ! function_exists( 'site_menu' ) ) {
  function site_menu( $menu ) {
    $menu = array(
      'theme_location' => $menu , //dua tren function get menu location o tren
      'container' => 'nav',
      'container_class' => $menu,
    );
    wp_nav_menu( $menu );
  }
}