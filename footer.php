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

	</div>

	<footer id="colophon" class="site-footer <?php echo get_theme_mod('bootpress_footer_background'); ?>">

        <div class="container">

            <div class="site-info <?php echo get_theme_mod('bootpress_footer_text_color'); ?>">

                <?php echo get_theme_mod('bootpress_footer_text'); ?>

            </div>

        </div>

	</footer>
    
</div>

<?php wp_footer(); ?>

</body>
</html>
