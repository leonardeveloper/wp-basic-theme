<?php get_header(); ?>

	<article <?php post_class(); ?>>
		<h1>Error 404: Page Not Found</h1>

		<h2>You may not be able to find the page or file because of:</h2>
		<ol>
			<li>An <strong>out-of-date bookmark/favourite.</strong></li>
			<li>A search engine that has an <strong>out-of-date listing for this site.</strong></li>
			<li>A <strong>mis-typed address</strong>.</li>
		</ol>
		<h2>You can search for what you're looking for</h2>
		<?php get_search_form(); ?>
	</article>

<?php get_sidebar(); ?>
<?php get_footer(); ?>