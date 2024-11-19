<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>

<head>
	<meta charset="UTF-8">

	<title>GTV | Ghidul Tau Virtual</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/style1.css" rel='stylesheet' type='text/css' />

	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- Custom Theme files -->
	<script src="js/jquery-1.12.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!--animate-->
	<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
	<script src="js/wow.min.js"></script>
	<script>
		new WOW().init();
	</script>
	<!--//end-animate-->
</head>

<body>
	<?php include('includes/header.php'); ?>



	<div class="banner">
		<div class="container">
			<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"> GTV - Ghidul Tau Virtual</h1>
		</div>
	</div>

	<?php if ($_SESSION['login']) { ?>
		<div class="container">
			<div class="banner-text" style="text-align: center; padding: 50px;">
				<h2 style="font-size: 36px; font-weight: bold; color: #333;">Bine ai venit pe GTV - Ghidul Tau Virtual!</h2>
				<p style="font-size: 20px; color: #555;">Suntem aici pentru tine. Vino să discuți cu asistentul nostru virtual pentru a primi un diagnostic rapid și sfaturi personalizate pentru starea ta de sănătate. Inteligența artificială este pregătită să te ajute!</p>
				<button class="btn btn-primary" onclick="redirectChat()" style="font-size: 18px; font-weight: bold;">Începe Conversația</button>
			</div>
		</div>
		<div class="container">
			<div class="banner-text" style="text-align: center; padding: 50px;">
				<p style="font-size: 20px; color: #555;">Descoperă-ți starea de sănătate începând un test personalizat cu asistentul nostru virtual. Primește un diagnostic rapid și sfaturi adaptate nevoilor tale. Sănătatea ta este în centrul atenției, iar noi suntem aici să te ghidăm în această călătorie. Începe testul acum și explorează modalități de a-ți îmbunătăți viața!</p>
				<button class="btn btn-primary" onclick="redirectTest()" style="font-size: 18px; font-weight: bold;">Începe Testul</button>
			</div>
		</div>

	<?php } else { ?>
		<div class="container" style="position: relative;">
    <div class="banner-text" style="text-align: center; padding: 50px;">
        <h2 style="font-size: 36px; font-weight: bold; color: #333;">Bine ai venit pe GTV - Ghidul Tau Virtual!</h2>
        <p style="font-size: 20px; color: #555; margin-right: 200px;">Beneficiază acum de suportul nostru! Creează-ți un cont pentru a discuta cu asistentul nostru virtual Sara și a primi diagnosticul personalizat. Descoperă cea mai simplă modalitate de a-ți monitoriza și îmbunătăți sănătatea!</p>
    </div>
    
</div>


		</div>


		<div class="image-container">
			<div class="image-wrapper">
				<img src="images/52.jpg" alt="Imagine 1">
				<p style="font-weight: bold; font-size: 1.2em;">Andreea Pauna</p>
				<p>Medic Oftalmolog</p>
			</div>
			<div class="image-wrapper">
				<img src="images/49.jpg" alt="Imagine 2">
				<p style="font-weight: bold; font-size: 1.2em;">Andrei Popescu</p>
				<p>Medic Chirurg</p>
			</div>
			<div class="image-wrapper">
				<img src="images/53.jpg" alt="Imagine 3">
				<p style="font-weight: bold; font-size: 1.2em;">Ion Dumitrascu</p>
				<p>Medic Cardiolog</p>
			</div>
		</div>


	<?php } ?>







	<script>
		function redirectChat() {
			window.location.href = 'chatgpt.php';
		}

		function redirectTest() {
			window.location.href = 'decisiontree.php';
		}
	</script>








	<!--- oferte ---->
	<div class="container">
		<div class="rupes">
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-usd"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>Economisește la Sănătate!</h3>
					<h4><a href="offers.html">-20% la Abonamentele Anuale de Check-Up Medical</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-h-square"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>Consultații la un Click Distanță!</h3>
					<h4><a href="offers.html">Tarif Special pentru Consultații Telemedicale</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>
			<div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
				<div class="rup-left">
					<a href="offers.html"><i class="fa fa-mobile"></i></a>
				</div>
				<div class="rup-rgt">
					<h3>Transformă-ți Stilul de Viață!</h3>
					<h4><a href="offers.html">Ofertă Specială la Programele de Wellness și Fitness
						</a></h4>

				</div>
				<div class="clearfix"></div>
			</div>

		</div>
	</div>
	<!--- /oferte ---->


















	<?php include('includes/footer.php'); ?>
	<!-- signup -->
	<?php include('includes/signup.php'); ?>
	<!-- //signu -->
	<!-- signin -->
	<?php include('includes/signin.php'); ?>
	<!-- //signin -->
	<!-- write us -->
	<?php include('includes/write-us.php'); ?>
	<!-- //write us -->
</body>

</html>