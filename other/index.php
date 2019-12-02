<!DOCTYPE html>
<html>
<head>
	<title>MAMP Server</title>

	<!-- CSS - Bootstrap -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<!-- JS - Bootstrap -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<style type="text/css">
		.padding 	{ padding 		: 2em 			; }
		.center 	{ text-align	: center		; }
		.smallerText{ font-size 	: small 		; }
		.margin 	{ margin-bottom : 1em 			; }
		.shortcuts 	{ position		: absolute		;
									  top: 8%		;
									  right: 5%		; }
	</style>
</head>
<body>
	<div class="padding">
		<h1 class="center">Welcome on your MAMP server.</h1>

		</br><h6>Choose the project you want to run on the server. Click to open <a href="http://localhost:8888/phpMyAdmin/">phpMyAdmin</a>.</h6>

		<a class="btn btn-primary shortcuts" href="./devTools.php">Shortcuts</a>

		<ul class="list-group z1">
			<?php

			$dir = dir('.');
			
			while($entry = $dir->read()) {
			    if(stristr($entry, '.') === FALSE) {
			    	echo '<li class="list-group-item"><a href="/' . $entry . '">' . $entry . '</a></li>';
			    }
			}

			$dir->close();	 ?>

			</br><h6>To add a new project, create a folder in :</h6>
			<nav aria-label="breadcrumb">
			  <ol class="breadcrumb">
			    <li class="breadcrumb-item">Applications</li>
			    <li class="breadcrumb-item">MAMP</li>
			    <li class="breadcrumb-item active" aria-current="page">htdocs</li>
			  </ol>
			</nav>
			<p class="font-weight-light smallerText">Don't forget to create 'index.php' to automatically start the PHP project.</p>
		</ul>
	</div>
</body>
</html>