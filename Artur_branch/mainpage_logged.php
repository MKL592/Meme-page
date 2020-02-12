<?php
	include('session.php');
	if(!isset($_SESSION['login_user'])){
		header("location: index.php"); // Strona główna
	}
?>

<!DOCTYPE html>

<head>
	<meta charset="utf-8">
	<title>Memes4days</title>

	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>
	<link rel="stylesheet" href="css/font-awesome.min.css"/>
	<link rel="stylesheet" href="css/magnific-popup.css"/>
	<link rel="stylesheet" href="css/animate.css"/>
	<link rel="stylesheet" href="css/owl.carousel.min.css"/>
	<link rel="stylesheet" href="css/slicknav.min.css"/>

	<!-- Main Stylesheets -->
	<link rel="stylesheet" href="css/style2.css"/>
</head>
<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>

	<!-- Header section -->
	<header class="header-section">
			<img src="img/logo.PNG" alt="logo" height="70px" width="70px">
			<ul class="main-menu">
				<font color="white">
					<li> 
						<a href="Baza_logout.php"><p class="btn"><font size="6" color="green">Wyloguj się</font></p></a>
					</li>	
				</font>
			</ul>
	</header>
	<!-- Header section end -->

	<!-- Page top section -->
	<section class="page-top-section set-bg" data-setbg="img/header-bg/1.png">
		<div class="container">
			<h2>Meme power</h2>
		</div>
	</section>
	<!-- Page top section end -->

	<!-- Game section -->
	<section class="game-section character-one">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="about-game">
						<div class="game-title mb-0">
							<img src="img/game-characters/title-icon.png" alt="">
							<h2>See the <i>memes</i></h2>
						</div>
							
						<p>Feel the <i>memes</i></p>
						<div class="site-btn">
							<form action="upload.php" method="post" enctype="multipart/form-data">
								Select Image File to Upload:
								<input type="file" name="file">
						</div>
						<div class="container2">
							<input type="submit" name="submit" value="Upload" class="btn">
							</form>
						</div>
					</div>
				
					<div class="col-lg-5">
						<div class="about-game-img">
							<div id="magic">
								<?php
									// Include the database configuration file
									include 'config.php';
									// Get images from the database
									$query = $db->query("SELECT file_name FROM images ORDER BY uploaded_on DESC");
										if($query->num_rows > 0){
											while($row = $query->fetch_assoc()){
												$imageURL = 'uploads/'.$row["file_name"];
								?>
								<br><br><br>
								<img style="width:400px;height:400px;float:right;" class="img" src="<?= $imageURL; ?>" />
								<?php }} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<div class="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-3">
					<div class="footer-widget">
						<div class="about-widget">
							<img src="img/logo2.PNG" alt="logo"  height="70px" width="70px">
							<p><font color="#450000">Memes</font></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
															
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.slicknav.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/circle-progress.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/main.js"></script>

</body>
</html>