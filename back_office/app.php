<?php

# ---| SQL - Database Connection |----------------------------------------------
function db_connect() {
	$user = 'root';
	$pswd = 'root';

	try { 
		$dbh = new PDO('mysql:host=localhost; dbname=whats_that_music', $user, $pswd);
	} catch (Exception $e) {
		die('Erreur : ' . $e -> getMessage());
	}

	return $dbh;
}

# ---| RECHERCHE D'UN ID EN COMPARANT UNE DONNÉE |------------------------------
/* function find_id_by_stmt($table, $name, $compare_tool) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$dossier = $dbh->query("SELECT ID FROM $table WHERE $compare_tool = \"$name\"")->fetchAll();
	foreach ($dossier as $id) return $id;
} */
function find_id_by_stmt($table, $name, $compare_tool) {
	$dbh = db_connect(); #DATABASE CONNEXION

    $result = $bdd->prepare('SELECT ID FROM $table WHERE $compare_tool = :name;');
    $result->execute(array("name" => $name));
    $result->fetch();
    foreach ($result as $id) return $id;

    return $result;
}

# ---| RETURN THE NUMBER OF LINE IN SQL TABLE |---------------------------------
function count_sql($table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$dossier = $dbh->query("SELECT COUNT(*) FROM $table")->fetch();
	foreach ($dossier as $count) return $count;
}

# ---| SQL - FUNCTION TO ADD AN EXTRACT (all include) |-------------------------
function add_extract($name, $difficulty, $type, $artist, $cover, $mp3, $categories) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - SAMPLES -----------------------------------------------
	$sql = "INSERT INTO SAMPLES (NAME, DIFFICULTY, IMG, MP3) VALUES (?, ?, ?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name, $difficulty, $cover, $mp3]);
	
	# TABLE - SAMPLES TYPE ------------------------------------------
	$sql = "INSERT INTO ASSOCIATIONS (EXTRACT_ID, CATEGORY_ID) VALUES (?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([/*count_sql('SAMPLES')*/0, find_id_by_stmt('CATEGORIES', $type, 'NAME')]);

	# TABLE - SAMPLES SUB-CATEGORIES --------------------------------
	for ($i = 0; $i <= strlen($categories); $i++) {
		$sql = "INSERT INTO ASSOCIATIONS (EXTRACT_ID, SUBCATEGORY_ID) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([/*count_sql("ASSOCIATIONS")*/ 0, $categories[$i]]);
	}

	# TABLE - SAMPLES ARTIST ----------------------------------------
	for ($i = 0; $i <= strlen($artist); $i++) {
		$sql = "INSERT INTO SAMPLES_ARTISTS (EXTRACT, ARTIST) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([count_sql('SAMPLES'), find_id_by_stmt('ARTISTS', $artist, 'NAME')]);
	}
}

# ---| SQL - ADD CAT / SUB-CAT / ARTIST |---------------------------------------	
// $what = 'CATEGORIES' or 'SUB-CATEGORIES' or 'ARTISTS' but no 'EXTRACT'
function add_element($name, $table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - CAT / SUB-CAT / ARTIST ---------------------------------
	$sql = "INSERT INTO " . $table . " (NAME) VALUES (?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name]);
}

# ---| SQL - DELETE ELEMENT |---------------------------------------------------
// $what = 'CATEGORIES' or 'SUBCATEGORIES' or 'ARTISTS'
function delete_element($ID, $table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - DELETE ---------------------------------
	$sql = "DELETE FROM " . $table . " WHERE ID = " . $ID;
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
}


?>