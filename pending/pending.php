<?php 
	
	session_start();
	include '../auth/inc/config.php';
	
	require_once '../hashids/lib/Hashids/HashGenerator.php';
    require_once '../hashids/lib/Hashids/Hashids.php';

    $hash = new Hashids\Hashids('this is my salt', 10, 'abcdefghijklmno123456789');

    $id = $_GET['id'];
    $decode = base64_decode(urldecode($id));
    $key = ((($decode*956783)/5678)/123456789);
   

	$result = mysqli_query($link, "SELECT * FROM bugs WHERE id = '$key'");
	$row = mysqli_fetch_array($result);


	//Anti maling url
	if (empty($row['id'])) {
 			header("Location: ../index");
 		}


 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="NubyChan - www.codecrime.net">
    <meta name="keywords" content="ExploiterID">
 	<title><?= $row['status'] ?> - <?= $row['credit'] ?></title>
 	<link rel="icon" href="../assets/libs/images/exploiterid.png">
 	<link rel="stylesheet" type="text/css" href="assets/libs/css/pending.css">
 	<script src="../assets/libs/sweetalert/sweetalert.min.js"></script>
 	<link href="../assets/libs/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">
 	<style type="text/css">
 		*{
 			font-family: sans-serif;
 		}
 		body{
 			background-color: gray;
 		}
 		.main{
 			padding: 50px;
 			position: absolute;
 			margin: auto;
		    top: 0; left: 0; bottom: 0; right: 0
 		}
 		.card #headerCard{
 			font-size: 30px;
 			text-align: center;
 			background-color: rgb(10, 100, 10);
 			color: white;
 			font-weight: bold;

 		}
 	</style>
 </head>
 <body>
 	
 	<?php if ($row['status'] === 'pending'): ?>
 		<div class="main">
 		<div class="card">
 			<div class="card-header" id="headerCard">Pending Notifications</div>
 			<div class="card-body" id="bodyCard">
 				Hallo <b><?= $_SESSION['username']; ?></b> maaf saat ini kami belum bisa menampilkan report bug dengan judul <b><?= $row['summary']; ?></b>, Saat ini status masih <b style="color: red;"><?= $row['status']; ?></b>, kami harap anda bisa menunggu beberapa menit dan tunggu hingga report bug kami confirm... kami membuat sistem ini supaya mencegah terjadinya spam terhadap server kami, anda bisa chat kami terkait keluhan ini. <a style="text-decoration: none; color: blue;" href="https://chat.whatsapp.com/JgjGzUWq1CMHH1aMEGtLr4">Disini</a>
 				<p style="font-weight: bold; margin-top: 30px;">ExploiterID</p>
 			</div>
 		</div>
 	</div>
 	<?php endif ?>
 	<?php if ($row['status'] === 'confirm'): ?>
 		<div class="main">
 		<div class="card">
 			<div class="card-header" id="headerCard">Success Notifications</div>
 			<div class="card-body" id="bodyCard">
 				Hallo <b><?= $row['credit']; ?></b>, saat ini report status bug anda sudah kami <b style="color: green"><?= $row['status']; ?></b>, kami harap anda bisa report bug di web kami lagi.. Terima Kasih 
 				<p style="margin-top: 10px">Url Anda : <a href="../issue/<?= $id ?>">https://bounty.exploiter.id/issue/<?= $id ?></a></p>
 				<p style="font-weight: bold; margin-top: 30px;">ExploiterID</p>
 			</div>
 		</div>
 	</div>
 	<?php endif ?>

 </body>
 </html>