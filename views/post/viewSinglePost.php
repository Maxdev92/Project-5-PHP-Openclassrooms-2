<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="slider">

</div><!-- slider -->

<section class="post-area section">
  <div class="container">

    <div class="row">

      <div class="mx-auto">

        <div class="main-post">

          <div class="blog-post-inner">

            <div class="post-info">

              <div class="left-area">
                <a class="avatar" href="#"><img src="public/images/smartphone.jpg" alt="Profile Image"></a>
              </div>

              <div class="middle-area">
                <a class="name" href="#"><b>Illustration d'article</b></a>
                <h6 class="date">  <?=$article->getCreationDate()?></h6>
              </div>

            </div><!-- post-info -->

            <h3 class="title"><a href="#"><b><?=$article->getTitle()?></b></a></h3>

            <p class="para"><?=$article->getContent()?></p>

          </div><!-- blog-post-inner -->
          <div class="post-icons-area">
            <ul class="post-icons">
              <li><a href="#"><i class="ion-heart"></i> 57</a></li>
              <li><a href="#"><i class="ion-chatbubble"></i> 6</a></li>
              <li><a href="#"><i class="ion-eye"></i> 138</a></li>
            </ul>

            <ul class="icons">
              <li>PARTAGER : </li>
              <li><a href="#"><i class="ion-social-facebook"></i></a></li>
              <li><a href="#"><i class="ion-social-twitter"></i></a></li>
              <li><a href="#"><i class="ion-social-pinterest"></i></a></li>
            </ul>
          </div>
        </div><!-- info-area -->

      </div><!-- col-lg-4 col-md-12 -->

    </div><!-- row -->

  </div><!-- container -->
</section><!-- post-area -->

<section class="comment-section">
    <div class="container">
      <h4><b>POSTER UN COMMENTAIRE</b></h4>
      <div class="row">
      <?php if (!isset($_SESSION['username'])):?>
      <li><a href="?module=user&action=login">Se connecter pour ajouter un commentaire</a></li>
      <?php endif; ?>     
			<?php if (isset($_SESSION['username'])):?>
        <div class="col-lg-8 col-md-12">
          <div class="comment-form">
            <form method="post">
              <div class="row">

                <div class="col-sm-6">
                  <input type="text" aria-required="true" name="contact-form-name" class="form-control"
                  placeholder="Entrez votre pseudo" aria-invalid="true" required >
                </div><!-- col-sm-6 -->
                <div class="col-sm-6">
                <input type="email" aria-required="true" name="contact-form-email" class="form-control"
                  placeholder="Entrez votre e-mail" aria-invalid="true" required>
                </div><!-- col-sm-6 -->

                <div class="col-sm-12">
                  <textarea name="contact-form-message" rows="2" class="text-area-messge form-control"
                  placeholder="Entrez votre commentaire" aria-required="true" aria-invalid="false"></textarea >
                </div><!-- col-sm-12 -->
                <div class="col-sm-12">
                  <button class="btn btn-primary" type="submit" id="form-submit"><b>ENVOYER</b></button>
                </div><!-- col-sm-12 -->

              </div><!-- row -->
            </form>
          </div><!-- comment-form -->
          </b></h4>
</section>
<?php endif; ?>
<section class="content-item" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-sm-8">             
                <h3>Commentaires</h3>
                <?php
                foreach ($comments as $comment):
                ?> 
            
                <div class="card" >
                  <div class="card-body">
                    <h5 class="card-title"><?= $comment->getAuthor() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $comment->getCreationDate() ?></h6>
                    <p class="card-text"><?=$comment->getContent()?></p>
                  </div>
                </div>
                <?php endforeach ?>            
            </div>
        </div>
    </div>
</section>
                
