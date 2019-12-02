     <html>
    <head>
	<link rel="stylesheet" href="./view/css/style.css">  <!--raccorde le css de "style.css"-->

    <title>\"WHAT'S THAT MUSIQUE ?!\"</title>
    </head>

    <body>
        
   <h1> <p> Bienvenue dans <strong>"WHAT'S THAT MUSIQUE ?!"</strong><br />
    </p> </h1>
<br />
<br />
<br />
<br />
<br />
    
    
  <h5> <strong> Veuillez taper votre prénom :</strong> </h5><br />

<!-- ---------------------------------------------------- CASE DE NOM ---------------------------------------------------------------------- -->
<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- creer un boutton texte  -->
<form action="./view/test 2.php" method="POST" >
<p>
   <h2 class="boutton_millieu"> <input type="text" name="prenom" />  
    <input type="text" name="prenom1" />                            
    <input type="text" name="prenom2" />
    <input type="text" name="prenom3" />
    <br />    
    <br /> </h2>
  
</p>
<!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
<!-- ------------------------------------------ CATEGORIES ET SOUS CATEGORIE DEMUSIQUE ----------------------------------------------------- -->

<h5>
       <strong> Veuillez choisir votre gategorie de musique souhaiter :</strong> </h5><br />
	</h5>
<br />


 <!--creer un boutton select qui defile  -->

 <h2 class="boutton_millieu">
  <input type="checkbox" onclick="show_category('films')" name="recc" value="Films">
         
   <label for="FILMS">FILMS</label></h2>
<h6><div id="films" style="display:none">
    <input type="checkbox" name="films[]" value="Comedie">Comedie
	<input type="checkbox" name="films[]" value="Drame">Drame
	<input type="checkbox" name="films[]" value="Romance">Romance
	<input type="checkbox" name="films[]" value="Action">Action
	<input type="checkbox" name="films[]" value="Historique">Historique
	<input type="checkbox" name="films[]" value="Péplum/Cape et d'épée">Péplum/Cape et d'épée
	<input type="checkbox" name="films[]" value="Western">Western
	<input type="checkbox" name="films[]" value="Aventure">Aventure
	<input type="checkbox" name="films[]" value="Thriller">Thriller
	<input type="checkbox" name="films[]" value="Policier">Policier
	<input type="checkbox" name="films[]" value="Fantastique/Fantasy">Fantastique/Fantasy
	<input type="checkbox" name="films[]" value="Science Fiction">Science Fiction
	<input type="checkbox" name="films[]" value="Horreur">Horreur
	<input type="checkbox" name="films[]" value="Biopic">Biopic
	
</div></h6>
<br />
<br />

<h2 class="boutton_millieu">
<input type="checkbox" onclick="show_category('series')" name="recc" value="series">
         
  <label for="SERIES">SERIES</label></h2>
<div id="series" style="display:none">
    <input type="checkbox" name="series[]" value="Comedie">Comedie
	<input type="checkbox" name="series[]" value="Drame">Drame
	<input type="checkbox" name="series[]" value="Romance">Romance
	<input type="checkbox" name="series[]" value="Action">Action
	<input type="checkbox" name="series[]" value="Historique">Historique
	<input type="checkbox" name="series[]" value="Péplum/Cape et d'épée">Péplum/Cape et d'épée
	<input type="checkbox" name="series[]" value="Western">Western
	<input type="checkbox" name="films[]" value="Aventure">Aventure
	<input type="checkbox" name="films[]" value="Thriller">Thriller
	<input type="checkbox" name="films[]" value="Policier">Policier
	<input type="checkbox" name="films[]" value="Fantastique/Fantasy">Fantastique/Fantasy
	<input type="checkbox" name="films[]" value="Science Fiction">Science Fiction
	<input type="checkbox" name="films[]" value="Horreur">Horreur
	<input type="checkbox" name="films[]" value="Biopic">Biopic
	
</div>
<br />
<br />

