<?php

if(session_id() == "") session_start();

$_SESSION['cryptdir']= dirname($cryptinstall);


function dsp_crypt($cfg=0,$reload=1) {
	// Affiche le cryptogramme
	$captcha = '<img id="cryptogram" src="'.$_SESSION['cryptdir'].'/cryptographp.php?cfg='.$cfg.'&'.SID.'" alt="" />';
	
	if ($reload) $captcha .= "\n\n".'<a title="'.($reload==1?'':$reload).'" style="cursor:pointer" onclick="javascript:document.images.cryptogram.src=\''.$_SESSION['cryptdir'].'/cryptographp.php?cfg='.$cfg.'&'.SID.'&\'+Math.round(Math.random(0)*1000)+1">
								<img src="'.$_SESSION['cryptdir'].'/images/reload.png" alt="Générer un autre code" title="Générer un autre code" />
							</a>';
	
	return $captcha;
}


function chk_crypt($code) {
	// Vérifie si le code est correct
	include ($_SESSION['configfile']);
	$code = addslashes ($code);
	$code = str_replace(' ','',$code);  // supprime les espaces saisis par erreur.
	$code = ($difuplow?$code:strtoupper($code));
	switch (strtoupper($cryptsecure)) {
		case "MD5"  : $code = md5($code); break;
		case "SHA1" : $code = sha1($code); break;
	}
	if ($_SESSION['cryptcode'] and ($_SESSION['cryptcode'] == $code))
	{
		unset($_SESSION['cryptreload']);
		if ($cryptoneuse) unset($_SESSION['cryptcode']);
		return true;
	}
	else {
		$_SESSION['cryptreload']= true;
		return false;
	}
}

?>
