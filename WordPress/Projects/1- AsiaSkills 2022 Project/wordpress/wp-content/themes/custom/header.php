<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	
	<!-- Title -->
	<title>Delicious - Food Blog Template | Home</title>
	
	<!-- Favicon -->
	<link rel="icon" href="<?=get_theme_file_uri()?>/img/core-img/favicon.ico">
	
	<!-- Core Stylesheet -->
	<link rel="stylesheet" href="<?=get_theme_file_uri()?>/style.css">

</head>

<body>
	<!-- Preloader -->
	<div id="preloader">
		<i class="circle-preloader"></i>
		<img src="<?=get_theme_file_uri()?>/img/core-img/salad.png" alt="">
	</div>
	
	<!-- Search Wrapper -->
	<div class="search-wrapper">
		<!-- Close Btn -->
		<div class="close-btn"><i class="fa fa-times" aria-hidden="true"></i></div>
		
		<div class="container">
			<div class="row">
				<div class="col-12">
					<form action="#" method="post">
						<input type="search" name="search" placeholder="Type any keywords...">
						<button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
			</div>
		</div>
	</div>
	
	<!-- ##### Header Area Start ##### -->
	<header class="header-area">
		
		<!-- Navbar Area -->
		<div class="delicious-main-menu">
			<div class="classy-nav-container breakpoint-off">
				<div class="container">
					<!-- Menu -->
					<nav class="classy-navbar justify-content-between" id="deliciousNav">
						
						<!-- Logo -->
						<a class="nav-brand" href="index.html"><img src="<?=get_theme_file_uri()?>/img/core-img/logo.png" alt=""></a>
						
						<!-- Navbar Toggler -->
						<div class="classy-navbar-toggler">
							<span class="navbarToggler"><span></span><span></span><span></span></span>
						</div>
						
						<!-- Menu -->
						<div class="classy-menu">
							
							<!-- close btn -->
							<div class="classycloseIcon">
								<div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
							</div>
							
							<!-- Nav Start -->
							<div class="classynav">
								<ul>
									<li class="active"><a href="index.html">Home</a></li>
									<li><a href="recipe-post.html">Recipes</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
								
								<!-- Newsletter Form -->
								<div class="search-btn">
									<i class="fa fa-search" aria-hidden="true"></i>
								</div>
							
							</div>
							<!-- Nav End -->
						</div>
					</nav>
				</div>
			</div>
		</div>
	</header>