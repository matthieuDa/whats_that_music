<?php

const CATEGORIES = 
[
    'films',
    'series',
    'dessins anime/films d_animation',
    'Anime',
    'Jeux video',
    'Musique',
    'Publicite',
    'Emission TV'
];

?>

<p>Bienvenue !</p>
<p>Bonjour les personnes participant sont : <?php echo $_POST['prenom'],', ',$_POST['prenom1'],', ',$_POST['prenom2'],', ',$_POST['prenom3']; ?> </p>
<br />
<p>Vos categories sont : </p>
<?php
foreach(CATEGORIES as $category){
    echo "<br>".$category.":<br>";
    if(isset($_POST[$category]))
    {
        foreach($_POST[$category] as $subcategory)
            echo $subcategory."<br>";
    }
    else echo "You didn't chose anything for this catergory <br>"; 
}
?> 


<!-- <p> test <?php echo $_POST['rec']?></p> -->
<p>Votre temps d'extraits est de : <?php echo $_POST['drone']?> secondes</p>
<br />
<p>Vous avez choisis de jouer en trouvant  : <?php echo $_POST['trouve']?> </p>
<p> <a href="./../index.php">clique ici</a> pour revenir à l'acceuil</p>


   
       