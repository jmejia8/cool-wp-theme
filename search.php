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

			<div class="row mb-5 mt-5">
				<div class="">
					<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
						<div class="col p-4 d-flex flex-column position-static">
							<h3 class="mb-3"><?php  the_title(); ?></h3>
							<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
							<a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
						</div>
						<div class="col-auto d-none d-lg-block">
							<?php echo get_the_post_thumbnail(get_the_ID(), 'cool_blog-tutorial-image');?>
						</div>
					</div>
				</div>
			</div>

		<!-- <li class="media">
			<div class="media-body">
				<h2>
				   <a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark">
					   <?php the_title(); ?>
				   </a>
				</h2>
				<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate>
					<?php the_date(); ?> <?php the_time(); ?>
				</time>
				<?php comments_popup_link(__('Leave a Comment', 'cool_blog'), __('1 Comment', 'cool_blog'), __('% Comments', 'cool_blog')); ?>
				<?php the_content(); ?>
			</div>
		</li> -->


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
