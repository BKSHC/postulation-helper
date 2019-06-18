<?php include "src/inscription_algo.php"; ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include "html/head.html"; ?>

  </head>
  <body>

    <?php include "html/navbar.php"; ?>

    <div class="login">

      <form action="" method="post">
        <fieldset>
          <legend>Nouvelle utilisateur</legend>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Login" id="inputDefault" name="pseudo">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" placeholder="Adresse e-mail" id="inputDefault" name="email">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mot de passe" id="inputDefault" name="password1">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Confirmation mot de passe" id="inputDefault" name="password2">
          </div>

          <div class="form-group">
                <button type="submit" class="btn btn-primary" name="btn_connection">Inscription</button>
          </div>

        </fieldset>
      </form>

      <?php include "src/displayErreurInscription.php" ?>

    </div>

  </body>
</html>
