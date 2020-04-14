<?php 
	
	if (!isset($_SESSION['loginA'])) {
		header('Location: ../login');
		exit;
	}


 ?>