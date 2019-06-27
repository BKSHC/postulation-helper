<?php
  session_start();

  include "DBconnect.php";

  var_dump($_POST);

  try {
    $req = $db->prepare('UPDATE helpertable SET nom_societe=?, poste=?, date_postulation=?, etat=?, offre=? WHERE id=' . $_POST['idToModify']);
    if($req->execute(array($_POST['nom_societe'], $_POST['poste'], $_POST['date_postulation'], $_POST['etat'], $_POST['offre']))){
      echo '<p>Insertion réussie</p>';
    } else {
      echo '<p>Insertion échouée</p>';
    }
  } catch (\Exception $e) {
    echo $e;
  }


  header('Location: ../');

?>
