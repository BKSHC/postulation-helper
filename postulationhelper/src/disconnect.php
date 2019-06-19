<?php

  session_start();

  if(isset($_POST['btn_disconnect'])){
    session_destroy();
    header('Location: /postulationhelper/');
  }

?>
