<!-- ----------------------------------------------------------- -->
<!-- Site développé et design réalisé par AyPhun pour DRAKITFR -->
<!-- Twitter d'AyPhun : https://twitter.com/LouisScarpitta -->
<!-- Twitter de DrakitFR : https://twitter.com/DrakitFR -->

<!-- Copyright 2014 -->


<!doctype html>
<html lang="en">
<head>
	<title>DrakitFR - Formulaire</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/bebasneue/css/bebasneue.css"/>
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/slicknav.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css"/>

	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.6.2/modernizr.min.js"></script>
	<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
	<script src="js/jquery.slicknav.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</head>
<body>

<div id="page-404-1" class="panda-wrapper panda-404">
<?php
// Si le formulaire a été soumis
if (isset($_POST["envoyer"])){ 
	// On initialise notre etat à erreur, il sera changé à "ok" si la vérification du formulaire est un succès, sinon il reste à erreur
	$etat = "erreur"; 
	// On récupère les champs du formulaire, et on arrange leur mise en forme
	// trim()  enlève les espaces en début et fin de chaine
	// stripslashes()  retire les backslashes ==> \' devient '
	if (isset($_POST["son_pseudo"])) $_POST["son_pseudo"]=trim(stripslashes($_POST["son_pseudo"])); 

	if (isset($_POST["son_email"])) $_POST["son_email"]=trim(stripslashes($_POST["son_email"])); 

	if (isset($_POST["son_sexe"])) $_POST["son_age"]=trim(stripslashes($_POST["son_age"]));

	if (isset($_POST["son_objet"])) $_POST["son_objet"]=trim(stripslashes($_POST["son_objet"]));

	if (isset($_POST["son_message"])) $_POST["son_message"]=trim(stripslashes($_POST["son_message"]));

	// Après la mise en forme, on vérifie la validité des champs
	// L'utilisateur n'a pas rempli le champ pseudo
	if (empty($_POST["son_pseudo"])) { 
		// On met dans erreur le message qui sera affiché
		$erreur="Vous n'avez pas entr&eacute; votre pseudo..."; 
	}
	// L'utilisateur n'a pas rempli le champ email
	elseif (empty($_POST["son_email"])) {
		$erreur="Nous avons besoin de votre e-mail pour vous r&eacute;pondre...";
	}
	// On vérifie si l'email est bien de la forme messagerie@domaine.fr
	elseif (!preg_match("$[0-9a-z]([-_.]?[0-9a-z])*@[0-9a-z]([-.]?[0-9a-z])*\.[a-z]{2,4}$",$_POST["son_email"])){ 
		$erreur="Votre adresse e-mail n'est pas valide...";
	}
	// L'utilisateur n'a pas rempli le champ objet
	elseif (empty($_POST["son_objet"])) { 
		$erreur="Vous devez entrer l'objet de votre message...";
	}
	// L'utilsateur n'a écrit aucun message
	elseif (empty($_POST["son_message"])) { 
		$erreur="Merci de saisir un message...";
	}
	// Si tous les champs sont valides, on change l'état à ok
	else { 
		$etat="ok";
	}
}
// Sinon le formulaire n'a pas été soumis
else { 
	// On passe donc dans l'état attente
	$etat="attente"; 
}
// Le formulaire a été soumis mais il y a des erreurs (etat=erreur) OU le formulaire n'a pas été soumis (etat=attente)
if ($etat!="ok"){ 
	// Cas où le formulaire a été soumis mais il y a des erreurs
	if ($etat=="erreur"){ 
		// On affiche le message correspondant à l'erreur
		echo "<span style=\"color:red\">".$erreur."</span><br /><br />\n"; 
	}
	?>

    <!-- Formulaire HTML qu'on affiche dans l'état attente ou erreur -->
	<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
	<!-- Les données du formulaire seront récupérée avec la méthode POST, et action correspond à la page contenant le formulaire -->
	<p style="text-align:center;">
	
	<!-- Intitulé du champ pseudo -->
	<label for="son_prenom">Votre Prénom <font color="green">*</font></label><br/> 
	<input type="text" size="30" name="son_prenom" id="son_prenom" value="<?php if(!empty($_POST["son_prenom"])){
	// le pseudo de l'expéditeur a été saisi --> le réafficher
	echo htmlspecialchars($_POST["son_prenom"],ENT_QUOTES);
	// htmlspecialchars() convertit les caractères spéciaux en leurs code html, exemple : & devient &amp; 		
	}?>" /><br />
	
	<br/>
	
	<!-- Intitulé du champ pseudo -->
	<label for="son_pseudo">Votre Pseudo <font color="green">*</font></label><br/> 
	<input type="text" size="30" name="son_pseudo" id="son_pseudo" value="<?php if(!empty($_POST["son_pseudo"])){
	// le pseudo de l'expéditeur a été saisi --> le réafficher
	echo htmlspecialchars($_POST["son_pseudo"],ENT_QUOTES);
	// htmlspecialchars() convertit les caractères spéciaux en leurs code html, exemple : & devient &amp; 		
	}?>" /><br />

	<br/>
	
	<!-- Intitulé du champ e-mail -->
	<label for="son_email">Votre mail <font color="green">*</font></label><br/> 
	<input type="text" size="30" placeholder="exemple@exemple.fr" name="son_email" id="son_email" value="<?php if(!empty($_POST["son_email"])){
	// l'e-mail de l'expéditeur a été saisi --> le réafficher
	echo htmlspecialchars($_POST["son_email"],ENT_QUOTES);
	}?>" /><br />

	<br/>
	
	<!-- Intitulé du champ url (facultatif) -->
	<label for="son_age">Votre sexe <font color="green">*</font></label><br/>
	<input type="text" size="30" placeholder="Homme ou Femme" name="son_sexe" id="son_sexe" value="<?php if(!empty($_POST["son_sexe"])){
	// l'url a été saisi --> la réafficher
	echo htmlspecialchars($_POST["son_sexe"],ENT_QUOTES);}?>" /><br />

	<br/>
	
	<!-- Intitulé du champ objet -->
	<label for="son_objet">Objet <font color="green">*</font></label><br/> 
	<input type="text" size="30" placeholder="Candidatures ou Grade VIP" name="son_objet" id="son_objet" value="<?php if(!empty($_POST["son_objet"])){
	// l'objet du message a été saisi --> le réafficher
	echo htmlspecialchars($_POST["son_objet"],ENT_QUOTES);}?>" /><br />

	<br/>
	
	<!-- Intitulé du champ message -->
	<label for="son_message">Message <font color="green">*</font></label><br /> 
	<textarea name="son_message" id="son_message" placeholder="Vos motivations, vos compétances, votre vie personnelle." cols="40" rows="15"><?php if(isset($_POST["son_message"])){
		// le message a été saisi --> le réafficher
		echo htmlspecialchars($_POST["son_message"],ENT_QUOTES);}?>
	</textarea><br />

	<br />

	<!-- Bouton de validation -->
	<input type="submit" name="envoyer" value=" Envoyer à DrakitFR " />
	<input type="reset" name="reset" value=" Effacer les champs" />
	
	</p>
	</form>
	<!-- FIN du formulaire HTML -->