<h2 class="boutton_millieu">
<input type="checkbox" onclick="show_category('dessins anime/films d_animation')" name="recc" value="dessins anime/films d_animation">
         
		 <label for="dessins anime/films d_animation">dessins anime/films d_animation</label></h2>
	   <div id="dessins anime/films d_animation" style="display:none">
		   <input type="checkbox" name="dessins anime/films d_animation[]" value="Comedie">Comedie
		   <input type="checkbox" name="dessins anime/films d_animation[]" value="Drame">Drame
		   <input type="checkbox" name="dessins anime/films d_animation[]" value="Drame">Drame
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Romance">Romance
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Action">Action
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Historique">Historique
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Péplum/Cape et d'épée">Péplum/Cape et d'épée
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Western">Western
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Aventure">Aventure
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Thriller">Thriller
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Policier">Policier
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Fantastique/Fantasy">Fantastique/Fantasy
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Science Fiction">Science Fiction
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Horreur">Horreur
           <input type="checkbox" name="dessins anime/films d_animation[]" value="Biopic">Biopic
			
		  
	   </div>
	   <br />
	   <br />

	   <h2 class="boutton_millieu">
 <input type="checkbox" onclick="show_category('Anime')" name="recc" value="Anime">
         
		 <label for="Anime">Anime</label></h2>
	   <div id="Anime" style="display:none">
		   <input type="checkbox" name="Anime[]" value="Comedie">Comedie
		   <input type="checkbox" name="Anime[]" value="Drame">Drame
		   <input type="checkbox" name="Anime[]" value="Drame">Drame
           <input type="checkbox" name="Anime[]" value="Romance">Romance
           <input type="checkbox" name="Anime[]" value="Action">Action
           <input type="checkbox" name="Anime[]" value="Historique">Historique
           <input type="checkbox" name="Anime[]" value="Péplum/Cape et d'épée">Péplum/Cape et d'épée
           <input type="checkbox" name="Anime[]" value="Western">Western
           <input type="checkbox" name="Anime[]" value="Aventure">Aventure
           <input type="checkbox" name="Anime[]" value="Thriller">Thriller
           <input type="checkbox" name="Anime[]" value="Policier">Policier
           <input type="checkbox" name="Anime[]" value="Fantastique/Fantasy">Fantastique/Fantasy
           <input type="checkbox" name="Anime[]" value="Science Fiction">Science Fiction
           <input type="checkbox" name="Anime[]" value="Horreur">Horreur
           <input type="checkbox" name="Anime[]" value="Biopic">Biopic
			
		  
	   </div>
	   <br />
	   <br />

	   <h2 class="boutton_millieu">
	   <input type="checkbox" onclick="show_category('Jeux video')" name="recc" value="Jeux video">
         
		 <label for="Jeux video">Jeux video</label></h2>
	   <div id="Jeux video" style="display:none">
		   
		   <input type="checkbox" name="Jeux video[]" value="Drame">Drame
		   <input type="checkbox" name="Jeux video[]" value="Drame">Drame
           <input type="checkbox" name="Jeux video[]" value="Romance">Romance
           <input type="checkbox" name="Jeux video[]" value="Action">Action
           <input type="checkbox" name="Jeux video[]" value="Historique">Historique
           <input type="checkbox" name="Jeux video[]" value="Péplum/Cape et d'épée">Péplum/Cape et d'épée
           <input type="checkbox" name="Jeux video[]" value="Western">Western
           <input type="checkbox" name="Jeux video[]" value="Aventure">Aventure
           <input type="checkbox" name="Jeux video[]" value="Thriller">Thriller
           <input type="checkbox" name="Jeux video[]" value="Policier">Policier
           <input type="checkbox" name="Jeux video[]" value="Fantastique/Fantasy">Fantastique/Fantasy
           <input type="checkbox" name="Jeux video[]" value="Science Fiction">Science Fiction
           <input type="checkbox" name="Jeux video[]" value="Horreur">Horreur
		   <input type="checkbox" name="Jeux video[]" value="FPS">FPS
		   <input type="checkbox" name="Jeux video[]" value="Retro">Retro
		   <input type="checkbox" name="Jeux video[]" value="RPG">RPG
		   <input type="checkbox" name="Jeux video[]" value="Reflexion">Reflexion
		   <input type="checkbox" name="Jeux video[]" value="Gestion/Strategie">Gestion/Strategie
		   <input type="checkbox" name="Jeux video[]" value="Simulation sport">Simulation sport
	   </div>
	   <br />
	   <br />

	   <h2 class="boutton_millieu">
	   <input type="checkbox" onclick="show_category('Musique')" name="recc" value="Musique">
         
		 <label for="Musique">Musique</label></h2>
	   <div id="Musique" style="display:none">
		   
		   <input type="checkbox" name="Musique[]" value="IL n'y en a pas pour le moment">IL n'y en a pas pour le moment
 
	   </div>
	   <br />
	   <br />

	   <h2 class="boutton_millieu">
	   <input type="checkbox" onclick="show_category('Publicite')" name="recc" value="Publicite">
         
		 <label for="Publicite">Publicite</label></h2>
	   <div id="Publicite" style="display:none">
		   
		   <input type="checkbox" name="Publicite[]" value="Parfumerie">Parfumerie
		   <input type="checkbox" name="Publicite[]" value="Voitures">Voitures
		   <input type="checkbox" name="Publicite[]" value="Alimentation">Alimentation


 
	   </div>
	   <br />
	   <br />

	   <h2 class="boutton_millieu">
	   <input type="checkbox" onclick="show_category('Emission TV')" name="recc" value="Emission TV">
         
		 <label for="Emission TV">Emission TV</label></h2>
	   <div id="Emission TV" style="display:none">
		   
		   <input type="checkbox" name="Emission TV[]" value="Historique">Historique
		   <input type="checkbox" name="Emission TV[]" value="Voitures">Voitures
		   <input type="checkbox" name="Emission TV[]" value="Alimentation">Alimentation


 
	   </div>
	   <br />
	   <br />


