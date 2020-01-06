<?php

# ---| SQL - Database Connection |---------------------------------------------|
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

# ---| RECHERCHE D'UN ID EN COMPARANT UNE DONNÉE |-----------------------------|
function find_id_by_stmt($table, $name, $compare_tool) {
	$dbh = db_connect(); #DATABASE CONNEXION

    $result = $dbh->prepare('SELECT ID FROM ' . $table . ' WHERE ' . $compare_tool . ' = :name;');
    $result->execute(array("name" => $name));
    $result->fetch();
    foreach ($result as $id) return $id;

    if (mysql_num_rows($result) == 0) return false;
	else return $result;
}

# ---| RETURN THE NUMBER OF LINE IN SQL TABLE |--------------------------------|
function count_sql($table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$dossier = $dbh->query('SELECT COUNT(*) FROM ' . $table)->fetch();
	foreach ($dossier as $count) return $count;

	echo($count);
}

# ---| SQL - FUNCTION TO ADD AN EXTRACT (all include) |------------------------|
function add_extract($name, $difficulty, $type, $artist, $cover, $mp3, $categories) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - SAMPLES --------------------------------------
	$sql = "INSERT INTO SAMPLES (NAME, DIFFICULTY, IMG, MP3) VALUES (?, ?, ?, ?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name, $difficulty, $cover, $mp3]);
	
	# TABLE - SAMPLES TYPE ---------------------------------
	$sql = "INSERT INTO ASSOCIATIONS (EXTRACT_ID, CATEGORY_ID) VALUES (?, ?)";
	$stmt = $dbh->prepare($sql);
	if (find_id_by_stmt('CATEGORIES', $type, 'NAME') == false) {
		add_element($type, 'CATEGORIES');
	}
	$stmt->execute([ count_sql('SAMPLES'), find_id_by_stmt('CATEGORIES', $type, 'NAME') ]);

	# TABLE - SAMPLES SUB-CATEGORIES -----------------------
	for ($i = 0; $i <= strlen($categories); $i++) {
		$sql = "INSERT INTO ASSOCIATIONS (EXTRACT_ID, CATEGORY_ID, SUBCATEGORY_ID) VALUES (?, ?, ?)";
		$stmt = $dbh->prepare($sql);
		if (find_id_by_stmt('SUBCATEGORIES', $categories[$i], 'NAME') == false) {
			add_element($categories[$i], find_id_by_stmt('CATEGORIES', $categories[$i], 'NAME'), 'SUBCATEGORIES');
		}
		$stmt->execute([ count_sql("ASSOCIATIONS"), $categories[$i] ]);
	}

	# TABLE - SAMPLES ARTIST -------------------------------
	for ($i = 0; $i <= strlen($artist); $i++) {
		$sql = "INSERT INTO SAMPLES_ARTISTS (SAMPLE_ID, ARTIST_ID) VALUES (?, ?)";
		$stmt = $dbh->prepare($sql);
		if (find_id_by_stmt('ARTISTS', $artist, 'NAME') == false) {
			add_element($artist, 'ARTISTS');
		}
		$stmt->execute([ count_sql('SAMPLES'), find_id_by_stmt('ARTISTS', $artist, 'NAME') ]);
	}
}

# ---| SQL - ADD CAT / SUB-CAT / ARTIST |--------------------------------------|	
// $what = 'CATEGORIES' or 'SUB-CATEGORIES' or 'ARTISTS' but no 'EXTRACT'
function add_element($name, $table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - CAT / SUB-CAT / ARTIST -----------------------
	$sql = "INSERT INTO " . $table . " (NAME) VALUES (?)";
	$stmt = $dbh->prepare($sql);
	$stmt->execute([$name]);
}

# ---| SQL - DELETE ELEMENT |--------------------------------------------------|
// $what = 'CATEGORIES' or 'SUBCATEGORIES' or 'ARTISTS'
function delete_element($ID, $table) {
	$dbh = db_connect(); #DATABASE CONNEXION

	# TABLE - DELETE ---------------------------------------
	$sql = "DELETE FROM " . $table . " WHERE ID = " . $ID;
	$stmt = $dbh->prepare($sql);
	$stmt->execute();
}


// ----------------------------------------------------------------------------|
// ---| RECOVERY OF THE DATA NECESSARY FOR THE DISPLAY |-----------------------|
// ----------------------------------------------------------------------------|

// RETURN DATA ---------------------------------------------
function data_from_SAMPLES() {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ID, NAME, DIFFICULTY FROM SAMPLES');

	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	$samples = [];
	while ($data = $stmt->fetch()) {
		array_push($samples, ['ID' => $data['ID'], 'NAME' => $data['NAME'], 'DIFFICULTY' => $data['DIFFICULTY']]);
	}

	return $samples;
}

/*function data_from_ASSOCIATIONS() {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT SAMPLE, CATEGORY_ID, SUBCATEGORY_ID FROM ASSOCIATION');
	while ($data = $stmt->fetch())

	return $data;	
}*/

function data_from_ARTISTS() {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ID, NAME FROM ARTISTS');
	
	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	$artists = [];
	while ($data = $stmt->fetch()) {
		array_push($artists, ['ID' => $data['ID'], 'NAME' => $data['NAME']]);
	}

	return $artists;
}

function data_from_ASSOC() { // ASSOCIATION ARTIST TO SAMPLES
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ID, SAMPLE_ID, ARTIST_ID FROM SAMPLES_ARTISTS');

	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	$assoc = [];
	while ($data = $stmt->fetch()) {
		array_push($assoc, ['ID' => $data['ID'], 'SAMPLE_ID' => $data['SAMPLE_ID'], 'ARTIST_ID' => $data['ARTIST_ID']]);
	}

	return $assoc;
}

