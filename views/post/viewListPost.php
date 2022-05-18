
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<div class="slider"></div><!-- slider -->

<section class="blog-area section">
  <div class="container">

    <div class="row">

      <?php
      foreach ($articles as $article):
     
       ?>
      <div class="col-lg-4 col-md-6">
        <div class="card h-100">
          <div class="single-post post-style-1">

            <div class="blog-image"><img src="public/images/smartphone.jpg" alt="Blog Image"></div>

            <a class="avatar" href="#"><img src="public/images/avatar.jpg" alt="Profile Image"></a>

            <div class="blog-info">

              <h4 class="title"><a href="?module=post&action=article&id=<?= $article['id'] ?>"><b><?= $article['title'] ?></b></a></h4>
              <ul class="post-footer">
                <li><a href="#"><i class="ion-chatbubble"></i><?= $countComments[$article['id']]?></a></li>
                <?php if ($article['modifiedAt'] !== NULL):?>
                  <li><a href="#"><i class="ion-android-create"></i>Modifié le <?= $article['modifiedAt']?></a></li>
                <?php endif ?>
              </ul>

            </div><!-- blog-info -->
          </div><!-- single-post -->
        </div><!-- card -->
      </div><!-- col-lg-4 col-md-6 -->

      <?php endforeach ?>

    </div><!-- row -->

  </div><!-- container -->
</section><!-- section -->