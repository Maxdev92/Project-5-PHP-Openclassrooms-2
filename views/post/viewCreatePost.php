<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<div class="contact1">
  <div class="container-contact1">
    <div class="contact1-pic js-tilt" data-tilt>
      <img src="public/contact_form/images/laptop.png" alt="IMG">
    </div>

    <form method="post" action="?module=post&action=createPost" class="contact1-form validate-form">
      <span class="contact1-form-title">
        Ajouter un article
      </span>

      <div class="wrap-input1 validate-input" data-validate = "Le titre est requis">
        <input class="input1" type="text" name="title" placeholder="Titre de l'article">
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate = "Le chapo est requis">
        <input class="input1" type="text" name="chapo" placeholder="Chapo de l'article">
        <span class="shadow-input1"></span>
      </div>

      <div class="wrap-input1 validate-input" data-validate = "Le contenu est requis">
        <textarea class="input1" name="content" placeholder="Contenu de l'article"></textarea>
        <span class="shadow-input1"></span>
      </div>

      <div class="container-contact1-form-btn">
        <button class="contact1-form-btn">
          <span>
            Créer l'article
            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
          </span>
        </button>
      </div>
    </form>
  </div>
</div>
