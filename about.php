<!DOCTYPE html>
<html lang="en">
<?php
session_start(); // Start the session
$_SESSION['pageTitle'] = "About"; // Set the session variable

 include("./globals/head.php");
 ?>

  <body class="tt-magic-cursor">
    <div class="egns-preloader">
      <div class="preloader-close-btn">
        <span><i class="bi bi-x-lg"></i> Close</span>
      </div>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <div class="col-6">
            <div class="circle-border">
              <div class="moving-circle"></div>
              <div class="moving-circle"></div>
              <div class="moving-circle"></div>
              <svg
                width="180px"
                height="150px"
                viewbox="0 0 187.3 93.7"
                preserveaspectratio="xMidYMid meet"
                style="
                  left: 50%;
                  top: 50%;
                  position: absolute;
                  transform: translate(-50%, -50%) matrix(1, 0, 0, 1, 0, 0);
                "
              >
                <path
                  stroke="#D90A2C"
                  id="outline"
                  fill="none"
                  stroke-width="4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-miterlimit="10"
                  d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z"
                />
                <path
                  id="outline-bg"
                  opacity="0.05"
                  fill="none"
                  stroke="#959595"
                  stroke-width="4"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-miterlimit="10"
                  d="M93.9,46.4c9.3,9.5,13.8,17.9,23.5,17.9s17.5-7.8,17.5-17.5s-7.8-17.6-17.5-17.5c-9.7,0.1-13.3,7.2-22.1,17.1 c-8.9,8.8-15.7,17.9-25.4,17.9s-17.5-7.8-17.5-17.5s7.8-17.5,17.5-17.5S86.2,38.6,93.9,46.4z"
                />
              </svg>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("./globals/popups/signup.php")?>

<?php include("./globals/popups/login.php")?>

<?php include("./globals/popups/sellyourcar.php")?>

<?php include("./globals/popups/advancedsearch.php")?>

