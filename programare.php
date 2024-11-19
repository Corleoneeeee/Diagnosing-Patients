<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(isset($_POST['submit1'])) {
    $fname = htmlspecialchars($_POST['fname'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $mobile = htmlspecialchars($_POST['mobileno'], ENT_QUOTES, 'UTF-8');
    $subject = htmlspecialchars($_POST['subject'], ENT_QUOTES, 'UTF-8');
    $description = htmlspecialchars($_POST['description'], ENT_QUOTES, 'UTF-8');
    $appointment_date = htmlspecialchars($_POST['appointment_date'], ENT_QUOTES, 'UTF-8');
    $data_programare = htmlspecialchars($_POST['data_programare'], ENT_QUOTES, 'UTF-8');

    $sql = "INSERT INTO programare (FullName, EmailId, MobileNumber, Subject, Description, data_programare) VALUES (:fname, :email, :mobile, :subject, :description, :data_programare)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $query->bindParam(':subject', $subject, PDO::PARAM_STR);
    $query->bindParam(':description', $description, PDO::PARAM_STR);

    $query->bindParam(':data_programare', $data_programare, PDO::PARAM_STR);
    $query->execute();

    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        $msg = "Programare efectuata cu succes!";
    } else {
        $error = "Ceva nu a mers bine. Mai incearca odata!";
    }
}
?>

<!DOCTYPE HTML>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GTV | Ghidul Tau Virtual</title>
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="css/animate.css" type="text/css" />
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/wow.min.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body>
    <div class="top-header">
        <?php include('includes/header.php');?>
        <div class="banner-1">
            <div class="container">
                <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;">GTV - Ghidul Tau Virtual</h1>
            </div>
        </div>
        <div class="privacy">
            <div class="container">
                <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Programeaza-te la un specialist!</h3>
                <form name="enquiry" method="post">
                    <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
                        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
                    <p style="width: 350px;">
                        <b>Nume Prenume</b>  <input type="text" name="fname" class="form-control" id="fname" placeholder="Nume Prenume" required="">
                    </p> 
                    <p style="width: 350px;">
                        <b>Email</b>  <input type="email" name="email" class="form-control" id="email" placeholder="Adresa de Email" required="">
                    </p> 
                    <p style="width: 350px;">
                        <b>Numar de telefon</b>  <input type="text" name="mobileno" class="form-control" id="mobileno" maxlength="10" placeholder="Numar de telefon" required="">
                    </p> 
                    <p style="width: 350px;">
                        <b>Specialist</b>  <input type="text" name="subject" class="form-control" id="subject"  placeholder="Specialist" required="">
                    </p> 
                    <p style="width: 350px;">
                        <b>Descriere</b>  <textarea name="description" class="form-control" rows="6" cols="50" id="description"  placeholder="Spune ce te deranjeaza..." required=""></textarea> 
                    </p> 
                   
                    <p style="width: 350px;">
                        <b>Data programare (nou)</b>
                        <input type="text" name="data_programare" class="form-control" id="data_programare" placeholder="Introdu data programarii" required="">
                    </p>
                    <p style="width: 350px;">
                        <button type="submit" name="submit1" class="btn-primary btn">Trimite</button>
                    </p>
                </form>
            </div>
        </div>
        <script>
            $(function() {
                $("#datepicker").datepicker({
                    dateFormat: 'yy-mm-dd',
                    minDate: 0,
                    changeMonth: true,
                    changeYear: true
                });
            });
        </script>
        <?php include('includes/footer.php');?>
        <?php include('includes/signup.php');?>            
        <?php include('includes/signin.php');?>            
        <?php include('includes/write-us.php');?>
    </body>
    </html>
