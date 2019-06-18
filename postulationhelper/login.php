  <?php include "src/login_algo.php"; ?>

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
          <legend>Bienvenue au postulation helper!</legend>
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Login" id="inputDefault" name="pseudo">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" placeholder="Mot de passe" id="inputDefault" name="password">
          </div>

          <div class="form-group" style="display:flex">
                <button type="submit" class="btn btn-primary" name="btn_connection">Connexion</button>
                <a href="inscription.php" class="col-form-label" style="margin-left:50px">nouvelle utilisateur?</a>
          </div>

        </fieldset>
      </form>

      <?php
        if(!empty($erreur))
        {
          echo '<font color="red">' . $erreur . '</font>';
        }
       ?>

    </div>

  </body>
</html>
