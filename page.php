<?php get_header(); ?>

<!-- Main Row -->
<div class="row">
<div class="large-8 columns">

<!-- Skip Nav -->
<a id="content"></a>

	<!-- Start the Loop -->
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article>
				
			<h1><?php the_title(); ?></h1>
			
			<!-- Display the Page's Content in a div box. -->
			<div class="entry">
				<?php the_content(); ?>
			</div>
		
		</article>
	
	<!-- Stop The Loop (but note the "else:" - see next line). -->
	<?php endwhile; else: ?>
	
		<!-- The very first "if" tested to see if there were any Posts to -->
		<!-- display.  This "else" part tells what do if there weren't any. -->
		<div class="alert-box error">Sorry, the page you requested was not found</div>
	
	<!--End the loop -->
	<?php endif; ?>
	
</div>
	
<?php get_sidebar(); ?>
		
</div>
<!-- Main Row -->

<?php get_footer(); ?>