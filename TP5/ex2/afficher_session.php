<?php 
	// recharge le tableau $_SESSION avec les variables de sessions enregistrées 
	session_start(); 

	// compte le nombre de fois que la page a été visitée 
	if (!isset($_SESSION['compteur']))
	{ 
 		$_SESSION['compteur'] = 1; 
	}
	else
	{ 
 		$_SESSION['compteur']++; 
	} 

	// affiche le temps écoulé depuis la dernière visite 
	$heureCourante = time() ; 
	if (!isset($_SESSION['dernierPassage']))
	{ 
 		$tempsEcoule = 0 ; 
	}
	else
	{ 
 		$tempsEcoule = $heureCourante - $_SESSION['dernierPassage']; 
	} 

	$_SESSION['dernierPassage'] = $heureCourante; 
?> 

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
        <title>Sessions PHP</title>
        
        <style type="text/css"> 
                .objet
                {
                    background:black;
                    color:white;
                }
                input, textarea
				{
					font-family: Helvetica, Times, serif; /* On modifie la police du texte tapé l'intérieur des champs */
				}
				input:focus, textarea:focus /* Quand le curseur est sur un champ (ne marche pas sur IE) */
				{
				   background-color: #FFFF99;
				}
				input:disabled
				{
					color:black;
					background-color:white;
				}
				label
				{
				   color: blue; /* Colorer en bleu tous les labels (bah oui, pourquoi pas en bleu ?) */
				   margin-left: 5px;
				} 
				legend /* On met un peu plus en valeur les titres des fieldset */
				{
				   font-family: Arial, "Arial Black", Georgia, "Times New Roman", Times, serif;
				   color: #FF9933;
				   font-weight: bold;
				}
				fieldset
				{
					margin-left: 15px;
					margin-bottom: 15px; /* Une marge pour séparer les fieldset */
				   	width: 450px;
				   	background-color: #FFFFCC;
				}
        </style>
 
    </head> 
    
    <body>
      
		<h4 class="objet">Affichage des variables de session</h4> 
		
		<fieldset style="text-align:center;">
              	
              	<legend>Etat</legend>

					<label for="vue">Vue</label>
	
						<input disabled="disabled" type="text" id="vue" name="vue" value="<?php echo $_SESSION['compteur'] ?> fois" size="8" />
	
					<label for="temps">Il y a</label>
	
						<input disabled="disabled" type="text" name="temps" id="temps" value="<?php echo $tempsEcoule ?> secondes" size="10" maxlength="20" />

			</fieldset>
			
			<hr/> 	
			
			<fieldset style="text-align:center;">
              	
              	<legend>Session</legend>

					<label for="ID">ID</label>
	
						<input disabled="disabled" type="text" id="ID" name="ID" value="<?php echo session_id() ?>" size="33" />
	
					<label for="noms">Nom</label>
	
						<input disabled="disabled" type="text" name="noms" id="noms" value="<?php echo session_name() ?>" size="11" />

			</fieldset>	
			
			<hr/> 
			
			<fieldset style="text-align:center;">
            	<legend>Client</legend>

					<label for="nom">Nom</label>

						<input disabled="disabled" type="text" id="nom" name="nom" value="<?php echo $_SESSION['nom'] ?>" size="20" maxlength="20" />

					<label for="prenom">Pr&eacute;nom</label>

						<input disabled="disabled" type="text" name="prenom" id="prenom" value="<?php echo $_SESSION['prenom'] ?>" size="20" maxlength="20" />

			</fieldset>	
		
		<br/>
		
		<a href="menu.html">Retour menu</a> 
		
		<hr/>
		
		<p>
            <a href="http://validator.w3.org/check?uri=referer">
                <img style="border:0;width:88px;height:31px" src="http://www.w3.org/Icons/valid-xhtml10-blue" alt="Valid XHTML 1.0 Strict"/>
            </a>
        
            <a href="http://jigsaw.w3.org/css-validator/check/referer">
                <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valide !" />
            </a>
        </p> 
        
    </body>
</html> 

