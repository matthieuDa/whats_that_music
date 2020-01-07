<?php

include './app.php';

if (empty($_GET['search']) && isset($_GET['search'])) {
	display_samples($_GET['search']);
}

function display_artists_selectinput() {
	echo '<option value="id">Michael Jackson</option>';
};

function display_subcategories($subcategories) {
        $subcategories = '';
        foreach ($subcategories as $item) {
        	$subcategories .= $item . ', ';
            array_push($subcategories, $item, ', ');
        }
        return $subcategories;
    }

function display_samples($search) {
    include './../../back_office/app.php';

    /*$samples_db[0]['ID'] = 0;
    $samples_db[1]['ID'] = 1;
    $samples_db[2]['ID'] = 2;

    $samples_db[0]['NAME'] = "Let's Dance";
    $samples_db[1]['NAME'] = "Life on mars";
    $samples_db[2]['NAME'] = "Dernière danse";*/

    //$assoc_art_samples_db   = data_from_ASSOC();            // Table d'association (sub)catégories & extraits
    //$categories_db          = data_from_CATEGORIES();       // Table contenant les noms des catégories
    //$subcategories_db       = data_from_SUBCATEGORIES();    // Table contenant les noms des sous-catégories
    //$nb_associations        = count_sql('ASSOCIATIONS');    // Retourne le nombre d'associations de categories enregistrés dans la base de donnée
 	$samples_db	= data_from_SAMPLES ();         // Table contenant l'ID, le nom et le niveau de difficulté des extraits
    $assoc_db  	= data_from_ASSOC   ();         // Table d'association artistes & extraits
    $artists_db	= data_from_ARTISTS ();         // Table contenant les noms des artistes
    
    $nb_samples	= count_sql('SAMPLES');         // Retourne le nombre d'extraits enregistrés dans la base de donnée
    $nb_assoc  	= count_sql('SAMPLES_ARTISTS'); // Retourne le nombre d'associations de categories enregistrés dans la base de donnée

    $artist_name    = "David Bowie";
    $category_name  = "Musique";
    $subcategories  = ['Pop', 'Rock'];

    for ($i = 0; $i < $nb_samples; $i++) { 
        $sample = $samples_db[$i];

        // ---| TESTS SEARCH |--------------------
        $t_search  		 = !isset ($search)					 ;
        $t_ID 	 		 = stristr($sample['ID']   , $search);
        $t_NAME 		 = stristr($sample['NAME'] , $search);
        $t_ARTIST 		 = stristr($artist['NAME'] , $search);
        $t_TYPE 		 = stristr($category_name  , $search);
        $t_SUBCATEGORIES = stristr($subcategories  , $search);

        if ($t_search || $t_ID || $t_NAME || $t_ARTIST || $t_TYPE || $t_SUBCATEGORIES) {
	        $artist = find_artist($sample['ID']);
	        if ($artist == false) $artist['NAME'] = 'Error';
	        
	        /*echo('<a href="./edit.php?id=sample-' . $sample['ID'] . '" name="' . $sample['NAME'] . '" id="sample-' . $sample['ID'] . '" class="list-group-item list-group-item-action search_samples">');
	        echo('<div class="d-flex w-100 justify-content-between">');
	        echo('<h5 class="mb-1 search_samples">' . $sample['NAME'] . '</h5>');
	        echo('<small  class="text-muted">' . $sample['ID'] . '</small>');
	        echo('</div>');
	        echo('<p class="mb-1">' . $artist['NAME'] . '</p>');
	        echo('<small class="text-muted">' . $category_name . ', ' . display_subcategories($subcategories) . '.</small>');
	        echo('</a>');*/

	        $yacine ='<a href="./edit.php?id=sample-' . $sample["ID"] . ' name="' . $sample["NAME"] . '" id="sample-' . $sample["ID"] . '" class="list-group-item list-group-item-action search_samples"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1 search_samples">' . $sample["NAME"] . '</h5><small  class="text-muted">' . $sample["ID"] . '</small></div><p class="mb-1">' . $artist["NAME"] . '</p><small class="text-muted">' . $category_name . ', ' . display_subcategories($subcategories) . '.</small></a>';
	    }
    }

    return $yacine;
}

