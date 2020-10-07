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

<?php 
	if (isset($_GET) && !empty($_GET['nom']) || !empty($_GET['prenom']) || !empty($_GET["sexe"]) || !empty($_GET["vin"]))
	{ 
	    print "<h4 class='objet'>Affichage des donn&eacute;es saisies</h4>"; 
	    print "<ul>"; 
	    print "<li>Nom: " . $_REQUEST['nom'] . "</li>"; 
	    print "<li>Prenom: " . $_REQUEST['prenom'] . "</li>"; 
	    print "<li>Sexe: " . $_REQUEST['sexe'] . "</li>"; 
	    print "<li>Vins: "; 
	    print "<ul>"; 
	    if (isset($_REQUEST['vin'])) 
	        foreach($_REQUEST['vin'] as $v) print "<li>$v</li>"; 
	    print "</ul>"; 
	    print "</ul>";
	   	print "<br/>"; 
	    print "<a href='javascript:history.back()'>Essayez &agrave; nouveau</a>"; 
	}
	else
	{  
?> 
	<h4 class='objet'>Formulaire Automatique</h4>
	<form action="<?php echo $_SERVER['PHP_SELF']?>" method="get"> 
   	 	Nom:			<input type="text" name="nom"><br/> 
		Pr&eacute;nom: 	<input type="text" name="prenom"><br/> 
		Sexe:  			<input type="radio" name="sexe" value="M">Gar&ccedil;on 
			  			<input type="radio" name="sexe" value="F">Fille<br/> 
		Vins: 			<br/> 
						<select multiple name="vin[]"> 
							<option value="bordeaux">bordeaux</option> 
					  		<option value="beaujolais">beaujolais</option> 
					  		<option value="c&ocirc;tes de provence">c&ocirc;te de provence</option> 
						</select><br/><br/> 
			 <input type="submit" value="Envoyer"> 
		</form> 
		<br/>
    	<a href="javascript:history.back()">Essayez &agrave; nouveau</a>
<?php  
	} 
?> 
		
       
    </body>
</html> 