<?php

  session_start();

  try
  {
    $db = new PDO('mysql:host=localhost;dbname=postulationhelper;charset=utf8', 'root','');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  var_dump($_POST);

  try {
    $req = $db->prepare('INSERT INTO helpertable (nom_societe, poste, date_postulation, etat, offre, id_user) VALUES(?, ?, ?, ?, ?, ?)');
  	if($req->execute(array($_POST['nom_societe'], $_POST['poste'], $_POST['date_postulation'], $_POST['etat'], $_POST['offre'], $_SESSION['id']))){
      echo '<p>Insertion réussie</p>';
    } else {
      echo '<p>Insertion échouée</p>';
    }
  } catch (\Exception $e) {
    echo $e;
  }


  header('Location: /postulationhelper/');


 ?>
