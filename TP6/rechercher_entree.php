<?php
	if(isset($_POST) && !empty($_POST['nom'])) 
	{
		mysql_connect("domain", "login", "password"); // Connexion à MySQL
		mysql_select_db("tp6");
	
		// on recupére le password de la table qui correspond au login du visiteur
		$sql = "select nom, prénom, numéro_de_poste from annuaire where nom='" . $_POST['nom'] . "'";
		$req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
?>
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
	    <h4 class='objet'>Rechercher une entr&eacute;e</h4>
	    <?php
			while ($data = mysql_fetch_array($req) )
			{
			?>
			 	Nom : <?php echo $data['nom']; ?><br /> 
			 	Pr&eacute;nom : <?php echo $data['prénom']; ?><br />
			 	Num&eacute;ro de poste : <?php echo $data['numéro_de_poste']; ?><br />
			<?php
			}
			mysql_close();
			?>
			<br/>
    	<a href="javascript:history.back()">Retour</a>  
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
<?php
		}
		else
		{
			?>
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
	    <h4 class='objet'>Rechercher une entr&eacute;e</h4>
			<form action="#" method='post'>
				<table align="center" border="0" bgcolor="#dddddd" cellpadding="0" cellspacing="7">
					<tr>
						<td><b>Nom</b> </td>
						<td><input type="text" name="nom" maxlength="250"></td>
					</tr>
					<tr>
						<td colspan="2" align="center"><input type="submit" value="Envoyer"></td>
					</tr>
				</table>
			</form>
			<br/>
    	<a href="javascript:history.back()">Retour</a>   
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
<?php
		}
?>


	

