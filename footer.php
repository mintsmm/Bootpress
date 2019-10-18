<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bootpress
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer bg-dark">
        <div class="container">
            <div class="site-info">
                <?php echo get_theme_mod('bootpress_footer_text'); ?>
            </div><!-- .site-info -->
        </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
