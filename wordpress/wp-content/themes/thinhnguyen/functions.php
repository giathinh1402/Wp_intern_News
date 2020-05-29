<?php

/*
 *khai báo hằng giá trị
    THEME_URL = lay duong dan thu muc theme
    CORE = lay duong dan cua thu muc core
*/
 define('THEME_URL', get_stylesheet_directory() );
 define('CORE', THEME_URL . "/core");

/*
  Nhung file /core/init.php
*/
require_once( CORE . "/init.php" );

/*
  Thiet lap chieu rong noi dung
*/
if (!isset ($content_width)  ) {
    $content_width = 620;
}

/*
  Khai bao chuc nang cua themes
*/

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

/* them phan trang cho index */
if ( ! function_exists( 'page_pagination' ) ) {
    function page_pagination() {
    /* Khong hien thi phan trang neu trang do it hon 2 post */
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return '';  
        } ?>
<nav class="pagination" role="navigation">
    <?php if ( get_next_post_link() ) : ?>
    <div class="prev"><?php next_posts_link( __('Older Posts', 'thinhnguyen') ); ?></div>
    <?php endif; ?>

    <?php if ( get_previous_post_link() ) : ?>
    <div class="next"><?php previous_posts_link( __('Newer Posts', 'thinhnguyen') ); ?></div>
    <?php endif; ?>
</nav><?php
    }
}

/* hien thi thumnails cho bai viet */
if ( ! function_exists( 'post_thumbnail' ) ) {
    function post_thumbnail( $size ) {
      // Chỉ hiển thumbnail với post không có mật khẩu
      if ( ! is_single() &&  has_post_thumbnail()  && ! post_password_required() || has_post_format( 'image' ) ) : ?>
<figure class="post-thumbnail"><?php the_post_thumbnail( $size ); ?></figure><?php
      endif;
    }
  }

/* hien thi tieu de bai post*/
if ( ! function_exists( 'post_entry_header' ) ) {
    function post_entry_header() {
      if ( is_single() ) : ?>

<h1 class="entry-title">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
</h1>
<?php else : ?>
<h2 class="entry-title">
    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        <?php the_title(); ?>
    </a>
</h2><?php
   
      endif;
    }
  }

/* hien thi thong tin bài post bao gom author, category, date, luot comment */
if( ! function_exists( 'post_entry_meta' ) ) {
    function post_entry_meta() {
      if ( ! is_page() ) :
        echo '<div class="entry-meta">';
   
          // author, date, categories
          printf( __('<span class="author">Posted by %1$s</span>', 'thinhnguyen'),
            get_the_author() );
   
          printf( __('<span class="date-published"> at %1$s</span>', 'thinhnguyen'),
            get_the_date() );
   
          printf( __('<span class="category"> in %1$s</span>', 'thinhnguyen'),
            get_the_category_list( ', ' ) );
   
          // hien thi so luot comment
          if ( comments_open() ) :
            echo ' <span class="meta-reply">';
              comments_popup_link(
                __('Leave a comment', 'thinhnguyen'),
                __('One comment', 'thinhnguyen'),
                __('% comments', 'thinhnguyen'),
                __('Read all comments', 'thinhnguyen')
               );
            echo '</span>';
          endif;
        echo '</div>';
      endif;
    }
  }

  /* hien thi noi dung cua post */

  if ( ! function_exists( 'post_entry_content' ) ) {
    function post_entry_content() {
    if ( ! is_single() && !is_page() ) :
        the_excerpt();
      else :
        the_content();
        /*
         * Code hiển thị phân trang trong post type
         */
        $link_pages = array(
          'before' => __('<p>Page:', 'thinhnguyen'),
          'after' => '</p>',
          'nextpagelink'     => __( 'Page before', 'thinhnguyen' ),
          'previouspagelink' => __( 'Page after', 'thinhnguyen' )
        );
        wp_link_pages( $link_pages );
      endif;
   
    }

    /* post read more */
    function post_readmore() {
        return '...<a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', ' thinhnguyen ') . '</a>';
    }
    add_filter( 'excerpt_more', 'post_readmore' );
  }

/* ------------------- 
Css function ----------------*/

/* chèn css vào theme */
    function css_styles() {
        wp_register_style( 'main-style', get_template_directory_uri() . '/style.css', 'all' );
        wp_enqueue_style( 'main-style' );
    }
    add_action( 'wp_enqueue_scripts', 'css_styles' );
  