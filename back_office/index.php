<!DOCTYPE html>
<html>
<head>
  <title></title>
  <!-- Required meta tags -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Perso universal CSS -->
  <link rel="stylesheet" type="text/css" href="./css/style.css">

  <!-- FontAwesome CSS -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- jQuery JS -->
  <script src="jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 5em">
	<form class="needs-validation" novalidate>
	  <div class="form-row">
	    <div class="col-md-4 mb-3">
	      <label for="validationCustom01">Nom de l'extrait *</label>
	      <input type="text" class="form-control" id="validationCustom01" placeholder="ex : Let's dance" required>
	      <div class="valid-feedback">
	        Okay !
	      </div>
	    </div>
	    <div class="col-md-4 mb-3">
	      <label for="validationCustom02">Artiste</label>
	      <label class="" for="validationCustom02">Nouvel artiste</label>
		  <input type="checkbox" onclick="document.getElementById('hidden_form').style.display = (this.checked? 'block':'none'); document.getElementById('hidden_form1').style.display = (this.unchecked? 'block':'none');" ... />
	      <div class="dropdown" id="hidden_form1">
		    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		      Séléctionner un artiste
		    </button>
		    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		      <a class="dropdown-item" value="id">Elvis Presley</a>
		      <a class="dropdown-item" value="id">David Bowie</a>
		      <a class="dropdown-item" value="id">Freddy Mercury</a>
		      <a class="dropdown-item" value="id">Michael Jackson</a>
		    </div>
		  </div>
	      <div class="valid-feedback">
	        Okay !
	      </div>
	      <div id="hidden_form">
		    <input type="text" class="form-control" id="validationCustom02" placeholder="ex : David Bowie" required>
		    <div class="valid-feedback">
		       Okay !
		    </div>
		  </div>
	    </div>
	    <div class="col-md-4 mb-3">
	      <label for="validationCustomUsername">Username</label>
	      <div class="input-group">
	        <div class="input-group-prepend">
	          <span class="input-group-text" id="inputGroupPrepend">@</span>
	        </div>
	        <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
	        <div class="invalid-feedback">
	          Please choose a username.
	        </div>
	      </div>
	    </div>
	  </div>
	  <div class="form-row">
	    <div class="col-md-6 mb-3">
	      <label for="validationCustom03">City</label>
	      <input type="text" class="form-control" id="validationCustom03" required>
	      <div class="invalid-feedback">
	        Please provide a valid city.
	      </div>
	    </div>
	    <div class="col-md-3 mb-3">
	      <label for="validationCustom04">State</label>
	      <select class="custom-select" id="validationCustom04" required>
	        <option selected disabled value="">Choose...</option>
	        <option>...</option>
	      </select>
	      <div class="invalid-feedback">
	        Please select a valid state.
	      </div>
	    </div>
	    <div class="col-md-3 mb-3">
	      <label for="validationCustom05">Zip</label>
	      <input type="text" class="form-control" id="validationCustom05" required>
	      <div class="invalid-feedback">
	        Please provide a valid zip.
	      </div>
	    </div>
	  </div>
	  <div class="form-group">
	    <div class="form-check">
	      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
	      <label class="form-check-label" for="invalidCheck">
	        Agree to terms and conditions
	      </label>
	      <div class="invalid-feedback">
	        You must agree before submitting.
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