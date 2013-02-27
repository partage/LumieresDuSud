<?php

//<---------- SELECTION DES ALBUMS ---------->
include_once('php/mysql.php');

$sel = mysql_query("SELECT id, nom
					FROM albums_lumiere_exterieure
					ORDER BY nom ASC");

$tab_albums = array();
while($l = mysql_fetch_assoc($sel)) $tab_albums[$l['id']] = htmlspecialchars($l['nom']);

$album_actuel = isset($_GET['album']) ? $_GET['album'] : key($tab_albums);
//<------------------------------------------>

// Récupération des images de l'album
$tab_photos 		= glob("images/Center/Middle/Porfolio/Lumiere_ext/$album_actuel/*.jpg");
$tab_photos_small 	= glob("images/Center/Middle/Porfolio/Lumiere_ext/$album_actuel/small/*.jpg");
$tab_photos_zoom 	= glob("images/Center/Middle/Porfolio/Lumiere_ext/$album_actuel/zoom/*.jpg");

natsort($tab_photos); 		$tab_photos 		= array_values($tab_photos);
natsort($tab_photos_small); $tab_photos_small 	= array_values($tab_photos_small);
natsort($tab_photos_zoom); 	$tab_photos_zoom 	= array_values($tab_photos_zoom);

$commentaires = file("images/Center/Middle/Porfolio/Lumiere_ext/$album_actuel/commentaires.txt");

//print_r($tab_photos_zoom);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lumières du Sud</title>
<meta name="title" lang="fr" content="Etude et réalisation d'éclairage architectural et paysager, installation électrique et domotique" />
<meta name="Description" lang="fr" content="Etude et réalisation d'éclairage architectural et paysager, installation électrique et domotique" />
<meta name="Keywords" lang="fr" content="éclairage architectural, paysager, installation électrique, installation domotique" />
<meta name="Language" content="fr" />
<meta name="Category" content="Internet" />
<meta name="Robots" content="index, follow" />
<meta name="Distribution" content="global" />
<meta name="Revisit-After" content="7 days" />
<meta name="Author" content="Inetys création de site Internet" />
<meta name="editor" content="INETYS Communication"/>
<meta name="Copyright" content="© 2009 - Lumieres du Sud" />
<meta name="Identifier-URL" content="http://www.lumieresdusud.fr" />
<meta name="Expires" content="never" />
<link rel="stylesheet" type="text/css" href="css/Styles.css" media="screen" />
<link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
<!--[if lte IE 6]>
   <link href="css/Style_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<script type="text/javascript" src="js/fonctions.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects,builder"></script>
<script type="text/javascript" src="js/unittest.js"></script>
<script type="text/javascript" src="images/lightbox.js"></script>
<script type="text/javascript">
var portfolio_n  			= 1; 	// Numéro du visuel portfolio en cours
var portfolio_n_big  		= 1; 	// Numéro du visuel portfolio (grosses images) en cours
var portfolio_nb_photos_aff = 6; 	// Nombre de photos (miniatures) visibles à l'écran
var portfolio_nb 			= <?php echo count($tab_photos);?> - portfolio_nb_photos_aff + 1; // Nombre de photos au total, dans cet album
var portfolio_distance 		= 149; 	// Valeurs en px du déplacement horizontal des visuels (photos small)
var valeur_deplacement 		= 464; //Nombre de pixels pour le deplacement d'une photo

</script>

</head>

<body>

	<div class="Container">
    
    	<div class="Container_header">
        	<img src="images/Header/Logo_LumieresDuSud.jpg" alt="Lumi&egrave;res Du Sud, Etude et r&eacute;alisation d&acute;&eacute;clairage architectural et paysager, installation &eacute;lectrique et domotique" title="Lumi&egrave;res Du Sud, Etude et r&eacute;alisation d&acute;&eacute;clairage architectural et paysager, installation &eacute;lectrique et domotique" />
        </div>
    	<div class="Container_Center">
        	<div class="Container_Left"></div>
            <div class="Container_Middle">
           		
                <div class="container_Big_Imgs">
                    <div id="conteneur-portfolio-big">
                    	
						<a href="<?php echo end($tab_photos_zoom);?>" rel="lightbox" title="<?php echo end($commentaires);?>">
                        	<img src="<?php echo end($tab_photos);?>" alt="" />
                        </a>
                        
                    	<?php
                    	
                    	$n = 1;
                    	
                    	foreach($tab_photos as $id => $photo) {
                    		
                    		echo <<<HTML

                    			<a href="{$tab_photos_zoom[$id]}" rel="lightbox" title="{$commentaires[$id]}">
                    				<img src="$photo" alt="" />
                    			</a>
HTML;
                    		$n++;
						}
                    	
                    	?>
                    	
                        <a href="<?php echo $tab_photos_zoom[0]?>" rel="lightbox" title="<?php echo $commentaires[0];?>">
                        	<img src="<?php echo $tab_photos[0]?>" alt="" />
                        </a>
                        
                	</div>
                </div>
                
                <div class="container_Small_Imgs">
                	<div id="conteneur-portfolio">
                		<?php
                    	
                    	$n = 1;
                    	
                    	foreach($tab_photos_small as $photo) {
                    		
                    		echo <<<HTML

                    			<a href="#" onclick="deplaceGrossesImagesVers($n);">
                    				<img src="$photo" />
                    			</a>
HTML;
                    		$n++;
						}
                    	
                    	?>
                	</div>
                </div>
                
                <div class="container_Control_Imgs">
                	<div class="container_Control_Imgs_Bouton">
                    	<div class="container_Control_Imgs_Bouton_Left">
                        	<a class="bouton_Control_Imgs_Bouton_Left_Small" href="javascript:void(0)" onclick="allerAuPremierPortfolio();"></a>
                            <a class="bouton_Control_Imgs_Bouton_Left_Big" href="javascript:void(0)" onclick="deplace('gauche');"></a>
                        </div>
                    	<div class="container_Control_Imgs_Bouton_Right">
                        	<a class="bouton_Control_Imgs_Bouton_Right_Big" href="javascript:void(0)" onclick="deplace('droite');"></a>
                            <a class="bouton_Control_Imgs_Bouton_Right_Small" href="javascript:void(0)" onclick="allerAuDernierPortfolio();"></a>
                        </div>
                    </div>
                </div>
                
                <div class="Container_Middle_Menu">
                	<ul>
                        <li><a href="index.php">Notre philosophie</a></li>
                        <li><a href="prestation.php">Nos prestations</a></li>
                        <li><span class="Container_Middle_Menu_ok">Lumière d'extérieur</span></li>
                        <li><a href="lumiere_interieur.php">Lumière d'intérieur</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="liens.php">Liens utiles</a></li>
                        <li><a href="contact.php">Nous contacter</a></li>
                    </ul>
                </div>
                
                <div class="container_Titre_Imgs">
                	<img src="images/Center/Middle/Title/LumieresDuSud_Lumieres_Ext.jpg" alt="Lumi&egrave;res Du Sud" />
                </div>
                
                <div class="container_SousMenu_Imgs">
                	<div class="container_SousMenu_Liens_Imgs">
                    	<ul>
                        	<?php
                        	
                        	foreach($tab_albums as $id => $nom) {
                        		
                        		echo '<li><a href="lumiere_exterieur.php?album='.$id.'">&raquo; '.$nom.'</a></li>';
                        	}
                        	
                        	?>
                        </ul>                    
                    </div>
                </div>
                             
            </div>
            <div class="Container_Right"></div>
        </div>
        <div class="Container_Footer">
        	&copy; 2009 Lumières Du Sud | <a href="#">Crédit</a> | <a href="#">Mentions légales</a> | Création de site Internet : <a href="http://www.inetys.fr" target="_blank">Inetys Communication</a>
        </div>
        
    </div>

</body>
</html>
