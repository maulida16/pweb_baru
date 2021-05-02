<?php include 'header.php';
session_start();?>

<body id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="assets/img/navbar-logo.png" alt="" /></a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars ml-1"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Tips</a></li>
          <li class="nav-item"><a class="nav-link js-scroll-trigger" href="profile.php">Profile</a></li>

        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead-->
  <header class="masthead">
    <div class="container">
      <div class="masthead-subheading">Welcome To UpdatEarthquake.id!</div>
      <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
      <?php if(!($_SESSION )){

       ?>
       <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="login.php">Login</a>
     <?php }?>             
   </div>
 </header>
 

<!-- Bootstrap core JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Third party plugin JS-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<!-- Contact form JS-->
<script src="assets/mail/jqBootstrapValidation.js"></script>
<script src="assets/mail/contact_me.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
</body>
</html>