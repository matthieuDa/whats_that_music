<?php

include './app.php';

function display() {

// ---| APPELLE DES FONCTIONS PHP SQL |----------------------------------------|
// ----------------------------------------------------------------------------|

$samples_db 			= data_from_SAMPLES();			// Table contenant l'ID, le nom et le niveau de difficulté des extraits.
$assoc_db 				= data_from_ASSOCIATIONS(); 	// Table d'association (sub)catégories & extraits
$artists_db				= data_from_ARTISTS();			// Table contenant les noms des artistes
$assoc_art_samples_db 	= data_from_ASSOC(); 			// Table d'association artistes & extraits
$categories_db			= data_from_CATEGORIES();		// Table contenant les noms des catégories
$subcategories_db		= data_from_SUBCATEGORIES();	// Table contenant les noms des sous-catégories

$nb_samples 			= count_sql('SAMPLES');			// Retourne le nombre d'extraits enregistrés dans la base de donnée
$nb_assoc 				= count_sql('ASSOCIATIONS');	// Retourne le nombre d'associations de categories enregistrés dans la base de donnée


// ---| AFFICHAGE DES CARTES HTML |--------------------------------------------|
// ----------------------------------------------------------------------------|

for ($i = 0; $i < $nb_samples; $i++) { 
	// ENREGISTREMENT DE L'ARTISTE
	for ($j = 0; $assoc_art_samples_db[$j]['SAMPLE_ID'] != $samples_db[$i]['ID']; $j++);
	$artist_name = $artists_db[$j]['NAME'];

	// ENREGISTREMENT DE LA CATEGORIE
	for ($j = 0; $j < $nb_assoc; $j++) { 
		if ($assoc_db[$j]['SAMPLE_ID'] == $samples_db[$i]['ID'] && !isset($assoc_db[$j]['CATEGORY_ID'])) {
			$category_name = $categories_db[$j]['NAME'];
			break;
		}
	}
	
	// ENREGISTREMENT DES SOUS CATEGORIES
	for ($j = 0; $j < $nb_assoc; $j++) { 
		if ($assoc_db[$j]['SAMPLE_ID'] == $samples_db[$i]['ID'] && !isset($assoc_db[$j]['SUBCATEGORY_ID'])) {
			$subcategories_name[] .= $subcategories_db[$j]['NAME'];
		}
	}
	$display_subcategories = rtrim($subcategories_name, ', ');

	echo ('<a href="./edit.php?id=' . $samples_db[$i]['ID'] . '" name="' . $samples_db[$i]['NAME'] . '" id="id-' . $samples_db[$i]['ID'] . '" class="list-group-item list-group-item-action search_samples">');
	echo('\t<div class="d-flex w-100 justify-content-between">');
	echo('\t\t<h5 class="mb-1 search_samples">' . $samples_db[$i]['NAME'] . '</h5>');
	echo('\t\t<small>' . $samples_db[$i]['ID'] . '</small>');
	echo('\t</div>');
	echo('\t<p class="mb-1 search">' . $artist_name . '</p>');
	echo('\t<small>' . $category_name . ', ' . $display_subcategories . '.</small>');
	echo('</a>');

}
};
?>