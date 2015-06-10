<?php
/**
* This template displays the default page content.
*
* @package Natural
* @since Natural 3.0
*
*/
get_header(); ?>

<!-- BEGIN .post class -->

<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail()) { ?>
		<div class="feature-img banner shadow radius-full"><?php the_post_thumbnail( 'featured-large' ); ?></div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">

		
		<?php get_template_part( 'content/featured', 'slider' ); ?>
	
		<?php if (of_get_option('display_slideshow_info') == '1') { ?>
		
			<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		
			<?php else : ?>
		
			<?php endif; ?>
	
		<?php } ?>
		
		
		<?php if ( is_active_sidebar( 'page-sidebar' ) ) : ?>
		
			<!-- BEGIN .eleven columns -->
			<div class="eleven columns">
	
				<!-- BEGIN .postarea -->
				<div class="postarea">
				
					<?php get_template_part( 'loop', 'page' ); ?>
				
				<!-- END .postarea -->
				</div>
			
			<!-- END .eleven columns -->
			</div>
			
			<!-- BEGIN .five columns -->
			<div class="five columns">
			
				<?php get_sidebar(); ?>
				
			<!-- END .five columns -->
			</div>
	
		<?php else : ?>
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
	
				<!-- BEGIN .postarea full -->
				<div class="postarea full" id="home-postarea">
			
					<?php get_template_part( 'loop', 'page' ); ?>
				
				<!-- END .postarea full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
	
		<?php endif; ?>
	
	<!-- END .row -->
	</div>
	
<!-- END .post class -->
</div>


<!-- BELOW TAKEN FROM HOME.PHP -->

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
	
	

	<!-- END .homepage -->
	</div>


<!-- END .row -->
</div>

<?php get_footer(); ?>