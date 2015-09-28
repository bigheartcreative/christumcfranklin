<?php
/**
* The Header for our theme.
* Displays all of the <head> section and everything up till <div id="wrap">
*
* @package Natural
* @since Natural 3.0
*
*/
?><!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" <?php language_attributes(); ?>> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

<head>

<meta charset="<?php bloginfo('charset'); ?>">

<?php if(of_get_option('enable_responsive') == '1') { ?>
<!-- Mobile View -->
<meta name="viewport" content="width=device-width">
<?php } ?>

<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="Shortcut Icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">

<?php get_template_part( 'style', 'options' ); ?>

<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php echo esc_url( bloginfo('pingback_url') ); ?>">

<!-- Social Buttons -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<!-- Recaptcha -->
<script type="text/javascript">
  var onloadCallback = function() {
    grecaptcha.render('cumc_recaptcha', {
      'sitekey' : '6Ld4ow0TAAAAAH052g_d1jH4BSdGZ1CfrrhRjw4p',
      'size'    : 'normal'
    });
  };
</script>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- BEGIN #wrap -->
<div id="wrap">

	<!-- BEGIN .container -->
	<div class="container">

	<!-- BEGIN #topbar -->
		<div id="topbar">
			<p class="left">We Are About Relationships</p>
			<p class="right"><a href="<?php echo esc_url( get_permalink( get_page_by_title( 'Contact Us' ) ) ); ?>">Contact Us</a></p>
		</div>
	<!-- END #topbar -->
	
		<!-- BEGIN #header -->
		<div id="header">
		
			<!-- BEGIN .row -->
			<div class="row">
				
				<!-- BEGIN .four columns -->
				<div class="four columns">
				
				<?php if (is_home() || is_front_page() ) { ?>
					<?php $natural_logo = natural_get_logo_url(); if ( ! empty( $natural_logo ) ) { ?>
						<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/LOGO.png" alt="<?php esc_attr( bloginfo('name') ); ?>" /><?php bloginfo( 'name' ); ?></a></h1>

					<?php } else { ?>
						<?php if(of_get_option('display_site_title') == '1') { ?>
							<div id="masthead">
								<h1 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a></span></h1>
								<h2 class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h2>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } else { ?>
					<?php $natural_logo = natural_get_logo_url(); if ( ! empty( $natural_logo ) ) { ?>
						<h1 id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_bloginfo('template_directory');?>/images/LOGO.png" alt="<?php esc_attr( bloginfo('name') ); ?>" /><?php bloginfo( 'name' ); ?></a></h1>
					<?php } else { ?>
						<?php if(of_get_option('display_site_title') == '1') { ?>
							<div id="masthead">
								<h4 class="site-title"><span><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo wp_kses_post( get_bloginfo( 'name' ) ); ?></a></span></h4>
								<h5 class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></h5>
							</div>
						<?php } ?>
					<?php } ?>
				<?php } ?>
				
				<?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?>
					<?php $natural_logo = natural_get_logo_url(); if ( ! empty( $natural_logo ) || of_get_option('display_site_title') == '1' ) { ?>
						<div id="custom-header"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php esc_attr( bloginfo('name') ); ?>" /></div>
					<?php } else { ?>
						<div id="custom-header" class="no-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php esc_attr( bloginfo('name') ); ?>" /></a></div>
					<?php } ?>
				<?php } ?>
				
				<!-- END .four columns -->
				</div>




<nav id="navigation" class="navigation-main shadow <?php if ( is_home() ) { ?>radius-top home-nav<?php } else { ?>radius-full<?php } ?>" role="navigation">
		
			<!-- BEGIN .twelve columns -->
			<div class="twelve columns">
				
				<h1 class="menu-toggle"><?php _e( 'Menu', 'organicthemes' ); ?></h1>
	
				<?php if ( has_nav_menu( 'header-menu' ) ) {
					wp_nav_menu( array(
						'theme_location' => 'header-menu',
						'title_li' => '',
						'depth' => 4,
						'container_class' => '',
						'menu_class'      => 'menu'
						)
					);
				} else { ?>
					<ul class="menu"><?php wp_list_pages('title_li=&depth=4'); ?></ul>
				<?php } ?>
				
			<!-- END .row -->
			</div>
		
		<!-- END #navigation -->
		</nav>				
			
			<!-- END .row -->
			</div>
		
		<!-- END #header -->
		</div>
		