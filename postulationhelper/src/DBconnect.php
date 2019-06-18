<?php

  $DBserver = "localhost";
  $DBname = "postulationhelper";
  $DBusername = "root";
  $DBpassword = "";

  try
  {
    $db = new PDO('mysql:host=' . $DBserver . ';dbname=' . $DBname . ';charset=utf8', $DBusername, $DBpassword);
  }
  catch (Exception $e)
  {
    die('Erreur : ' . $e->getMessage());
  }

?>
