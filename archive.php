<?php get_header(); ?>

	<?php
		if (have_posts()) : 			
			if(is_category()) {
	?>
			<h1>Archive for the "<?php single_cat_title(); ?>" Category</h1>
			<?php } elseif(is_tag()) { ?>
			<h1>Posts Tagged "<?php single_tag_title(); ?>"</h1>
			<?php } elseif (is_day()) { ?>
			<h1>Archive for <?php the_time('F jS, Y'); ?></h1>
			<?php } elseif (is_month()) { ?>
			<h1>Archive for <?php the_time('F, Y'); ?></h1>
			<?php } elseif (is_year()) { ?>
			<h1>Archive for <?php the_time('Y'); ?></h1>
			<?php } elseif (is_author()) { ?>
			<h1>Author Archive</h1>
			<?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
			<h1>Blog Archives</h1>
			<?php } ?>

		<?php 
			while (have_posts()) : the_post();
				get_template_part('loop');
			endwhile; 
		?>

		<ul id="prev-next">
			<li id="prev"><?php next_posts_link('&laquo; Previous Entries') ?></li>
			<li id="next"><?php previous_posts_link('Newer Entries &raquo;'); ?></li>
		</ul>

	<?php 
		else : 
			get_template_part('404');
		endif; 
	?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>