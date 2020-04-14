<?php 

session_start();
error_reporting(0);

include 'auth/inc/config.php';

    // Query Best Hacker
$sqlBH = mysqli_query($link, "SELECT credit, count(credit) AS jumlah FROM bugs WHERE status = 'confirm' GROUP BY credit ORDER BY jumlah DESC LIMIT 1");
$rowBH = mysqli_fetch_array($sqlBH);

    //Top Bugs
$sqlBG = mysqli_query($link, "SELECT vulnerbility, count(vulnerbility) AS jumlah FROM bugs WHERE status = 'confirm' GROUP BY vulnerbility ORDER BY jumlah DESC LIMIT 1");
$rowBG = mysqli_fetch_array($sqlBG);

    //Bugs Reported
$sqlBR = mysqli_query($link, "SELECT * FROM bugs");
$dataBR = array();
while (( $rowBR = mysqli_fetch_array($sqlBR)) !== null) {
    $dataBR[] = $rowBR;
}

$conBR = count($dataBR);

    //Hitung User Registrasi
$queryUR = mysqli_query($link, "SELECT * FROM users");
$dataUR = array();
while (( $row = mysqli_fetch_array($queryUR)) !== null) {
    $dataUR[] = $row;
}

$conUR = count($dataUR);

    //Hitung Online
$sqlOnline = mysqli_query($link, "SELECT * FROM users WHERE status = 'on'");
$dataOnline = array();
while (($rowOnline = mysqli_fetch_array($sqlOnline))) {
    $dataOnline[] = $rowOnline;
}

$conOnline = count($dataOnline);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>ExploiterID Bounty - Home</title>

    <!-- Favicon -->
    <link rel="icon" href="assets/libs/images/exploiterid.png">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="assets/index-style/css/responsive.css">
    <link href="assets/libs/css/theme.css" rel="stylesheet" media="all">

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
                    <h2 style="margin-top: -80%;">Welcome To Home ExploiterID Programs</h2>
                    <h4>With this bounty program, we hope you can do better, you can insert or write bugs that you have found</h4>
                    <!-- <a style="margin-top: 5%;" href="register" class="btn btn-success">Get Started</a> -->
                </div>
            </div>
        </div>
    </section>
</div>
<!-- ***** Welcome Area End ***** -->



<!-- ***** Clients Area End ***** -->

<!-- ***** Service Area Start ***** -->
<section class="mosh-more-services-area d-sm-flex clearfix">
    <div class="single-more-service-area">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".1s">
            <img src="assets/index-style/img/core-img/top.png" alt="">
            <h4>Best Hacker</h4>
            <p><a style="color: #a0a0a0;" href="author/<?= $rowBH['credit']; ?>"><?= $rowBH['credit']; ?></a></p>
        </div>
    </div>
    <div class="single-more-service-area">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".4s">
            <img src="assets/index-style/img/core-img/bug.png" alt="">
            <h4>Top Bugs</h4>
            <p><?= $rowBG['vulnerbility']; ?></p>
        </div>
    </div>
    <div class="single-more-service-area">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay=".7s">
            <img src="assets/index-style/img/core-img/serverbug.png" alt="">
            <h4>Bugs Reported</h4>
            <p><?= $conBR; ?></p>
        </div>
    </div>
    <div class="single-more-service-area">
        <div class="more-service-content text-center wow fadeInUp" data-wow-delay="1s">
            <img src="assets/index-style/img/core-img/hacker.png" alt="">
            <h4>Users Registered</h4>
            <p><?= $conUR; ?></p>
        </div>
    </div>
</section>
<!-- ***** Service Area End ***** -->

<div class="section-heading text-center">
    <p>Latest Bugs Report</p>
    <h2>This Is Latest Bugs Report</h2>
