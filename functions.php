<?php
if ( ! function_exists( 'theme_setup' ) ) {
		/**
		 * Sets up theme defaults and registers support for various WordPress features.
		 *
		 * Note that this function is hooked into the after_setup_theme hook, which runs
		 * before the init hook. The init hook is too late for some features, such as indicating
		 * support post thumbnails.
		 */
		function theme_setup() {
		 
		    /**
		     * Make theme available for translation.
		     * Translations can be placed in the /languages/ directory.
		     */
		    load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
		 
		    /**
		     * Add default posts and comments RSS feed links to <head>.
		     */
		    add_theme_support( 'automatic-feed-links' );
		 
		    /**
		     * Enable support for post thumbnails and featured images.
		     */
		    add_theme_support( 'post-thumbnails' );
		 
		    /**
		     * Add support for two custom navigation menus.
		     */
		    register_nav_menus( array(
		        'primary'   => __( 'Primary Menu', 'text_domain' ),
		        'secondary' => __('Secondary Menu', 'text_domain' )
		    ) );
		 
		    /**
		     * Enable support for the following post formats:
		     * aside, gallery, quote, image, and video
		     */
            add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
            
            

		}
} // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );

function enable_styles(){
	/**
	 * Enable suport for bootstrap css
	 */
	wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/modules/bootstrap/css/bootstrap.css');

	/**
	 * Enable support for own style css file
	 */
	wp_enqueue_style('style', get_stylesheet_uri());	
}
add_action( 'after_setup_theme', 'enable_styles' );

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


/**
 * Register a custom logo for navbar
 */
function themename_custom_logo_setup() {
 $defaults = array(
 'height'      => 100,
 'width'       => 400,
 'flex-height' => true,
 'flex-width'  => true,
 'header-text' => array( 'site-title', 'site-description' ),
'unlink-homepage-logo' => true, 
 );
 add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );

/**
 * Register our sidebars and widgetized areas.
 *
 */
function arphabet_widgets_init() {

	register_sidebar( array(
		'name'          => 'footer-widgets',
		'id'            => 'home_right_1',
		'before_widget' => '<div>',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="rounded">',
		'after_title'   => '</h2>',
	) );

}
add_action( 'widgets_init', 'arphabet_widgets_init' );



function create_my_custom_post_types() {
 
    register_post_type( 'my_movies',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Movies' ),
                'singular_name' => __( 'Movie' )
            ),
			'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'movies'),
            'show_in_rest' => true,
        )
	);

	register_post_type( 'my_actors',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Actors' ),
                'singular_name' => __( 'Actor' )
            ),
			'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'actors'),
			'show_in_rest' => true,
 
        )
	);

	register_post_type( 'my_directors',
		    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Directors' ),
                'singular_name' => __( 'Director' )
            ),
			'public' => true,
			'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'has_archive' => true,
            'rewrite' => array('slug' => 'directors'),
            'show_in_rest' => true,
        )
	);
	

}
// Hooking up our function to theme setup
add_action( 'init', 'create_my_custom_post_types' );



function create_my_genres_taxonomie() {
 
	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

  $labels = array(
		'name' => _x( 'Genres', 'taxonomy general name' ),
		'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Genres' ),
		'all_items' => __( 'All Genres' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Genre' ), 
		'update_item' => __( 'Update Genre' ),
		'add_new_item' => __( 'Add New Genre' ),
		'new_item_name' => __( 'New Genre Name' ),
		'menu_name' => __( 'Genres' ),
  );    

	// Now register the non-hierarchical taxonomy like tag
  register_taxonomy('my_genres', array('my_movies'), array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'genre' ),
  ));
 
}

//hook into the init action and call create_my_custom_taxonomies when it fires
add_action( 'init', 'create_my_genres_taxonomie', 0 );



function create_my_years_taxonomie() {
 
	// Add new taxonomy, make it hierarchical like categories
	//first do the translations part for GUI

  $labels = array(
		'name' => _x( 'Years', 'taxonomy general name' ),
		'singular_name' => _x( 'Year', 'taxonomy singular name' ),
		'search_items' =>  __( 'Search Years' ),
		'all_items' => __( 'All Years' ),
		'parent_item' => null,
		'parent_item_colon' => null,
		'edit_item' => __( 'Edit Year' ), 
		'update_item' => __( 'Update Year' ),
		'add_new_item' => __( 'Add New Year' ),
		'new_item_name' => __( 'New Year Name' ),
		'menu_name' => __( 'Years' ),
  );    

	// Now register the non-hierarchical taxonomy like tag
  register_taxonomy('my_years', array('my_movies'), array(
		'labels' => $labels,
		'hierarchical' => true,
		'show_ui' => true,
		'show_in_rest' => true,
		'show_admin_column' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'year' ),
  ));
 
}

//hook into the init action and call create_my_custom_taxonomies when it fires
add_action( 'init', 'create_my_years_taxonomie', 0 );


//many to many realtioshhip between movies-actors and movies-directors
add_action( 'mb_relationships_init', function() {
    MB_Relationships_API::register( [
        'id'   => 'movies_to_actors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Actors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_actors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );

    MB_Relationships_API::register( [
        'id'   => 'movies_to_directors',
        'from' => [
            'post_type' => 'my_movies',
            'meta_box'    => [
                'title' => 'Directors',
            ],
        ],
        'to'   => [
            'post_type'   => 'my_directors',
            'meta_box'    => [
                'title' => 'Movies',
            ],
        ],
    ] );
} );


//
function runtime_prettier($time){
    $hours = floor($time / 60);
    $final_string = "";
    switch ($hours){
        case 0:
            $final_string = "";
        break;
        case 1:
            $final_string = "1 hour ";
        break;
        default:
            $final_string .= $hours;
            $final_string .= " hours";
    }
    $minutes = $time % 60;
    switch ($minutes){
        case 0:
        break;
        case 1:
            $final_string .= " 1 minute";
        break;
        default:
            $final_string .= " " . $minutes;
            $final_string .= " minutes";
    }
    return $final_string;
}

function check_old_movie($year){
    $curr_year = date('Y');
    $age = $curr_year - $year;
    if($age <= 40){
        return FALSE;
    }
    else{
        return $age;
    }
}


//cuts a string to 100 chars and adds ...
function cut_100($string){
    if(strlen($string) <= 100){
        return $string;
    }else{
        return substr($string,0,100)."...";
    }
}

function custom_posts_per_page($query) {
    /*if (is_home()) {
        $query->set('posts_per_page', 8);
    }*/
    if (is_search()) {
        $query->set('posts_per_page', -1);
    }
    if (is_post_type_archive("my_actors")) {
        $query->set('posts_per_page', 12);
	}
	if (is_post_type_archive("my_directors")) {
        $query->set('posts_per_page', 12);
	}
	if (is_post_type_archive("my_movies")) {
        $query->set('posts_per_page', 12);
    }
	 //endif
} //function

//this adds the function above to the 'pre_get_posts' action     
add_action('pre_get_posts', 'custom_posts_per_page');


//functions that trims a text to $words_no words
function my_trim_func($str,$words_no){
	return wp_trim_words($str,$words_no);
}

add_filter("my_trim", 'my_trim_func', 10, 2);


//set a cookie if a contact form is submitted
function form_submitted(){
    $cookie_name = "form_submitted";
    $cookie_value = true;
    setcookie($cookie_name, $cookie_value, time() + 60*60*24*365, "/");//set cookie for 365 days
}
add_action("wpcf7_mail_sent","form_submitted");

wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/main.js');//, array ( 'jquery' ), 1.1, true);