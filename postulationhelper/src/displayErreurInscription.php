<?php

if(!empty($erreur))
{
  echo '<font color="red">' . $erreur . '</font>';
}
elseif (!empty($message))
{
  echo '<font color="green">' . $message . '</font><a href="login.php"> connexion</a>';
}


?>
