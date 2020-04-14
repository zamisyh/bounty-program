<?php 
    
    session_start();
    include '../actions/sessions.php';
    include '../../auth/inc/config.php';

    $id = $_GET['id'];
    if (isset($_POST['submit']) === true) {
        $vulnerbility = htmlspecialchars($_POST['vulnerbility']);
        $risk = htmlspecialchars($_POST['risk']);
        $status = htmlspecialchars($_POST['status']);

        $query = mysqli_query($link, "UPDATE bugs SET vulnerbility = '$vulnerbility', risk = '$risk', status = '$status' WHERE id = '$id'");

        if (mysqli_affected_rows($link) > 0) {
            $success = true;
        }else{
            $error = true;
        }
    }

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

    <!-- Title Page-->
    <title>Dashboard Exid</title>

    <!-- Fontfaces CSS-->
    <link href="../../assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../../assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../../assets/libs/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../../assets/libs/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index">
                            <img src="../../assets/libs/images/exploiterid.png" alt="ExploiterID" />
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
                            <a href="../index">
                                <i class="fas fa-tachometer-alt"></i>Dasboard</a>
                        </li>
                            <li>
                            <a href="../report">
                                <i class="fas fa-bug"></i>Bugs Detail</a>
                         </li>
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../member">Member Online</a>
                                </li>
                                <li>
                                    <a href="../users-registered">Users Registered</a>
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
                <a href="../index">
                    <img src="../../assets/libs/images/exploiterid.png" alt="ExploiterID" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
                        <li>
                            <a href="../index">
                                <i class="fas fa-tachometer-alt"></i>Dasboard</a>
                        </li>
                        <li>
                            <a href="../report">
                                <i class="fas fa-bug"></i>Bugs Detail</a>
                         </li>
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="../member">Member Online</a>
                                </li>
                                <li>
                                    <a href="../users-registered">Users Registered</a>
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
                                                    <img src="../../assets/libs/images/exploiterid.png" alt="admin" />
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
                                            <img src="../../assets/libs/images/icon/detective.png" alt="<?= $_SESSION['username']; ?>" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?= $_SESSION['username']; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="../../assets/libs/images/icon/detective.png" alt="<?= $_SESSION['username']; ?>" />
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
                                                    <a href="../account">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="../account">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="../logout">
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
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Detail Bug Report</div>
                                    <div class="card-body card-block">
                                         <?php 

                                             $result = mysqli_query($link, "SELECT * FROM bugs WHERE id = '$id'");
                                            while ($row = mysqli_fetch_array($result)) {

                                         ?>
                                            <div class="form-group">
                                                <label>Hackername</label>
                                                <div class="input-group">
                                                    <input type="text" id="username2" name="username2" placeholder="Username" class="form-control" value="<?= $row['credit']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Summary</label>
                                                <div class="input-group">
                                                    <input type="email" id="email2" name="email2" placeholder="Email" class="form-control" value="<?= $row['summary'] ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>CVE</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['cve']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>CWE</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['cwe']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Remote</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['remote']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Local</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['local']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>IP</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['ip']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Date</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['date']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Content</label>
                                                <div class="input-group">
                                                   <textarea rows="10" class="form-control" disabled><?= $row['isi']; ?></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>References</label>
                                                <div class="input-group">
                                                    <input type="text" id="tgl" name="password2" placeholder="tanggal" class="form-control" readonly value="<?= $row['reference']; ?>">
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">Edit Report</div>
                                    <div class="card-body card-block">
                                        <form action="" method="post" class="">
                                            <?php if (isset($success)): ?>
                                                <div class="alert alert-success">Your data successfully changed</div>
                                            <?php endif ?>
                                            <?php if (isset($error)): ?>
                                                <div class="alert alert-danger">Incorrect edit report</div>
                                            <?php endif ?>
                                            <div class="form-group">
                                                <label for="vulnerbility">Vulnerbility</label>
                                                    <select class="form-control" name="vulnerbility">
                                                        <option value="<?= $row['vulnerbility'] ?>"><?= $row['vulnerbility']; ?></option>
                                                        <option value="CSRF">CSRF</option>
                                                        <option value="File Upload">File Upload</option>
                                                        <option value="XSS">XSS</option>
                                                        <option value="SSRF">SSRF</option>
                                                        <option value="LFI">LFI</option>
                                                        <option value="RFI">RFI</option>
                                                        <option value="RCE">RCE</option>
                                                        <option value="SQL Injection">Sql Injection</option>
                                                        <option value="Miss Configuration">Miss Configuration</option>
                                                        <option value="Brute Force">Brute Force</option>
                                                        <option value="Url Poisoning">Url Poisoning</option>
                                                        <option value="Html Injection">Html Injection</option>
                                                        <option value="Dns Hijacking">Dns Hijacking</option>
                                                        <option value="Dns Poisoning">Dns Poisoning</option>
                                                        <option value="Bypass Admin">Bypass Admin</option>
                                                        <option value="Click Jacking">Click Jacking</option>
                                                        <option value="File Discloure">File Discloure</option>
                                                        <option value="Information Discloure">Information Discloure</option>
                                                        <option value="Parameter Pollution">Parameter Pollution</option>
                                                        <option value="Parameter Tampering">Parameter Tampering</option>
                                                        <option value="Directory Traversal">Directory Traversal</option>
                                                        <option value="Path Traversal">Path Traversal</option>
                                                        <option value="Other">Other</option>
                                                    </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="risk">Risk</label>
                                                <select name="risk" class="form-control" required>
                                                    <option value="low">Low</option>
                                                    <option value="med">Med</option>
                                                    <option value="high">High</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="status">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="pending">Pending</option>
                                                    <option value="confirm">Confirm</option>
                                                </select>
                                            </div>
                                            <div class="form-actions form-group">
                                                <button type="submit" class="btn btn-success btn-sm" name="submit" onclick="confirm('Are you sure you want to change this data?')">Change</button>
                                            </div>
                                        </form>
                                    <?php } ?>
                                    </div>
                                </div>
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
    <script src="../../assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../../assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../../assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../../assets/libs/vendor/slick/slick.min.js">
    </script>
    <script src="../../assets/libs/vendor/wow/wow.min.js"></script>
    <script src="../../assets/libs/vendor/animsition/animsition.min.js"></script>
    <script src="../../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="../../assets/libs/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="../../assets/libs/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="../../assets/libs/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="../../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/libs/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="../../assets/libs/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="../../assets/libs/js/main.js"></script>

</body>

</html>
<!-- end document-->
