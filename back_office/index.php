<!DOCTYPE html>
<html>
<head>
	<title>WTM - Back-office</title>

	<!-- Required meta tags --------------------------------------------------->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Radio button CSS ----------------------------------------------------->
	<link rel="stylesheet" type="text/css" href="./../view/CSS/radio.css">

	<!-- FontAwesome CSS ------------------------------------------------------>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Bootstrap CSS -------------------------------------------------------->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap JS --------------------------------------------------------->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- React JS ------------------------------------------------------------->
	<script src="https://fb.me/react-0.14.3.js"></script>
	<script src="https://fb.me/react-dom-0.14.3.js"></script>


	<style type="text/css">
		.return_to_game { 	position 		: absolute			;
							right 			: 1em				; }
		h3				{	padding-bottom 	: 1em 				;
							text-align 		: center 			; }
		h5				{	padding-bottom 	: 1em				; }
		li 				{ 	display 		: inline-block  	; }
		.search 		{	max-width 		: 17em				;
							position 		: absolute			; 
							right 			: 1em 				;
							top 			: 5em 				; }
		.search_label 	{	position 		: absolute 			; 
							right 			: 5em       		; }
		.card_margin_bt {	margin-bottom 	: 5em 				; }
		/* .card_attachement { position 		: absolute			; 
							right 			: 5em				;
							margin-bottom 	: 5em				; } */ 
		.cursor			{	cursor 			: pointer 			; }
		.post:hover a 	{	color 			: #cc04c2 			;
							background-color: #000000			; }
		.jumbotron 		{ 	background-color: #2e7c7c  			;
							color 			: white				; }
		.no_radius 		{ 	border-radius 	: none 				; }
	</style>

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

	function page_manager_home() {
		document.getElementById('home')   	 .style.display = 'block';
		document.getElementById('samples')	 .style.display = 'none';
		document.getElementById('categories').style.display = 'none';
		document.getElementById('artists')	 .style.display = 'none';
		document.getElementById('albums')	 .style.display = 'none';
	}

	function page_manager_samples() {
		document.getElementById('home')   	 .style.display = 'none';
		document.getElementById('samples')	 .style.display = 'block';
		document.getElementById('categories').style.display = 'none';
		document.getElementById('artists')	 .style.display = 'none';
		document.getElementById('albums')	 .style.display = 'none';
	}

	function page_manager_categories() {
		document.getElementById('home')   	 .style.display = 'none';
		document.getElementById('samples')	 .style.display = 'none';
		document.getElementById('categories').style.display = 'block';
		document.getElementById('artists')	 .style.display = 'none';
		document.getElementById('albums')	 .style.display = 'none';
	}

	function page_manager_artists() {
		document.getElementById('home')   	 .style.display = 'none';
		document.getElementById('samples')	 .style.display = 'none';
		document.getElementById('categories').style.display = 'none';
		document.getElementById('artists')	 .style.display = 'block';
		document.getElementById('albums')	 .style.display = 'none';
	}

	function page_manager_albums() {
		document.getElementById('home')   	 .style.display = 'none';
		document.getElementById('samples')	 .style.display = 'none';
		document.getElementById('categories').style.display = 'none';
		document.getElementById('artists')	 .style.display = 'none';
		document.getElementById('albums')	 .style.display = 'block';
	}

	function $_GET(param) {
		var vars = {};
		window.location.href.replace( location.hash, '' ).replace( 
			/[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
			function( m, key, value ) {  // callback
				vars[key] = value !== undefined ? value : '';
			}
		);

		if ( param ) return vars[param] ? vars[param] : null;	
		return vars;
	} var $_GET = $_GET();
	/*function search_samples() {
		var samples = document.getElementsByClassName('search_samples');
		console.log(samples);
		/*var str = 'The quick brown fox jumps over the lazy dog.';

		var words = str.split(' ');
		console.log(words);


		document.getElementsByClassName('search_samples').on('input',function(e) {
     		var search_value = this.val();
 		});
		var nb_samples = document.getElementById("nb_samples").value; 
		for (let i = 0; i < nb_samples; i++) {
			if (sample[i].search(search_value) == -1) { //La variable position reçoit la valeur 6, la chaîne contient cette sous-chaîne
				document.getElementById('sample[' + sample[i] + ']').style.display = 'none';
			}
		}
	}*/
  	</script>

  	 <!-- Perso PHP -->
	<?php 
		//include './execute.php';
		include './display.php'; 
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
					<a class="nav-link cursor" onclick="page_manager_samples()">Samples <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link cursor" onclick="page_manager_categories()">Categories <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item active">
					<a class="nav-link cursor" onclick="page_manager_artists()">Artists <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled cursor" onclick="page_manager_albums()">Albums <span class="sr-only">(current)</span></a>
				</li>
				<li>
					<a class="btn btn-primary return_to_game" href="./../" tabindex="-1" aria-disabled="true">What's that music ?!</a>
				</li>
			</ul>
		</div>
	</nav>
	<div class="jumbotron" id="home" onclick="page_manager_home()">
		<h1 class="display-4">What's that music ?!</h1>
		<p class="lead">Welcome on the dashboard, here you can add, edit or delete all the database elements.</p>
		<p>To start choose an element on the navbar.</p>
	</div>

<!--------------------------------------------------------------------------------------------------------------------->	
<!--| id = samples |--------------------------------| id = samples |---------------------------------| id = samples |-->
<!--------------------------------------------------------------------------------------------------------------------->

	<div id="samples" style="display: none;">
		<div class="jumbotron">
			<h1 class="display-4">Sample editor</h1>
			<p class="lead">Welcome on the sample editor, here you can modify the sample as you want, you can change the name, add an artist or remove a category.</p>
			<p>To edit, modify the form below as desired.</p>
		</div>
		<div class="container" style="margin-top: 3em;">
			<h3>Select a button to show the right form.</h3>
			<div class="accordion" id="accordionExample">
		  		<div class="card">
		    		<div class="card-header" id="headingOne">
		      			<h2 class="mb-0">
		        			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Add a sample</button>
		      			</h2>
		    		</div>
		    		<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 1 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Complete this form to add a new sample in the library.</h5>

<form class="needs-validation" novalidate>
  	<div class="form-row">
    	<div class="col-md-4 mb-3">
    		<label for="validationCustom01">Name *</label>
    		<input type="text" class="form-control" id="validationCustom01" placeholder="ex : Let's dance" required>
    		<div class="valid-feedback">Okay !</div>
    	</div>

    	<div class="col-md-4 mb-3">
	    	<label for="validationCustom02">Artist / Group</label>
	    	<label class="form-check-label" style="margin-left: 33%">New artist</label>
			<input type="checkbox" id="new_artist" onclick="show_hide_new_artist()"/>
      
	      	<select class="custom-select" id="hidden_select">
				<option selected>Select an artiste</option>
				<option value="id">Elvis Presley</option>
				<option value="id">David Bowie</option>
				<option value="id">Freddy Mercury</option>
				<option value="id">Michael Jackson</option>
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
				<option selected>Select the difficulty</option>
				<option value="1">1</option>
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
    		<input type="text" name="cover" class="form-control" id="validationCustom01" placeholder="www.google.com/img/3557634" required>
	    	<div class="invalid-feedback">Fill in all the fields please.</div>
    	</div>
    	<div class="col-md-6 mb-3">
    		<div class="input-group-prepend">
	      		<label>Audio file</label>
	      		<input type="file" class="custom-file-input" name="mp3">
	      		<label class="custom-file-label form-control" style="margin-top: 2em" for="inputGroupFile01">Choose file</label>
	      		<div class="invalid-feedback">Please select a valid state.</div>
      		</div>
    	</div>
  	</div></br>
  	<button class="btn btn-primary" type="submit">Submit form</button>
</form>
<!---| FORM 1 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
		  		<div class="card card_margin_bt">
		    		<div class="card-header" id="headingTwo">
		      			<h2 class="mb-0">
		        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit a sample</button>
		      			</h2>
		    		</div>
		    		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 2 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Select a sample to edit it.</h5>

<input type="text" class="form-control ds-input search" id="search_sample" value="" name="search" placeholder="ex : David Bowie">
<ul class="list-group z1">
	<?php
		//display_samples();
	?>
</ul>
<div class="list-group">
	<?php
		//display_samples();
	?>
	<a href="./edit.php?id=1" name="Let's dance" id="id-1" class="list-group-item list-group-item-action search_samples"><!-- ,david bowie,musique,1980,rock,pop-->
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1 search_samples">Let's dance</h5>
			<small>1</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small>Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=2" id="id-2" class="list-group-item list-group-item-action search_samples">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1 search_samples">Life on mars</h5>
			<small class="text-muted">2</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small class="text-muted">Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=3" id="id-3" class="list-group-item list-group-item-action search_samples">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1 search_samples">Dernière danse</h5>
			<small class="text-muted">3</small>
		</div>
		<p class="mb-1">Indila</p>
		<small class="text-muted">Musique. Hit 2014, pop, variété française.</small>
	</a>
	
	<?php 
		// display_samples();
	?>
	<!-- <a href="#" class="card_attachement"><i class="fas fa-times fa-2x"></i></a> -->
</div>

<!---| FORM 2 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
	</div>

<!--------------------------------------------------------------------------------------------------------------------->
<!--| id = categories |----------------------------| id = categories |----------------------------| id = categories |-->
<!--------------------------------------------------------------------------------------------------------------------->

	<div id="categories" style="display: none;">
		<div class="jumbotron">
			<h1 class="display-4">Categories editor</h1>
			<p class="lead">Welcome on the categories editor, here you can modify the categories as you want, you can change the name, or remove from the database.</p>
			<p>To edit, modify the form below as desired.</p>
		</div>
		<div class="container" style="margin-top: 3em;">
			<?php // display_choices($_GET['action']); ?>
			<h3>Select a button to show the right form.</h3>
			<div class="accordion" id="accordionExample">
		  		<div class="card">
		    		<div class="card-header" id="headingOne">
		      			<h2 class="mb-0">
		        			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Add a category</button>
		      			</h2>
		    		</div>
		    		<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 1 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Complete this form to add a new sample in the library.</h5>

<form class="needs-validation" novalidate>
  	<div class="form-row">
    	<div class="col-md-4 mb-3">
    		<label for="validationCustom01">Name *</label>
    		<input type="text" class="form-control" id="validationCustom01" placeholder="ex : Let's dance" required>
    		<div class="valid-feedback">Okay !</div>
    	</div>

  	<button class="btn btn-primary" type="submit">Submit form</button>
</form>
<!---| FORM 1 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
		  		<!-- <div class="card card_margin_bt"> -->
		    		<div class="card-header card_margin_bt" id="headingTwo">
		      			<h2 class="mb-0">
		        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit or delete a category</button>
		      			</h2>
		    		</div>
		    		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 2 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Select a category to edit it.</h5>

<input type="hidden" id="nb_samples" value="3">
<input type="text" id="search" class="form-control ds-input search" name="search" onchange="search_samples();" placeholder="ex : David Bowie">

<div class="radiobtn">
	<a href="./view/manage.php?action=category&id=0"><label for="huey">Films</label></a>
</div>

<div class="radiobtn">
	<a href="./view/manage.php?action=category&id=1"><label for="louie">Musics</label></a>
</div>

<!---| FORM 2 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
	</div>

<!--------------------------------------------------------------------------------------------------------------------->
<!--| id = artists |----------------------------| id = artists |----------------------------| id = artists |-->
<!--------------------------------------------------------------------------------------------------------------------->

	<div id="artists" style="display: none;">
		<div class="jumbotron">
			<h1 class="display-4">Categories editor</h1>
			<p class="lead">Welcome on the categories editor, here you can modify the categories as you want, you can change the name, or remove from the database.</p>
			<p>To edit, modify the form below as desired.</p>
		</div>
		<div class="container" style="margin-top: 3em;">
			<?php // display_choices($_GET['action']); ?>
			<h3>Select a button to show the right form.</h3>
			<div class="accordion" id="accordionExample">
		  		<div class="card">
		    		<div class="card-header" id="headingOne">
		      			<h2 class="mb-0">
		        			<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Add a category</button>
		      			</h2>
		    		</div>
		    		<div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 1 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Complete this form to add a new sample in the library.</h5>

<form class="needs-validation" novalidate>
  	<div class="form-row">
    	<div class="col-md-4 mb-3">
    		<label for="validationCustom01">Name *</label>
    		<input type="text" class="form-control" id="validationCustom01" placeholder="ex : Let's dance" required>
    		<div class="valid-feedback">Okay !</div>
    	</div>

  	<button class="btn btn-primary" type="submit">Submit form</button>
</form>
<!---| FORM 1 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
		  		<!-- <div class="card card_margin_bt"> -->
		    		<div class="card-header card_margin_bt" id="headingTwo">
		      			<h2 class="mb-0">
		        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit or delete an artist</button>
		      			</h2>
		    		</div>
		    		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 2 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Select an artist to edit it.</h5>

<input type="hidden" id="nb_artists" value="3">
<input type="text" id="search" class="form-control ds-input search" name="search" onchange="search_samples();" placeholder="ex : David Bowie">

<div class="card" style="width: 18rem;">
  	<ul class="list-group list-group-flush">
	    <li class="list-group-item">
	    	<p class="cursor" data-toggle="collapse" data-target="#collapse1" aria-expanded="false" aria-controls="collapseExample">
	    		David Bowie
	    		<span class="badge badge-primary badge-pill">14</span>
	    		<a href="edit.php?action=artist"><i class="fas fa-edit"></i></a>
	    	</p>
	    	<div class="collapse" id="collapse1">
    			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  			</div>
	    </li>
	    <li class="list-group-item">
	    	<p class="cursor" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
    			David Bowie
				<i class="fas fa-sort-down fa-2x"></i>
  			</p>
  			<div class="collapse" id="collapseExample">
    			Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
  			</div>
		</li>
  	</ul>
</div>

<!---| FORM 2 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		</div>
			</div>
		</div>
	</div>
	<h1 class="display-4" id="add_ok" style="display: none; margin: 1em;">Ajout effectué avec succès.</h1>
	<h1 class="display-4" id="add_bad" style="display: none; margin: 1em;">Erreur lors de l'ajout, veuillez rééssayer.</h1>

	<!-- <div id="artists" style="display: none;">
		<h1>123d;c,lkpojerhiugvzybdfhijno</h1>
	</div> -->

	<script>
		// Focus the extended field after click
		/* $(".radiobtn").on("click", "label", function() {
			var isExtended = $(this)
				.parent(".radiobtn")
				.find(".extended");
			if (isExtended.length > 0) {
				setTimeout(function() {
					isExtended.find("textarea").focus();
				}, 1000);
			}
		}); */

/*

		// var samples = document.getElementsByClassName('search_samples');
		$("#search_sample").on("keyup",function() {
			// var samples = $("h5.search_samples").split(' ');
			// var sample;
			// var samples    = Array.from($("h5.search_samples")).map(el => el.innerText);
			// var samples_id = Array.from($("small.search_samples")).map(el => el.innerText);
			var samples = $('h5.search_samples').map(function() {
				return  $(this).text();
			});
// ---------------------------------------------------------------------------------------------------------------------
			var value_search_input = $('#search_sample').val(); // $("#search_sample").html($(this).val()); //NMP, pk ? ------------------------------
			console.log(typeof value_search_input);
			var sample;
// ---------------------------------------------------------------------------------------------------------------------
			for (var i = 0; i < samples.length; i++) {
				// alert("Hello! I am an alert box!!");
				sample = samples[i];
				if (sample.indexOf(value_search_input) < 0) {
					$('a [name="'+sample+'"]'@).attr('tgyfgccr');
				}
			}
		})
*/		if ($_GET['action'] == 'new_sample') {
			document.getElementById('add_ok')	.style.display = 'block';
		} else if ($_GET['action'] == 'new_sample_error') {
			document.getElementById('add_bad')	.style.display = 'block';
		}
	</script>
</body>
</html>