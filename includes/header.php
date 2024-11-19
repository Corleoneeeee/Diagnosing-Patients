<?php if ($_SESSION['login']) { ?>
	
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<li class="hm"><a href="index.html"><i class="fa fa-home"></i></a></li>
				<li class="prnt"><a href="profil.php">Profilul Meu</a></li>
				<li class="prnt"><a href="schimba-parola.php">Schimba parola</a></li>
				<li class="prnt"><a href="raporteaza_problema.php">Raspuns la problema ta</a></li>
			</ul>
			<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
				<li class="tol">Bun venit :</li>
				<li class="sig"><?php echo htmlentities($_SESSION['login']); ?></li>
				<li class="sigi"><a href="logout.php">/ Deconecteaza-te</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div><?php } else { ?>
	<div class="top-header">
		<div class="container">
			<ul class="tp-hd-lft wow fadeInLeft animated" data-wow-delay=".5s">
				<li class="hm"><a href="index.php"><i class="fa fa-home"></i></a></li>
				<li class="hm"><a href="admin/index.php">Logare Admin</a></li>
			</ul>
			<ul class="tp-hd-rgt wow fadeInRight animated" data-wow-delay=".5s">
				<li class="tol">Numar de telefon : 079317182</li>
				<li class="sig"><a href="#" data-toggle="modal" data-target="#myModal">Inregistrare</a></li>
				<li class="sigi"><a href="#" data-toggle="modal" data-target="#myModal4">/ Conectare</a></li>
			</ul>
			<div class="clearfix"></div>
		</div>
	</div>
<?php } ?>
<!--- /top-header ---->
<!--- header ---->
<div class="header">
	<div class="container">
		<div class="logo wow fadeInDown animated" data-wow-delay=".5s">
			<a href="index.php">Ghidul <span>Tau Virtual</span></a>
		</div>

		<div class="lock fadeInDown animated" data-wow-delay=".5s">
			<li><i class="fa fa-lock"></i></li>
			<li>
				<div class="securetxt">SAFE &amp; SECURE </div>
			</li>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>
<!--- /header ---->
<!--- footer-btm ---->
<div class="footer-btm wow fadeInLeft animated" data-wow-delay=".5s">
	<div class="container">
					<nav class="cl-effect-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Acasa</a></li>
							<li><a href="page.php?type=aboutus">Despre noi</a></li>
							<li><a href="page.php?type=privacy">Politica de confidențialitate</a></li>
							<li><a href="page.php?type=terms">Termeni de utilizare</a></li>
							<li><a href="page.php?type=contact">Contact</a></li>
							<?php if ($_SESSION['login']) { ?>
								<li><a href="programare.php">Programare </a> </li>
								<li>Ai o problema?<a href="#" data-toggle="modal" data-target="#myModal3"> / Scrie-ne </a> </li>
							<?php } else { ?>
								
							<?php } ?>
							<div class="clearfix"></div>

						</ul>
					</nav>
		<div class="clearfix"></div>
	</div>
</div>