</div>
<div class="row">
    <div class="col-lg-12" style="padding: 30px;">
     <div class="table-responsive table--no-card m-b-40">
         <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Risk</th>
                    <th>Hacker Name</th>
                    <th>Summary</th>
                    <th>Type Vulnerbility</th>
                    <th class="text-right">Date</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                $resultReport = mysqli_query($link, "SELECT * FROM bugs WHERE status = 'confirm' ORDER BY id DESC LIMIT 10");
                while ($rowReport = mysqli_fetch_array($resultReport)) {

                 ?>
                 <tr>
                    <td>
                        <?php if ($rowReport['risk'] === 'low'): ?>
                            <div class="btn btn-success btn-sm">Low</div>
                        <?php endif ?>
                        <?php if ($rowReport['risk'] === 'med'): ?>
                            <div class="btn btn-warning btn-sm" style="color: white;">Med</div>
                        <?php endif ?>
                        <?php if ($rowReport['risk'] === 'high'): ?>
                            <div class="btn btn-danger btn-sm">High</div>
                        <?php endif ?>
                        <?php if ($rowReport['risk'] === ''): ?>
                            -
                        <?php endif ?>
                    </td>

                    <td><a style="color: black;" href="author/<?= $rowReport['credit']; ?>"><?= $rowReport['credit']; ?></a></td>

                    
                    <td>
                        <?php $getData = (($rowReport['id']*123456789*5678)/956783); ?>
                        <?php if ($rowReport['status'] === 'confirm'): ?>
                            <a style="color: black;" href="issue/<?= urlencode(base64_encode($getData)) ?>"><?= $rowReport['summary']; ?></a>
                        <?php endif ?>
                    </td>
                    <td><?= $rowReport['vulnerbility']; ?></td>
                    <td class="text-right"><?= $rowReport['date']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>
</div>


<!-- ***** Workflow Area Start ***** -->
<section class="mosh-workflow-area section_padding_100_0 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mb-0">
                    <p>Our Work Flow</p>
                    <h2>This is how we work on Projects</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="workflow-img">
        <img src="assets/index-style/img/core-img/work-progress.png" alt="">
    </div>

    <div class="workflow-slides-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mosh-workflow-slides owl-carousel">
                        <!-- Single Service Area -->
                        <div class="single-workflow-area d-flex">
                            <h2>1.</h2>
                            <div class="workflow-content ml-15">
                                <h4>This is the first step</h4>
                                <p>Jika anda ingin report bug, pastikan bug yang anda tulis sudah benar, di larang spam</p>
                            </div>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-workflow-area d-flex">
                            <h2>2.</h2>
                            <div class="workflow-content ml-15">
                                <h4>This is the second step</h4>
                                <p>Pastikan kalian mengetahui apa dan penyebabnya anda report bug beserta detail dan kerentannya</p>
                            </div>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-workflow-area d-flex">
                            <h2>3.</h2>
                            <div class="workflow-content ml-15">
                                <h4>This is the third step</h4>
                                <p>Jika langkah di atas sudah terpenuhi, anda sekarang bisa register bagi pengguna baru</p>
                            </div>
                        </div>
                        <!-- Single Service Area -->
                        <div class="single-workflow-area d-flex">
                            <h2>4.</h2>
                            <div class="workflow-content ml-15">
                                <h4>This is the fourth step</h4>
                                <p>Pelaportan bugs tidak support gambar, jadi kalian hanya bisa menulis, tanpa upload gambar</p>
                            </div>
                        </div>
                        <div class="single-workflow-area d-flex">
                            <h2>5.</h2>
                            <div class="workflow-content ml-15">
                                <h4>This is the Five step</h4>
                                <p>Jika anda sudah submit bugs, tunggulah beberapa menit sampai pihak kami mengkonfirmasi terkait bug yang anda laporkan</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Service Area End ***** -->

<!-- ***** Clients Area Start ***** -->
<section class="mosh-clients-area section_padding_100 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <p>Our Team</p>
                    <h2>Thanks For Support</h2>
                </div>
            </div>
            <div class="col-12">
                <div class="clients-logo-area d-sm-flex align-items-center justify-content-between">
                    <a href="https://www.codecrime.net"><img src="assets/index-style/img/clients-img/codecrime.png" alt=""></a>
                    <a href="http://indosec.id"><img src="assets/index-style/img/clients-img/indosec.png" alt=""></a>
                    <a href="https://anoncyberteam.or.id/"><img src="assets/index-style/img/clients-img/act.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>




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
</body>

</html>