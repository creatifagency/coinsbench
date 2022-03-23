<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Coinsbench_WP_Theme
 */

?>

	<footer id="colophon" class="site-footer">
        <div class="footer_logo">
            <a href="<?php echo home_url();?>">
                <img src="<?php the_field('footer_logo','option');?>" alt="">
            </a>
        </div>
        <div class="social_media">
            <?php echo ca_get_socials(false,true,false,true,true,false,true);?>
        </div>
        <?php if ( is_active_sidebar( 'sidebar-2' )  ) : ?>
            <div class="widget-area" role="complementary">
                <?php dynamic_sidebar( 'sidebar-2' ); ?>
            </div>
        <?php endif; ?>
		<div class="site-info">
			<span class="site-info-left"> © 2022 Coinsbench. All rights reserved.</span>
			<div class="site-info-right">
                <a href="#">Terms and Conditions</a>
                <a href="#">Privacy Policy</a>
            </div>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
