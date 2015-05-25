<?php
/**
* This template is used to display the home page.
*
* @package Natural
* @since Natural 3.0
*
*/
get_header(); ?>

<!-- BEGIN .row -->
<div class="row">

	<!-- BEGIN .sixteen columns -->
	<div class="sixteen columns">
		
		<!-- BEGIN .home-slider -->
		<div class="home-slider shadow">
		
			<?php get_template_part( 'content/featured', 'slider' ); ?>
			
		<!-- END .home-slider -->
		</div>

	<!-- END .sixteen columns -->
	</div>

<!-- END .row -->
</div>

<!-- BEGIN .row -->
<div class="row">
	
	<!-- BEGIN .homepage -->
	<div class="homepage">
	
	<?php if (of_get_option('display_home_mid') == '1') { ?>
	<?php if ( 'false' != of_get_option( 'page_left' ) && 'false' != of_get_option( 'page_mid' ) && 'false' != of_get_option( 'page_right' ) ) { ?>
		
		<!-- BEGIN .featured-pages -->
		<div class="featured-pages radius-full">
		
			<div class="holder third first">
				<?php $recent = new WP_Query('page_id='.of_get_option('page_left')); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third">
				<?php $recent = new WP_Query('page_id='.of_get_option('page_mid')); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third last">
				<?php $recent = new WP_Query('page_id='.of_get_option('page_right')); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
		
		<!-- END .featured-pages -->
		</div>
	
	<?php } ?>
	<?php } ?>
	
	<?php if (of_get_option('display_home_bottom') == '1') { ?>
	<?php if ( '-1' != of_get_option( 'category_news' ) ) { ?>
	<?php if ( is_active_sidebar( 'home-sidebar' ) ) : ?>
	
		<!-- BEGIN .featured-posts -->
		<div class="featured-posts">
	
			<!-- BEGIN .eight columns -->
			<div class="eleven columns">
			
				<!-- BEGIN .home-news -->
				<div class="home-news radius-full shadow">
				
					<?php get_template_part( 'content/home', 'post' ); ?>
				
				<!-- END .home-news -->
				</div>
			
			<!-- END .eight columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar('home'); ?>
				
			<!-- END .five columns -->
			</div>
	
		<!-- END .featured-posts -->
		</div>
	
	<?php else : ?>
	
		<!-- BEGIN .featured-posts -->
		<div class="featured-posts">
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
			
				<!-- BEGIN .home-news -->
				<div class="home-news radius-full shadow padding-big">
				
					<?php get_template_part( 'content/home', 'post' ); ?>
				
				<!-- END .home-news -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
			
		<!-- END .featured-posts -->
		</div>
	
	<?php endif; ?>
	<?php } ?>
	<?php } ?>

	<!-- END .homepage -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>