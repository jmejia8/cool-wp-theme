<?php

// global functions

add_theme_support( 'post-thumbnails' );


add_image_size( 'cool_blog-featured-image', 1280, 720, true );
add_image_size( 'cool_blog-thumbnail-image', 100, 100, true );
add_image_size( 'cool_blog-code-image', 250, 120, true );
add_image_size( 'cool_blog-tutorial-image', 350, 260, true );

register_nav_menus(
	array(
		'top'    => __('Top Menu', 'cool_blog'),
		'footer' => __('Footer Menu', 'cool_blog'),
		'console' => __('Console Menu', 'cool_blog'),
	)
);




// custom post type
/*
 * Define custom post type
 * Register post types: https://codex.wordpress.org/Function_Reference/register_post_type
 * Icons: https://developer.wordpress.org/resource/dashicons/
 */
function cool_blog_post_type() {
 	register_post_type( 'cool_blog_slider',
 		array(
	      'labels' => array(
	        'name' => __( 'Carousel' ),
	        'singular_name' => __( 'Item' ),
	        'add_new' => __( 'Nuevo item' ),
	        'add_new_item' => __( 'Añadir nuevo item' ),
	        'edit_item' => __( 'Editar item' ),
	        'featured_image' => __( 'Imagen del slide' )
	      ),
	      'public' => true,
	      'exclude_from_search' => true,
	      'has_archive' => false,
	      'show_in_nav_menus' => false,
	      'menu_icon' => 'dashicons-slides',
	      //'rewrite' => array('slug' => 'carousel'),
	      'supports' => array('title', 'editor', 'thumbnail')

    	)
  	);
 }

 add_action( 'init', 'cool_blog_post_type' );

 function cool_blog_code_type() {
 	register_post_type( 'cool_blog_code',
 		array(
	      'labels' => array(
	        'name' => __( 'Algorithms' ),
	        'singular_name' => __( 'Algorithm' ),
	        'add_new' => __( 'New Algorithm' ),
	        'add_new_item' => __( 'Add New Algorithm' ),
	        'edit_item' => __( 'Edit Algorithm' ),
	        'featured_image' => __( 'Image of Algorithm' )
	      ),
	      'rewrite' => array('slug' => 'algoritms'),
	      'public' => true,
	      'exclude_from_search' => false,
	      'has_archive' => false,
	      'show_in_nav_menus' => true,
	      'menu_icon' => 'dashicons-upload',
	      'supports' => array('title', 'editor', 'thumbnail', 'author')

    	)
  	);
 }

 // add_action( 'init', 'cool_blog_code_type' );


 // Register sidebars
add_action( 'widgets_init', 'cool_blogWidgetsInit' );

function cool_blogWidgetsInit() {
    register_sidebar( array(
        'name' => __( 'Posts sidebar', 'cool_blog' ),
        'id' => 'sidebar-posts',

				'description' => __( 'Widgets in this area will be shown on all posts.', 'cool_blog' ),

				'before_widget' => '<div id="%1$s" class="widget mt-4  card shadow  %2$s">',

				'before_title'  => '<h5 class="card-header mb-2">',
				'after_title'   => '</h5>',

				'after_widget'  => '</div>',
    ) );
}

function move_comment_field( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}


/* Change Excerpt length */
function cool_blog_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'cool_blog_excerpt_length', 999 );

function my_login_logo_one() {
	?>
	<style type="text/css">
	body.login div#login h1 a {
	background-image: url(<?php bloginfo('template_url');?>/img/logo-100.png);
	background-position: center;
	background-color: #E6E6E6;
	border: 1px solid #C0C0C0;
	padding: 20px;
	}
	</style>
	<?php
}

add_action( 'login_enqueue_scripts', 'my_login_logo_one' );


function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }

    return $classes;
}


add_filter('add_additional_class_on_li', 'add_additional_class_on_li', 1, 3);

function add_menuclass($ulclass) {
   return preg_replace('/<a /', '<a class="nav-link"', $ulclass);
}
add_filter('wp_nav_menu','add_menuclass');


function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}

add_filter('navbar-nav mr-auto' , 'special_nav_class' , 10 , 2);


/* ========================================================================================================================

Comments

======================================================================================================================== */

/**
 * Custom callback for outputting comments
 *
 * @return void
 * @author Keir Whitaker
 */
function bootstrap_comment( $comment, $args, $depth ) {
  $GLOBALS['comment'] = $comment;
  ?>
  <?php if ( $comment->comment_approved == '1' ): ?>
  <li class="media" id="comment-<?php comment_ID() ?>" >
    <div class="media-left">
			<img class="mr-3 avatar" src="<?php echo get_avatar_url( $comment ); ?>" alt="Generic placeholder image">

    </div>
    <div class="media-body">
      <h5 class="mt-0 mb-1">
        <?php comment_author_link() ?>
      </h5>
      <time>
        <a href="#comment-<?php comment_ID() ?>" pubdate>
          <?php comment_date() ?> at <?php comment_time() ?>
        </a>
      </time>
      <?php comment_text() ?>
    </div>
		</li>
  <?php endif;
}


// ======================================================
// ======================================================
// ======================================================
// ======================================================
// ======================================================


?>


<?php