<br />
<br />
<script>
  function show_category(category)
  {
    if(document.getElementById(category).style.display == "none")
      document.getElementById(category).style.display = "";
    else
      document.getElementById(category).style.display = "none";
  }
</script>

</div>
</h2>
<br />
<br />


<!-- -------------------------------------------------------- TEMPS DE MUSIQUE (SECONDE) ---------------------------------------------------- -->
<h5><strong> Selectionner le temps de la musique (seconde):</strong></h5>
                                                            <!-- creer un bouton radio -->
<h2 class="boutton_millieu"><div>
  <input type="radio" id="3" name="drone" value="3"
         checked>
  <label for="3">3</label>
</div>

<div>
  <input type="radio" id="5" name="drone" value="5">
  <label for="5">5</label>
</div>

<div>
  <input type="radio" id="10" name="drone" value="10">
  <label for="10">10</label>
</div>

<div>
  <input type="radio" id="15" name="drone" value="15">
  <label for="15">15</label>
</div></h2>

<!-- -------------------------------------------------------- CHOIX DU TITRE ------------ ---------------------------------------------------- -->
                                                   <!-- crer aussi un boutton radio -->
<h5><strong> A trouve:</strong></h5>
<h2 class="boutton_millieu"><div>
  <input type="radio" id="L'artiste" name="trouve" value="L'artiste">
  <label for="L'artiste">L'artiste</label>
</div>

<div>
  <input type="radio" id="Le titre" name="trouve" value="Le titre">
  <label for="Le titre">Le titre</label>
</div>

<div>
  <input type="radio" id="Le titre + Artiste" name="trouve" value="Le titre + Artiste">
  <label for="Le titre + Artiste">Le titre + Artiste</label>
</div></h2>

<h2 class="boutton_millieu"><input type="submit" value="Valider" /></h2>


    </form>

    </body>
</html>



















