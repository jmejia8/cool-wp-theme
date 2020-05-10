<?php

get_header();
?>

<?php if ( have_posts() ): ?>
	<div class="container">
		<h1><?php echo __('Search Results for', 'cool_blog'); ?> '<?php echo get_search_query(); ?>'</h1>
		<ul class="list-unstyled">
			<?php while ( have_posts() ) : the_post(); ?>
			<li class="media">
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
			</li>
			<?php endwhile; ?>
		</ul>
	</div>
<?php else: ?>

  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php echo __('No results found for', 'cool_blog'); ?></h1>
      <p><?php echo get_search_query(); ?></p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button"><?php echo __('Explore', 'cool_blog'); ?> &raquo;</a></p>
    </div>
  </div>
<?php endif;

	get_footer();
?>
