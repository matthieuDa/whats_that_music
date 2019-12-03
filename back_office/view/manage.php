<!DOCTYPE html>
<html>
<head>
	<title>Ajout extrait</title>
	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Perso universal CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="./css/style.css"> -->

	<!-- Radio button CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="./../../view/css/radio.css"> -->

	<!-- FontAwesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<style type="text/css">
		.return_to_game { 	position 		: absolute	;
							right 			: 1em		; }
		h3				{	padding-bottom 	: 1em 		;
							text-align 		: center 	; }
		h5				{	padding-bottom 	: 1em		; }
		.search 		{	max-width 		: 17em		;
							position 		: absolute	; 
							right 			: 1em 		;
							top 			: 5em 		; }
		.search_label 	{	position 		: absolute 	; 
							right 			: 5em       ; }
		.card_margin_bt {	margin-bottom 	: 5em 		; }
		/* .card_attachement { position 		: absolute	; 
							right 			: 5em		;
							margin-bottom 	: 5em		; } */ 
	</style>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- jQuery JS -->
	<script src="jquery-3.4.1.min.js"></script>

	<script>
	function show_hide_new_artist() {
		if (document.getElementById('new_artist').checked) {
		    document.getElementById('hidden_select')	.style.display = 'none';
			document.getElementById('hidden_text_input').style.display = 'block';
		} else { 
		   	document.getElementById('hidden_select')	.style.display = 'block';
			document.getElementById('hidden_text_input').style.display = 'none';
		}
	}

	function display_jumbotron() {
		// Browser url: 127.0.0.1/whats_that_music/back_office/view/manage.php?action=category&id=0
		var searchParams = new URLSearchParams(window.location.search); //-- ?action=category&id=0
		if (searchParams.get("action") == 'category') {					//-- category
			document.getElementById('category')	.style.display = 'block';
			document.getElementById('default') 	.style.display = 'none';
			document.getElementById('sample')	.style.display = 'none';
		} else if (searchParams.get("action") == 'sample') {
			document.getElementById('sample')  	.style.display = 'block';
			document.getElementById('default')	.style.display = 'none';
			document.getElementById('category')	.style.display = 'none';
		} else {
			document.getElementById('sample')	.style.display = 'none';
			document.getElementById('category')	.style.display = 'none';
		}
	}
  	</script>

  	<!-- Perso PHP -->
	<?php include './../execute.php'; ?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="./../"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item active">
					<a class="nav-link" href='./manage.php?action=samples'>Samples <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href='./manage.php?action=categories'>Categories <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link" href='./manage.php?action=artists'>Artists <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" href='./view/manage.php?action=albums'>Albums <span class="sr-only">(current)</span></a>
				</li>
				<li>
					<a class="btn btn-primary return_to_game" href="./../" tabindex="-1" aria-disabled="true">What's that music ?!</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-------------| DEFAULT |------------->
	<div id="default">
		<div id="default" class="jumbotron">
			<h1 class="display-4">Error occured</h1>
			<p class="lead">A problem has occurred, return to the home page by <a href="./../">clicking here</a>.</p>
		</div>
	</div>

	<div id="sample">	
		<div id="sample" class="jumbotron">
			<h1 class="display-4">Sample management space</h1>
			<p class="lead">You can modify the sample by completing the form below.</p>
		</div>

		<form class="container" style="margin-top: 3em;">
  			<div class="form-row">
	    		<div class="col-lg">
	    			<label>Name *</label>
	    			<input type="text" class="form-control" id="validationCustom01" value="Let's dance" required>
	    			<div class="valid-feedback">Okay !</div>
	    		</div>
			<button class="btn btn-primary" type="submit">Submit form</button>
		</form>
	</div>

	<div id="default">	
		<div id="category" class="jumbotron">
			<h1 class="display-4">Category management space</h1>
			<p class="lead">You can modify the category by completing the form below.</p>
		</div>
	</div>
	<script type="text/javascript">
		display_jumbotron();
	</script>
</body>
</html>