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


    <div id="question"></div>
    <div id="button-container">
        <button id="yesBtn">Da</button>
        <button id="noBtn">Nu</button>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var tree = null; // Arborele va fi încărcat aici

            // încărcarea arborelui ca JSON din PHP 
            fetch(' Arbori/ARBgenunchi.php')
                .then(response => response.json())
                .then(data => {
                    tree = data;
                    navigate(tree); // Începem navigarea prin arbore
                });

            function navigate(node) {
                if (node.diagnosis) {
                    document.getElementById('question').innerText = 'Diagnostic: ' + node.diagnosis;
                    document.getElementById('yesBtn').style.display = 'none';
                    document.getElementById('noBtn').style.display = 'none';
                    return;
                }
                document.getElementById('question').innerText = node.question;
                window.currentNode = node;
            }

            document.getElementById('yesBtn').onclick = function() {
                navigate(window.currentNode.right);
            };

            document.getElementById('noBtn').onclick = function() {
                navigate(window.currentNode.left);
            };
        });
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