/*function data_from_CATEGORIES() {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ID, NAME FROM CATEGORIES');
	while ($data = $stmt->fetch())

	return $data;
}

function data_from_SUBCATEGORIES() {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ID, NAME FROM SUBCATEGORIES');
	while ($data = $stmt->fetch())

	return $data;
}
*/
function find_artist($sample_id) {
    $artist 	= false;
    $assoc  	= ''; 
    
    $assoc_db 	= data_from_SAMPLES();
    $artists_db = data_from_ASSOC();
    $nb_assoc 	= count_sql('SAMPLES_ARTISTS');
    
    for ($i = 0; $i < $nb_assoc && $sample_id != $assoc['SAMPLE_ID']; $i++) {
        $assoc = $assoc_db[$i];
        if ($sample_id == $assoc['SAMPLE_ID']) {
            $artist_id = $assoc['ARTIST_ID'];
            $artist_id --;
            $artist    = $artists_db[$artist_id];
        }
    }

    return $artist;
}

function db_finder($table, $what, $col, $value) {
	$dbh = db_connect(); #DATABASE CONNEXION

	// SQL - REQ -------------------------------------------
	$stmt = $dbh->query('SELECT ' . $what . ' FROM ' . $table . ' WHERE ' . $col . ' = \'' . $value . '\'');

	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	$result = [];
	while ($data = $stmt->fetch()) {
		$result = $data[$what];
	}

	if (!isset($result)) $result = 'error';
	//print_r($result);
	return $result;
} //db_finder('SAMPLES_ARTISTS', 'ARTIST_ID', 'SAMPLE_ID', 1);

function sample_infos($sample_id) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$sample_name = db_finder('SAMPLES' 		  , 'NAME' 	 		, 'ID' 		  , $sample_id);
	$artist_id 	 = db_finder('SAMPLES_ARTISTS', 'ARTIST_ID' 	, 'SAMPLE_ID' , $sample_id);
	$artist_name = db_finder('ARTISTS' 		  , 'NAME' 	 		, 'ID' 		  , $artist_id);
	$difficulty  = db_finder('SAMPLES' 		  , 'DIFFICULTY'	, 'ID' 		  , $sample_id);
	$type 		 = 'Musique';
	//$type 		 = type_by_sampleID(											$sample_id);
	$categories  = categories_by_sampleID(									    $sample_id);
	
	return [
		'SAMPLE_NAME' => $sample_name, 	'SAMPLE_ID' => $sample_id,
		'ARTIST_NAME' => $artist_id, 	'ARTIST_ID' => $artist_name,
		'CATEGORIES'  => $categories, 	'TYPE'  	=> $type,
		'DIFFICULTY'  => $difficulty
	];
}

function categories_by_sampleID($sample_id) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$stmt = $dbh->query
	("	SELECT 	SUBCATEGORIES.ID 		AS 'ID', 
				SUBCATEGORIES.NAME 		AS 'NAME'
		FROM SUBCATEGORIES
		JOIN ASSOCIATION
		ON ASSOCIATION.SUBCATEGORY_ID = SUBCATEGORIES.ID
		JOIN SAMPLES
		ON ASSOCIATION.EXTRACT_ID = SAMPLES.ID
		WHERE EXTRACT_ID = $sample_id
	");

	$categories = [];
	while ($data = $stmt->fetch()) {
		array_push($categories, ['ID' => $data['ID'], 'NAME' => $data['NAME']]);
	}

	return $categories;
/*
	// -------------------------------------------------------------------------
	// ---| RETURN CATEGORIES ID |----------------------------------------------

	// SQL - REQ -------------------------------------------
	$stmt_id = $dbh->query('SELECT SUBCATEGORIES_ID FROM ASSOCIATION WHERE EXTRACT_ID = ' . $sample_id);

	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	$categories = [];
	while ($data = $stmt_id->fetch()) {
		if (isset($data)) array_push($categories, ['ID' => $data['ID']]);
	}


	$categories_ids_sql = implode(' OR ', $categories['ID']);
	
	// -------------------------------------------------------------------------
	// ---| RETURN CATEGORIES NAME |--------------------------------------------
	$categories_name = [];
	array_push($categories_name, db_finder('CATEGORIES', 'NAME', 'ID', $categories_ids_sql));
	for ($i = 0; $i < count($categories_id); $i++) { 
		array_push($categories[$i]['ID'], ['NAME' => $data['NAME']]);	
	}

	//$stmt_name = $dbh->query('SELECT NAME FROM SUBCATEGORIES WHERE ID = ' . );

	// ENREGISTREMENT DES DONNÉES DANS UN ARRAY
	while ($data = $stmt_name->fetch()) {
		if (isset($data)) array_push($categories_name, ['NAME' => $data['NAME']]);
	}	

	return $categories;*/
}

function categories_to_add_by_sampleID($sample_id) {
	$dbh = db_connect(); #DATABASE CONNEXION

	$stmt = $dbh->query
	("	SELECT 	SUBCATEGORIES.ID 		AS 'ID', 
				SUBCATEGORIES.NAME 		AS 'NAME'
		FROM SUBCATEGORIES
		JOIN ASSOCIATION
		ON ASSOCIATION.SUBCATEGORY_ID != SUBCATEGORIES.ID
		JOIN SAMPLES
		ON ASSOCIATION.EXTRACT_ID = SAMPLES.ID
		WHERE EXTRACT_ID = $sample_id
	");

	$categories = [];
	while ($data = $stmt->fetch()) {
		array_push($categories, ['ID' => $data['ID'], 'NAME' => $data['NAME']]);
	}

	return $categories;
};

?>