function AAAdisplay_samples() {
	// ---| APPELLE DES FONCTIONS PHP SQL |------------------------------------|
	// ------------------------------------------------------------------------|

	$samples_db 			= data_from_SAMPLES();			// Table contenant l'ID, le nom et le niveau de difficulté des extraits.
	$assoc_db 				= data_from_ASSOCIATIONS(); 	// Table d'association (sub)catégories & extraits
	$artists_db				= data_from_ARTISTS();			// Table contenant les noms des artistes
	$assoc_art_samples_db 	= data_from_ASSOC(); 			// Table d'association artistes & extraits
	$categories_db			= data_from_CATEGORIES();		// Table contenant les noms des catégories
	$subcategories_db		= data_from_SUBCATEGORIES();	// Table contenant les noms des sous-catégories

	$nb_samples 			= count_sql('SAMPLES');			// Retourne le nombre d'extraits enregistrés dans la base de donnée
	$nb_assoc 				= count_sql('ASSOCIATIONS');	// Retourne le nombre d'associations de categories enregistrés dans la base de donnée


	// ---| AFFICHAGE DES CARTES HTML |----------------------------------------|
	// ------------------------------------------------------------------------|

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
		
		$subcategories_name = [];
		// ENREGISTREMENT DES SOUS CATEGORIES
		for ($j = 0; $j < $nb_assoc; $j++) { 
			if ($assoc_db[$j]['SAMPLE_ID'] == $samples_db[$i]['ID'] && !isset($assoc_db[$j]['SUBCATEGORY_ID'])) {
				$subcategories_name .= $subcategories_db[$j]['NAME'];
			}
		}
		$display_subcategories = rtrim($subcategories_name, ', ');

		echo('<a href="./edit.php?id=' . $samples_db[$i]['ID'] . '" name="' . $samples_db[$i]['NAME'] . '" id="id-' . $samples_db[$i]['ID'] . '" class="list-group-item list-group-item-action search_samples">');
		echo('\t<div class="d-flex w-100 justify-content-between">');
		echo('\t\t<h5 class="mb-1 search_samples">' . $samples_db[$i]['NAME'] . '</h5>');
		echo('\t\t<small>' . $samples_db[$i]['ID'] . '</small>');
		echo('\t</div>');
		echo('\t<p class="mb-1 search">' . $artist_name . '</p>');
		echo('\t<small>' . $category_name . ', ' . $display_subcategories . '.</small>');
		echo('</a>');
	}
};

function display_artists() {
	// ---| APPELLE DES FONCTIONS PHP SQL |------------------------------------|
	// ------------------------------------------------------------------------|

	$artists_db				= data_from_ARTISTS();			// Table contenant les noms des artistes
	$nb_artists 			= count_sql('ARTISTS');			// Retourne le nombre d'extraits enregistrés dans la base de donnée


	// ---| AFFICHAGE DES CARTES HTML |----------------------------------------|
	// ------------------------------------------------------------------------|

	for ($i = 0; $i < $nb_artists; $i++) { 
		echo('<a href="./edit.php?id=' . $samples_db[$i]['ID'] . '" name="' . $samples_db[$i]['NAME'] . '" id="id-' . $samples_db[$i]['ID'] . '" class="list-group-item list-group-item-action search_samples">');
		echo('\t<div class="d-flex w-100 justify-content-between">');
		echo('\t\t<h5 class="mb-1 search_samples">' . $samples_db[$i]['NAME'] . '</h5>');
		echo('\t\t<small>' . $samples_db[$i]['ID'] . '</small>');
		echo('\t</div>');
		echo('\t<p class="mb-1 search">' . $artist_name . '</p>');
		echo('\t<small>' . $category_name . ', ' . $display_subcategories . '.</small>');
		echo('</a>');
	}
};

function display_subcategories_to_add($sample_id) {
	// Affiche les catégories non ajoutées au titre
	$categories = categories_to_add_by_sample_id($sample_id);
	foreach ($categories as $category) { 
		echo('<a class="dropdown-item" href="#" id="subcategory-' . $category['ID'] . '" onclick="AJAX_delete">' . $category['NAME'] . '</a>');
	}
}


?>