<?php
/**
* The footer for our theme.
* This template is used to generate the footer for the theme.
*
* @package Natural
* @since Natural 3.0
*
*/
?>

<div class="clear"></div>

<!-- END .container -->
</div>

<!-- BEGIN .footer -->
<div class="footer radius-top">

	<?php if ( is_active_sidebar('footer') ) { ?>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .footer-widgets -->
		<div class="footer-widgets">
	
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer') ) : ?>
			<?php endif; ?>
		
		<!-- END .footer-widgets -->
		</div>
	
	<!-- END .row -->
	</div>
	
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
		
		<!-- BEGIN .footer-information -->
		<div class="footer-information">
		
			<!-- BEGIN .footer-content -->
			<div class="footer-content">
		
				<div class="align-left">
					<p><?php _e("Copyright", 'organicthemes'); ?> &copy; <?php echo date(__("Y", 'organicthemes')); ?> &middot; 			<?php bloginfo('name'); ?> &middot; <?php _e("All Rights Reserved", 'organicthemes'); ?></p>
					<p><a href="#" target="_blank">Privacy Policy</a></p>
					<p><a href="#" target="_blank">Site Map</a></p>
					<p><a href="http://www.umc.org" target="_blank">The United Methodist Church</a></p>
<!--
<p><a href="http://www.organicthemes.com/themes/" target="_blank"><?php _e("Natural Theme v3", 'organicthemes'); ?></a> <?php _e("by", 'organicthemes'); ?> <a href="http://www.organicthemes.com" target="_blank"><?php _e("Organic Themes", 'organicthemes'); ?></a> &middot; <a href="http://kahunahost.com" target="_blank" title="WordPress Hosting"><?php _e("WordPress Hosting", 'organicthemes'); ?></a> &middot; <a href="<?php bloginfo('rss2_url'); ?>"><?php _e("RSS Feed", 'organicthemes'); ?></a> &middot; <?php wp_loginout(); ?></p>
-->
				</div>
				
				<div class="align-right">
					<ul class="social-icons">
						<?php if (of_get_option('facebook_link') && of_get_option('facebook_link') != '') { ?>
							<li><a class="link-facebook" href="<?php echo of_get_option('facebook_link'); ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('twitter_link') && of_get_option('twitter_link') != '') { ?>
							<li><a class="link-twitter" href="<?php echo of_get_option('twitter_link'); ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('linkedin_link') && of_get_option('linkedin_link') != '') { ?>
							<li><a class="link-linkedin" href="<?php echo of_get_option('linkedin_link'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('dribbble_link') && of_get_option('dribbble_link') != '') { ?>
							<li><a class="link-dribbble" href="<?php echo of_get_option('dribbble_link'); ?>" target="_blank"><i class="fa fa-dribbble"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('skype_link') && of_get_option('skype_link') != '') { ?>
							<li><a class="link-skype" href="<?php echo of_get_option('skype_link'); ?>" target="_blank"><i class="fa fa-skype"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('plus_link') && of_get_option('plus_link') != '') { ?>
							<li><a class="link-google" href="<?php echo of_get_option('plus_link'); ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('pinterest_link') && of_get_option('pinterest_link') != '') { ?>
							<li><a class="link-pinterest" href="<?php echo of_get_option('pinterest_link'); ?>" target="_blank"><i class="fa fa-pinterest"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('github_link') && of_get_option('github_link') != '') { ?>
							<li><a class="link-github" href="<?php echo of_get_option('github_link'); ?>" target="_blank"><i class="fa fa-github"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('instagram_link') && of_get_option('instagram_link') != '') { ?>
							<li><a class="link-instagram" href="<?php echo of_get_option('instagram_link'); ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('youtube_link') && of_get_option('youtube_link') != '') { ?>
							<li><a class="link-youtube" href="<?php echo of_get_option('youtube_link'); ?>" target="_blank"><i class="fa fa-youtube"></i></a></li>
						<?php } ?>
						<?php if (of_get_option('email_link') && of_get_option('email_link') != '') { ?>
							<li><a class="link-email" href="mailto:<?php echo of_get_option('email_link'); ?>" target="_blank"><i class="fa fa-envelope"></i></a></li>
						<?php } ?>
					</ul>
				</div>
		
			<!-- END .footer-content -->
			</div>
		
		<!-- END .footer-information -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .footer -->
</div>

<!-- END #wrap -->
</div>

<?php wp_footer(); ?>

<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=246727095428680";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

</body>
</html>