<?php 
    
    session_start();
    include 'actions/sessions.php';
    include '../auth/inc/config.php';

    if (isset($_POST['register']) === true) {
        $level = 'admin';
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $confirm_password = htmlspecialchars($_POST['confirm_password']);
        $tgl = htmlspecialchars($_POST['tgl']);
        $ip = $_SERVER['REMOTE_ADDR'];

        if ($confirm_password !== $password) {
            echo '<script src="../assets/libs/sweetalert/sweetalert.min.js"></script>';
            echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Oppss, error',
                    text:  'Password yang anda masukkan tidak sama!',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('register-admin');
                     } ,4000); 
            </script>";

            return false;
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (id, username, email, tgl_active, password, ip, level) VALUES ('', '$username', '$email', '$tgl', '$hash', '$ip', '$level')";
        $result = mysqli_query($link, $query);

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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    

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
                            <li>
                            <a href="report">
                                <i class="fas fa-bug"></i>Bugs Detail</a>
                         </li>
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="member">Member Online</a>
                                </li>
                                <li>
                                    <a href="users-registered">Users Registered</a>
                                </li>
                                <li>
                                    <a href="register-admin">Tambah Admin</a>
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
                        <li>
                            <a href="report">
                                <i class="fas fa-bug"></i>Bugs Detail</a>
                         </li>
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-users"></i>Users Actions</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="member">Member Online</a>
                                </li>
                                <li>
                                    <a href="users-registered">Users Registered</a>
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
                        <div class="row m-t-30">
                            <div class="col-md-12">
                               
                               <div class="card">
                                   <div class="card-body">
                                     <?php if (isset($error)): ?>
                                        <div class="alert alert-danger">Oppss, the data you enter failed</div>
                                    <?php endif ?>
                                    <?php if (isset($success)): ?>
                                        <div class="alert alert-success">Your data was succesfully added</div>  
                                    <?php endif ?>
                                       <form method="post" action="">
                                          <div class="form-group">
                                            <input type="hidden" name="tgl" value="<?= date('F j, Y H:i'); ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input class="au-input au-input--full" type="text" name="username" placeholder="Username" required="" autofocus="" autocomplete="off" name="username" id="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required="" autocomplete="off" name="email" id="email">
                                            
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required="" autocomplete="off" name="password" id="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Confirm Password</label>
                                            <input class="au-input au-input--full" type="password" name="confirm_password" placeholder="Confirm Password" required="" autocomplete="off" name="confirm_password" id="confirm_password">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="register" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Tambah Admin</button>
                                        </div>
                                       </form>
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

    <!-- Main Datatables-->

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        } );
    </script>

    <script src="../assets/libs/vendor/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- Bootstrap Validate Main -->
    <script>
        bootstrapValidate('#username', 'min:5:Enter at least 5 characters');
        bootstrapValidate('#email', 'email:Enter a valid email address');
        bootstrapValidate('#password', 'min:6:Enter password more than 6 characters');
        bootstrapValidate('#confirm_password', 'matches:#password: Your password shoulds match!');
    </script>
    
</body>

</html>
<!-- end document-->
