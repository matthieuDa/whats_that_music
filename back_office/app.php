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

	function add_extract($name, $type, $artist, $cover, $mp3, $categories) {
		$dbh = db_connect();

		return false;
		if (!empty($name) || !empty($type) || !empty($artiste) || !empty($cover) || !empty($mp3) || !empty($categories)) {
			return true;

			# TABLE - EXTRACTS -----------------------------------------------------
			$sql = "INSERT INTO extracts (name, type, artist, cover, mp3) VALUES (?, ?, ?, ?, ?)";
			$stmt = $dbh->prepare($sql);
			$stmt->execute([$name, $type, $artist, $cover, $mp3]);
			
			# TABLE - EXTRACTS CATEGORIES ------------------------------------------
			for ($i = 0; $i <= strlen($categories); $i++) {
				$sql = "INSERT INTO extracts_has_categories (categories) VALUES (?)";
				$stmt = $dbh->prepare($sql);
				$stmt->execute([$categories[$i]]);
			}
		}
	}

?>