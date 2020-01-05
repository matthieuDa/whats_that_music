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

	<!-- Perso JavaScript -->
	<script type="text/javascript">
		/*
		// QUERY like PHP ----------------------------------
		function $_GET(param) {
            var vars = {};
            window.location.href.replace(location.hash, '').replace(
                /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
                function (m, key, value) {  // callback
                    vars[key] = value !== undefined ? value : '';
                }
            );

            if (param) return vars[param] ? vars[param] : null;
            return vars;
        }
        var $_GET = $_GET();

        // QUERY SPLITTING ---------------------------------
       	query  = $_GET['id'].split("-");
       	action = query[0];
       	id 	   = query[1];

       	// DISPLAY / HIDE ----------------------------------
        if (action = 'sample') {
			//document.getElementById('home')    .style.display = 'block';
            //document.getElementById('samples') .style.display = 'none';
        } else if (action = 'artist') {
			//document.getElementById('home')    .style.display = 'block';
            //document.getElementById('samples') .style.display = 'none';
        }*/
	</script>

  	<!-- Perso PHP -->
	<?php
		include './display.php';
		//include './app.php';

		// GET QUERY -----------------------------
		$id  	= $_GET['id'];
		$query  = explode("-", $id);
		$action = $query[0];
		$ID  	= $query[1];

		if ($action = 'sample') {
			$sample_infos = sample_infos($ID);
		}

		//$artist 		= find_artist($ID);
		//$title 		= "Let's Dance";
		//$difficulty 	= 2;
		//$cover_link 	= 'www.google.com/img/3557634';
	?>
</head>

<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="./"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
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

	<div class="jumbotron">
		<h1 class="display-4">Sample editor</h1>
		<p class="lead">Welcome on the sample editor, here you can modify the sample as you want, you can change the name, add an artist or remove a category.</p>
		<p>To edit, modify the form below as desired.</p>
	</div>

	<div class="container" style="margin-top: 3em">

	<h5>Complete this form to edit the sample.</h5>
	<form class="needs-validation" novalidate>
	  	<div class="form-row">
	    	<div class="col-md-4 mb-3">
	    		<label for="validationCustom01">Name *</label>
	    		<input type="text" class="form-control" id="validationCustom01" placeholder="ex : Let's dance" value="<?php echo $sample_infos['SAMPLE_NAME']; ?>" required>
	    		<div class="valid-feedback">Okay !</div>
	    	</div>

	    	<div class="col-md-4 mb-3">
		    	<label for="validationCustom02">Artist / Group</label>
		    	<label class="form-check-label" style="margin-left: 33%">Nouvel artiste</label>
				<input type="checkbox" id="new_artist" onclick="show_hide()"/>
	      
		      	<select class="custom-select" id="hidden_select">
					<option value="id">Elvis Presley</option>
					<option value="id" selected>David Bowie</option>
					<option value="id">Freddy Mercury</option>
					<option value="id">Michael Jackson</option>
					<?php //display_artists_selectinput(); ?>
					<!-- Change to use DB -->
				</select>
	      		<div class="valid-feedback">Okay !</div>
	      		<div id="hidden_text_input" style="display: none;">
		    		<input type="text" class="form-control" id="validationCustom02" placeholder="ex : David Bowie" required>
		    		<div class="valid-feedback">Okay !</div>
		    	</div>
	    	</div>
	    	<div class="col-md-4 mb-3">
	    		<label for="validationCustom02">Difficulty</label>

	    		<select class="custom-select" name="difficulty">
					<option>Select the difficulty</option>
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
				</select>

				<!-- <fieldset>
					<legend>Is this toggle switch awesome?</legend>
					<div class="toggle">
						<input type="radio" name="sizeBy" value="weight" id="sizeWeight" checked="checked" />
						<label for="sizeWeight">It's pretty, pretty, pretty, pretty good</label>
						<input type="radio" name="sizeBy" value="dimensions" id="sizeDimensions" />
						<label for="sizeDimensions">100% yes</label>
					</div>
					<p class="status">Toggle is <span>auto width</span><span>full width</span>.</p>
				</fieldset> 

	      		<label for="validationCustomUsername">Username</label>
	      		<div class="input-group">
	        		<div class="input-group-prepend">
	          			<span class="input-group-text" id="inputGroupPrepend">@</span>
	        		</div>
	        		<input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
	        		<div class="invalid-feedback">Please choose a username.</div>
	      		</div> -->
	    	</div>
	  	</div>
	  	<div class="form-row">
	    	<div class="col-md-6 mb-3">
		    	<label for="validationCustom03">Cover link</label>
	    		<input type="text" name="cover" class="form-control" id="validationCustom01" placeholder="www.google.com/img/3557634" value="www.google.com/img/3557634" required>
		    	<div class="invalid-feedback">Fill in all the fields please.</div>
	    	</div>
	    	<div class="col-md-6 mb-3">
	    		<div class="input-group-prepend">
		      		<label>Audio file</label>
		      		<input type="file" class="custom-file-input" name="mp3">
		      		<label class="custom-file-label form-control" style="margin-top: 2em" for="inputGroupFile01">Replace file</label>
		      		<div class="invalid-feedback">Please select a valid state.</div>
	      		</div>
	    	</div>
	  	</div>
	  	<button class="btn btn-primary" type="submit">Submit form</button>
	</form>
	</div>

	<script>

	// Example starter JavaScript for disabling form submissions if there are invalid fields
	(function() {
	  'use strict';
	  window.addEventListener('load', function() {
	    // Fetch all the forms we want to apply custom Bootstrap validation styles to
	    var forms = document.getElementsByClassName('needs-validation');
	    // Loop over them and prevent submission
	    var validation = Array.prototype.filter.call(forms, function(form) {
	      form.addEventListener('submit', function(event) {
	        if (form.checkValidity() === false) {
	          event.preventDefault();
	          event.stopPropagation();
	        }
	        form.classList.add('was-validated');
	      }, false);
	    });
	  }, false);
	})();
	</script>
</body>
</html>