<?php include("./globals/header.php")?>

    <div class="inner-page-banner">
      <div class="banner-wrapper">
        <div class="container-fluid">
          <ul class="breadcrumb-list">
            <li><a href="index.html">Home</a></li>
            <li>About</li>
          </ul>
          <div class="banner-main-content-wrap">
            <div class="row">
              <div class="col-xl-6 col-lg-7 d-flex align-items-center">
                <div class="banner-content">
                  <span class="sub-title"> About Us </span>
                  <h1>Our Brief History</h1>
                  <div class="customar-review">
                    <ul>
                      <li>
                        <a href="#">
                          <div class="review-top">
                            <div class="logo">
                              <img
                                src="assets/img/home1/icon/trstpilot-logo.svg"
                                alt
                              />
                            </div>
                            <div class="star">
                              <img
                                src="assets/img/home1/icon/trustpilot-star.svg"
                                alt
                              />
                            </div>
                          </div>
                          <div class="content">
                            <ul>
                              <li>Trust Rating <span>5.0</span></li>
                              <li><span>2348</span> Reviews</li>
                            </ul>
                          </div>
                        </a>
                      </li>
                      <li>
                        <a href="#">
                          <div class="review-top">
                            <div class="logo">
                              <img
                                src="assets/img/home1/icon/google-logo.svg"
                                alt
                              />
                            </div>
                            <div class="star">
                              <ul>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-half"></i></li>
                              </ul>
                            </div>
                          </div>
                          <div class="content">
                            <ul>
                              <li>Trust Rating <span>5.0</span></li>
                              <li><span>2348</span> Reviews</li>
                            </ul>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <div
                class="col-xl-6 col-lg-5 d-lg-flex d-none align-items-center justify-content-end"
              >
                <div class="banner-img">
                  <img src="assets/img/inner-page/inner-banner-img.png" alt />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="welcome-banner-section pb-100 pt-100">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="welcome-wrap text-center">
              <div
                class="section-title1 text-center wow fadeInUp"
                data-wow-delay="200ms"
              >
                <span>(Since-1994)</span>
                <h2>Welcome To Drivco</h2>
              </div>
              <div class="welcome-content wow fadeInUp" data-wow-delay="300ms">
                <p>
                  We're passionate car agency<br />
                  we're thrilled to have you join our community of automotive
                  enthusiasts and professionals. Whether you're a passionate
                  driver, a car owner, or someone who loves all things
                  automotive, you've come to the right place.At Drivco, we
                  strive to create a space where people can connect, share
                  knowledge, and explore the exciting world of automobiles. From
                  discussing the latest car models and technologies to sharing
                  driving tips and tricks, we're here to fuel your love for
                  everything on wheels.Feel free to ask any questions you have,
                  seek advice, or simply engage in friendly conversations with
                  fellow members. Our community is full of experts and
                  enthusiasts who are eager to share their insights and
                  experiences. Buckle up and enjoy your journey with Drivco!
                </p>
              </div>
              <div class="author-area wow fadeInUp" data-wow-delay="400ms">
                <img src="assets/img/inner-page/signature.svg" alt />
                <h6>Natrison Mongla</h6>
                <span>(CEO & Founder)</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("./globals/sections/whychoose.php")?>


    <div class="how-it-work-section mb-20">
      <div class="container">
        <div class="row mb-50 wow fadeInUp" data-wow-delay="200ms">
          <div
            class="col-lg-12 d-flex align-items-end justify-content-between gap-3 flex-wrap"
          >
            <div class="section-title-2">
              <h2>How Does It Work</h2>
              <p>Here are some of the featured cars in different categories</p>
            </div>
            <div class="video-btn">
              <a
                class="video-popup"
                href="https://www.youtube.com/watch?v=u31qwQUeGuM&pp=ygURcGxhY2Vob2xkZXIgdmlkZW8%3D"
                ><i class="bi bi-play-circle"></i> Watch video</a
              >
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="300ms">
          <div class="col-lg-12">
            <div class="work-process-group">
              <div class="row justify-content-center g-lg-0 gy-5">
                <div class="col-lg-3 col-sm-6">
                  <div class="single-work-process text-center">
                    <div class="step">
                      <span>01</span>
                    </div>
                    <div class="icon">
                      <img src="assets/img/home2/icon/loaction.svg" alt />
                    </div>
                    <div class="content">
                      <h6>Choose Any where</h6>
                      <p>
                        Car servicing is the regular maintenance and inspection
                        of a vehicle to ensure.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="single-work-process text-center">
                    <div class="step">
                      <span>02</span>
                    </div>
                    <div class="icon">
                      <img src="assets/img/home2/icon/contact.svg" alt />
                    </div>
                    <div class="content">
                      <h6>Contact With Us</h6>
                      <p>
                        Car servicing is the regular maintenance and inspection
                        of a vehicle to ensure.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="single-work-process text-center">
                    <div class="step">
                      <span>03</span>
                    </div>
                    <div class="icon">
                      <img src="assets/img/home2/icon/pay.svg" alt />
                    </div>
                    <div class="content">
                      <h6>Pay For The Car</h6>
                      <p>
                        Car servicing is the regular maintenance and inspection
                        of a vehicle to ensure.
                      </p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                  <div class="single-work-process text-center">
                    <div class="step">
                      <span>04</span>
                    </div>
                    <div class="icon">
                      <img src="assets/img/home2/icon/recieve.svg" alt />
                    </div>
                    <div class="content">
                      <h6>Recieve The Car</h6>
                      <p>
                        Car servicing is the regular maintenance and inspection
                        of a vehicle to ensure.
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row wow fadeInUp" data-wow-delay="400ms">
          <div class="col-lg-12 d-flex justify-content-center">
            <div class="trustpilot-review">
              <strong>Excellent!</strong>
              <img src="assets/img/home1/icon/trustpilot-star2.svg" alt />
              <p>
                5.0 Rating out of <strong>5.0</strong> based on
                <a href="#"><strong>245354</strong> reviews</a>
              </p>
              <img src="assets/img/home1/icon/trustpilot-logo.svg" alt />
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include("./globals/sections/feedback.php")?>
   

    <?php include("./globals/footer.php")?>

    
  </body>
</html>
