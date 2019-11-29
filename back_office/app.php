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

	function find_id_by_smt($table, $name, $compare_tool) {}
		$dbh = dbConnect();

		$dossier = $dbh->query("SELECT ID FROM $table WHERE $compare_tool = \"$name\"")->fetchAll();
		foreach ($dossier as $id) return $id;
	}

	function count_sql($table) {
		$dbh = dbConnect();

		$dossier = $dbh->query("SELECT COUNT(*) FROM $table")->fetchAll();
		foreach ($dossier as $count) return $count;
	}

	function add_extract($name, $difficulty, $type, $artist, $cover, $mp3, $categories) {
		$dbh = db_connect();

		return false;
		if (!empty($name) && !empty($difficulty) && !empty($type) && !empty($artist) && !empty($cover) && !empty($mp3) && !empty($categories)) {
			return true;

			# TABLE - EXTRACTS -------------------------------------------------
			$sql = "INSERT INTO EXTRACTS (NAME, DIFFICULTY, IMG, MP3) VALUES (?, ?, ?, ?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([$name, $difficulty, $cover, $mp3]);
			
			# TABLE - EXTRACTS TYPE --------------------------------------------
			$sql = "INSERT INTO EXTRACTS_has_(SUB)CATEGORIES (EXTRACT, CATEGORY) VALUES (?, ?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([count_sql('EXTRACTS'), find_id_by_stmt('CATEGORIES', $type, 'CATEGORY')]);

			# TABLE - EXTRACTS SUB-CATEGORIES ----------------------------------
			for ($i = 0; $i <= strlen($categories); $i++) {
				$sql = "INSERT INTO EXTRACTS_has_(SUB)CATEGORIES (EXTRACT, SUB-CATEGORY) VALUES (?, ?)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute([count_sql("EXTRACTS_has_(SUB)CATEGORIES"), $categories[$i]]);
			}

			# TABLE - EXTRACTS ARTIST ------------------------------------------
			for ($i = 0; $i <= strlen($categories); $i++) {
				$sql = "INSERT INTO EXTRACTS_has_ARTISTS (EXTRACT, ARTIST) VALUES (?, ?)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute([count_sql('EXTRACTS'), find_id_by_stmt('ARTISTS', $artist, 'NAME')]);
			}
		}	
	}

	function add_category($name, $cat) {
		$dbh = dbConnect();

		if ($cat === true) {
			# TABLE - EXTRACTS TYPE --------------------------------------------
			$sql = "INSERT INTO CATEGORIES (NAME) VALUES (?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([$name]);
		} else {
			# TABLE - EXTRACTS TYPE --------------------------------------------
			$sql = "INSERT INTO SUB-CATEGORIES (NAME) VALUES (?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([$name]);
		}
		
		/*# FIND ID OF THE NEW CATEGORY
		$category = $dbh->query("SELECT * FROM CATEGORIES WHERE CATEGORY LIKE \"$name\"")->fetchAll();

		echo "<h2>Résultat de la recherche</h2>\n";
		echo "<ol>\n";
		foreach ($dossier as $id) {

		}
		return $id;*/
	}

?>