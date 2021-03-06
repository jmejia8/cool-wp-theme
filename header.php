<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">


	<link rel="apple-touch-icon" sizes="76x76" href="<?php bloginfo('template_url');?>/img/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php bloginfo('template_url');?>/img/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?php bloginfo('template_url');?>/img/favicon-16x16.png">
	<link rel="manifest" href="<?php bloginfo('template_url');?>/img/site.webmanifest">
	<link rel="mask-icon" href="<?php bloginfo('template_url');?>/img/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">


  <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>

  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css" crossorigin="anonymous">

  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url')?>">

  <link rel="stylesheet" href="<?php bloginfo('template_url');?>/style.css">


  <?php
		wp_head();
	?>
</head>
<body <?php body_class(); ?>>
  <main role="main">
    <?php
    $args = array(
      'post_type' => 'cool_blog_slider',
      'posts_per_page' => 10
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
                  <div class="carousel-caption text-shadow text-left">
                    <?php the_title( "<h1>", "</h1>" ); ?>
                    <?php the_excerpt(); ?>
                    <p><a class="btn btn-lg btn-primary" href="<?php echo get_permalink(); ?>" role="button">Go for it!</a></p>
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

                </div>
                <?php

            endif
              ?>
      </div>
      <?php
      if (!is_single()) :
      ?>
      <a class="carousel-control-prev " href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon text-shadow" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next " href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon text-shadow" aria-hidden="true"></span>
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
          <input class="form-control" type="text" name="s" placeholder="<?php echo __('Search', 'cool_blog'); ?>" aria-label="<?php echo __('Search', 'cool_blog'); ?>">
        </form>
      </div>
    </div>
  </nav>

</header>
