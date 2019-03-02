<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header>
		<h2 class="entry-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
		<p class="meta">Posted on <time class="updated" datetime="<?php echo get_post_time('c', true); ?>"><?php echo get_the_date(); ?></time> in <?php the_category(', ') ?></p>
	</header>

	<div class="entry-summary">
		<?php the_excerpt('Read more &raquo;'); ?>
	</div>
</article>