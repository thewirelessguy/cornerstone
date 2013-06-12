<?php 
/*
Template Name: Archives
*/

get_header();

?>

<!-- archives -->

<!-- Main Row -->
<div class="row">

<div class="large-8 columns">

	<?php the_post(); ?>
	<h2 class="entry-title"><?php the_title(); ?></h2>

	<h4 class="subheader">Archives by Month:</h4>
	<ul>
		<?php wp_get_archives('type=monthly'); ?>
	</ul>

	<h4 class="subheader">Archives by Subject:</h4>
	<ul>
		 <?php wp_list_categories(); ?>
	</ul>

</div>

<?php get_sidebar(); ?>

</div>
<!-- Main Row -->

<?php get_footer(); ?>

<!-- archives -->
