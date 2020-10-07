<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
    <head> 
        <meta content="text/html; charset=ISO-8859-1" http-equiv="content-type" />
        <title>Scripts du c&ocirc;t&eacute; serveur avec PHP</title>
        
        <style type="text/css"> 
                .objet
                {
                    background:black;
                    color:white;
                }
        </style>
        
    </head> 
    
    <body> 
 
        <h4 class="objet">Exemple d'introduction</h4>
        
        <h4>Hello World</h4>
        
        <p>
        	Hello PHP, nous sommes le <?php echo Date("j/m/Y"); ?>
        </p>
        
      	<h4>Bonjoir</h4>
        	
      	<p>
	        Nous sommes le <?php echo Date("j/m/Y"); ?><br/> 
			
			<?php  
		        echo "il est ".Date("H:i:s")."<br>"; 
		        if ( Date("H") < 12 )
		        { 
	            	echo "Bon matin .."; 
		        } 
		        else
		        { 
	           		echo "Bonne apr&egrave;s midi .."; 
		        }
		 	?>
      	</p>
        
        <h4 class="objet">Variables d'environnement</h4>
        
        <h4>Configuration Client</h4>
        
        <?php 
			$datetime=date("d/m/Y H:i",mktime()); 
		   	$browser = $_SERVER["HTTP_USER_AGENT"]; 
		   	$ip = $_SERVER["REMOTE_ADDR"]; 
		   	$domaine = gethostbyaddr($ip); 
		   	echo "Visite : $datetime<br />"; 
		   	echo "Configuration : $browser<br />"; 
		   	echo "IP : $ip<br />"; 
		   	echo "Domaine : $domaine<br />";
		?> 
		
		<h4>Liste PHP</h4>
		
		<div>
			<input type="button" value=" liste " onclick="window.location = 'scripts/info.php';" />
		</div>
		
		<h4 class="objet">Formulaire</h4>
		
		<h4>Forme V1</h4>


		<form action="scripts/formulaire.php" method="get"> 
			 Nom:	<input type="text" name="nom"><br/> 
			 Pr&eacute;nom: <input type="text" name="prenom"><br/> 
			 Sexe:  <input type="radio" name="sexe" value="M">Gar&ccedil;on 
			  		<input type="radio" name="sexe" value="F">Fille<br/> 
			 Vins: 	<br/> 
					<select multiple name="vin[]"> 
						<option value="bordeaux">bordeaux</option> 
					  	<option value="beaujolais">beaujolais</option> 
					  	<option value="c&ocirc;tes de provence">c&ocirc;te de provence</option> 
					</select><br/><br/> 
			 <input type="submit" value="Envoyer"> 
		</form>

		<h4>Forme V2 Automatique</h4>
			
			<div>
				<input type="button" value=" Formulaire " onclick="window.location = 'scripts/formulaire_auto.php';" />
			</div>
		
		<h4>Vos Commenaires</h4>

			<form action="scripts/form_reponse.php" method="get"> 
			 	<textarea rows="2" cols="15" name="texte"></textarea><br/>
			 	<br><input type="submit" value="Envoyer"> 
			</form> 		
        
        <h4 class="objet">Fonctions et classes</h4>
        
        <h4>Personnes</h4>
        
        <?php
	        class Personne
	        {
				var $nom;
				var $prenom;
				var $date_de_naissance;
	
				function DefineNom($nom)
				{
					$this->nom = $nom;
				}
				function DefinePrenom($prenom)
				{
					$this->prenom = $prenom;
				}
				function DefineNaissance($date)
				{
					$this->date_de_naissance = $date;
				}
				function age()
				{
					// Date d'aujourd'hui 
					$jour = date("d",time()); 
					$mois = date("m",time()); 
					$annee = date("Y",time()); 

					// Détermination de l'âge 
					$age = $this->date_de_naissance;
					$age = explode("/", $age); 
				
					if ($jour >= $age[0] and $mois = $age[1] or $mois > $age[1]) 
					{ 
					        $age = $annee - $age[2]; 
					} 
					else 
					{ 
					        $age = $annee - $age[2] - 1; 
					}
					
					return $age;
				}
	        
				function presenter()
				{
					return "je m'appel <b>" . $this->nom . " " . $this->prenom . "</b>, j'ai <b>" . $this->age() . "</b> ans.";
				}
	        }
	
			$Ced = new Personne;
			$Ced->DefinePrenom(Cedric);
			$Ced->DefineNom(Hulin);
			$Ced->DefineNaissance('22/08/1987');
			
			$Nia = new Personne;
			$Nia->DefinePrenom(Nina);
			$Nia->DefineNom(Califano);
			$Nia->DefineNaissance('12/08/1988');
			
			echo "Objet Ced : " . $Ced->presenter() . "<br/>";
			echo "Objet Nia : " . $Nia->presenter() . "<br/>";
		?>
        
        <p>
            <a href="../index.html">Top</a><br/>
        </p>
        
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
