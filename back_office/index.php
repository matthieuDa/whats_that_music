<!DOCTYPE html>
<html>
<head>
	<title>WTM - Back-office</title>

	<!-- Required meta tags -->
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Radio button CSS -->
	<link rel="stylesheet" type="text/css" href="./../view/CSS/radio.css">

	<!-- FontAwesome CSS -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<!-- Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<!-- jQuery JS -->
	<script src="jquery-3.4.1.min.js"></script>

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
		.cursor			{	cursor 			: pointer 	; }
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
  	</script>

  	 <!-- Perso PHP -->
	<?php include './../execute.php'; ?>
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
  	</div>
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

<input type="text" class="form-control ds-input search" name="search" placeholder="ex : David Bowie">
<ul class="list-group z1">
	<?php
		//display_samples();
	?>
</ul>
<div class="list-group">
	<?php
		//display_samples();
	?>
	<a href="./edit.php?id=263" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Let's dance</h5>
			<small>263</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small>Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=131" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Life on mars</h5>
			<small class="text-muted">131</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small class="text-muted">Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=462" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Dernière danse</h5>
			<small class="text-muted">462</small>
		</div>
		<p class="mb-1">Indila</p>
		<small class="text-muted">Musique. Hit 2014, pop, variété française.</small>
	</a>
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
		        		<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Edit or delete a category.</button>
		      			</h2>
		    		</div>
		    		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
		      			<div class="card-body">
<!---| FORM 2 - Start |---------------------------------------------------------------------------| FORM 1 - Start |--->
<h5>Select a category to edit it.</h5>

<input type="text" class="form-control ds-input search" name="search" placeholder="ex : David Bowie">

<div class="radiobtn">
		<input type="checkbox" id="huey" name="category" value="huey" checked />
		<label for="huey">Musics</label>
	</div>
<div class="radiobtn">
	<input type="checkbox" name="category" value="louie"/>
	<label>Films</label>
</div>

<ul class="list-group z1">
	<?php
		//display_samples();
	?>
</ul>


<!-- --- -->


<h5>Select a sample to edit it.</h5>

<input type="text" class="form-control ds-input search" name="search" placeholder="ex : David Bowie">
<ul class="list-group z1">
	<?php
		//display_samples();
	?>
</ul>
<div class="list-group">
	<?php
		//display_samples();
	?>
	<a href="./edit.php?id=263" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Let's dance</h5>
			<small>263</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small>Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=131" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Life on mars</h5>
			<small class="text-muted">131</small>
		</div>
		<p class="mb-1">David Bowie</p>
		<small class="text-muted">Musique. 1980, rock, pop.</small>
	</a>
	<a href="./edit.php?id=462" id="search" class="list-group-item list-group-item-action">
		<div class="d-flex w-100 justify-content-between">
			<h5 class="mb-1">Dernière danse</h5>
			<small class="text-muted">462</small>
		</div>
		<p class="mb-1">Indila</p>
		<small class="text-muted">Musique. Hit 2014, pop, variété française.</small>
	</a>
	<!-- <a href="#" class="card_attachement"><i class="fas fa-times fa-2x"></i></a> -->
</div>


<!---| FORM 2 - End |-------------------------------------------------------------------------------| FORM 1 - End |--->
		      			</div>
		    		</div>
		  		<!-- </div> -->
			</div>
		</div>
	</div>
	<!-- <div id="artists" style="display: none;">
		<h1>123d;c,lkpojerhiugvzybdfhijno</h1>
	</div> -->

	<script>
		// Focus the extended field after click
		$(".radiobtn").on("click", "label", function() {
			var isExtended = $(this)
				.parent(".radiobtn")
				.find(".extended");
			if (isExtended.length > 0) {
				setTimeout(function() {
					isExtended.find("textarea").focus();
				}, 1000);
			}
		});
	</script>
</body>
</html>