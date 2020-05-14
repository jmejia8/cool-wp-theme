<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">

  <link rel="stylesheet" href="http://localhost/wordpress/wp-content/themes/cool-wp-theme/style.css">
  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>

  <?php
		wp_head();
	?>
</head>
<body>
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
        for ($i=0; !is_single() && !is_single() && $i < $loop->found_posts; $i++) {
          $active = $i == 0 ? "active" : "";
        ?>
          <li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" class="<?php echo $active; ?>"></li>
        <?php
        }
        ?>
      </ol>
      <div class="carousel-inner">
        <?php

          if (!is_single() && !is_page()) :
            for ($i=0; $loop->have_posts(); $i++) {
                $loop->the_post();
                $active = $i == 0 ? "active" : "";

          ?>
              <div class="carousel-item <?php echo $active; ?>">
                <div style="position: absolute;width: 100%;height: 100%;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover fixed;">
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
              elseif (is_single()) :
                ?>
                <div class="carousel-item active">
                  <div style="position: absolute;width: 100%;height: 100%;background: url(<?php echo get_the_post_thumbnail_url(get_the_ID(),'cool_blog-featured-image'); ?>) no-repeat center top/cover fixed;">
                  </div>
                  <!-- <div class="container">
                    <div class="carousel-caption text-left">
                      <?php the_title( "<h1>", "</h1>" ); ?>
                      <p><?php the_excerpt(); ?></p>
                      <p><a class="btn btn-lg btn-primary" href="#" role="button">Go for it!</a></p>
                    </div>
                  </div> -->
                </div>
                <?php

            endif
              ?>
      </div>
      <?php
      if (!is_single()) :
      ?>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
      <?php
      endif;
      ?>
    </div>
    <?php
    endif;
    ?>
  </main>

<header class="main-navigation-blog">

  <nav class="navbar navbar-expand-md navbar-dark navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="<?php echo get_site_url(); ?>"><?php bloginfo('name'); ?></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07">
        <?php
        wp_nav_menu(
          array(
          'theme_location' => 'top',
          'menu_class'      => 'navbar-nav mr-auto',
          'container' => 'ul',
          'container_class' => 'nav',
          'add_li_class'  => 'nav-item',
          )
        );
        ?>

        <form class="form-inline my-2 my-md-0" action="<?php echo get_site_url(); ?>">
          <input class="form-control" type="text" name="s" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>

</header>
