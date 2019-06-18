

	<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

	  <a class="navbar-brand" href="/">Postulation Helper!</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

		<div class="container">
		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		      <li class="nav-item active">
		        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">About me</a>
		      </li>
		    </ul>
				<ul class="nav navbar-nav ml-auto form-inline">
					<?php if(isset($_SESSION['pseudo'])){ ?>

					<li class="nav-item">
						<a class="nav-link" href="#"><i class="fas fa-user"></i>&ensp;<?php echo $_SESSION['pseudo']; ?></a>
					</li>
					<li class="nav-item">
						<form action="/src/disconnect.php" method="post">
							<button class="btn btn-danger btn-sm" name="btn_disconnect" value="1"><i class="fas fa-power-off fa-lg"></i></button>
						</form>
					</li>
				</ul>
				<?php } ?>

		  </div>
		</div>
	</nav>
