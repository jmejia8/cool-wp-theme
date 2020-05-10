<?php
	get_header();

  ?>

  <div class="container">
<?php
	while (have_posts()) :	the_post();
  $super_id = get_the_ID();
?>

<div class="row">



    <div class="blog-post col-sm-8">
            <h2 class="blog-post-title"><?php  the_title(); ?></h2>
            <p class="blog-post-meta"><?php echo get_the_date(); ?> by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' )); ?>"><?php the_author(); ?></a></p>

            <?php the_content(); ?>

          <!-- <nav class="blog-pagination">
            <a class="btn btn-outline-primary" href="#">Older</a>
            <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
          </nav> -->

          <?php
             // the query
             $term = get_queried_object();
             $the_query = new WP_Query( array(
               'category_name' => $term->slug,
                'posts_per_page' => 3,
             ));
          ?>

          <?php if ( $the_query->have_posts() ) : ?>
            <?php while ( $the_query->have_posts() ) :
              $pp =  $the_query->the_post();
              if (get_the_ID() == $super_id) {
                continue;
              }

            ?>

              <div class="row mb-5 mt-5">
                <div class="">
                  <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                      <h3 class="mb-3"><?php  the_title(); ?></h3>
                      <p class="card-text mb-auto"><?php the_excerpt(); ?></p>
                      <a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
                    </div>
                    <div class="col-auto d-none d-lg-block">
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
    <?php if ( is_active_sidebar( 'sidebar-posts' ) ) : ?>
      <?php dynamic_sidebar( 'sidebar-posts' ); ?>
    <?php endif; ?>
  </div>
</div>
</div>
  <?php

	get_footer();
?>
