<?php
	if(isset($_SESSION['user'])){
		header('');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Inscription à MaKs</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
	<h1 class="page-header text-center">Inscription à MaKs</h1>
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
		    <div class="login-panel panel panel-primary">
		        <div class="panel-heading">
		            <h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> S'inscrire
		            </h3>
		        </div>
		    	<div class="panel-body">
		        	<form method="POST" action="?module=user&action=register">
		            	<fieldset>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Pseudo" value="<?= $_POST['username'] ?? '' ?>" type="text" name="username" autofocus required>
		                	</div>
		                	<div class="form-group">
		                    	<input class="form-control" placeholder="Email" value="<?= $_POST['email'] ?? '' ?>" type="text" name="email" required>
		                	</div>
                      <div class="form-group">
		                    	<input class="form-control" placeholder="Mot de Passe" value="<?= $_POST['passsword'] ?? '' ?>" type="password" name="password" required>
		                	</div>
		                	<button type="submit" name="register" class="btn btn-lg btn-primary btn-block"><span class="glyphicon glyphicon-log-in"></span> S'enregistrer</button>
		            	</fieldset>
		        	</form>
		    	</div>
		    </div>
		    <?php
		    	if(isset($_SESSION['message'])){
		    		?>
		    			<div class="alert alert-info text-center">
					        <?php echo $_SESSION['message']; ?>
					    </div>
		    		<?php
 
		    		unset($_SESSION['message']);
		    	}
		    ?>
		</div>
	</div>
</div>
</body>
</html>