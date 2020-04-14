<?php 

session_start();
error_reporting(0);

include 'auth/inc/config.php';

 



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>ExploiterID Bounty - Best Hacker</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/libs/images/exploiterid.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/index-style/css/responsive.css">
    <link href="assets/libs/css/theme.css" rel="stylesheet" media="all">
    <!-- DataTables Main -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css"> -->

</head>

<body>
    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="mosh-preloader"></div>
    </div>

    <!-- ***** Header Area Start ***** -->
    <header class="header_area clearfix">
        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Menu Area Start -->
                <div class="col-12 h-100">
                    <div class="menu_area h-100">
                        <nav class="navbar h-100 navbar-expand-lg align-items-center">
                            <!-- Logo -->
                            <a class="navbar-brand" href="index"><img src="assets/libs/images/exploiterid.png" alt="logo"></a>

                            <!-- Menu Area -->
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mosh-navbar" aria-controls="mosh-navbar" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

                            <div class="collapse navbar-collapse justify-content-end" id="mosh-navbar">
                                <ul class="navbar-nav animated" id="nav">
                                    <?php if ($_SESSION['loginA']): ?>
                                        <li class=""><a class="nav-link" href="a/index">Dasboard</a></li>
                                    <?php endif ?>
                                    <?php if ($_SESSION['loginU']): ?>
                                        <li class=""><a class="nav-link" href="u/index">Dasboard</a></li>
                                    <?php endif ?>
                                    <?php if (!$_SESSION['loginA'] && !$_SESSION['loginU']): ?>
                                        <li class=""><a class="nav-link" href="index">Home</a></li>
                                    <?php endif ?>
                                    <li class="nav-item"><a class="nav-link" href="report">Report</a></li>
                                    <li class="nav-item"><a class="nav-link" href="best">Best Hacker</a></li>
                                    <li class="nav-item"><a class="nav-link" href="bugs">Top Bugs</a></li>
                                    <li class="nav-item"><a class="nav-link" href="login">Submit</a></li>
                                    
                                </ul>
                                <!-- Search Form Area Start -->
                                <div class="search-form-area animated">
                                    <form action="#" method="post">
                                        <input type="search" name="search" id="search" placeholder="Type keywords &amp; hit enter">
                                        <button type="submit" class="d-none"><img src="assets/index-style/img/core-img/search-icon.png" alt="Search"></button>
                                    </form>
                                </div>
                                <!-- Search btn -->
                                <div class="search-button">
                                    <a href="#" id="search-btn"><img src="assets/index-style/img/core-img/search-icon.png" alt="Search"></a>
                                </div>
                                <!-- Login/Register btn -->
                                <div class="login-register-btn">
                                    <?php if ($_SESSION['loginA']): ?>
                                        <a href="a/logout">Logout</a>
                                    <?php endif ?>
                                    <?php if ($_SESSION['loginU']): ?>
                                        <a href="u/logout">Logout</a>
                                    <?php endif ?>
                                    <?php if (!$_SESSION['loginA'] && !$_SESSION['loginU']): ?>
                                        <a href="login">Login</a>
                                        <a href="register">/ Register</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->


    <!-- ***** Welcome Area Start ***** -->
    
    <section class="welcome_area clearfix" id="home" style="background-image: url(assets/index-style/img/bg-img/welcome-bg.png)">
        <div class="hero-slides owl-carousel">
            <!-- Single Hero Slides -->
            <div class="single-hero-slide d-flex align-items-end justify-content-center">
                <div class="hero-slide-content text-center">
                    <h2 style="margin-top: -80%;">Welcome To The Best ExploiterID Programs</h2>
                    <h4>on this page you can see some of the 30 best hackers</h4>
                    <!-- <a style="margin-top: 5%;" href="register" class="btn btn-success">Get Started</a> -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ***** Welcome Area End ***** -->

<div class="section-heading text-center">
    <p>Best Hackers</p>
    <h2>Here are some of the best hacker views</h2>
</div>
<div class="row">
    <div class="col-lg-12" style="padding: 30px;">
     <div class="table-responsive table--no-card m-b-40">
         <table class="example table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Hacker Name</th>
                    <th>Total Report</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                    $no = 1;
                    $result = mysqli_query($link, "SELECT credit, count(credit) AS jumlah FROM bugs WHERE status = 'confirm' GROUP BY credit ORDER BY jumlah DESC LIMIT 30");
                    while ($rowReport = mysqli_fetch_array($result)) {

                 ?>
                 <tr>
                    <td><?= $no; ?></td>
                    <td><a style="color: black;" href="author/<?= $rowReport['credit']; ?>"><?= $rowReport['credit']; ?></a></td>
                    <td><?= $rowReport['jumlah']; ?></td>
                </tr>
                <?php $no++; ?>
            <?php } ?>
            
        </tbody>
    </table>
</div>
</div>
</div>

<!-- ***** Footer Area Start ***** -->
<footer class="footer-area clearfix">
    <!-- Top Fotter Area -->
    <div class="top-footer-area section_padding_100_0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <a href="#" class="mb-50 d-block"><img src="assets/libs/images/exploiterid.png" alt=""></a>
                        <p>With this bounty, we make it easy for indonesian bug hunters
                        to report bugs against websites and other vulnerbilities</p>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="single-footer-widget mb-100">
                        <h5>Contact Info</h5>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="assets/index-style/img/core-img/map.png" alt="">
                            </div>
                            <p>Jabodetabek</p>
                        </div>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="assets/index-style/img/core-img/call.png" alt="">
                            </div>
                            <p>Main: 6289602362015 <br> Main2: 6281285302139 <br>Grup: <a href="https://chat.whatsapp.com/JgjGzUWq1CMHH1aMEGtLr4">Whatsapp</a></p>
                        </div>
                        <div class="footer-single-contact-info d-flex">
                            <div class="contact-icon">
                                <img src="assets/index-style/img/core-img/message.png" alt="">
                            </div>
                            <p>admin@bounty.exploiter.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fotter Bottom Area -->
    <div class="footer-bottom-area">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-12 h-100">
                    <div class="footer-bottom-content h-100 d-md-flex justify-content-between align-items-center">
                        <div class="copyright-text">
                            <p>
                                <!-- Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a> -->

                                Copyright &copy; by <a href="https://exploiter.id" target="_blank" style="color: white;">ExploiterID</a>
                            </p>
                        </p>
                    </div>
                    <!-- <div class="footer-social-info">
                        <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</div>
</footer>
<!-- ***** Footer Area End ***** -->

<!-- jQuery-2.2.4 js -->
<script src="assets/index-style/js/jquery-2.2.4.min.js"></script>
<!-- Popper js -->
<script src="assets/index-style/js/popper.min.js"></script>
<!-- Bootstrap js -->
<script src="assets/index-style/js/bootstrap.min.js"></script>
<!-- All Plugins js -->
<script src="assets/index-style/js/plugins.js"></script>
<!-- Active js -->
<script src="assets/index-style/js/active.js"></script>

<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js" charset="utf-8"></script>
<script type="text/javascript">
  particlesJS.load('particles-js','particles.json', function() {
    console.log('particles.json loaded...');
})
</script>
    
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.example').DataTable();
        } );
    </script>
</body>

</html>