<center><p><b><font color="green">*</font> :</b> Les champs obligatoires
	<?php
}
// Sinon l'état est ok donc on envoie le mail
else { 
	// On stocke les variables récupérées du formulaire
	$son_prenom = $_POST["son_prenom"];
	$son_pseudo = $_POST["son_pseudo"]; 
	$son_email = $_POST["son_email"];
	$son_sexe = $_POST["son_sexe"];
	$son_objet = $_POST["son_objet"];
	$son_message = $_POST["son_message"];
	
	// Mise en forme du message que vous recevrez
	$mon_email = "serveur@drakor.fr"; 
	$mon_pseudo = "DrakitFR";
	$mon_url = "/index.php";
	$msg_pour_moi = "- Prénom de l'envoyeur : $son_prenom \n
	- Pseudo de l'envoyeur : $son_pseudo \n 	
	- Mail de l'envoyeur : $son_email \n 	
	- Sexe de l'envoyeur : $son_sexe \n 	
	- Titre/Objet du message : $son_objet \n 	
	- Message de l'envoyeur : \n $son_message \n\n";

	// Mise en forme de l'accusé réception qu'il recevra
	$accuse_pour_lui = "Bonjour $son_pseudo,\n 	
	Votre message nous a bien été envoyé et nous tâcherons de vous répondre le plus rapidement possible.\n\n 	
	- Votre E-mail : $son_email \n 	
	- Votre sexe : $son_sexe \n 	
	- L'objet de votre message : $son_objet \n 	
	- Votre message : \n $son_message \n\n 	
	Merci et à bientôt sur Drak0r.fr !";

	// Envoie du mail
	// On prépare l'entête du message
	$entete = "From: " . $mon_pseudo . " <" . $mon_email . ">\n"; 
	$entete .='Content-Type: text/plain; charset="iso-8859-1"'."\n"; 
	$entete .='Content-Transfer-Encoding: 8bit';
	
	// Si le mail a été envoyé
	if (@mail($mon_email,$son_objet,$msg_pour_moi,$entete) && @mail($son_email,$son_objet,$accuse_pour_lui,$entete)){ 
		// On affiche un message de confirmation
		echo "<p style=\"text-align:center\">Votre message a &eacute;t&eacute; envoy&eacute;, vous recevrez une confirmation par mail.<br /><br />\n"; 
		// Avec un lien de retour vers l'accueil du site
		echo "<a href=\"" . $mon_url . "\">Retour</a></p>\n"; 
	}
	// Sinon il y a eu une erreur lors de l'envoi
	else { 
		echo "<p style=\"text-align:center\">Un problème s'est produit lors de l'envoi du message.\n";
		// On propose un lien de retour vers le formulaire
		echo "<a href=\"".$_SERVER["PHP_SELF"]."\">Réessayez...</a></p>\n"; 
	}
}
?>
</div>
</body>
</html>

<!-- Copyright 2014 -->

<!-- Twitter d'AyPhun : https://twitter.com/LouisScarpitta -->
<!-- Twitter de DrakitFR : https://twitter.com/DrakitFR -->
<!-- Site développé et design réalisé par AyPhun pour DRAKITFR -->
<!-- ----------------------------------------------------------- -->
