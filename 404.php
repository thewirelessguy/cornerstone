<?php get_header(); ?>
	
<!-- Main Row -->
<div class="row">
	<div class="large-12 columns centered">
	<div class="alert-box error">404!</div>
	<h1>!@!#@$@@!!</h1>  
	<p>404's are such a lovely thing. But you know, I'm not going to leave you stranded.</p>
	<p>Why don't you try a search?</p>
	
	<?php get_search_form(); ?>
	
	<a href="<?php echo home_url( '/' ); ?>">&larr; Go Home?</a>

<?php get_sidebar(); ?>

</div>
<!-- Main Row -->
	
<?php get_footer(); ?>