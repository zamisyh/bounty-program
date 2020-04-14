<script src="../../assets/libs/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
    *{
        font-family: sans-serif;
    }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php 

	session_start();
    $sessionsAdmin = $_SESSION['loginA'];
    if ($sessionsAdmin !== true) {
       header("Location: ../../index");
       return false;
    }
	include '../../auth/inc/config.php';
	// include '../actions/sessions.php';
	$username = $_GET['username'];

	$query = mysqli_query($link, "DELETE FROM users WHERE username = '$username'");
	if ($query) {
		echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Data Successfully Delete',
                    text:  'Redirecting....',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('../users-registered');
                     } ,4000); 
            </script>";
	}else{
		echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'error',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Incorrect Delete This Data',
                    text:  'Redirecting....',
                    type: 'error',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('../users-registered');
                     } ,4000); 
            </script>";
	}
	exit;

 ?>