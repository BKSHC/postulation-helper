<?php
	session_start();

	if(!isset($_SESSION['logined'])){
		if(!$_SESSION['logined']){
			header('Location: login.php');
		}
	}


 ?>

<!DOCTYPE html>
<html>
<head>
  <?php include "html/head.html" ?>

</head>
<body>
  <?php include "html/navbar.php" ?>


  <div class="centerDiv">

    <form action="src/insertion.php" method="post">
      <fieldset>
        <legend>Nouvelle postulation</legend>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Nom de la société</label>
          <input type="text" class="form-control" placeholder="example: Orange" id="inputDefault" name="nom_societe">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Nom du poste</label>
          <input type="text" class="form-control" placeholder="example: Assistante RH" id="inputDefault" name="poste">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">Date de postulation</label>
          <input type="date" class="form-control" id="inputDefault" name="date_postulation">
        </div>
        <div class="form-group">
          <label class="col-form-label" for="inputDefault">URL d'offre d'emploi</label>
          <input type="url" class="form-control" placeholder="example: https://www.facebook.com/careers/jobs/321315758671989/" id="inputDefault" name="offre">
        </div>

        <div class="form-group">
          <label for="exampleSelect1">État de processus</label>
          <select class="form-control" id="exampleSelect1" name="etat">
            <option>En attente de postulation</option>
            <option>Postulé</option>
            <option>En attente de l'entretien</option>
            <option>En attente de retour final</option>
            <option>Négatif</option>
            <option>Retenu!</option>
          </select>
        </div>
      </br>
      </fieldset>
        <button type="submit" class="btn btn-primary">Ajouter</button>
      </fieldset>
    </form>

  </div>

</body>
</html>
