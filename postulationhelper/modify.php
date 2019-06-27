<?php
  session_start();
  include "src/DBconnect.php";
 ?>

<!DOCTYPE html>
<html>
  <head>
    <?php include "html/head.html" ?>

  </head>
  <body>
    <?php
      include "html/navbar.php";


      $statement = $db->query('SELECT * FROM helpertable WHERE id = ' . $_POST['idToModify']);
      $donnees = $statement->fetch();

    ?>

    <div class="centerDiv">
      <form action="src/modify_algo.php" method="post">
        <fieldset>
          <legend>Modification</legend>
          <input type="hidden" name="idToModify" value="<?php echo $_POST['idToModify'] ?>">
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Nom de la société</label>
            <input type="text" class="form-control" value="<?php echo $donnees['nom_societe'] ?>" id="inputDefault" name="nom_societe">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Nom du poste</label>
            <input type="text" class="form-control" value="<?php echo $donnees['poste'] ?>" id="inputDefault" name="poste">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">Date de postulation</label>
            <input type="date" class="form-control" id="inputDefault" value="<?php echo $donnees['date_postulation'] ?>" name="date_postulation">
          </div>
          <div class="form-group">
            <label class="col-form-label" for="inputDefault">URL d'offre d'emploi</label>
            <input type="url" class="form-control" value="<?php echo $donnees['offre'] ?>" id="inputDefault" name="offre">
          </div>

          <div class="form-group">
            <label for="exampleSelect1">État de processus</label>
            <select class="form-control" id="exampleSelect1"  name="etat">
              <?php
                switch ($donnees['etat']) {
                  case 'En attente de postulation':
                    echo "<option selected>En attente de postulation</option>
                          <option>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option>Négatif</option>
                          <option>Retenu!</option>";
                    break;

                  case 'Postulé':
                    echo "<option>En attente de postulation</option>
                          <option selected>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option>Négatif</option>
                          <option>Retenu!</option>";
                    break;

                  case 'En attente de l\'entretien':
                    echo "<option>En attente de postulation</option>
                          <option>Postulé</option>
                          <option selected>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option>Négatif</option>
                          <option>Retenu!</option>";
                    break;

                  case 'En attente de retour final':
                    echo "<option>En attente de postulation</option>
                          <option>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option selected>En attente de retour final</option>
                          <option>Négatif</option>
                          <option>Retenu!</option>";
                    break;

                  case 'Négatif':
                    echo "<option>En attente de postulation</option>
                          <option>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option selected>Négatif</option>
                          <option>Retenu!</option>";
                    break;

                  case 'Retenu!':
                    echo "<option>En attente de postulation</option>
                          <option>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option>Négatif</option>
                          <option selected>Retenu!</option>";
                    break;

                  default:
                    echo "<option>En attente de postulation</option>
                          <option>Postulé</option>
                          <option>En attente de l'entretien</option>
                          <option>En attente de retour final</option>
                          <option>Négatif</option>
                          <option>Retenu!</option>";
                    break;
                }

                ?>

            </select>
          </div>
        </br>
        </fieldset>
          <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </fieldset>
      </form>

    </div>

  </body>
</html>
