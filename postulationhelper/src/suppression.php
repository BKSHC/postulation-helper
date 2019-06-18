<?php
  try
  {
    $db = new PDO('mysql:host=localhost;dbname=postulationhelper;charset=utf8', 'root','');
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

  var_dump($_POST);


  $idToDelete = $_POST['idToDelete'];
  $db->exec('DELETE FROM helpertable WHERE ID ='. $idToDelete);

  header('Location: /');


 ?>
