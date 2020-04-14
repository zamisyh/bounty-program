<?php 
    
    session_start();
    include 'actions/sessions.php';
    include '../auth/inc/config.php';
    date_default_timezone_set('Asia/Jakarta');
    $idSessions = $_SESSION['id'];

    if (isset($_POST['submit']) === true) {
        $credit = htmlspecialchars($_POST['credit']);
        $summary = htmlspecialchars(strtolower($_POST['summary']));
        $cve = htmlspecialchars($_POST['cve']);
        $cwe = htmlspecialchars($_POST['cwe']);
        $remote = htmlspecialchars($_POST['remote']);
        $local = htmlspecialchars($_POST['local']);
        $ip = htmlspecialchars($_POST['ip']);
        $tanggal = htmlspecialchars($_POST['tanggal']);
        $isi = $_POST['isi'];
        $status = 'pending';
        $reference = htmlspecialchars($_POST['reference']);
        
        $sessionsCredit = $_SESSION['credit'] = $credit;

        $queryInsert = mysqli_query($link, "INSERT INTO bugs VALUES ('', '$credit', '$summary', '$cve', '$cwe', '$remote', '$local', '$ip', '$tanggal', '$isi', '', '', '$status', '$reference')");

       

        if (mysqli_affected_rows($link) > 0) {
            $success = true;
            echo '<meta http-equiv="refresh" content="2; url=reports">';
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
    <link href="../assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    
    <link href="../assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../assets/libs/css/theme.css" rel="stylesheet" media="all">

    


</head>

<body class="animsition">
    <div class="page-wrapper">

        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index">
                            <img src="../assets/libs/images/exploiterid.png" alt="ExploiterID" />
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
                <a href="index">
                    <img src="../assets/libs/images/exploiterid.png" alt="ExploiterID" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        
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
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">Submit Report</div>
                                    <div class="card-body card-block">
                                        <?php if (isset($success)): ?>
                                            <div class="alert alert-success">Submit Report anda berhasil di tambahkan, saat ini status anda masih pending</div>
                                        <?php endif ?>
                                        <?php if (isset($error)): ?>
                                            <div class="alert alert-danger">Submit Report anda gagal di tambahkan</div>
                                        <?php endif ?>
                                        <form method="post" action="">
                                            <div class="form-group">
                                                <label for="credit">Credit</label>
                                                <div class="input-group">
                                                    <input type="text" id="credit" name="credit" class="form-control" placeholder="Username" required pattern="[a-zA-Z0-9]+" autocomplete="off" autofocus="" oninvalid="this.setCustomValidity('Hanya di perbolehkan a-zA-Z0-9')">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="summary">Summary</label>
                                                <div class="input-group">
                                                    <input type="text" id="summary" name="summary" class="form-control" placeholder="Your Title" required autocomplete="off">
                                                </div>
                                            </div>
                                             <div class="form-group">
                                                <label for="cve">CVE</label>
                                                <div class="input-group">
                                                    <input type="text" id="cve" name="cve" class="form-control" autocomplete="off">
                                                </div>
                                                <p style="margin-top: 5px;">*Kosongkan bila tidak perlu</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="cwe">CWE</label>
                                                <div class="input-group">
                                                    <input type="text" id="cwe" name="cwe" class="form-control" autocomplete="off">
                                                </div>
                                                <p style="margin-top: 5px">*Kosongkan bila tidak perlu</p>
                                            </div>
                                            <div class="form-group">
                                                <label for="remote">Remote</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="remote" id="remote" required>
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="local">Local</label>
                                                <div class="input-group">
                                                    <select class="form-control" name="local" id="local" required>
                                                        <option value="no">No</option>
                                                        <option value="yes">Yes</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="hidden" name="ip" class="form-control" value="<?= $_SERVER['REMOTE_ADDR']; ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <input type="hidden" id="tanggal" name="tanggal" class="form-control" autocomplete="off" value="<?= date('F j, Y H:i'); ?>">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="isi">Text</label>
                                                <div class="input-group">
                                                    <textarea name="isi" id="isi" autocomplete="off" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="reference">Reference</label>
                                                <div class="input-group">
                                                    <input type="text" id="reference" name="reference" class="form-control" autocomplete="off">
                                                </div>
                                                <p style="margin-top: 5px">*Kosongkan bila tidak perlu</p>
                                        </div>
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="submit" name="submit" class="btn btn-success" value="Submit Report">
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
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
    <script src="../assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="../assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="../assets/libs/vendor/slick/slick.min.js">
    </script>
    <script src="../assets/libs/vendor/wow/wow.min.js"></script>
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
    <script src="../assets/libs/vendor/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- Main JS-->
    <script src="../assets/libs/js/main.js"></script>

    <!-- Regex -->
    <script>
        bootstrapValidate('#credit', 'regex:^[a-zA-Z0-9]+$:Only (Letters And Numbers)');
    </script>

    <!-- Ckeditor -->
   <script src="https://cdn.ckeditor.com/ckeditor5/15.0.0/classic/ckeditor.js"></script>

    <script type="text/javascript">
       ClassicEditor
        .create( document.querySelector( '#isi' ) )
        .catch( error => {
            console.error( error );
        } );
    </script>
   
</body>
</html>
<!-- end document-->
