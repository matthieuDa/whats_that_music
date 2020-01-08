<!DOCTYPE html>
<html>
<head>
	<title>WTMusic</title>

    <!-- Required meta tags --------------------------------------------------->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Radio button CSS ----------------------------------------------------->
    <link rel="stylesheet" type="text/css" href="./../view/CSS/radio.css">

    <!-- FontAwesome CSS ------------------------------------------------------>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Bootstrap CSS -------------------------------------------------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Bootstrap JS --------------------------------------------------------->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
            integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
            integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
            crossorigin="anonymous"></script>

    <style type="text/css">
    	body 		{	background-color 	: #13141A 			; 	}
    	label		{	color 				: white 			;	}
    </style>
</head>
<body>
	<form style="margin: 3em;">
		<div class="form-group">
			<label>Email address</label>
			<input type="email" class="form-control" placeholder="name@example.com">
		</div>
		<div class="form-group">
			<label>Example select</label>
			<select class="form-control">
				<option>1</option>
				<option>2</option>
				<option>3</option>
				<option>4</option>
				<option>5</option>
			</select>
		</div>
		<div class="form-group">
			<label>Subcategories</label>
			<select multiple class="form-control">
				<option value="subcat_name1§1" onclick="add_subcat(this.value);">subcat_name1</option>
				<option value="subcat_name2§2" onclick="add_subcat(this.value);">subcat_name2</option>
				<option value="subcat_name3§3" onclick="add_subcat(this.value);">subcat_name3</option>
			</select>
		</div>
		<div class="form-group" id="subcats">
		</div>
		<div class="form-group">
			<label>Example textarea</label>
			<textarea class="form-control" rows="3"></textarea>
		</div>

		<input id="subcategories" name="subcategories" type="hidden" value="">
	</form>
</body>
<script type="text/javascript">
	function add_subcat(data) {
		var split = data.split('§'); 
		var name  = split[0];
		var id 	  = split[1];

		var subcat_list = [];
		
		var input_value = document.getElementById('subcategories').value;
		subcat_list = input_value.split(',');

		subcat_list.push(id);

		//find = false;
		//for (var i = 0; i < subcat_list.length; i++) if (subcat_list[i] == id) find = true;

		//if (find = false) {
			document.getElementById('subcategories').value = subcat_list.join();
			// document.getElementById('subcats').append("<label class=\"categories\" value=\"" + name + "§" + id + "\" onclick=\"remove_subcat(this.value);\">" + name + "</label>");
			// document.getElementById('subcats').append('<label class="categories" value="' + name + '§' + id + '" onclick="remove_subcat(this.value);">' + name + '</label>');
			document.getElementById('subcats').append(\<label class='categories' value= name + "§" + id + onclick=remove_subcat(this.value);> + name + <\/label>);
		//}
	};

	function remove_subcat(data) {
		var split = data.split('§'); 
		var name  = split[0];
		var id 	  = split[1];

		var subcat_list = [];
		
		var input_value = document.getElementById('subcategories').value;
		subcat_list = input_value.split(',');

		for (var i = 0; i < subcat_list.length; i++) {
			if (subcat_list[i] == id) subcat_list.splice(i, 1);
		}

		document.getElementById('subcategories').value = subcat_list.join();
		document.getElementById('subcats').innerHTML = '<label class="categories" value="' + name + '§' + id + '" onclick="remove_subcat(this.value);">' + name + '</label>';
	};
</script>
</html>