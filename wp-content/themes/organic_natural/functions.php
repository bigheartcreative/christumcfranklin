<?php

/*-----------------------------------------------------------------------------------------------------//
/*	Theme Setup
/*-----------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'natural_setup' ) ) :

function natural_setup() {

	// Make theme available for translation
	load_theme_textdomain( 'organicthemes', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails
	add_theme_support( 'post-thumbnails' );
	
	add_image_size( 'featured-large', 1200, 800, true ); // Large Featured Image
	add_image_size( 'featured-medium', 980, 720, true ); // Medium Featured Image
	add_image_size( 'featured-small', 640, 640 ); // Small Featured Image

	// Create Menus
	register_nav_menus( array(
		'header-menu' => __( 'Header Menu', 'organicthemes' ),
	));
	
	// Custom Header
	if ( function_exists('add_theme_support') )
	$defaults = array(
		'width'                 => 1080,
		'height'                => 180,
		'default-image'			=> get_template_directory_uri() . '/images/header.png',
		'flex-height'           => true,
		'flex-width'            => true,
		'default-text-color'    => '333333',
		'header-text'           => false,
		'uploads'               => true,
	);
	add_theme_support( 'custom-header', $defaults );
	
	// Custom Background
	if ( function_exists('add_theme_support') )
	$defaults = array(
		'default-color'          => 'f1ede6',
	);
	add_theme_support( 'custom-background', $defaults );
}
endif; // natural_setup
add_action( 'after_setup_theme', 'natural_setup' );

/*-----------------------------------------------------------------------------------------------------//	
	Customizer Theme Logo		       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'natural_logo_section' , array(
		'title'       => __( 'Logo', 'organicthemes' ),
		'priority'    => 30,
		'description' => __( 'Upload a logo image to show on your home page', 'organicthemes'),
	) );

	$wp_customize->add_setting( 'natural_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'natural_logo', array(
		'label'    => __( 'Logo', 'organicthemes' ),
		'section'  => 'natural_logo_section',
		'settings' => 'natural_logo',
	) ) );

}
add_action('customize_register', 'natural_theme_customizer');

/*-----------------------------------------------------------------------------------------------------//	
	Resize Logo Image	       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_get_logo_url() {
	$url = get_theme_mod( 'natural_logo' );
	if ( ! empty( $url ) ) {
		$args = array(
			'w' => 460,
			'h' => 120,
			'crop' => 1
		);
		return add_query_arg( $args, $url );
	}
	return '';
}

/*-----------------------------------------------------------------------------------------------------//	
	Category ID to Name		       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_cat_id_to_name( $id ) {
	$cat = get_category( $id );
	if ( is_wp_error( $cat ) )
		return false;
	return $cat->cat_name;
}

/*-----------------------------------------------------------------------------------------------------//	
	Options Framework		       	     	 
-------------------------------------------------------------------------------------------------------*/

if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/admin/' );
	require_once dirname( __FILE__ ) . '/admin/options-framework.php';
}

/*-----------------------------------------------------------------------------------------------------//	
	Register Scripts		       	     	 
-------------------------------------------------------------------------------------------------------*/

if( !function_exists('natural_enqueue_scripts') ) {
	function natural_enqueue_scripts() {
	
		// Enqueue Styles
		wp_enqueue_style( 'natural-style', get_stylesheet_uri() );
		wp_enqueue_style( 'natural-style-mobile', get_template_directory_uri() . '/css/style-mobile.css', array( 'natural-style' ), '1.0' );
		wp_enqueue_style( 'google_fonts_open_sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,600');
		wp_enqueue_style( 'google_fonts_oswald', 'http://fonts.googleapis.com/css?family=Oswald:400,300' );
		
		// Resgister Scripts
		wp_register_script( 'natural-fitvids', get_template_directory_uri() . '/js/jquery.fitVids.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'natural-hover', get_template_directory_uri() . '/js/hoverIntent.js', array( 'jquery' ), '20130729' );
		wp_register_script( 'natural-superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery', 'natural-hover' ), '20130729' );
		wp_register_script( 'natural-isotope', get_template_directory_uri() . '/js/jquery.isotope.js', array( 'jquery' ), '20130729' );
	
		// Enqueue Scripts
		wp_enqueue_script( 'natural-html5shiv', get_template_directory_uri() . '/js/html5shiv.js' );
		wp_enqueue_script( 'natural-custom', get_template_directory_uri() . '/js/jquery.custom.js', array( 'jquery', 'natural-superfish', 'natural-fitvids', 'natural-isotope', 'jquery-masonry' ), '20130729', true );
		wp_enqueue_script( 'natural-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20130729', true );
		wp_enqueue_script( 'twitter_js', 'http://platform.twitter.com/widgets.js', '', '', false);
		
		// IE Conditional Scripts
		global $wp_scripts;
		$wp_scripts->add_data( 'natural-html5shiv', 'conditional', 'lt IE 9' );
		
		// Load Flexslider on front page and slideshow page template
		if( is_home() || is_front_page() || is_single() || is_page_template('template-slideshow.php') || is_page_template('template-blog.php') ) {
			wp_enqueue_script( 'natural-flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '20130729' );
		}
	
		// load single scripts only on single pages
	    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	    	wp_enqueue_script( 'comment-reply' );
	    }
	}
	add_action('wp_enqueue_scripts', 'natural_enqueue_scripts');
}

