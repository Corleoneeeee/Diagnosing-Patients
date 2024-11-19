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
    
    
    <div class="alert-box">
        Dacă te confrunți cu simptome grave, contactează serviciile de urgență, nu folosi Sara!!!
        <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    </div>
    <div class="container">
        <div class="titlu-tree" style="text-align: center; padding: 50px;">
            <h3 style="font-size: 36px; font-weight: bold; background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)); -webkit-background-clip: text; color: transparent;">Diagnosticare Pas cu Pas prin - Ghidul Tau Virtual!</h3>
        </div>
    </div>






    <div class="container">
        <div class="titlu-tree" style="text-align: center; padding: 20px 50px;">
            <h3 style="font-size: 24px; font-weight: bold; margin-top: -15px; background: linear-gradient(to right, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.5)); -webkit-background-clip: text; color: transparent;">Ce simptom te deranjează cel mai tare?!</h3>
        </div>
        <div style="text-align: center;">
            <div class="button-group">
                <button onclick="redirect('zCap.php')">Cap</button>
                <button onclick="redirect('zToracica.php')">Toracica</button>
                <button onclick="redirect('zPicioare.php')">Picioare</button>
                <button onclick="redirect('zMaini.php')">Maini</button>
                <button onclick="redirect('zOchi.php')">Ochi</button>
                <button onclick="redirect('zUrechi.php')">Urechi</button>
                <button onclick="redirect('zGat.php')">Gât</button>
                <button onclick="redirect('zSpate.php')">Spate</button>
            </div>
            <div class="button-group">
                <button onclick="redirect('zAbdomen.php')">Abdomen</button>
                <button onclick="redirect('zGenunchi.php')">Genunchi</button>
                <button onclick="redirect('zFicat.php')">Ficat</button>
                <button onclick="redirect('zRinichi.php')">Rinichi</button>
                <button onclick="redirect('zStomac.php')">Stomac</button>
            </div>

            <div class="button-group">
                <button onclick="redirect('zPlamani.php')">Plamani</button>
                <button onclick="redirect('zInima.php')">Inima</button>
                <button onclick="redirect('zTalpi.php')">Talpi</button>
                <!-- Adăugați alte butoane pentru alte părți ale corpului aici -->
            </div>
            <div id="contentContainer" style="margin-top: 20px;">
                <div id="capContent" class="symptomContent" style="display: none;">Conținut pentru simptomul la cap</div>
                <div id="toracicaContent" class="symptomContent" style="display: none;">Conținut pentru simptomul toracica</div>
                <!-- Adăugați div-urile pentru celelalte părți ale corpului aici -->
            </div>
        </div>
    </div>



    <script>
        function showContent(symptom) {
            var contentToShow = document.getElementById(symptom + 'Content');
            var allContents = document.querySelectorAll('.symptomContent');

            allContents.forEach(function(content) {
                content.style.display = 'none';
            });

            if (contentToShow) {
                contentToShow.style.display = 'block';
            }
        }

        function redirect(url) {
            window.location.href = url;
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
<br><br><br><br><br><br><br>

















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