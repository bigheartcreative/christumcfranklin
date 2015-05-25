<?php
/**
Template Name: Archives
*
* This template is used to display site archives of posts, pages and categories.
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
				
				<!-- BEGIN .page-holder -->
				<div class="page-holder">
			
					<h1 class="headline"><?php the_title(); ?></h1>
					
					<div class="archive-column">
						<h6><?php _e("By Page:", 'organicthemes'); ?></h6>
						<ul><?php wp_list_pages('title_li='); ?></ul>
					</div>
					
					<div class="archive-column">
						<h6><?php _e("By Post:", 'organicthemes'); ?></h6>
						<ul><?php wp_get_archives('type=postbypost&limit=100'); ?></ul>
					</div>
					
					<div class="archive-column last">
						<h6><?php _e("By Month:", 'organicthemes'); ?></h6>
						<ul><?php wp_get_archives('type=monthly'); ?></ul>
						
						<h6><?php _e("By Category:", 'organicthemes'); ?></h6>
						<ul><?php wp_list_categories('sort_column=name&title_li='); ?></ul>
					</div>
				
				<!-- END .page-holder -->
				</div>
			
			<!-- END .postarea full -->
			</div>
		
		<!-- END .sixteen columns -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>