/*-----------------------------------------------------------------------------------------------------//	
	WooCommerce Integration			       	     	 
-------------------------------------------------------------------------------------------------------*/

// Declare WooCommerce support
add_theme_support( 'woocommerce' );

// Remove WC sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

// WooCommerce content wrappers
function mytheme_prepare_woocommerce_wrappers(){
    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
    remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
}
add_action( 'wp_head', 'mytheme_prepare_woocommerce_wrappers' );

function mytheme_open_woocommerce_content_wrappers() {
	?>  
	<div class="row">
		<div class="eleven columns">
			<div class="postarea">
    <?php
}
function mytheme_close_woocommerce_content_wrappers() {
	?>
    		</div>
    	</div>
 
        <div class="five columns">
        	<?php get_sidebar( 'post' ); ?>
        </div>
        
 	</div>
    <?php
}
add_action( 'woocommerce_before_main_content', 'mytheme_open_woocommerce_content_wrappers', 10 );
add_action( 'woocommerce_after_main_content', 'mytheme_close_woocommerce_content_wrappers', 10 );

// Add the WC sidebar in the right place
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10 );

// WooCommerce default product columns
function loop_columns() {
    return 3;
}
add_filter('loop_shop_columns', 'loop_columns');

// WooCommerce remove related products
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);

/*-----------------------------------------------------------------------------------------------------//	
	Register Sidebars		       	     	 
-------------------------------------------------------------------------------------------------------*/

if ( function_exists('register_sidebars') )
	register_sidebar(array(
		'name'=> __( "Page Sidebar", 'organicthemes' ),
		'id' => 'page-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Home Sidebar", 'organicthemes' ),
		'id' => 'home-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Blog Sidebar", 'organicthemes' ),
		'id' => 'blog-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Post Sidebar", 'organicthemes' ),
		'id' => 'post-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Left Sidebar", 'organicthemes' ),
		'id' => 'left-sidebar',
		'before_widget'=>'<div id="%1$s" class="widget %2$s">',
		'after_widget'=>'</div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Footer Widgets", 'organicthemes' ),
		'id' => 'footer',
		'before_widget'=>'<div id="%1$s" class="widget %2$s"><div class="footer-widget">',
		'after_widget'=>'</div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
	));
	register_sidebar(array(
		'name'=> __( "Feature Left", 'organicthemes' ),
		'id' => 'feature-left',
		'before_widget'=>'</div></div><div class="row"><div class="holder"><div id="%1$s" class="widget %2$s"><div class="feature-widget">',
		'after_widget'=>'</div></div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
    ));
	register_sidebar(array(
		'name'=> __( "Feature Middle", 'organicthemes' ),
		'id' => 'feature-middle',
		'before_widget'=>'<div class="holder"><div id="%1$s" class="widget %2$s"><div class="feature-widget">',
		'after_widget'=>'</div></div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
    ));
	register_sidebar(array(
		'name'=> __( "Feature Right", 'organicthemes' ),
		'id' => 'feature-right',
		'before_widget'=>'<div class="holder"><div id="%1$s" class="widget %2$s"><div class="feature-widget">',
		'after_widget'=>'</div></div></div></div>',
		'before_title'=>'<h6>',
		'after_title'=>'</h6>'
    ));

/*-----------------------------------------------------------------------------------------------------//
Sidebar widget shortcode for WP Admin
-------------------------------------------------------------------------------------------------------*/
function cumc_sidebar_shortcode($atts, $content="null"){
  extract(shortcode_atts(array('name'=>''), $atts));

  ob_start();
  dynamic_sidebar($name);
  $sidebar= ob_get_contents();
  ob_end_clean();

  return $sidebar;
}
 
