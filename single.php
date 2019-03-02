<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h2>
				<p class="meta">Posted on <time class="updated" datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time> in <?php the_category(', ') ?></p>
			</header>

			<div class="entry-content">
				<?php the_content(); ?>
			</div>

			<?php wp_link_pages(['before' => '<footer><nav class="page-nav"><p>Pages:', 'after' => '</p></nav></footer>']); ?>

			<!--
			<?php trackback_rdf(); ?>
			-->

			<?php comments_template(); ?>
		</article>

	<?php endwhile; else: ?>

		<?php get_template_part('404'); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>