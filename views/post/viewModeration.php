<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="slider">
<section class="content-item" id="comments">
    <div class="container">   
    	<div class="row">
            <div class="col-sm-8">             
                <h3>Commentaires en attente de validation</h3>
                <?php
                foreach ($waitComments as $waitComment):
                ?> 
            
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"><?= $waitComment->getAuthor() ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $waitComment->getCreationDate() ?></h6>
                    <p class="card-text"><?=$waitComment->getContent()?></p>
                  </div>
                </div>
                <?php endforeach ?>            
            </div>
        </div>
    </div>
</section>