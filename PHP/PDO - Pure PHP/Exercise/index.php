<?php
	require "connect.php";
	$page = $_GET['page'] ?? "list-auto";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	
	<title>Auto</title>
	
	<!-- Bootstrap Core CSS -->
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Custom CSS -->
	<link href="dist/css/sb-admin-2.css" rel="stylesheet">
	
	<!-- Custom Fonts -->
	<link href="dist/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	
	<div id="wrapper">
		
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.html">Auto</a>
			</div>
			<!-- /.navbar-header -->
			
			<ul class="nav navbar-top-links text-center">
				<li class="not-active"><a href="index.php?page=list-auto">Auto</a></li>
				<li><a href="index.php?page=list-features">Feature</a></li>
				<li><a href="index.php?page=list-manufacturer">Manufacturer</a></li>
				<ul class="nav  navbar-right">
					<li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>
				</ul>
			</ul>
			
			<!-- /.navbar-top-links -->
		</nav>
		
		<div id="page-wrapper">
			<!-- Include pages using $_GET -->
			<?php
				require "pages/" . $page . ".php";
			?>
		</div>
		<!-- /#page-wrapper -->
	
	</div>
	<!-- /#wrapper -->
	
	<!-- jQuery -->
	<script src="dist/js/jquery.min.js"></script>
	
	<!-- Bootstrap Core JavaScript -->
	<script src="dist/js/bootstrap.min.js"></script>
	
	<!-- Custom Theme JavaScript -->
	<script src="dist/js/sb-admin-2.js"></script>
	
	
	<script src="pages/modal.js"> </script>
	
	
</body>

</html>
