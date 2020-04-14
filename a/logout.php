<script src="../assets/libs/sweetalert/sweetalert.min.js"></script>
<style type="text/css">
    *{
        font-family: sans-serif;
    }
</style>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php 

	session_start();
	session_destroy();
    $id = $_SESSION['id'];
    include '../auth/inc/config.php';

    $queryActiveOFf = mysqli_query($link, "UPDATE users SET active = 'off' WHERE id = '$id'");

	 echo "<script type='text/javascript'>
            setTimeout(function () {  
                swal({
                    icon: 'success',
                    closeOnClickOutside: false,
                    closeOnEsc: false,
                    dangerMode: true,
                    className: 'red-bg',
                    buttons: false,
                    title: 'Logout Success',
                    text:  'Redirecting....',
                    type: 'success',
                    timer: 4000,
                    showConfirmButton: false
                    });  
                    },10); 
                    window.setTimeout(function(){ 
                     window.location.replace('../login');
                     } ,4000); 
            </script>";

 ?>