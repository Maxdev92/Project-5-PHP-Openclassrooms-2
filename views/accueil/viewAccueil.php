

	<div class="slider"></div><!-- slider -->
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<section class="blog-area section">
		<div class="container">

			<div class="center">

			<h1>Qui suis-je ?</h1> 
			<img src="public\images\moi.jpg" class="rounded-circle" class="w-25 p-3">
			<h3>Je m'appelle Maxime Schubas.</h3>
			<h4>J'ai 28 ans, et je suis le parcours "Développeur d'application PhP Symfony d'OpenClassRooms".</h4>
			<h4>Passioné par l'univers de MINECRAFT, je vous fais découvrir par le biais de ce blog l'actualité du jeu,
				mes créations et celles des autres ainsi que des tutoriels pour vous aider à progresser.</h4>
			<h3 class="text-primary">Bonne visite sur mon blog !</h3>
			</div><!-- row -->

			<a class="load-more-btn" href="?module=user&action=cvDownload"><b>VOIR MON CV</b></a>
			<h2>Contactez moi</h2>
			<form method="post" action="?module=accueil&action=sendMail">
  <div class="form-group">
    <label for="name">Votre nom</label>
    <input type="name" name="name" value="<?= $_POST['name'] ?? '' ?>" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Entrez votre nom" required>
  </div>
  <div class="form-group">
    <label for="email">Votre e-mail</label>
    <input type="email" name="email" value="<?= $_POST['email'] ?? '' ?>" class="form-control" id="email" placeholder="Entrez votre e-mail" required>
		<small id="emailHelp" class="form-text text-muted">Je ne partage pas votre e-mail.</small>
  </div>
	<div class="form-group">
    <label for="message">Votre message</label>
    <input type="text" name="message" value="<?= $_POST['message'] ?? '' ?>" class="form-control" id="message" aria-describedby="emailHelp" placeholder="Entrez votre message" required>
  </div>
	<div class="form-check">
    <input type="checkbox" name="accept" class="form-check-input" id="exampleCheck1" required>
    <label class="form-check-label" for="exampleCheck1">&nbsp;Accepter les conditions d'utilisation</label>
  </div>
  <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
		</form>

		</div><!-- container -->
	</section><!-- section -->