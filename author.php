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

          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <button type="button" class="btn btn-success btn-sm mb-3">Follow</button>
            <button type="button" class="btn btn-danger btn-sm mb-3">Message</button>
          </div>
          <!-- END SIDEBAR BUTTONS -->
          <!-- SIDEBAR MENU -->
          <div class=" ">
            <ul class="nav flex-column">
              <li class="active nav-item">
                <a href="#" class="nav-link active" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-home"></i>
							Bio </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo the_author_meta('user_url'); ?>" >
							<i class="fa fa-user"></i>
							Web </a>
              </li>
              <!-- <li class="nav-item">
                <a class="nav-link" href="#" target="_blank">
							<i class="fa fa-check"></i>
							Tasks </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
							<i class="fa fa-flag"></i>
							Help </a>
              </li> -->
            </ul>
          </div>
          <!-- END MENU -->
        </div>
      </div>
      <div class="col-md-9">
        <div class="profile-content">
          <?php while ( have_posts() ) : the_post(); ?>

						<div class="row mt-3">
							<div >
								<div class="row no-gutters  shadow rounded overflow-hidden flex-md-row mb-4 border-primary h-md-250 position-relative">
									<div class="col p-4 d-flex flex-column position-static">
										<h5 class="mb-3"><?php  the_title(); ?></h5>
										<p class="card-text mb-auto"><?php the_excerpt(); ?></p>
										<a href="<?php echo get_permalink(); ?>" class="stretched-link">Continue reading</a>
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
      </div>
    </div>
  </div>

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">About me</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <?php the_author_meta('user_description'); ?>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


<?php

get_footer();
?>
