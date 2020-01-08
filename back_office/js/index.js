//---| PAGE MANAGER |-----------------------------------------------------------
function page_manager(display) {
    // display = home / samples / categories / artists / albums / tmp / error
    document.getElementById('home')         .style.display = 'none';
    document.getElementById('samples')      .style.display = 'none';
    document.getElementById('categories')   .style.display = 'none';
    document.getElementById('artists')      .style.display = 'none';
    document.getElementById('albums')       .style.display = 'none';
    document.getElementById('tmp')          .style.display = 'none';
    document.getElementById('error')        .style.display = 'none';

    document.getElementById(display)        .style.display = 'block';
}

function $_GET(param) {
    var vars = {};
    window.location.href.replace(location.hash, '').replace(
        /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
        function (m, key, value) {  // callback
            vars[key] = value !== undefined ? value : '';
        }
    );

    if (param) return vars[param] ? vars[param] : null;
    return vars;
}

var $_GET = $_GET();

//document.getElementById('display_samples').appendChild(display_samples(''));

// -----------------------------------------------------------------------------

if      ($_GET['action'] == 'new_sample')       document.getElementById('add_ok') .style.display = 'block';
else if ($_GET['action'] == 'new_sample_error') document.getElementById('add_bad').style.display = 'block';

/* function yacine() {
    $samples_db = data_from_SAMPLES ();         // Table contenant l'ID, le nom et le niveau de difficulté des extraits
    $assoc_db   = data_from_ASSOC   ();         // Table d'association artistes & extraits
    $artists_db = data_from_ARTISTS ();         // Table contenant les noms des artistes
    
    $nb_samples = count_sql('SAMPLES');         // Retourne le nombre d'extraits enregistrés dans la base de donnée
    $nb_assoc   = count_sql('SAMPLES_ARTISTS'); // Retourne le nombre d'associations de categories enregistrés dans la base de donnée

    $artist_name    = "David Bowie";
    $category_name  = "Musique";
    $subcategories  = ['Pop', 'Rock'];
    
    $yacine = "";
    for ($i = 0; $i < $nb_samples; $i++) { 
        $sample = $samples_db[$i];

        // ---| TESTS SEARCH |--------------------
        $t_search        = !isset ($search)                  ;
        $t_ID            = stristr($sample['ID']   , $search);
        $t_NAME          = stristr($sample['NAME'] , $search);
        $t_ARTIST        = stristr($artist['NAME'] , $search);
        $t_TYPE          = stristr($category_name  , $search);
        $t_SUBCATEGORIES = stristr($subcategories  , $search);

        if ($t_search || $t_ID || $t_NAME || $t_ARTIST || $t_TYPE || $t_SUBCATEGORIES) {
            $artist = find_artist($sample['ID']);
            if ($artist == false) $artist['NAME'] = 'Error';
            
            echo('<a href="./edit.php?id=sample-' . $sample['ID'] . '" name="' . $sample['NAME'] . '" id="sample-' . $sample['ID'] . '" class="list-group-item list-group-item-action search_samples">');
            echo('<div class="d-flex w-100 justify-content-between">');
            echo('<h5 class="mb-1 search_samples">' . $sample['NAME'] . '</h5>');
            echo('<small  class="text-muted">' . $sample['ID'] . '</small>');
            echo('</div>');
            echo('<p class="mb-1">' . $artist['NAME'] . '</p>');
            echo('<small class="text-muted">' . $category_name . ', ' . display_subcategories($subcategories) . '.</small>');
            echo('</a>');

            //$yacine +='<a href="./edit.php?id=sample-' . $sample["ID"] . ' name="' . $sample["NAME"] . '" id="sample-' . $sample["ID"] . '" class="list-group-item list-group-item-action search_samples"><div class="d-flex w-100 justify-content-between"><h5 class="mb-1 search_samples">' . $sample["NAME"] . '</h5><small  class="text-muted">' . $sample["ID"] . '</small></div><p class="mb-1">' . $artist["NAME"] . '</p><small class="text-muted">' . $category_name . ', ' . display_subcategories($subcategories) . '.</small></a>';
        }
    }
} */


// ---| AJAX |------------------------------------------------------------------
// -----------------------------------------------------------------------------

// AJAX - New element --------------------------------------
function submit_new_element() { 
    var name, table;

    // Table management
    if (typeof $('input[name=radio-new_category]:checked').val() == undefined) {
        window.alert('Connard -> ' + $('input[name=radio-new_category]:checked').val());
        // page_manager('error');
        return false;
    } else {
        table = $('input[name=radio-new_category]:checked').val();
    }

    // Name management
    if (typeof $('#new_category_name').val() == undefined) {
        window.alert('Remplis le nom -> ' + $('#new_category_name').val());
        break;
    } else {
        name = $('#new_category_name').val();
    }

    $.ajax({
        url      : 'new_element.php',
        type     : 'GET',
        data     : 'element=' + table + '&name=' + name,
        dataType : 'html',

        success  : function(code_html, statut) {
            $("#tmp").innerHTML = code_html;
            page_manager('tmp');
        },
        error    : function(resultat, statut, erreur) {
            page_manager('error');
        },
        complete : function(resultat, statut) {}
    });
};




// $(document).ready(function(){ /* things here */ });
