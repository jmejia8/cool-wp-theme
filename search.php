<?php

get_header();
?>



<?php if ( !have_posts() ): ?>

	<div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo __('No results found for', 'cool_blog'); ?></h1>
      <p><?php echo get_search_query(); ?></p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><?php echo __('Explore', 'cool_blog'); ?> &raquo;</a></p>
    </div>
  </div>

<?php else: ?>

<div class="container  mt-5">
	<h1><?php echo __('Search Results for', 'cool_blog'); ?> '<?php echo get_search_query(); ?>'</h1>
	<!-- <ul class="list-unstyled"> -->
		<div class="row">
		<div class="col-sm-8">
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="row mt-3">
				<div >
					<div class="row no-gutters  shadow rounded overflow-hidden flex-md-row mb-4 border-primary h-md-250 position-relative">
						<div class="col p-4 d-flex flex-column position-static">
							<h4 class="mb-3 text-success"><?php  the_title(); ?></h4>
							<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
							<a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
						</div>
						<div class="col-auto d-none d-lg-block">
							<div style="width: 100%;height: 100%;min-height: 50px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
							</div>
							<?php echo get_the_post_thumbnail(get_the_ID(), 'cool_blog-tutorial-image');?>
						</div>
					</div>
				</div>
			</div>



		<?php endwhile; ?>
	</div>

	<div class="col-sm-4">
		<?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
			<?php dynamic_sidebar( 'sidebar-posts' ); ?>
		<?php endif; ?>
	</div>
</div>



		<!-- </ul> -->
	</div>


<?php endif;

	get_footer();
?>
