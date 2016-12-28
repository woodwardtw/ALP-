<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_html( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 footer">

				<footer class="site-footer" id="colophon" role="contentinfo">

					<div class="site-info col-md-4">
					<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>						
					</div><!-- .site-info -->
					<div class="site-info col-md-4">
					<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>						
					</div><!-- .site-info -->
					<div class="site-info col-md-4">
					<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>						
					</div><!-- .site-info -->
					<div class="site-info col-md-4">
					<?php dynamic_sidebar( 'fourth-footer-widget-area' ); ?>						
					</div><!-- .site-info -->

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>
