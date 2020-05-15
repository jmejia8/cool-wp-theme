<!-- Footer -->
<footer class="page-footer font-small  bg-light pt-4">

  <!-- Footer Links -->
  <div class="container text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3 justify-content-center align-self-center">

        <!-- Content -->
        <h5 class="text-uppercase"><?php bloginfo('name'); ?></h5>
        <p> <?php bloginfo('description'); ?> </p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3 ">

        <!-- Links -->
        <h5 class="text-uppercase"><?php echo __('Sites', 'cool_blog'); ?></h5>

        <?php
             wp_nav_menu(
                 array(
                 'theme_location' => 'footer',
                 'menu_class'      => 'navbar-nav mr-auto',
                 'container' => 'ul',
                 'container_class' => 'list-unstyled',
                 'add_li_class'  => 'text-white',
                 )
             );
          ?>

        <!-- <ul class="list-unstyled">
          <li>
            <a href="#!">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul> -->

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 mb-md-0 mb-3 ">

        <!-- Links -->


      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="mt-3 footer-copyright text-center text-white py-3 bg-secondary"> &copy; <?php echo Date('Y')." "; echo  bloginfo('name'); ?>
    <!-- <a href="https://mdbootstrap.com/"> MDBootstrap.com</a> -->
  </div>
  <!-- Copyright -->

  <?php wp_footer(); ?>
</footer>
<!-- Footer -->


<!-- <footer class="footer mt-auto py-3">
  <div class="container">
    <div class="row">

        <div class="col h-100 justify-content-center align-self-center">
            <span class="text-muted"></span>
        </div>
        <div class="col">

        </div>
      </div>
  </div>
</footer> -->

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
