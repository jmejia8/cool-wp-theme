<?php
get_header(); ?>
<div class="jumbotron">
	<div class="container">
		<h1 class="display-3"><?php echo __('Oops!', 'cool_blog'); ?></h1>
		<p><?php echo __('Archive not found...', 'cool_blog'); ?></p>
		<!-- <p><a class="btn btn-primary btn-lg" href="#" role="button"><?php echo __('Explore', 'cool_blog'); ?> &raquo;</a></p> -->
	</div>
</div>

<div class="container">
<article class="row">

<section class="col-sm-8">


<center>
</center>
<h1>Latest Content</h1>


<?php
$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5
);
$loop = new WP_Query( $args );


	        while ( $loop->have_posts() ) {
	           $loop->the_post();
?>

<div class="">
	<div class="card mb-4 shadow-sm">
		<?php echo get_the_post_thumbnail($loop->ID, 'cool_blog-tutorial-image');?>
		<div class="card-body">
			<h4><?php the_title(); ?></h4>
			<p class="card-text"><?php the_excerpt(); ?></p>
			<div class="d-flex justify-content-between align-items-center">
				<div class="btn-group">
					<button type="button" onclick="location.href='<?php echo get_permalink(); ?>';" class="btn btn-sm btn-outline-secondary">View</button>
					<!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
				</div>
				<small class="text-muted">9 mins</small>
			</div>
		</div>
	</div>
</div>

	<hr>

<?php } ?>

</section>
    <aside class="col-sm-4">
        <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-posts' ); ?>
        <?php endif; ?>
    </aside>
</article>



</div>

<?php
get_footer(); ?>
