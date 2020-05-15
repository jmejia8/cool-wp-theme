<?php

get_header();
?>



<div class="container mt-4">


<?php

//==============================================================================
//==============================================================================
//                       Popular posts
//==============================================================================
//==============================================================================
$the_query = new WP_Query( array( 'orderby' => 'comment_count', 'posts_per_page' => 2,) );
?>

<?php if ( $the_query->have_posts() ) : ?>

  <div class="row mb-5">

    <?php while ( $the_query->have_posts() ) :
      $pp =  $the_query->the_post();
      if (get_the_ID() == $super_id) {
        continue;
      }

    ?>
    <div class="col-md-6">
      <div class="row h-100 no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col  p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success"><?php echo __('Popular', 'cool_blog'); ?></strong>
          <h3 class="mb-0"><?php  the_title(); ?></h3>
          <div class="mb-1 text-muted"><?php echo get_the_date(); ?></div>
          <p class="mb-auto"><?php  echo wp_strip_all_tags( get_the_excerpt(), true ); ?></p>
          <a href="<?php echo get_permalink(); ?>" class="stretched-link"><?php echo __('Continue reading', 'cool_blog'); ?></a>
        </div>
        <div class="col d-none d-lg-block">
          <div style="width: 100%;height: 100%;min-height: 50px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
          </div>
        </div>
      </div>
    </div>



    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>





  <?php endif; ?>

  <?php
  wp_reset_postdata();

  //==============================================================================
  //==============================================================================
  //==============================================================================
  ?>

</div>




  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php bloginfo('name'); ?></h1>
      <p> <?php bloginfo('description'); ?> </p>
      <!-- <p><a class="btn btn-primary btn-lg" href="#" role="button">About &raquo;</a></p> -->
    </div>
  </div>

<div class="container">
  <div class="album py-5 ">
      <!-- <div class="container"> -->

        <div class="row">
          <?php
          // start loop
          while (have_posts()) : the_post();
          ?>
          <div class="col-md-4  post-card  mb-4">
            <div class="h-100 shadow card mb-4  border-secundary shadow-sm">
              <div class="mh-50">
                <div style=";width: 100%;height: 100%;min-height: 200px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover; ">
                </div>
              </div>
              <div class="card-header">
                <h4><?php the_title(); ?></h4>
              </div>
              <div class="card-body col p-4 d-flex flex-column position-static">
                <p class="mb-auto">
                  <?php  echo wp_strip_all_tags( get_the_excerpt(), true ); ?>
                </p>
                <div class="mt-3 d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="<?php echo get_permalink(); ?>" class="stretched-link btn btn-sm btn-outline-secondary">View</a>
                    <?php
                      if ( is_user_logged_in() ) :
                    ?>
                      <a class="btn btn-sm btn-outline-secondary" href="<?php echo get_edit_post_link(); ?>">Edit</a>
                    <?php

                      endif;
                    ?>
                  </div>
                  <small class="text-muted"><?php
                    echo human_time_diff( strtotime(get_the_date()), current_time( 'timestamp', 1 ) );
                  ?></small>
                </div>
              </div>
            </div>
          </div>
          <?php
          // end loop
          endwhile;
          ?>



        </div>
      <!-- </div> -->
  </div>



</div>

<?php
    get_footer();
?>
