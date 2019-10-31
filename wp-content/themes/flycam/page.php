<?php get_header(); ?>

<?php if (have_posts()): while (have_posts()) : the_post(); ?>

	<!-- article -->
	<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_content(); ?>

	</section>
	<!-- /article -->

	<?php endwhile; else:  ?>
<?php endif; ?>

<?php get_footer(); ?>
