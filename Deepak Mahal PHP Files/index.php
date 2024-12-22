<?php

session_start();

if (isset($_SESSION['name'])) {
  header('location: ./home.php');
  exit;
}

?>
<!doctype html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Login-Deepak Mahal CHS LTD</title>

  <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">

  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <link rel="stylesheet" href="assets/css/animate.css">

  <link rel="stylesheet" href="assets/css/magnific-popup.css">

  <link rel="stylesheet" href="assets/css/slick.css">

  <link rel="stylesheet" href="assets/css/LineIcons.css">

  <link rel="stylesheet" href="assets/css/default.css">

  <link rel="stylesheet" href="assets/css/style.css">

  <link rel="stylesheet" href="assets/css/responsive.css">
</head>

<body>
  <section id="contact" class="contact-area pt-115">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6">
          <div class="contact-title text-center">
            <h2 class="title">DEEPAK MAHAL CHS LTD</h2>
          </div>
        </div>
      </div>
      <div class="contact-box mt-70">
        <div class="row">
          <div class="col-lg-4">
            <div class="contact-info pt-25">
              <h4 class="info-title">Contact Info</h4>
              <ul>
                <li>
                  <div class="single-info mt-30">
                    <div class="info-icon">
                      <i class="lni-phone-handset"></i>
                    </div>
                    <div class="info-content">
                      <p><a href="tel:+91 98204 95959">+91 98204 95959</a></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-info mt-30">
                    <div class="info-icon">
                      <i class="lni-envelope"></i>
                    </div>
                    <div class="info-content">
                      <p><a href="mailto:deepakmahalchs@gmail.com">deepakmahalchs@gmail.com</a></p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="single-info mt-30">
                    <div class="info-icon">
                      <i class="lni-home"></i>
                    </div>
                    <div class="info-content">
                      <p>"DEEPAK" Plot No. 31. Worli Hill Road, Mumbai-400 018</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="contact-form">
              <?php if (isset($_SESSION['login_failed'])) : ?>
              <div class="alert">
                Incorrect username or password!
              </div>
              <?php
        unset($_SESSION['login_failed']);
      endif;
      ?>
              <form action="./auth.php" method="post" data-toggle="validator">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="single-form form-group">
                      <input type="text" name="username" placeholder="Enter Your Username"
                        data-error="Username is required." required="required">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="single-form form-group">
                      <input type="password" name="password" placeholder="Enter Your Password"
                        data-error="Password is required." required="required">
                      <div class="help-block with-errors"></div>
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div class="single-form form-group">
                      <button class="main-btn" name="submit" type="submit">LOG IN</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-copyright pt-15 pb-15">
      <div class="row">
        <div class="col-lg-12">
          <div class="copyright text-center">
            <p>Developed by <a href="https://www.theveenagroup.com/meeting.html" rel="nofollow" target="_blank">Veena
                Infotech</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section>
</body>

</html>