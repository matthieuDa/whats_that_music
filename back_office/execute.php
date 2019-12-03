<?php # ---| FICHIER DEDIER A L'EXECUTION DES FONCTIONS BACK-END |--------------
# ------------------------------------------------------------------------------

# ---| RECUPERATION DES FONCTIONS BACK-END |------------------------------------
include 'app.php';

// ---| RECUPERATION DATE - METHODE GET |---------------------------------------
/* $row['name'] 		= $_GET['name'];
$row['difficulty'] 	= $_GET['difficulty'];
$row['type'] 		= $_GET['type'];
$row['artist ']		= $_GET['artist'];
$row['cover ']		= $_GET['cover'];
$row['mp3'] 		= $_GET['mp3'];
foreach($_GET['categories'] as $row['categories']); //$recup[] = $valeur; */

// ---| DISPLAY FUNCTIONS |-----------------------------------------------------
function display_choices($action) {
	/* if ($action == 'samples')
	else if ($action == 'categories') {}
	else if ($action == 'artists') {} */
	echo 'Vous saoulez !';
}

/*function display_samples() {
	$dbh = db_connect();

	// Affichage des dossiers existants
	$samples = $dbh->query("SELECT * FROM SAMPLES")->fetchAll();

	foreach ($samples as $row_SAMPLES) {
		echo '<a href="./edit_samples?id='. $row_SAMPLES['ID'] . '" id="search" class="list-group-item list-group-item-action">';
		echo	'<div class="d-flex w-100 justify-content-between">';
		echo		'<h5 class="mb-1">' . $row_SAMPLES['NAME'] . '</h5>';
		echo		'<small>' . $row_SAMPLES['ID'] . '</small>';
		echo	'</div>';
		echo	'<p class="mb-1">' . $row_ARTISTS['ARTIST'] . '</p>';
		echo	'<small>' . ucfirst($row_CATEGORIES['CATEGORY']) . '. ' . $row_SUBCATEGORIES['SUBCATEGORY'] . ', '; 
		echo '.</small>';
		echo '</a>';
	}
}*/

// ---| AJOUTER UN NOUVEL EXTRAIT |---------------------------------------------
function adding_new_extract() {
	// execute add_cat or sub cat before execute add_extract
	if (empty($row['categories']) && !empty($new_cat) || !empty($new_sub_cat))
	/* $categories_list = [];
	for ($i = 0; $i <= strlen($categories); $i++) {
		$categories_list[$i] = $row['categories'].$i;
	} */
	return false;
	if (!empty($row['name']) && !empty($row['difficulty']) && !empty($row['type']) && !empty($row['artist ']) && !empty($row['cover ']) && !empty($row['mp3']) && !empty($row['categories']))
		return add_extract($row);
} //adding_new_extract();

/* function test() {
	echo '<h1>Test ok.</h1>';
} */
# ---| FONCTION DE TEST |-------------------------------------------------------
function test_create_extract() {
	add_extract("Let's dance", 1, 'musique', 'David Bowie', 'https://p8.storage.canalblog.com/82/14/636073/119838918_o.jpg', 'lets_dance_Dbowie', ['1980', 'disco', 'rock', 'pop']);
} test_create_extract();

function test_add_element() {
	add_element('Rom1', 'ARTISTS');
} // test_add_element();

function test_delete_element() {
	delete_element('5', 'ARTISTS');
} // test_delete_element()
?>