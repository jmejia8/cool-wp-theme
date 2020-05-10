<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php is_front_page() ? bloginfo('description') : wp_title(''); ?> | <?php bloginfo('name'); ?></title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css" crossorigin="anonymous">

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

<header>

  <nav class="navbar navbar-expand-md navbar-dark fixed-top navbar-dark bg-primary">
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
