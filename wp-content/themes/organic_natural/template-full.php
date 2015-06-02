<?php
/**
Template Name: Full Width
*
* This template is used to display full-width pages.
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
		
		<!-- BEGIN .sixteen columns -->
		<div class="sixteen columns">
	
			<!-- BEGIN .postarea full -->
			<div class="postarea full">
	
				<?php get_template_part( 'loop', 'page' ); ?>
	
			<!-- END .postarea full -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<!-- BELOW TAKEN FROM HOME.PHP -->

<!-- BEGIN .row -->
<div class="row">
	
	<!-- BEGIN .homepage -->
	<div class="homepage">

		<!-- BEGIN .featured-pages -->
		<div class="featured-pages radius-full">
		
			<div class="holder third first inner_page_article">
				<?php $recent = new WP_Query('page_id=14'); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third inner_page_article">
				<?php $recent = new WP_Query('page_id=17'); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
			
			<div class="holder third last inner_page_article">
				<?php $recent = new WP_Query('page_id=18'); while($recent->have_posts()) : $recent->the_post(); ?>
					<?php get_template_part( 'content/home', 'page' ); ?>
				<?php endwhile; ?>
			</div>
		
		<!-- END .featured-pages -->
		</div>

	<!-- END .homepage -->
	</div>

<!-- END .row -->
</div>

<?php get_footer(); ?>