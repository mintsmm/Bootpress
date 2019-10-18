<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootpress
 */

?>

<article id="post-<?php the_ID(); ?>" class="card mb-4">
	<header class="card-header">
		<?php
        if (is_singular()) :
            the_title('<h1 class="card-title">', '</h1>');
        else :
            the_title('<h2 class="card-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
        endif;

        if ('post' === get_post_type()) :
            ?>
			<div class="card-meta">
				<?php
                bootpress_posted_on();
                bootpress_posted_by();
                ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php bootpress_post_thumbnail(); ?>

	<div class="card-body">
		<?php
        the_content(sprintf(
                    wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', 'bootpress'),
                array(
                    'span' => array(
                        'class' => array(),
                    ),
                )
            ),
                    get_the_title()
                ));

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'bootpress'),
            'after'  => '</div>',
        ));
        ?>
	</div><!-- .entry-content -->

	<footer class="card-footer">
		<?php bootpress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
