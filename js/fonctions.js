function scroll(id, offset) {
	new Effect.ScrollTo(id, {duration:2, offset:offset});
}

function deplace(direction) {
	
	if(direction == 'droite' && portfolio_n < portfolio_nb) {
		new Effect.Move("conteneur-portfolio", { x: portfolio_distance * -1, y: 0, mode: 'relative', duration:0.5});
		portfolio_n ++;
	}
	
	else if(direction == 'gauche' && portfolio_n > 1) {
		new Effect.Move("conteneur-portfolio", { x: portfolio_distance, y: 0, mode: 'relative', duration:0.5});
		portfolio_n --;
	}
}


function allerAuPremierPortfolio() {
	
	if(portfolio_n > 1) {
		var premier = portfolio_distance * (portfolio_n - 1);
		new Effect.Move("conteneur-portfolio", { x: premier, y: 0, mode: 'relative', duration:1});
		portfolio_n = 1;
	}
}


function allerAuDernierPortfolio() {
	
	if(portfolio_n < portfolio_nb) {
		
		var dernier = portfolio_distance * (portfolio_nb - portfolio_n) * -1;
		new Effect.Move ("conteneur-portfolio", { x: dernier, y: 0, mode: 'relative', duration:1});
		portfolio_n = portfolio_nb;
	}
}


function deplaceGrossesImagesVers(n) {
	
	if(n != portfolio_n_big) {
		
		deplacement_x = valeur_deplacement * (portfolio_n_big - n);
		new Effect.Move('conteneur-portfolio-big', { x: deplacement_x, y: 0, mode: 'relative'});
		
		portfolio_n_big = n;
	}
}

//<--------------- DIAPO --------------->
var n_ref;
var duree_diapo = 3.5; // Durée (en sec.) d'affichage des diapo
var duree_transition = 1.5; // Durée (en sec.) transition diapo

function demarreDiapo() {
	n_ref = 1;
	nb_visuels = $$('#diapos')[0].immediateDescendants().length;
	setInterval('diapoReferences('+nb_visuels+')', duree_diapo * 1000);
}

function diapoReferences(nb_visuels) {
	if(n_ref < nb_visuels) {
		
		n_ref ++;
		a_afficher 	= 'diapo' + n_ref;
		
		$(a_afficher).appear({ duration: duree_transition, afterFinish: function() {diapoACacher()} });
	
	} else {
	
		$('diapo' + n_ref).fade({ duration: duree_transition });
		n_ref = 1;
	}
}

function diapoACacher() {
	n = n_ref - 1;
	if(n_ref > 2) $('diapo' + n).hide();
}
//<------------------------------------->