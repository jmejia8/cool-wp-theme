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
<h1><?php echo __('Latest Content', 'cool_blog'); ?></h1>


<?php
$args = array(
		'post_type' => 'post',
		'posts_per_page' => 5
);
$loop = new WP_Query( $args );


	        while ( $loop->have_posts() ) {
	           $loop->the_post();
?>

<div class="row mt-3">
	<div >
		<div class="row no-gutters  shadow rounded overflow-hidden flex-md-row mb-4 border-primary h-md-250 position-relative">
			<div class="col p-4 d-flex flex-column position-static">
				<h4 class="mb-3 text-success"><?php  the_title(); ?></h4>
				<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
				<a href="<?php echo get_permalink(); ?>" class="stretched-link"><?php echo __('Continue reading', 'cool_blog'); ?></a>
			</div>
			<div class="col-auto d-none d-lg-block">
				<div style="width: 100%;height: 100%;min-height: 50px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
				</div>
				<?php echo get_the_post_thumbnail(get_the_ID(), 'cool_blog-tutorial-image');?>
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