add_shortcode('cumc_feature', 'cumc_sidebar_shortcode');

/*-----------------------------------------------------------------------------------------------------//	
	Filter post title for post format links	       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_link_filter($link, $post) {
     if (has_post_format('link', $post) && get_post_meta($post->ID, 'titlelink', true)) {
          $link = get_post_meta($post->ID, 'titlelink', true);
     }
     return $link;
}
add_filter('post_link', 'natural_link_filter', 10, 2);
	
/*----------------------------------------------------------------------------------------------------//
/*	Content Width
/*----------------------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) )
	$content_width = 640;

/**
 * Adjust content_width value based on the presence of widgets
 */
function natural_content_width() {
	if ( ! is_active_sidebar( 'post-sidebar' ) || is_active_sidebar( 'page-sidebar' ) || is_active_sidebar( 'blog-sidebar' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'natural_content_width' );
	
/*-----------------------------------------------------------------------------------------------------//	
	Comments Function		       	     	 
-------------------------------------------------------------------------------------------------------*/

if ( ! function_exists( 'natural_comment' ) ) :
function natural_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'organicthemes' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'organicthemes' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
		break;
		default :
	?>
	<li <?php comment_class(); ?> id="<?php echo esc_attr( 'li-comment-' . get_comment_ID() ); ?>">
	
		<article id="<?php echo esc_attr( 'comment-' . get_comment_ID() ); ?>" class="comment">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php
						$avatar_size = 72;
						if ( '0' != $comment->comment_parent )
							$avatar_size = 48;

						echo get_avatar( $comment, $avatar_size );

						/* translators: 1: comment author, 2: date and time */
						printf( __( '%1$s <br/> %2$s <br/>', 'organicthemes' ),
							sprintf( '<span class="fn">%s</span>', wp_kses_post( get_comment_author_link() ) ),
							sprintf( '<a href="%1$s"><time pubdate datetime="%2$s">%3$s</time></a>',
								esc_url( get_comment_link( $comment->comment_ID ) ),
								get_comment_time( 'c' ),
								/* translators: 1: date, 2: time */
								sprintf( __( '%1$s', 'organicthemes' ), get_comment_date(), get_comment_time() )
							)
						);
					?>
				</div><!-- .comment-author .vcard -->
			</footer>

			<div class="comment-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'organicthemes' ); ?></em>
					<br />
				<?php endif; ?>
				<?php comment_text(); ?>
				<div class="reply">
					<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'organicthemes' ), 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
				</div><!-- .reply -->
				<?php edit_comment_link( __( 'Edit', 'organicthemes' ), '<span class="edit-link">', '</span>' ); ?>
			</div>

		</article><!-- #comment-## -->

	<?php
	break;
	endswitch;
}
endif; // ends check for natural_comment()

/*-----------------------------------------------------------------------------------------------------//	
	Custom Search Widget		       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_style_search_form($form) {
	$form = '<form method="get" id="searchform" action="' . esc_url(home_url('/')) . '/" >
		<label for="s">' . esc_attr__('Search', 'organicthemes') . '</label>
		<div class="search-holder">';
	if (is_search()) {
		$form .='<input type="text" value="'. esc_attr(apply_filters('the_search_query', get_search_query())) .'" name="s" id="s" />';
	} else {
		$form .='<input type="search" class="search-field" placeholder="' . esc_attr__('Search Here', 'placeholder', 'organicthemes' ) .'" value="' .esc_attr( get_search_query() ) .'" name="s">';
	}
	$form .= '<input type="submit" id="searchsubmit" value="'. esc_attr(__('Go', 'organicthemes')).'" />
		</div>
		</form>';
	return $form;
}
add_filter('get_search_form', 'natural_style_search_form');

/*-----------------------------------------------------------------------------------------------------//	
	Custom Excerpt Length		       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_excerpt_length( $length ) {
	return 44;
}
add_filter( 'excerpt_length', 'natural_excerpt_length', 999 );

function natural_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'natural_excerpt_more');

/*-----------------------------------------------------------------------------------------------------//	
	Custom Excerpt	       	     	 
-------------------------------------------------------------------------------------------------------*/

function natural_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	$excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	return $excerpt;
}

