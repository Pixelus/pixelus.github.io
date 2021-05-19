
<?php
	
	//Vérifie que tous les champs ont été correctement remplis
	if(isset($_POST) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['objet']) && isset($_POST['message']))
	{
		if(!empty($_POST['nom']) && !empty($_POST['email']) && !empty($_POST['objet']) && !empty($_POST['message']))
		{
			//Exécution si le formulaire est posté et si les champs sont rempli
			$destinataire = "sandrine.angelibert@yahoo.fr";
			$sujet = "Demande de contact";
			$message .= "Nom : ".$_POST['nom']."\r\n";
			$message .= "De : ".$_POST['email']."\r\n";
			$objet .= "Objet : ".$_POST['objet']."\r\n";
			$message .= "Message : ".$_POST['message']."\r\n";
			$entete = 'From: '.$_POST['email']."\r\n".
			'Reply-To: '.$_POST['email']."\r\n".
			'X-Mailer: PHP/'.phpversion();
			
			// Vérification du format de l'adresse mail
			if (isset($_POST['email']))
			{
			$_POST['email'] = htmlspecialchars($_POST['email']);
		 
				if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#i", $_POST['email']))
				{
				  $email = $_POST['email'];
				}
				else
				{
				  $email = "Adresse eMail invalide";
				}
			}
			else
			 {
				$email = "";
			 }
			
			// Envoi du message
			if (mail($destinataire,$objet,$message,$entete))
			{
				//Le mail a été expédié
				echo 'Le message a &eacute;t&eacute; envoy&eacute;.'."\r\n"; 
				echo 'Retour vers le <a href="http://www.sandrineangelibert.fr">site</a>.';
			} 
			else 
			{
				//Le mail n'a pas été expédié
				echo "Une erreur est survenue lors de l'envoi du formulaire.";
				echo 'Retour vers le <a href="http://www.sandrineangelibert.fr">site</a>.';
			}
		}
	}

?>