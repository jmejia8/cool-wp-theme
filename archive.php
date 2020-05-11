<?php
// template for displaying author, etc

get_header();

?>

<div class="container mt-5">
<div class="row">

<div class="col-sm-8">





    <?php // http://www.example.com/2017/05
    if (is_date()) { ?>
    <h1 class="main-h1">
        <span class="red">
            <i class="fa fa-calendar"></i>
            <?php _e('Entries from ', 'cool_blog'); ?>
        </span>

        <?php

        $year = get_query_var('year');
        $month = get_query_var('monthnum');
        $day = get_query_var('day');

        if ($year > 0) { echo $year; }
        if ($month > 0) { echo '-' . str_pad($month, 2, 0, STR_PAD_LEFT); }
        if ($day > 0) { echo '-' . str_pad($day, 2, 0, STR_PAD_LEFT); }

    ?></h1>
    <?php } ?>

      		<?php while ( have_posts() ) : the_post(); ?>

      			<div class="row mb-5 mt-5">
    					<div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
    						<div class="col p-4 d-flex flex-column position-static">
                  <strong class="d-inline-block mb-2 text-primary">
                    <?php
                      if (is_category()) {  single_cat_title();  }
                      if (is_tag()) { single_tag_title(); }
                    ?>
                  </strong>
    							<h3 class="mb-3"><?php  the_title(); ?></h3>
                  <div class="mb-1 text-muted"><?php echo get_the_date(); ?></div>
    							<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
    							<a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
    						</div>
    						<div class="col-auto d-none d-lg-block">
    							<?php echo get_the_post_thumbnail(get_the_ID(), 'cool_blog-tutorial-image');?>
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
      <a href="<?php echo get_permalink(); ?>" class="stretched-link">Read</a>
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
