<?php
  session_start();

  if(isset($_SESSION['logined'])){
    if($_SESSION['logined']){
      header('Location: /postulationhelper/');
    }
  }

  if(isset($_POST['btn_connection']))
  {
    //Si l'utilisateur a envoyé le formulaire, on commence l'autentification

    // Création d'une connexion avec la base de données
    include "DBconnect.php";

    //préparation d'une requête
    $req = $db->prepare('SELECT * FROM users WHERE pseudo = ?');

    $req->execute(array($_POST['pseudo']));
    $resultat = $req->fetch();

    //On compare le mot de passe "posté" et le mot de passe "haché" stocké dans la base de données grâce à la fonction password_verify()
    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    if(!$resultat)
    {
      $erreur = 'Mauvais identifiant.';
    }
    elseif($isPasswordCorrect)
    {

      session_start();

      $message = 'Connexion réussie!';
      $_SESSION['id'] = $resultat['id'];
      $_SESSION['pseudo'] = $resultat['pseudo'];
      $_SESSION['logined'] = true;

      header('Location: /postulationhelper');
    }else
    {
      $erreur = 'Mauvais mot de passe.';
    }
  }

?>
