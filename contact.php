<?php

if (count($_POST)) {
	
	require('php/class.phpmailer.php');

	$mail = new PHPMailer();

	$mail->From = 'no-reply@lumieresdusud.fr';
	$mail->FromName = "{$_POST['prenom']} {$_POST['nom']}";
	$mail->AddAddress('stjo83@mac.com');
	$mail->Subject = '[Lumi�res du sud - Formulaire de contact]';
	$mail->Body    = "Nom : {$_POST['nom']}\nPr�nom : {$_POST['prenom']}\nT�l�phone : {$_POST['telephone']}\nE-mail : {$_POST['email']}\nCode postal : {$_POST['cp']}\nVille : {$_POST['ville']}\nCommentaires : {$_POST['commentaires']}\n";

	if($mail->Send())  	$retour = 'ok';
	else 				$retour = 'ko';
}

?>
<?php

if (!empty($_GET["msg"]))
{
$msg = urldecode($_GET["msg"]);
$msg = stripslashes($msg);
echo("<div class=\"msg\">$msg</div><br />");
}

?>
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
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="js/fonctions.js"></script>
<?php if (count($_POST)) {
	
	echo '<script type="text/javascript">alert("Merci, votre message a bien �t� envoy�.")</script>';
}
?>
<!--[if lte IE 6]>
   <link href="css/Style_ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->

<!-- JAVASCRIPT -->

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
                	<img src="images/Center/Middle/ImgHeader/LumieresDuSud_ImgContact.jpg" alt="Lumi&egrave;res du sud" />
                </div>
                <div class="Container_Middle_Menu">
                	<ul>
                        <li><a href="index.php">Notre philosophie</a></li>
                        <li><a href="prestation.php">Nos prestations</a></li>
                        <li><a href="lumiere_exterieur.php">Lumi�re d'ext�rieur</a></li>
                        <li><a href="lumiere_interieur.php">Lumi�re d'int�rieur</a></li>
                        <li><a href="news.php">News</a></li>
                        <li><a href="liens.php">Liens utiles</a></li>
                        <li><span class="Container_Middle_Menu_ok">Nous contacter</span></li>
                    </ul>
                </div>
                <div class="Container_Middle_Footer">
                	<div class="Container_Middle_Footer_Cont">
                    	<div class="Container_Middle_Footer_Title">
                        	<img src="images/Center/Middle/Title/LumieresDuSud_Contact.jpg" alt="Lumi&egrave;res Du Sud" />
                        </div>
                    	<div class="Container_Middle_Footer_Txt">
                            <div id="ContainerIntroForm">
                                <form method="post" action="contact.php" id="formulaire_contact" onsubmit="verifForm(this); return false;">
                                	<table style="width:100%;">
                                    	<tr>
                                        	<td style="width:50%;"><div><label for="nom">Nom * : </label><input type="text" id="nom" name="nom" /></div></td>
                                            <td style="width:50%;"><div><label for="prenom">Pr�nom * : </label><input type="text" id="prenom" name="prenom" /></div></td>
                                        </tr>
                                        <tr>
                                        	<td style="width:50%;"><div><label for="telephone">T�l�phone : </label><input type="text" id="telephone" name="telephone" /></div></td>
                                            <td style="width:50%;"><div><label for="email">E-mail * : </label><input type="text" id="email" name="email" /></div></td>
                                        </tr>
                                        <tr>
                                        	<td style="width:50%;"><div><label for="cp">Code postal : </label><input type="text" id="cp" name="cp" /></div></td>
                                            <td style="width:50%;"><div><label for="ville">Ville : </label><input type="text" id="ville" name="ville" /></div></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2" style="width:50%;"><div><label for="commentaires">Commentaires :</label><textarea id="commentaires" name="commentaires" rows="2" cols="45"></textarea></div></td>
                                        </tr>
                                        <tr>
                                        	<td colspan="2" style="width:50%; text-align:center"><div><input type="submit" value="Envoyer le Formulaire" id="mySubmit" class="boutton"/></div></td>
                                        </tr>
                                   </table> 
                                </form>
                            </div>
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
