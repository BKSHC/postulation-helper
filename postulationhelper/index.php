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

	<?php
		//Charger le navbar
		include "html/navbar.php";
		//Charger les codes pour connecter la base de données,
		//Ce code là donne $db comme la DB connectée
		include "src/DBconnect.php";

		$statement = $db->query('SELECT * FROM helpertable WHERE id_user = ' . $_SESSION['id']);

	 ?>

	<div class="centerDiv">

		<table class="table table-hover">
		  <thead>
		    <tr class="table-primary">
		      <th scope="col">Nom de la société</th>
		      <th scope="col">Poste</th>
		      <th scope="col">Date de postulation</th>
		      <th scope="col">État</th>
					<th scope="col">Contact</th>
					<th scope="col">URL d'offre</th>
					<th scope="col"></th>
		    </tr>
		  </thead>

		  <tbody>
				<?php
					$counter = 0;
					$styleClass = '';
					while($donnees = $statement->fetch()){
						$counter++;

						if($counter%2 == 0){
							$styleClass = 'table-active';
						}else{
							$styleClass = '';
						}
				?>
					<tr class="<?php echo $styleClass ?>">
						<th scope="row"><?php echo $donnees['nom_societe'] ?></th>
						<td><?php echo $donnees['poste'] ?></td>
						<td><?php echo $donnees['date_postulation'] ?></td>
						<td><?php echo $donnees['etat'] ?></td>
						<td><?php echo $donnees['id_contact'] ?></td>

						<?php if($donnees['offre'] != null){ ?>
							<td><a href="<?php echo $donnees['offre'] ?>" target="_blank">Voir l'offre</a></td>
						<?php }else{ ?>
							<td>non disponible</td>
						<?php } ?>

						<td style="display:flex">
								<form class="" action="modify.php" method="post">
									<button type="submit" class="btn btn-primary btn-sm" name="idToModify" value="<?php echo $donnees['ID'] ?>">
										<i class="fas fa-cog"></i>
									</button>
								</form>
								&ensp;
								<form class="" action="src/suppression.php" method="post">
									<button type="submit" class="btn btn-primary btn-sm" name="idToDelete" value="<?php echo $donnees['ID'] ?>">
										<i class="fas fa-trash-alt"></i>
									</button>
								</form>
						</td>
					</tr>
				<?php
				}
				?>

		  </tbody>
		</table>

		<form class="" action="nouvelle_postulation.php" method="post">
			<button type="submit" class="btn btn-primary ajout">Ajouter une postulation</button>
		</form>

	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>

</body>
</html>
