<!-- BEGIN .portfolio-wrap -->
<div class="portfolio-wrap">

	<?php
		$categories = get_categories('child_of=' . of_get_option('category_portfolio') . '');
		$count = count($categories);
		echo '<ul id="portfolio-filter" class="shadow radius-bottom">';
		echo '<li><a class="radius-full" href="javascript:void(0)" data-filter="*" title="">All</a></li>';
		if ( $count > 0 ) {
			foreach ( $categories as $category ) {
				$categoryname = strtolower($category->category_nicename);
				$categoryname = str_replace(' ', '-', $categoryname);
				echo '<li><a href="javascript:void(0)" data-filter=".category-'.$categoryname.'" title="" rel="'.$categoryname.'">'.$category->name.'</a></li>';
			}
		}
		echo "</ul>";
	?>
	
	<!-- BEGIN .portfolio -->
	<div class="portfolio radius-bottom <?php if (of_get_option('portfolio_columns') == 'two') { ?>portfolio-half<?php } if (of_get_option('portfolio_columns') == 'three') { ?>portfolio-third<?php } ?>">
		
		<!-- BEGIN .row -->
		<ul id="portfolio-list" class="row">
			
		<?php $wp_query = new WP_Query(array('cat'=>of_get_option('category_portfolio'),'posts_per_page'=>-1)); ?>
		<?php if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		<?php if (isset($_POST['featurevid'])){ $custom = get_post_custom($post->ID); $featurevid = $custom['featurevid'][0]; } ?>
	
			<!-- BEGIN .portfolio-item -->
			<li class="portfolio-item <?php if (of_get_option('portfolio_columns') == 'one') { ?>single<?php } if (of_get_option('portfolio_columns') == 'two') { ?>half<?php } if (of_get_option('portfolio_columns') == 'three') { ?>third<?php } ?> <?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>" data-filter="category-<?php $allClasses = get_post_class(); foreach ($allClasses as $class) { echo $class . " "; } ?>">
			
				<!-- BEGIN .post-holder -->
				<div class="post-holder shadow radius-full">
				
					<?php if ( get_post_meta($post->ID, 'featurevid', true) ) { ?>
						<div class="feature-vid"><?php echo get_post_meta($post->ID, 'featurevid', true); ?></div>
					<?php } else { ?>
						<?php if ( has_post_thumbnail()) { ?>
							<a class="feature-img radius-top" href="<?php the_permalink(); ?>" rel="bookmark" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', 'organicthemes' ), the_title_attribute( 'echo=0' ) ) ); ?>"><?php the_post_thumbnail( 'featured-large' ); ?></a>
						<?php } ?>
					<?php } ?>
				
					<?php if(of_get_option('display_portfolio_info') == '1') { ?>
						<div class="excerpt radius-bottom">
							<h2 class="title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<?php the_excerpt(); ?>
						</div><!-- END .excerpt -->
					<?php } ?>
				
				<!-- END .post-holder -->
				</div>
			
			<!-- END .portfolio-item -->
			</li>
	
		<?php endwhile; ?>
	
		<!-- END .row -->
		</ul>
	
		<?php else: ?>
		
		<p><?php _e("Sorry, no posts matched your criteria.", 'organicthemes'); ?></p>
		
		<?php endif; ?>
	
	<!-- END .portfolio -->
	</div>

<!-- END .portfolio-wrap -->
</div>