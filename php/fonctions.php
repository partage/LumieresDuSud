<?php

function afficheRatingBar($n_site) {

	global $tab2, $tab3, $tab4;

	$s		= $tab3[$n_site]['nbre_vote'] > 1 ? 's' : '';
	//$toto = "'images/loading.gif'";

	// Affiche les coeurs pour voter
	if($tab2[$n_site]['aff_barre'] == '1') {

		echo '<div id="coeur_'.$n_site.'" onmouseout="init('.$n_site.')" style="cursor:pointer;height:13px;margin:0;padding:0;">';

		for($i=1; $i<=5; $i++) {

			$img = $i <= $tab4[$n_site]['note'] ? 'images/star2.png' : 'images/star1.png';
			echo '<img src="'.$img.'" id="'.$n_site.'_'.$i.'" onClick="valider('.$i.','.$n_site.')" onMouseOver="rate('.$i.','.$n_site.')"/>';
		}

		echo '</div>';


	}
	// Affiche coeurs bloqués (vote interdit)
	else echo '<div style="cursor:pointer;height:13px;margin:0;padding:0;"><img src="images/vote_'.$tab4[$n_site]['note'].'.png" /></div>';

// Nombre de votes
	echo '<div id="nbre_vote_'.$n_site.'">'.$tab3[$n_site]['nbre_vote'].' vote'.$s.'</div>';

	//echo 'toto '.$tab4[$n_site]['note'];
}

//<----------------------------------------------------------------------------------------->
/**
 * Génère un n° de commande
 *
 * @return int
 */
function setNumeroCommande() {
	return date('YmdHi').strtoupper(random(3));
}
//<----------------------------------------------------------->
/**
 * Génére une chaine de caractère unique et aléatoire
 *
 * @param int $nb_car Nombre de caractères à retourner
 * @param bool $num Si TRUE, la chaîne retournée contiendra également des chiffres
 * @return str
 */
function random($nb_car, $num = false) {
	$string = '';
	$chaine 			= 'abcdefghijklmnopqrstuvwxyz';
	if($num) $chaine   .= '0123456789';
	srand((double)microtime()*1000000);
	for($i=0; $i<$nb_car; $i++) $string .= $chaine[rand()%strlen($chaine)];
	return $string;
}
//<----------------------------------------------------------------------------------------->

?>