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

                <section class="content-item" id="comments">

                <div class="container">   

                  <div class="row">

                    <div class="col-sm-8">    

                        <h3><?= $countComments ?> Commentaire(s) en attente de validation</h3>

                      <?php
                        foreach ($waitComments as $waitComment):
                      ?> 
                      <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"><?= $waitComment->getAuthor() ?></h5>
                          <h6 class="card-subtitle mb-2 text-muted"><?= $waitComment->getCreationDate() ?></h6>
                          <p class="card-text"><?=$waitComment->getContent()?></p>
                        </div>
                        <div class="card-footer text-muted">
                         <a class="btn btn-success" href='?action=validateComment&module=post&id=<?= $waitComment->getId()?>'>Valider</a> 
                         <a class="btn btn-danger" href='?action=denyComment&module=post&id=<?= $waitComment->getId()?>'>Refuser</a> 
                        </div>
                      </div>
                      <?php endforeach ?>            
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> 
        </div> 
      </div>
    </div>
  </div>  
</section>