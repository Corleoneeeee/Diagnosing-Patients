<?php
error_reporting(0);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$mnumber=$_POST['mobilenumber'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$sql="INSERT INTO  utilizatori(FullName,MobileNumber,EmailId,Password) VALUES(:fname,:mnumber,:email,:password)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':mnumber',$mnumber,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Ești înregistrat cu succes. Acum vă puteți autentifica! ";
header('location:thankyou.php');
}
else 
{
$_SESSION['msg']="Ceva n-a mers bine. Vă rugăm să încercați din nou.";
header('location:thankyou.php');
}
}
?>
<!--Javascript for check email availabilty-->
<script>
function verifica_credentiale() {

$("#loaderIcon").show();
jQuery.ajax({
url: "verifica_credentiale.php",
data:'emailid='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
						</div>
							<section>
								<div class="modal-body modal-spa">
									<div class="login-grids">
										<div class="login">
											<div class="login-left">
												<ul>
													<li><a class="fb" href="#"><i></i>Facebook</a></li>
													<li><a class="goog" href="#"><i></i>Google</a></li>
													
												</ul>
											</div>
											<div class="login-right">
												<form name="signup" method="post">
													<h3>Creaza un nou cont </h3>
					

				<input type="text" value="" placeholder="Nume Prenume" name="fname" autocomplete="off" required="">
				<input type="text" value="" placeholder="Numar de telefon" maxlength="10" name="mobilenumber" autocomplete="off" required="">
		<input type="text" value="" placeholder="Email " name="email" id="email" onBlur="verifica_credentiale()" autocomplete="off"  required="">	
		 <span id="user-availability-status" style="font-size:12px;"></span> 
	<input type="password" value="" placeholder="Parola" name="password" required="">	
													<input type="submit" name="submit" id="submit" value="Creaza Cont">
												</form>
											</div>
												<div class="clearfix"></div>								
										</div>
											<p>Conectându-vă sunteți de acord cu<a href="page.php?type=terms">Termenii de utilizare</a> si <a href="page.php?type=privacy">Politica de confidentialitate</a></p>
									</div>
								</div>
							</section>
					</div>
				</div>
			</div>