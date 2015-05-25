<!-- BEGIN .slideshow -->
<div class="slideshow radius-full">

	<!-- BEGIN .flexslider -->
	<div class="flexslider radius-full loading" data-speed="<?php echo of_get_option('transition_interval'); ?>" data-transition="<?php echo of_get_option('transition_style'); ?>">
	
		<div class="preloader"></div>
		
		<!-- BEGIN .slides -->
		<ul class="slides">
		
			<?php $slider = new WP_Query(array('cat'=>of_get_option('category_slideshow_home'),'posts_per_page'=>of_get_option('postnumber_slideshow_home'))); ?>
			<?php if($slider->have_posts()) : while($slider->have_posts()) : $slider->the_post(); ?>
			<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>
			<?php global $more; $more = 0; ?>
			
			<li>
				
				<!-- BEGIN .sixteen columns -->
				<div class="sixteen columns">
					<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
						<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
					<?php } else { ?>
						<?php if ( has_post_thumbnail()) { ?>
							<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
						<?php } else { ?>
							<a class="feature-img" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/default-image.png" alt="<?php the_title(); ?>" /></a>
						<?php } ?>
					<?php } ?>
				<!-- END .sixteen columns -->
				</div>
				
			</li>
			
			<?php endwhile; ?>
			<?php endif; ?>
			<?php wp_reset_postdata(); ?>
			
		<!-- END .slides -->
		</ul>
		
	<!-- END .flexslider -->
	</div>
	
	<ul class="flex-control-nav radius-bottom">
		
		<?php if($slider->have_posts()) : while($slider->have_posts()) : $slider->the_post(); ?>
		
		<?php $trimtitle = get_the_title(); ?>
		<?php $shorttitle = wp_trim_words( $trimtitle, $num_words = 3, $more = __('', 'organicthemes') ); ?>
		
		<li><a><?php echo esc_html( $shorttitle ); ?></a></li>
		
		<?php endwhile; endif; ?>
		
	</ul>

<!-- END .slideshow -->
</div>