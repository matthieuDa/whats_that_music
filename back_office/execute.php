<?php # ---| FICHIER DEDIER A L'EXECUTION DES FONCTIONS BACK-END |--------------
# ------------------------------------------------------------------------------

# ---| RECUPERATION DES FONCTIONS BACK-END |------------------------------------
include './app.php';

// ---| RECUPERATION DATE - METHODE GET |---------------------------------------
$row['name'] 		= $_GET['name'];
$row['difficulty'] 	= $_GET['difficulty'];
$row['type'] 		= $_GET['type'];
$row['artist ']		= $_GET['artist'];
$row['cover ']		= $_GET['cover'];
$row['mp3'] 		= $_GET['mp3'];
$row['categories'] 	= $_GET['categories'];
foreach($_GET['categories'] as $row['categories']); //$recup[] = $valeur;


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
}
?>