function natural_content($limit) {
	$content = explode(' ', get_the_content(), $limit);
	if (count($content)>=$limit) {
		array_pop($content);
		$content = implode(" ",$content).'...';
	} else {
		$content = implode(" ",$content);
	}
	$content = preg_replace('/[.+]/','', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	return $content;
}

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Function
/*-----------------------------------------------------------------------------------------------------*/

function natural_get_pagination_links() {
	global $wp_query;
	$big = 999999999;
	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'prev_text' => __('&laquo;', 'organicthemes'),
		'next_text' => __('&raquo;', 'organicthemes'),
		'total' => $wp_query->max_num_pages
	) );
}

/*-----------------------------------------------------------------------------------------------------//
/*	Pagination Fix For Home Page Query
/*-----------------------------------------------------------------------------------------------------*/

function natural_home_post_count_queries( $news ) {
	if (!is_admin() && $news->is_main_query()){
		if(is_home()){
			$news->set('posts_per_page', 1);
		}
	}
}
add_action( 'pre_get_posts', 'natural_home_post_count_queries' );

/*-----------------------------------------------------------------------------------------------------//
/*	Custom Page Links
/*-----------------------------------------------------------------------------------------------------*/

function natural_wp_link_pages_args_prevnext_add($args) {
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; 

    $args['next_or_number'] = 'number'; // Keep numbering for the main part
    if (!$more)
        return $args;

    if($page-1) // There is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>';

    if ($page<$numpages) // There is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after'];

    return $args;
}

add_filter('wp_link_pages_args', 'natural_wp_link_pages_args_prevnext_add');

/*-----------------------------------------------------------------------------------------------------//	
	Featured Video Meta Box		       	     	 
-------------------------------------------------------------------------------------------------------*/

add_action("admin_init", "admin_init_featurevid");
add_action('save_post', 'save_featurevid');

function admin_init_featurevid(){
	add_meta_box("featurevid-meta", __("Featured Video Embed Code", 'organicthemes'), "meta_options_featurevid", "post", "normal", "high");
}

function meta_options_featurevid(){
	global $post;
	$custom = get_post_custom($post->ID);
	$featurevid = $custom["featurevid"][0];

	echo '<textarea name="featurevid" cols="60" rows="4" style="width:97.6%" />'.$featurevid.'</textarea>';
}

function save_featurevid($post_id){
	global $post;
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }
	if ( isset($_POST["featurevid"]) ) { 
		update_post_meta($post->ID, "featurevid", $_POST["featurevid"]); 
	}
}

/*-----------------------------------------------------------------------------------------------------//	
	Add Home Link To Custom Menu		       	     	 
-------------------------------------------------------------------------------------------------------*/

function home_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter('wp_page_menu_args', 'home_page_menu_args');

/*-----------------------------------------------------------------------------------------------------//	
	Strip inline width and height attributes from WP generated images		       	     	 
-------------------------------------------------------------------------------------------------------*/
 
function remove_thumbnail_dimensions( $html ) { 
	$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html ); 
	return $html; 
	}
add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 ); 
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );

/*-----------------------------------------------------------------------------------------------------//
	Body Class
-------------------------------------------------------------------------------------------------------*/

function natural_body_class( $classes ) {
	if ( is_singular() )
		$classes[] = 'natural-singular';

	if ( is_active_sidebar( 'right-sidebar' ) )
		$classes[] = 'natural-right-sidebar';

	if ( '' != get_theme_mod( 'background_image' ) ) {
		// This class will render when a background image is set
		// regardless of whether the user has set a color as well.
		$classes[] = 'natural-background-image';
	} else if ( ! in_array( get_background_color(), array( '', get_theme_support( 'custom-background', 'default-color' ) ) ) ) {
		// This class will render when a background color is set
		// but no image is set. In the case the content text will
		// Adjust relative to the background color.
		$classes[] = 'natural-relative-text';
	}

	return $classes;
}
add_action( 'body_class', 'natural_body_class' );


/*-----------------------------------------------------------------------------------------------------//
	Filters wp_title to print a neat <title> tag based on what is being viewed.
-------------------------------------------------------------------------------------------------------*/

function natural_wp_title( $title, $sep ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	// Add the blog name
	$title .= get_bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title .= " $sep $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		$title .= " $sep " . sprintf( __( 'Page %s', 'organicthemes' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'natural_wp_title', 10, 2 );

/*-----------------------------------------------------------------------------------------------------//
	Includes
-------------------------------------------------------------------------------------------------------*/

require_once( get_template_directory() . '/includes/typefaces.php' );
include_once( get_template_directory() . '/organic-shortcodes/organic-shortcodes.php' );