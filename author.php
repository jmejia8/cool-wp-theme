<?php
// template for displaying author, etc

get_header();

?>

<!--our content goes here-->
<div class="container">
    <div class="row profile">
      <div class="col-md-3">
        <div class="">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic">
            <img src="<?php echo get_avatar_url( get_the_author_meta('ID'), array("size"=>256)); ?>" class="img-responsive" alt="">
          </div>
          <!-- END SIDEBAR USERPIC -->
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">
              <?php
                the_author_meta('user_firstname');
                echo " ";
                the_author_meta('user_lastname'); ?>
            </div>
            <div class="profile-usertitle-job">
              Developer
            </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm">Follow</button>
            <button type="button" class="btn btn-danger btn-sm">Message</button>
          </div>
          <!-- END SIDEBAR BUTTONS -->
          <!-- SIDEBAR MENU -->
          <div class=" ">
            <ul class="nav flex-column">
              <li class="active nav-item">
                <a href="#" class="nav-link active">
							<i class="fa fa-home"></i>
							Overview </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="https://codepen.io/jasondavis/pen/jVRwaG?editors=1000">
							<i class="fa fa-user"></i>
							Account Settings </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">
							<i class="fa fa-check"></i>
							Tasks </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
							<i class="fa fa-flag"></i>
							Help </a>
              </li>
            </ul>
          </div>
          <!-- END MENU -->
        </div>
      </div>
      <div class="col-md-9">
        <div class="profile-content">
          <?php while ( have_posts() ) : the_post(); ?>

            <div class="row mb-5 mt-5">
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                  <div class="col p-4 d-flex flex-column position-static">
                    <strong class="d-inline-block mb-2 text-primary">
                      <?php
                        the_author_meta('user_firstname');
                        echo " ";
                        the_author_meta('user_lastname'); ?>
                    </strong>
                    <h3 class="mb-3"><?php  the_title(); ?></h3>
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
      </div>
    </div>
  </div>



<?php

get_footer();
?>
