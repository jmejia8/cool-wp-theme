<?php

get_header();
?>

<main role="main">
  <?php
  $args = array(
    'post_type' => 'cool_blog_slider',
    'posts_per_page' => 3
  );

  $loop = new WP_Query( $args );
  if ($loop->have_posts()) :

  ?>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <?php
      for ($i=0; $i < $loop->found_posts; $i++) {
        $active = $i == 0 ? "active" : "";
      ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="<?php echo $active; ?>"></li>
      <?php
      }
      ?>
    </ol>
    <div class="carousel-inner">
      <?php

          for ($i=0; $loop->have_posts(); $i++) {
              $loop->the_post();
              $active = $i == 0 ? "active" : "";

        ?>
            <div class="carousel-item <?php echo $active; ?>">
              <div style="width: 100%;height: 100%;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center; background-size: 100% auto;">
              </div>
              <div class="container">
                <div class="carousel-caption text-left">
                  <?php the_title( "<h1>", "</h1>" ); ?>
                  <p><?php the_excerpt(); ?></p>
                  <p><a class="btn btn-lg btn-primary" href="#" role="button">Go for it!</a></p>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <?php
  endif;
  ?>
</main>


<div class="container">




  <div class="row mb-2">
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-success">Design</strong>
          <h3 class="mb-0">Post title</h3>
          <div class="mb-1 text-muted">Nov 11</div>
          <p class="mb-auto">This is a wider card content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
        </div>
      </div>
    </div>
  </div>

  <div class="jumbotron">
    <div class="container">
      <h1 class="display-3"><?php bloginfo('name'); ?></h1>
      <p> <?php bloginfo('description'); ?> </p>
      <p><a class="btn btn-primary btn-lg" href="#" role="button">About &raquo;</a></p>
    </div>
  </div>

  <div class="album py-5 ">
      <!-- <div class="container"> -->

        <div class="row">
          <?php
          // start loop
          while (have_posts()) : the_post();
          ?>
          <div class="col-md-4">
            <div class="card mb-4 border-primary shadow-sm">
              <div style="width: 100%;height: 100%;min-height: 200px;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center; background-size: 100% auto;">
              </div>
              <div class="card-header">
                <h4><?php the_title(); ?></h4>
              </div>
              <div class="card-body col p-4 d-flex flex-column position-static">
                <p class="mb-auto">
                  <?php the_excerpt(); ?>
                </p>
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
