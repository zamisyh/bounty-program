<?php 
    
    session_start();
    include 'actions/sessions.php';
    include '../auth/inc/config.php';
    error_reporting(0);

    //Hitung Pending Report
    $sessionCredit = $_SESSION['credit'];
    $queryMO = mysqli_query($link, "SELECT * FROM bugs WHERE status = 'pending' AND credit = '$sessionCredit'");

    $dataMO = array();
    while (($row = mysqli_fetch_array($queryMO)) !== null) {
       $dataMO[] = $row;
    }

    $contMO = count($dataMO);



    //Hitung Success Reports
    $queryUR = mysqli_query($link, "SELECT * FROM bugs WHERE status = 'confirm' AND credit = '$sessionCredit'");
    $dataUR = array();
    while (( $row = mysqli_fetch_array($queryUR)) !== null) {
        $dataUR[] = $row;
    }

    $contUR = count($dataUR);

    //Hitung Rank Reports
    $sesionsUsername = $_SESSION['username'];
    $queryBR = mysqli_query($link, "SELECT vulnerbility, count(vulnerbility) AS jumlah FROM bugs WHERE status = 'confirm' GROUP BY vulnerbility ORDER BY jumlah DESC");
    $rowBR = mysqli_fetch_array($queryBR);

    //Hitung Top Bugs
    $dataTB = ['Sql Injection', 'CSRF', 'File Upload', 'XSS', 'SSRF', 'LFI', 'RFI', 'RCE', 'Miss Configuration', 'Brute Force', 'Url Poisoning', 'Html Injection', 'Dns Hijacking', 'Dns Poisoning', 'Bypass Admin', 'Click Jacking', 'File Discloure', 'Information Discloure', 'Parameter Pollution', 'Parameter Tampering', 'Directory Traversal'];

    $tb = mysqli_query($link, "SELECT id, count(credit) AS jumlah FROM bugs WHERE credit = '$sessionCredit' GROUP BY credit ORDER BY jumlah");
    $rowTB = mysqli_fetch_array($tb);

    //Hash Url 

    require_once '../hashids/lib/Hashids/HashGenerator.php';
    require_once '../hashids/lib/Hashids/Hashids.php';

    $hash = new Hashids\Hashids('this is my salt', 10, 'abcdefghijklmno123456789');

    

    
    

    


 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ExploiterID - Admin Dashboard">
    <meta name="author" content="NubyChan - www.codecrime.net">
    <meta name="keywords" content="ExploiterID">
    <link rel="icon" href="../assets/libs/images/exploiterid.png">

    <!-- Title Page-->
    <title>Dashboard Exid</title>

    <!-- Fontfaces CSS-->
    <link href="../assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../assets/libs/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/libs/css/theme.css" rel="stylesheet" media="all">
    <!-- DataTables Main -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- HighChart CSS -->
    <style type="text/css">
        .highcharts-figure, .highcharts-data-table table {
            min-width: 310px; 
            max-width: 800px;
            margin: 1em auto;
        }

        #container { 
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }
        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }
        .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
            padding: 0.5em;
        }
        .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }
        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

    </style>

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index">
                            <img src="../assets/libs/images/exploiterid.png" alt="exploiterid" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <a href="index">
                                <i class="fas fa-tachometer-alt"></i>Dasboard</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Your Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="reports">Report</a>
                                </li>
                                <li>
                                    <a href="submit">Submit</a>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="../assets/libs/images/exploiterid.png" alt="exploiterid" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="index">
                                <i class="fas fa-tachometer-alt"></i>Dasboard</a>
                        </li>
                         <li>
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Your Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="reports">Report</a>
                                </li>
                                <li>
                                    <a href="submit">Submit</a>
                                </li>
                            </ul>
                        </li>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-info"></i>
                                        <span class="quantity">1</span>
                                        <div class="email-dropdown js-dropdown">
                                            <div class="email__item">
                                                <div class="image img-cir img-40">
                                                    <img src="../assets/libs/images/exploiterid.png" alt="admin" />
                                                </div>
                                                <div class="content">
                                                    <p>Welcome to bounty <?= $_SESSION['username']; ?></p>
                                                    <span>NubyChan - Admin</span>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>
                                    <div class="noti__item js-item-menu">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">1</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            <div class="notifi__item">
                                                <div class="bg-c1 img-cir img-40">
                                                    <i class="zmdi zmdi-account-box"></i>
                                                </div>
                                                <div class="content">
                                                    <p>Your account has been created</p>
                                                    <span class="date"><?= $_SESSION['tgl_active']; ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="../assets/libs/images/icon/detective.png" alt="<?= $_SESSION['username']; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../assets/libs/images/icon/detective.png" alt="<?= $_SESSION['username']; ?>" />
                                                    </a>
                                                </div>
                                                
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?= $_SESSION['username']; ?></a>
                                                    </h5>
                                                    <span class="email"><?= $_SESSION['email']; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="account">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="account">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Dasboard</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check-circle-u"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?= $contUR; ?></h2>
                                                <span>Success Reports</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-info-outline"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?= $contMO; ?></h2>
                                                <span>Pending Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-bug"></i>
                                            </div>
                                            <div class="text">
                                                <h2>Top Bugs</h2>
                                                <span><?= $rowBR['vulnerbility']; ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-calendar-note"></i>
                                            </div>
                                            <div class="text">
                                                <h2><?= $rowTB['jumlah']; ?></h2>
                                                <span>Total Your Report</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <h2 class="title-1 m-b-25">Your Latest Report</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="example table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Risk</th>
                                                <th>Hacker Name</th>
                                                <th>Summary</th>
                                                <th>Type Vulnerbility</th>
                                                <th class="text-right">Date</th>
                                                <th class="text-right">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                //Latest Report
                                                $no = 1;
                                                $sessionIp = $_SESSION['ip'];
                                                $result = mysqli_query($link, "SELECT * FROM bugs WHERE ip = '$sessionIp' ORDER BY id DESC");   
                                                while ($rowReport = mysqli_fetch_array($result)) {
                                             ?>
                                            <tr>
                                                <td><?= $no; ?></td>
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
                                                        <p style="color: red;">Pending</p>
                                                    <?php endif ?>
                                                </td>
                                                <td><a style="color: black;" href="../author/<?= $rowReport['credit']; ?>"><?= $rowReport['credit']; ?></a></td>

                                                <!-- Get Data ID -->
                                                <?php  

                                                $getData = (($rowReport['id']*123456789*5678)/956783);
                                                 ?>
                                                 

                                                <td>
                                                    <?php if ($rowReport['status'] === 'pending'): ?>
                                                        <a style="color: black;" href="../pending/<?= urlencode(base64_encode($getData)) ?>"><?= $rowReport['summary']; ?></a>
                                                    <?php endif ?>
                                                    <?php if ($rowReport['status'] === 'confirm'): ?>
                                                        <a style="color: black;" href="../issue/<?= urlencode(base64_encode($getData)) ?>"><?= $rowReport['summary']; ?></a>
                                                    <?php endif ?>
                                                </td>

                                                <td>
                                                    <?php if ($rowReport['vulnerbility'] === ''): ?>
                                                        <p style="color: red;">Pending</p>
                                                    <?php endif ?>
                                                    <?= $rowReport['vulnerbility'] ?>
                                                </td>
                                                <td class="text-right"><?= $rowReport['date']; ?></td>

                                                <td class="text-right">
                                                    <?php if ($rowReport['status'] === 'pending'): ?>
                                                        <p style="color: red;">Pending</p>
                                                    <?php endif ?>
                                                    <?php if ($rowReport['status'] === 'confirm'): ?>
                                                        <p style="color: green;">Confirm</p>
                                                    <?php endif ?>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2019 ExploiterID</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="../assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/libs/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/libs/vendor/wow/wow.min.js"></script>
    <script src="../assets/libs/vendor/animsition/animsition.min.js"></script>
    <script src="../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../assets/libs/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../assets/libs/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../assets/libs/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/libs/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../assets/libs/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../assets/libs/js/main.js"></script>

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.example').DataTable();
        } );
    </script>


</body>

</html>
<!-- end document-->
