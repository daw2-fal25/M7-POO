<?php
session_start();
require_once "./bbdd/config.php";

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

  $result = $mysqli->query("SELECT * FROM USERS");
  $noticias = $mysqli->query("SELECT * FROM NEWS");

  $noticias2 = $noticias->fetch_all(MYSQLI_ASSOC);
  $result2 = $result->fetch_all(MYSQLI_ASSOC);

  $proyecto = $mysqli->query("SELECT * FROM PROJECTS");
  $proyecto2 = $proyecto->fetch_all(MYSQLI_ASSOC);

  ?>


<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Agen | Bootstrap Agency Template</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="plugins/bootstrap/bootstrap.min.css">
  <!-- slick slider -->
  <link rel="stylesheet" href="plugins/slick/slick.css">
  <!-- themefy-icon -->
  <link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
  <!-- venobox css -->
  <link rel="stylesheet" href="plugins/venobox/venobox.css">
  <!-- card slider -->
  <link rel="stylesheet" href="plugins/card-slider/css/style.css">

  <!-- Main Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!--Favicon-->
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="icon" href="images/favicon.ico" type="image/x-icon">

</head>

<body>


<header class="navigation fixed-top">
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="Egen"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse text-center" id="navigation">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="services.php">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="blog.php">Blog</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">Pages</a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="team.php">Team</a>
              <a class="dropdown-item" href="team-single.php">Team Details</a>
              <a class="dropdown-item" href="career.php">Career</a>
              <a class="dropdown-item" href="career-single.php">Career Details</a>
              <a class="dropdown-item" href="blog-single.php">Blog Details</a>
              <a class="dropdown-item" href="pricing.php">Pricing</a>
              </a>
              <a class="dropdown-item" href="faqs.php">FAQ's</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
      </div>
      <?php if (isset($_SESSION['user_id'])): ?>
        <div class="flex items-center space-x-2">
          <img width="42px" height="42px" src="<?= $_SESSION['user_avatar'] ?>" alt="Avatar" class="w-10 h-10 rounded-full border-2 border-white">
          <span class="text-white hover:text-gray-300"><?= $_SESSION['user_name'] ?></span>
          <?php
          if ($_SESSION['user_rol'] === 'admin') {
            echo '<a href="./admin/admin.php" class="text-blue-400 hover:text-blue-600">
<svg class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
  <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2" d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
</svg>


</a>

';
          }
          ?>
        </div>
      <?php endif; ?>
      <a href="./admin/admin.php"></a>
      <ul class="flex space-x-4">
        <?php if (!isset($_SESSION['user_id'])): ?>
          <li><a href="login.php" class="text-white hover:text-gray-300">Iniciar sesión</a></li>
          <li><a href="register.php" class="text-white hover:text-gray-300">Registrarse</a></li>
        <?php else: ?>
          <li><a href="logout.php" class="text-white hover:text-gray-300">Cerrar sesión</a></li>
        <?php endif; ?>
      </ul>
    </nav>
  </header>

  <!-- page-title -->
  <section class="page-title bg-cover" data-background="images/backgrounds/page-title.jpg">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center">
          <h1 class="display-1 text-white font-weight-bold font-primary">Our Team</h1>
        </div>
      </div>
    </div>
  </section>
  <!-- /page-title -->

  <!-- team single -->
  <section>
    <div class="container">
      <div class="row mb-100">
        <div class="col-lg-4 col-md-6">
          <div class="bg-secondary p-4 text-center">
            <div class="img-thumb-circle mx-auto mb-3">
              <img src="images/team/member-3.jpg" alt="team-member" class="img-fluid">
            </div>
            <h2 class="text-white">Alita Wilson</h2>
            <p class="text-gradient-primary h4">Chief Executive Officer</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua.enim ad minim veniam,</p>
            <a href="#" class="btn btn-primary">Download CV</a>
          </div>
        </div>
        <div class="col-lg-7 offset-lg-1 col-md-6">
          <div class="pt-5">
            <h2>Working Skill</h2>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
              labore et
              dolore magna aliqua. Ut enim ad minim veniam.</p>
            <div class="progress-block">
              <h6 class="text-uppercase">HTML5 Expertise</h6>
              <div class="progress">
                <div class="progress-bar" data-percent="85">
                  <span class="skill-number text-dark font-weight-bold"><span class="count">85</span>%</span>
                </div>
              </div>
            </div>
            <div class="progress-block">
              <h6 class="text-uppercase">jQuery Expertise</h6>
              <div class="progress">
                <div class="progress-bar" data-percent="95">
                  <span class="skill-number text-dark font-weight-bold"><span class="count">95</span>%</span>
                </div>
              </div>
            </div>
            <div class="progress-block">
              <h6 class="text-uppercase">PHP Expertise</h6>
              <div class="progress">
                <div class="progress-bar" data-percent="79">
                  <span class="skill-number text-dark font-weight-bold"><span class="count">79</span>%</span>
                </div>
              </div>
            </div>
            <div class="progress-block">
              <h6 class="text-uppercase">User Interface Expertise</h6>
              <div class="progress">
                <div class="progress-bar" data-percent="90">
                  <span class="skill-number text-dark font-weight-bold"><span class="count">90</span>%</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="row border-bottom mb-4">
            <div class="col-sm-6">
              <h4 class="mb-4">Contact Information</h4>
              <ul class="list-unstyled">
                <li class="mb-3"><i class="ti-mobile mr-3"></i>+88 525 325 22</li>
                <li class="mb-3"><i class="ti-email mr-3"></i>philipwilson@agen.com</li>
                <li class="mb-3"><i class="ti-flag-alt mr-3"></i>2/A Southampton, Sandiago, USA.</li>
              </ul>
            </div>
            <div class="col-sm-6">
              <h4 class="mb-4">Follow Me</h4>
              <ul class="list-inline social-icons">
                <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="ti-linkedin"></i></a></li>
              </ul>
            </div>
          </div>
          <h4>Work History & Feedback</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
            commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat
            nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
            id est laborum. Sed ut perspiciatis.</p>

        </div>
        <div class="col-lg-4">
          <div class="bg-secondary p-4">
            <ul class="list-unstyled">
              <li class="mb-4">
                <p class="text-white mb-1">Projects Done</p>
                <strong class="text-white">32</strong>
              </li>
              <li class="mb-4">
                <p class="text-white mb-1">Success Rate</p>
                <strong class="text-white">92%</strong>
              </li>
              <li class="mb-4">
                <p class="text-white mb-1">Experience Of</p>
                <strong class="text-white">10 years</strong>
              </li>
              <li class="mb-4">
                <p class="text-white mb-1">From</p>
                <strong class="text-white">San Diago. NY</strong>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /team -->

  <!-- team -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 mx-auto text-center">
          <h2>Our Team</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor</p>
          <div class="section-border"></div>
        </div>
      </div>
      <div class="row">
        <?php
        foreach ($result2 as $r) {
          echo '
        <div class="col-lg-3 col-sm-6 mb-4">
          <div class="card hover-shadow" style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
            <img src="' . $r['avatar'] . '" alt="team-member" class="card-img-top" style="height: 350px; object-fit: cover;">
            <div class="card-body text-center">
              <h4>' . $r['name'] . '</h4>
              <i>' . $r['job'] . '</i>
            </div>
          </div>
        </div>';
        }
        ?>
      </div>
    </div>
  </section>
  <!-- /team -->

  <!-- footer -->
  <footer class="bg-secondary position-relative">
    <img src="images/backgrounds/map.png" class="img-fluid overlay-image" alt="">
    <div class="section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-3 col-6">
            <h4 class="text-white mb-5">About</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-light d-block mb-3">Service</a></li>
              <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
              <li><a href="#" class="text-light d-block mb-3">About us</a></li>
              <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
              <li><a href="#" class="text-light d-block mb-3">Support</a></li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <h4 class="text-white mb-5">Company</h4>
            <ul class="list-unstyled">
              <li><a href="#" class="text-light d-block mb-3">Service</a></li>
              <li><a href="#" class="text-light d-block mb-3">Conatact</a></li>
              <li><a href="#" class="text-light d-block mb-3">About us</a></li>
              <li><a href="#" class="text-light d-block mb-3">Blog</a></li>
              <li><a href="#" class="text-light d-block mb-3">Support</a></li>
            </ul>
          </div>
          <div class="col-md-6">
            <div class="bg-white p-4">
              <h3>Contact us</h3>
              <form action="#">
                <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Full name">
                <input type="text" id="name" name="name" class="form-control mb-4 px-0" placeholder="Email address">
                <textarea name="message" id="message" class="form-control mb-4 px-0" placeholder="Message"></textarea>
                <button class="btn btn-primary" type="submit">Send</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pb-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-6 text-center text-md-left">
            <p class="text-light mb-0">Copyright &copy; 2019 a theme by <a class="text-gradient-primary" href="https://themefisher.com">themefisher.com</a>
            </p>
          </div>
          <div class="col-md-6">
            <ul class="list-inline text-md-right text-center">
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-instagram"></i></a></li>
              <li class="list-inline-item"><a class="d-block p-3 text-white" href="#"><i class="ti-github"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  <!-- jQuery -->
  <script src="plugins/jQuery/jquery.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="plugins/bootstrap/bootstrap.min.js"></script>
  <!-- slick slider -->
  <script src="plugins/slick/slick.min.js"></script>
  <!-- venobox -->
  <script src="plugins/venobox/venobox.min.js"></script>
  <!-- shuffle -->
  <script src="plugins/shuffle/shuffle.min.js"></script>
  <!-- apear js -->
  <script src="plugins/counto/apear.js"></script>
  <!-- counter -->
  <script src="plugins/counto/counTo.js"></script>
  <!-- card slider -->
  <script src="plugins/card-slider/js/card-slider-min.js"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&libraries=places"></script>
  <script src="plugins/google-map/gmap.js"></script>

  <!-- Main Script -->
  <script src="js/script.js"></script>

</body>

</html>