<?php 
    
    session_start();
    include 'auth/inc/config.php';
    error_reporting(0);

    $query = mysqli_query($link, "SELECT * FROM users");
    
    if (isset($_POST['submit']) === true) {
        $email = htmlspecialchars($_POST['email']);
        $username = htmlspecialchars($_POST['username']);

        //captcha
        $secret = '6LccN8IUAAAAADcvrOr5UnbOS_ouYofazJguxKsc';
        $verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseKeys = json_decode($verify);
        if ($responseKeys->success) {
            $query = mysqli_query($link, "SELECT * FROM users WHERE email = '$email' AND username = '$username'");
         if (mysqli_num_rows($query) === 1) {
            $new_password = htmlspecialchars(mysqli_real_escape_string($link, $_POST['new_password']));
             //fetch data 
            $fetch = mysqli_fetch_assoc($query);
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            $queryUpdate = mysqli_query($link, "UPDATE users SET password = '$new_password' WHERE email = '$email'");
            $success = true;
            echo '<meta http-equiv="refresh" content="3; url=login">';
        }else{
            $error = true;
            
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
    <meta name="description" content="ExploiterID - Forgot Password">
    <meta name="author" content="NubyChan - www.codecrime.net">
    <meta name="keywords" content="ExploiterID">

    <!-- Title Page-->
    <title>Forget Password</title>
    <!-- Captcha -->

    <script src="https://www.google.com/recaptcha/api.js"></script>

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

    <!-- Main CSS-->
    <link href="assets/libs/css/theme.css" rel="stylesheet" media="all">

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
                                    <?php if (isset($success)): ?>
                                        <div class="alert alert-success">Password successfully changed, please login again</div>
                                    <?php endif ?>
                                    <?php if (isset($error)): ?>
                                        <div class="alert alert-danger">Incorrect username or email, please check your account again</div>
                                    <?php endif ?>
                                    <?php if (isset($error_captcha)): ?>
                                        <div class="alert alert-danger">Captcha Error, you must click captcha if you not a robot!</div>
                                    <?php endif ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" id="email" autocomplete="off" autofocus="" required>
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" id="username" placeholder="Username" required autocomplete="off" required>
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New Password</label>
                                    <input class="au-input au-input--full" type="password" name="new_password" id="new_password" placeholder="New Password" autocomplete="off" required minlength="6">
                                </div>
                                <div class="form-group">
                                    <div class="g-recaptcha" data-sitekey="6LccN8IUAAAAADSnPnTs_2Ey6Sg9R189DpB_gaZ2"></div>
                                </div>
                                <div class="form-group">
                                    <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit" name="submit">submit</button>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="login">Sign In Here</a>
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
        bootstrapValidate('#email', 'required:Please fill out this field');
        bootstrapValidate('#username', 'required:Please fill out this field');
        bootstrapValidate('#new_password', 'min:6:Enter password more than 6 characters');
        bootstrapValidate('#new_password', 'required:Please fill out this field');
    </script>

    <!-- Main JS-->
    <script src="assets/libs/js/main.js"></script>

</body>

</html>
<!-- end document-->