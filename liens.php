<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Lumi�res du Sud</title>
<meta name="title" lang="fr" content="Etude et r�alisation d'�clairage architectural et paysager, installation �lectrique et domotique" />
<meta name="Description" lang="fr" content="Etude et r�alisation d'�clairage architectural et paysager, installation �lectrique et domotique" />
<meta name="Keywords" lang="fr" content="�clairage architectural, paysager, installation �lectrique, installation domotique" />
<meta name="Language" content="fr" />
<meta name="Category" content="Internet" />
<meta name="Robots" content="index, follow" />
<meta name="Distribution" content="global" />
<meta name="Revisit-After" content="7 days" />
<meta name="Author" content="Inetys cr�ation de site Internet" />
<meta name="editor" content="INETYS Communication"/>
<meta name="Copyright" content="� 2009 - Lumieres du Sud" />
<meta name="Identifier-URL" content="http://www.lumieresdusud.fr" />
<meta name="Expires" content="never" />
<!-- FEULLES DE STYLES -->
<link rel="stylesheet" type="text/css" href="css/Styles.css" media="screen" />
<!--[if lte IE 6]>
   <link href="css/Style_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!-- JAVASCRIPT -->
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/fonctions.js"></script>
</head>

<body onload="demarreDiapo();">

	<div class="Container">
    
    	<div class="Container_header">
        	<img src="images/Header/Logo_LumieresDuSud.jpg" alt="Lumi&egrave;res Du Sud, Etude et r&eacute;alisation d&acute;&eacute;clairage architectural et paysager, installation &eacute;lectrique et domotique" title="Lumi&egrave;res Du Sud, Etude et r&eacute;alisation d&acute;&eacute;clairage architectural et paysager, installation &eacute;lectrique et domotique" />
        </div>
    	<div class="Container_Center">
        	<div class="Container_Left"></div>
            <div class="Container_Middle">
            	<div class="Container_Middle_ImgHeader">
                	<img src="images/Center/Middle/ImgHeader/LumieresDuSud_ImgLiens.jpg" alt="Lumi&egrave;res du sud" />
                </div>
                <div class="Container_Middle_Menu">
                	<ul>
                        <li><a href="index.php">Notre philosophie</a></li>
                        <li><a href="prestation.php">Nos prestations</a></li>
                        <li><a href="lumiere_exterieur.php">Lumi�re d'ext�rieur</a></li>
                        <li><a href="lumiere_interieur.php">Lumi�re d'int�rieur</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><span class="Container_Middle_Menu_ok">Liens utiles</span></li>
                        <li><a href="contact.php">Nous contacter</a></li>
                    </ul>
                </div>
                <div class="Container_Middle_Footer">
                	<div class="Container_Middle_Footer_Cont">
                    	<div class="Container_Middle_Footer_Title">
                        	<img src="images/Center/Middle/Title/LumieresDuSud_Liens.jpg" alt="Lumi&egrave;res Du Sud" />
                        </div>
                    	<div class="Container_Middle_Footer_Txt">
                        	- Pas encore de lien <a href="#">� voir</a>.<br /><br />
                        </div>
                    </div>
                    <div class="Container_Middle_Footer_Imgs">
                    	<div id="diapos">
                    		<?php
                    		
                    		foreach(glob('images/diapo/*.jpg') as $i => $img) {
                    			
                    			$style = $i ? ' style="display:none"' : null;
                    			
                    			echo '<img id="diapo'.($i+1).'" src="'.$img.'" alt=""'.$style.' />';
                    		}
                    		
                    		?>
						</div>
                    </div>
                </div>
            </div>
            <div class="Container_Right"></div>
        </div>
        <div class="Container_Footer">
        	&copy; 2009 Lumi�res Du Sud | <a href="#">Cr�dit</a> | <a href="#">Mentions l�gales</a> | Cr�ation de site Internet : <a href="http://www.inetys.fr" target="_blank">Inetys Communication</a>
        </div>
        
    </div>

</body>
</html>
