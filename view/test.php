<!DOCTYPE html>
<html>
<head>
    <title>What's that music</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<?php $CATEGORIES = [ 'Film', 'Serie', 'Anime', 'Jeu video', 'Musique', 'Publicite', 'Emission TV' ]; ?>

<body>
    <h1>What's that music ?!</h1>
    <h5>Bienvenue</h5>
    <p>Voici la liste des joueurs : <?php echo $_POST['prenom[0]'],', ',$_POST['prenom[1]'],', ',$_POST['prenom[2]'],', ',$_POST['prenom[3]']; ?></p></br>
    <p>Les catégories séléctionnés sont : <?php
    foreach($CATEGORIES as $category){
        echo "<br>".$category.":<br>";
        if(isset($_POST[$category]))
        foreach($_POST[$category] as $subcategory) echo $subcategory."<br>";
        else echo "You didn't chose anything for this catergory <br>"; 
    } ?></p>

    <!-- <p> test <?php // echo $_POST['rec']?></p> -->
    <p>Le temps des extraits est de <?php echo $_POST['drone']?> secondes.<br/>
    Vous devrez trouver <?php echo $_POST['trouve']?>.</br>
    <a href="./../index.php">Clique ici</a> pour revenir à l'acceuil</p>
</body>
</html>       