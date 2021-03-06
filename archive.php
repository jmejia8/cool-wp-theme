<?php
// template for displaying author, etc

get_header();

?>

<div class="container mt-5">
<div class="row">

<div class="col-sm-8">







      		<?php while ( have_posts() ) : the_post(); ?>

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



      		<?php endwhile; ?>


</div>


<!-- aside -->
<div class="col-sm-4">
  <?php
  $the_query = new WP_Query( array(
    'category_name' => $term->slug,
     'posts_per_page' => 3,
  ));
  // start loop
  while ($the_query->have_posts()) : $the_query->the_post();
    if (get_the_ID() == $super_id) {
      continue;
    }
  ?>
  <div class="card mb-3">
    <div style="width: 100%;height: 100%;min-height: 200px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center; background-size: 100% auto;">
    </div>
    <div class="card-body">
      <h5 class="card-title"><?php the_title(); ?></h5>
      <a href="<?php echo get_permalink(); ?>" class="stretched-link"><?php echo __('Read', 'cool_blog'); ?></a>
    </div>
  </div>
  <?php
  // end loop
  endwhile;
  ?>



  <!-- =============================== -->
  <!-- =============================== -->
  <!-- =============================== -->
  <!-- =============================== -->
  <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
    <?php dynamic_sidebar( 'sidebar-posts' ); ?>
  <?php endif; ?>




</div>

</div>



</div>

<?php

get_footer();
?>
