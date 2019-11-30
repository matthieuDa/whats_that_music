<?php

# ---| SQL - Database Connection |----------------------------------------------
function db_connect() {
	$user = 'root';
	$pswd = 'root';

	try { 
		$dbh = new PDO('mysql:host=localhost; dbname=WTM', $user, $pswd);
	} catch (Exception $e) {
		die('Erreur : ' . $e -> getMessage());
	}

	return $dbh;
}

# ---| RECHERCHE D'UN ID EN COMPARANT UNE DONNÉE |------------------------------
function find_id_by_smt($table, $name, $compare_tool) {
	$dbh = dbConnect(); #DATABASE CONNEXION

	$dossier = $dbh->query("SELECT ID FROM $table WHERE $compare_tool = \"$name\"")->fetchAll();
	foreach ($dossier as $id) return $id;
}

# ---| RETURN THE NUMBER OF LINE IN SQL TABLE |---------------------------------
function count_sql($table) {
	$dbh = dbConnect(); #DATABASE CONNEXION

	$dossier = $dbh->query("SELECT COUNT(*) FROM $table")->fetchAll();
	foreach ($dossier as $count) return $count;
}

# ---| SQL - FUNCTION TO ADD AN EXTRACT (all include) |-------------------------
function add_extract($name, $difficulty, $type, $artist, $cover, $mp3, $categories) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - EXTRACTS -----------------------------------------------
	$sql = "INSERT INTO EXTRACTS (NAME, DIFFICULTY, IMG, MP3) VALUES (?, ?, ?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name, $difficulty, $cover, $mp3]);
	
	# TABLE - EXTRACTS TYPE ------------------------------------------
	$sql = "INSERT INTO EXTRACTS_has_(SUB)CATEGORIES (EXTRACT, CATEGORY) VALUES (?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([count_sql('EXTRACTS'), find_id_by_stmt('CATEGORIES', $type, 'CATEGORY')]);

	# TABLE - EXTRACTS SUB-CATEGORIES --------------------------------
	for ($i = 0; $i <= strlen($categories); $i++) {
		$sql = "INSERT INTO EXTRACTS_has_(SUB)CATEGORIES (EXTRACT, SUB-CATEGORY) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([count_sql("EXTRACTS_has_(SUB)CATEGORIES"), $categories[$i]]);
	}

	# TABLE - EXTRACTS ARTIST ----------------------------------------
	for ($i = 0; $i <= strlen($artist); $i++) {
		$sql = "INSERT INTO EXTRACTS_has_ARTISTS (EXTRACT, ARTIST) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		$stmt->execute([count_sql('EXTRACTS'), find_id_by_stmt('ARTISTS', $artist, 'NAME')]);
	}
}

# ---| SQL - ADD CAT / SUB-CAT / ARTIST |---------------------------------------	
// $what = 'CATEGORIES' or 'SUB-CATEGORIES' or 'ARTISTS' but no 'EXTRACT'
function add_element($name, $what) {
	$dbh = dbConnect(); #DATABASE CONNEXION

	# TABLE - CAT / SUB-CAT / ARTIST ---------------------------------
	$sql = "INSERT INTO ".$what." (NAME) VALUES (?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name]);
}

# ---| SQL - DELETE ELEMENT |---------------------------------------------------
// $what = 'CATEGORIES' or 'SUB-CATEGORIES' or 'ARTISTS'
function delete_element($ID, $what) {
	$dbh = dbConnect(); #DATABASE CONNEXION

	# TABLE - DELETE ---------------------------------
	$sql = "DELETE FROM " . $what . " WHERE ID = " . $ID;
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
}


?>