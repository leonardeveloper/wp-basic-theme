<?php get_header(); ?>

	<?php
		if ( have_posts() ):
			while ( have_posts() ): the_post();
		?>
		<article <?php post_class(); ?>>
			<h1 class="entry-title"><?php the_title(); ?></h1>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php wp_link_pages( ['before' => '<footer><nav class="page-nav"><p>Pages:', 'after' => '</p></nav></footer>'] ); ?>
		</article>

	<?php
			endwhile;
		else:
			get_template_part( '404' );
		endif;
	?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>