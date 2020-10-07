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
    
        <h4 class="objet">Affichage des donn&eacute;es saisies</h4>
		
		<p>
		<?php
			if (isset($_GET) && !empty($_GET['texte']))
			{
			  	echo nl2br($_REQUEST['texte']);
			}
			else
			{
			 	print "Vous n'avez rien &eacute;crie"; 	
			}  
		?>
		</p>
		
		<a href="javascript:history.back()">Essayez &agrave; nouveau</a>
		        
    </body>
</html> 