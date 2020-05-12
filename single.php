<?php
	get_header();

  ?>

  <div class="container">
<?php
	while (have_posts()) :	the_post();
  $super_id = get_the_ID();
	$term = get_queried_object();
?>

<div class="row mt-5">



    <div class="blog-post col-sm-8">
            <h1 class="blog-post-title"><?php  the_title(); ?></h1>
            <p class="blog-post-meta">
							<?php echo get_the_date(); ?>
							by
							<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>">
								<?php the_author(); ?>
							</a>
						<!-- <div class="bs-component"> -->
							<?php
							//get all the categories the post belongs to
							$categories = wp_get_post_categories( get_the_ID() );
							//loop through them
							foreach($categories as $c){
								$cat = get_category( $c );
								//get the name of the category
								$cat_id = get_cat_ID( $cat->name );
								//make a list item containing a link to the category
								echo '<a href="'.get_category_link($cat_id).'" class="badge badge-dark ml-2" >'.$cat->name.'</a>';
							}
							?>
						</p>
						<!-- </div> -->

            <?php the_content(); ?>


					<!-- <h3>Category</h3> -->

          <?php
             // the query

             $the_query = new WP_Query( array(
               'category_name' => $term->slug,
                'posts_per_page' => 4,
             ));
          ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) :
              $pp =  $the_query->the_post();
              if (get_the_ID() == $super_id) {
                continue;
              }

            ?>

              <div class="row mb-5">
                <div >
                  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 border-primary h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                      <h5 class="mb-3"><?php  the_title(); ?></h5>
                      <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
                      <a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
											<div style="width: 100%;height: 100%;min-height: 50px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
											</div>
											<?php echo get_the_post_thumbnail($the_query->ID, 'cool_blog-tutorial-image');?>
                    </div>
                  </div>
                </div>
              </div>

            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

          <?php else : ?>
            <p><?php __('No News'); ?></p>
          <?php endif; ?>



      <div class="comment-container">
       <?php
        // If comments are open or we have at least one comment, load up the comment template.
        if ( comments_open() || get_comments_number() ) :
          comments_template();
        endif;
      ?>
      </div>
    </div>

<?php
	endwhile;
?>
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
			<div style="width: 100%;height: 100%;min-height: 200px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
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
