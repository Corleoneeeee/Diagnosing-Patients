<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
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
<?php include('includes/header.php');?>

<div class="Quiz">
	<div class="container">
		<h1>Incepe evaluarea simptomelor</h1>
	</div>
</div>


<div id="chat-container">
  <!-- Aici se va afișa conversația -->
</div>
<textarea id="message-box" placeholder="Intreab-o pe Sara..."></textarea>
<button id="send-button">Trimite</button>



<script>
// Funcția de a trimite un mesaj
function sendMessage() {
  var messageInput = document.getElementById("message-box");
  var message = messageInput.value;
  
  // Afișăm mesajul trimis de utilizator în casetă
  appendMessage("Tu", message);
  
  // Obțineți răspunsul de la GPT-3
  getGPT3Response(message);
  
  // Ștergem mesajul după ce a fost trimis
  messageInput.value = "";
}

// Funcția de a adăuga mesajul la casetă
function appendMessage(sender, message) {
  var chatContainer = document.getElementById("chat-container");
  var newMessage = document.createElement("div");
  newMessage.innerHTML = "<strong>" + sender + ":</strong> " + message;
  chatContainer.appendChild(newMessage);
  
  // Rulăm caseta de chat în jos pentru a afișa întotdeauna ultimul mesaj
  chatContainer.scrollTop = chatContainer.scrollHeight;
}















// Funcția de a obține răspunsul de la GPT-3
function getGPT3Response(userMessage) {
  // Trimiteți cererea la scriptul PHP pentru a obține răspunsul
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "gpt3_request.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if (xhr.readyState === 4 && xhr.status === 200) {
      var gpt3Response = xhr.responseText;
      appendMessage("Sara", gpt3Response);
    }
  };
  xhr.send("message=" + userMessage);
}

// Adăugați un ascultător de evenimente pentru butonul de trimitere a mesajului
document.getElementById("send-button").addEventListener("click", function() {
  sendMessage();
});

// Adăugați un ascultător de evenimente pentru tasta Enter pentru a trimite mesajul
document.getElementById("message-box").addEventListener("keypress", function(event) {
  if (event.keyCode === 13) {
    sendMessage();
  }
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






	
	

					

			






<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>			
<!-- //write us -->
</body>
</html>