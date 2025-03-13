  <?php
  require_once "./bbdd/config.php";

  $result = $mysqli->query("SELECT * FROM USERS");
  $noticias = $mysqli->query("SELECT * FROM NEWS");

  $noticias2 = $noticias->fetch_all(MYSQLI_ASSOC);
  $result2 = $result->fetch_all(MYSQLI_ASSOC);

  $proyecto = $mysqli->query("SELECT * FROM PROJECTS");
  $proyecto2 = $proyecto->fetch_all(MYSQLI_ASSOC);

  ?>

  <!DOCTYPE html>
  <html lang="zxx">

  <head>
    <meta charset="utf-8">
    <title>Agen | Bootstrap Agency Template</title>

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- theme meta -->
    <meta name="theme-name" content="agen" />

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
            <li class="nav-item">
              <a class="nav-link" href="portfolio.php">Portfolio</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pages</a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="team.php">Team</a>
                <a class="dropdown-item" href="team-single.php">Team Details</a>
                <a class="dropdown-item" href="career.php">Career</a>
                <a class="dropdown-item" href="career-single.php">Career Details</a>
                <a class="dropdown-item" href="blog-single.php">Blog Details</a>
                <a class="dropdown-item" href="pricing.php">Pricing</a></a>
                <a class="dropdown-item" href="faqs.php">FAQ's</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    <!-- banner -->
    <section class="banner bg-cover position-relative d-flex justify-content-center align-items-center"
      data-background="images/banner/banner2.jpg">
      <div class="container">
        <div class="row">
          <div class="col-12 text-center">
            <h1 class="display-1 text-white font-weight-bold font-primary">Creative Agency</h1>
          </div>
        </div>
      </div>
    </section>
    <!-- /banner -->

    <!-- service -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2 class="section-title">Our Services</h2>
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
              labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat.</p>
            <div class="section-border"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4 active">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-palette mb-5 d-inline-block text-white"></i>
                  <i class="icon-lg icon-watermark text-white ti-palette"></i>
                </div>
                <h4 class="mb-4">Design</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-dashboard mb-5 d-inline-block text-white"></i>
                  <i class="icon-lg icon-watermark text-white ti-dashboard"></i>
                </div>
                <h4 class="mb-4">Development</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="card hover-bg-secondary shadow py-4">
              <div class="card-body text-center">
                <div class="position-relative">
                  <i
                    class="icon-lg icon-box bg-gradient-primary rounded-circle ti-announcement mb-5 d-inline-block text-white"></i>
                  <i class="icon-lg icon-watermark text-white ti-announcement"></i>
                </div>
                <h4 class="mb-4">Marketing</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /service -->

    <!-- feature -->
    <section class="section bg-secondary position-relative">
      <div class="bg-image overlay-secondary">
        <img src="images/feature.jpg" alt="bg-image">
      </div>
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="row align-items-center">
              <div class="col-lg-4 mb-4 mb-lg-0">
                <img src="images/feature.jpg" alt="feature-image" class="img-fluid">
              </div>
              <div class="col-lg-7 offset-lg-1">
                <div class="row">
                  <div class="col-12">
                    <h2 class="text-white">We know What Bait to Use</h2>
                    <div class="section-border ml-0"></div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-vector mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">User Experience</h4>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-layout mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">Responsive Layout</h4>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-headphone-alt mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">Digital Solutions</h4>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="media">
                      <i class="icon text-gradient-primary ti-ruler-pencil mr-3"></i>
                      <div class="media-body">
                        <h4 class="text-white">Bootstrap 4x</h4>
                        <p class="text-light">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmo</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /feature -->
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

        <div class="row no-gutters">
          <?php
          foreach ($proyecto2 as $proyecto) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card project-card hover-shadow mx-3 my-3 border border-light rounded shadow-lg" style="height: 600px;">
                <img src="<?= $proyecto['thumbnail'] ?>" alt="project-thumb" class="card-img-top rounded" style="height: 300px; object-fit: cover;">
                <div class="card-body d-flex flex-column" style="height: 200px;">
                  <h4 class="card-title text-primary"><a href="project-single.html"><?= $proyecto['title'] ?></a></h4>
                  <p class="card-text flex-grow-1"><?= $proyecto['description'] ?></p>
                  <a href="<?= $proyecto['url'] ?>" class="btn btn-outline-primary mt-auto">Ver proyecto</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!-- /team -->

    <!-- about -->
    <section class="section-lg position-relative bg-cover" data-background="images/backgrounds/about-bg.jpg">
      <img src="images/backgrounds/about-bg-overlay.png" alt="overlay" class="overlay-image img-fluid">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-6 col-md-8 col-sm-7 col-8">
            <h2 class="text-white mb-4">Who We Are</h2>
            <p class="text-light mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
              incididunt
              ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
              aliquip ex ea commodo consequat.</p>
            <a href="about.php" class="btn btn-primary">Read More</a>
          </div>
          <div class="col-md-2 col-sm-4 col-4 text-right align-self-end">
            <a class="venobox" data-autoplay="true" data-vbtype="video"
              href="https://www.youtube.com/watch?v=jrkvirglgaQ"><i
                class="text-center icon-sm icon-box rounded-circle text-white bg-gradient-primary d-block ti-control-play"></i></a>
          </div>
        </div>
      </div>
    </section>
    <!-- /about -->

    <!-- project -->
    <section class="section">
      <div class="container-fluid px-0">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>Our Feature Works</h2>
            <div class="section-border"></div>
          </div>
        </div>

        <div class="row no-gutters shuffle-wrapper">
          <?php
          foreach ($proyecto2 as $p) {
            echo '
                <div class="col-lg-4 col-md-6 shuffle-item">
                  <div class="project-item">
                    <img src="' . $p['thumbnail'] . '" alt="project-image" class="img-fluid w-100">
                    <div class="project-hover bg-secondary px-4 py-3">
                      <a href="#" class="text-white h4">' . $p['title'] . '</a>
                      <a href="#"><i class="ti-link icon-xs text-white"></i></a>
                    </div>
                  </div>
                </div>';
          }
          ?>
        </div>
      </div>
      </div>
    </section>
    <!-- /project -->

    <!-- call to action -->
    <section>
      <div class="container section-sm overlay-secondary-half bg-cover" data-background="images/backgrounds/cta-bg.jpg">
        <div class="row">
          <div class="col-lg-8 offset-lg-1">
            <h2 class="text-gradient-primary">Let's Start With Us!</h2>
            <p class="h4 font-weight-bold text-white mb-4">Lorem ipsum dolor sit amet, magna habemus ius ad</p>
            <a href="contact.php" class="btn btn-lg btn-primary">Let’s talk</a>
          </div>
        </div>
      </div>
    </section>
    <!-- /call to action -->

    <!-- pricing -->
    <section class="section pb-0">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>Our Smart Pricing Table</h2>
            <div class="section-border"></div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <div class="card bottom-shape bg-secondary pt-4 pb-5">
              <div class="card-body text-center">
                <h4 class="text-white">Basic</h4>
                <p class="text-light mb-4">Besic and simple website</p>
                <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
                <ul class="list-unstyled mb-5">
                  <li class="text-white mb-3">Mobile-Optimized Website</li>
                  <li class="text-white mb-3">Powerful Website Metrics</li>
                  <li class="text-white mb-3">Free Custom Domain</li>
                  <li class="text-white mb-3">24/7 Customer Support</li>
                  <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
                  <li class="text-white mb-3">Sell unlimited Product</li>
                </ul>
                <a href="#" class="btn btn-outline-light">Try it now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <div class="card bottom-shape bg-secondary pt-4 pb-5">
              <div class="card-body text-center">
                <h4 class="text-white">Basic</h4>
                <p class="text-light mb-4">Besic and simple website</p>
                <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
                <ul class="list-unstyled mb-5">
                  <li class="text-white mb-3">Mobile-Optimized Website</li>
                  <li class="text-white mb-3">Powerful Website Metrics</li>
                  <li class="text-white mb-3">Free Custom Domain</li>
                  <li class="text-white mb-3">24/7 Customer Support</li>
                  <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
                  <li class="text-white mb-3">Sell unlimited Product</li>
                </ul>
                <a href="#" class="btn btn-outline-light">Try it now</a>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
            <div class="card bottom-shape bg-secondary pt-4 pb-5">
              <div class="card-body text-center">
                <h4 class="text-white">Basic</h4>
                <p class="text-light mb-4">Besic and simple website</p>
                <p class="text-white mb-4">$ <span class="display-3 font-weight-bold vertical-align-middle">30</span></p>
                <ul class="list-unstyled mb-5">
                  <li class="text-white mb-3">Mobile-Optimized Website</li>
                  <li class="text-white mb-3">Powerful Website Metrics</li>
                  <li class="text-white mb-3">Free Custom Domain</li>
                  <li class="text-white mb-3">24/7 Customer Support</li>
                  <li class="text-white mb-3">Fully Integrated E-Cormmerce</li>
                  <li class="text-white mb-3">Sell unlimited Product</li>
                </ul>
                <a href="#" class="btn btn-outline-light">Try it now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /pricing -->

    <!-- blog -->
    <section class="section">
      <div class="container">
        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>Latest News</h2>
            <div class="section-border"></div>
          </div>
        </div>
        <div class="row">
          <?php
          $ultimas_noticias = array_slice($noticias2, 0, 3);
          foreach ($ultimas_noticias as $noticia) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="card border-light rounded shadow-lg" style="height: 500px;">
                <img src="<?= $noticia['thumbnail'] ?>" alt="post-thumb" class="card-img-top rounded-circle mx-auto mt-3" style="width: 150px; height: 150px; object-fit: cover;">
                <div class="card-body text-center" style="height: 250px;">
                  <h4 class="card-title text-primary"><?= $noticia['title'] ?></h4>
                  <p class="text-muted"><?= date("F j, Y", strtotime($noticia['new_date'])) ?></p>
                  <p class="card-text"><?= $noticia['description'] ?></p>
                  <a href="blog-single.php?id=<?= $noticia['id'] ?>" class="btn btn-outline-primary mt-auto">Leer más</a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <!-- /blog -->

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