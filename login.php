<script src="assets/libs/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
    *{
        font-family: sans-serif;
    }
</style>
<?php 

    session_start();
    include 'auth/inc/config.php';
    error_reporting(0);
    if (isset($_SESSION['loginA'])) {
        header('Location: a/index');
        exit;
    }

    if (isset($_SESSION['loginU'])) {
        header('Location: u/index');
        exit;
    }

    if (isset($_POST['submit']) === true) {
       $email = htmlspecialchars($_POST['email']);
       $password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['password']));
       $queryBugs = mysqli_query($link, "SELECT * FROM bugs");
       $rowBugs = mysqli_fetch_array($queryBugs);

       $secret = '6LccN8IUAAAAADcvrOr5UnbOS_ouYofazJguxKsc';
       $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
       $responseKeys = json_decode($verify);
       if ($responseKeys->success) {

           $sessionCredit = $_SESSION['credit'];
           $sessionIp = $_SESSION['ip'];
           $result = mysqli_query($link, "SELECT * FROM users WHERE email = '$email'");
           $resultBugs = mysqli_query($link, "SELECT * FROM bugs WHERE credit = '$sessionCredit'");
       if (mysqli_num_rows($result) === 1) {
           
           $rowBugs = mysqli_fetch_assoc($resultBugs);
           $row = mysqli_fetch_assoc($result);
           if (password_verify($password, $row['password'])) {
               if ($row['level'] === 'admin') {
                //set session untuk level
                   $_SESSION['id'] = $row['id'];
                   $_SESSION['sesReportId'] = $row['id'];
                   $_SESSION['loginA'] = true;
                   $_SESSION['email'] = $row['email'];
                   $_SESSION['username'] = $row['username'];
                   $_SESSION['password'] = $row['password'];
                   $_SESSION['level'] = $row['level'];
                   $_SESSION['tgl_active'] = $row['tgl_active'];
                   

                   $activeON = mysqli_query($link, "UPDATE users SET active = 'on' WHERE email = '$email'");

                   echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.success("Succesfully Login, redirecting...", "Success")
                    });

                    </script>';
                 echo '<meta http-equiv="refresh" content="5; url=a/index">';
               }else if($row['level'] === 'users'){
                //set session untuk user
                   $_SESSION['id'] = $row['id'];
                   $_SESSION['sesReportId'] = $row['id'];
                   $_SESSION['loginU'] = true;
                   $_SESSION['email'] = $row['email'];
                   $_SESSION['username'] = $row['username'];
                   $_SESSION['password'] = $row['password'];
                   $_SESSION['level'] = $row['level'];
                   $_SESSION['tgl_active'] = $row['tgl_active'];
                   if ($_SESSION['credit']) {
                       $_SESSION['credit'] = $rowBugs['credit'];
                   }else{
                    $_SESSION['credit'] = $rowBugs['credit'];
                   }

                   $activeON = mysqli_query($link, "UPDATE users SET active = 'on' WHERE email = '$email'");

                   echo '<script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>';
                    echo '<script>

                        $(document).ready(function(){
                            toastr.options = {
                              "closeButton": true,
                              "newestOnTop": false,
                              "progressBar": true,
                              "positionClass": "toast-top-right",
                              "showDuration": "1000",
                              "hideDuration": "1000",
                              "timeOut": "5000",
                              "extendedTimeOut": "1000",
                        }

                        toastr.success("Successfully Login, redirecting...", "Success")
                    });

                    </script>';
                 echo '<meta http-equiv="refresh" content="5; url=u/index">';
               }
         }else{
        $error = true;
       }
       }
    }else{
        $error_captcha = true;
    }
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="ExploiterID - Login Page">
    <meta name="author" content="NubyChan - www.codecrime.net">
    <meta name="keywords" content="ExploiterID">
    <link rel="icon" href="assets/libs/images/exploiterid.png">
    <!-- Captcha -->

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="assets/libs/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="assets/libs/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.min.css">

    <!-- Main CSS-->
    <link href="assets/libs/css/theme.css" rel="stylesheet" media="all">

    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="assets/libs/vendor/toastr/toastr.css">


</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/libs/images/exploiterid.png" alt="ExploiterID">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger">Incorrect username or password, please check your account again</div>
                                    <?php endif ?>
                                    <?php if (isset($error_captcha)): ?>
                                        <div class="alert alert-danger">Captcha Error, you must click captcha if you not a robot!</div>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" autocomplete="off" autofocus="" required="" id="email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password" autocomplete="off" required="" id="password">
                                </div>
                                <div class="form-group">
                                     <div class="g-recaptcha" data-sitekey="6LccN8IUAAAAADSnPnTs_2Ey6Sg9R189DpB_gaZ2"></div>
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="forgot-password">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button type="submit" class="au-btn au-btn--block au-btn--green m-b-20" name="submit">sign in</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="register">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/libs/vendor/jquery-3.2.1.min.js"></script>
    <script src="assets/libs/vendor/toastr/toastr.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/libs/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/libs/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/libs/vendor/slick/slick.min.js">
    </script>
    <script src="assets/libs/vendor/wow/wow.min.js"></script>
    <script src="assets/libs/vendor/animsition/animsition.min.js"></script>
    <script src="assets/libs/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/libs/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/libs/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/libs/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/libs/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/libs/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/libs/vendor/select2/select2.min.js">
    </script>
    <script src="assets/libs/vendor/bootstrap-validate/bootstrap-validate.js"></script>

    <!-- Bootstrap Validate Main -->
    <script>
        bootstrapValidate('#email', 'email:Enter a valid email address');
    </script>
    <!-- Main JS-->
    <script src="assets/libs/js/main.js"></script>

</body>

</html>
<!-- end document-->