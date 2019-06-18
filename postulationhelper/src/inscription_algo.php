<?php

	session_start();

	//Création connexion avec la base de données
	include "src/DBconnect.php";

	if(isset($_POST['btn_connection'])){


		if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password1']) AND !empty($_POST['password2']) AND !empty($_POST['pseudo']))
		{

			//Si tous les champs sont remplis
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$email = htmlspecialchars($_POST['email']);
			$password1 = htmlspecialchars($_POST['password1']);
			$password2 = htmlspecialchars($_POST['password2']);
			$password_hache = password_hash($_POST['password1'], PASSWORD_DEFAULT);

			$reqSelectPseudo = $db->prepare('SELECT pseudo FROM users WHERE pseudo = ?');
			$reqSelectPseudo->execute(array($pseudo));
			$resultatPseudo = $reqSelectPseudo->fetch();

			if(!$resultatPseudo)
			{
				//Si l'pseudo n'a pas encore été inscrite
				$reqSelectEmail = $db->prepare('SELECT email FROM users WHERE email = ?');
				$reqSelectEmail->execute(array($email));
				$resultatEmail = $reqSelectEmail->fetch();

				if(!$resultatEmail)
				{
					//Si l'email n'a pas encore été inscrite
					if(strlen($pseudo)<=30 AND preg_match("#[A-Za-z0-9]+#", $pseudo))
					{
						$_SESSION['pseudo'] = $pseudo;
						//Si le longueur de l'pseudo est bien inférieur à 30 caractères
						if(filter_var($email, FILTER_VALIDATE_EMAIL))
						{
							$_SESSION['email'] = $email;
							//Si l'adresse email est de bon format
							if($password1 == $password2)
							{
								//Si le mot de passe est bien confirmé
								$request = $db->prepare('INSERT INTO users(pseudo, email, password, date_inscription) VALUES(?, ?, ?, NOW())');
								$request->execute(array($pseudo, $email, $password_hache));
								$message = 'Inscription réussie!';
							}
							else
							{
								$erreur = 'Vos mots de passe ne correspondent pas!';
							}
						}
						else
						{
							$erreur = 'L\'adresse email non valide.';
						}
					}
					else
					{
						$erreur = 'Le longueur de l\'identifiant doit être inférieur à 30 caractères, et qu\'il ne doit que contenir les lettres et les chiffres.';
					}
				}
				else
				{
					$erreur = 'Cette adresse d\'email est déjà inscrite!';
				}

			}
			else
			{
				$erreur = 'Cet identifiant est déjà inscrit!';
			}

		}
		else
		{
			$erreur = 'Tous les champs doivent être remplis!';
		}
	}




 ?>
