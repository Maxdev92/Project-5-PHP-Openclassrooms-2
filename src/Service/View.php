<?php
namespace App\Service;

use App\Contract\ToArrayable;

/**
 *
 */
class View
{
  //fichier vue
  private $_file;

  //titre de la page
  private $_t;

  function __construct($module, $action)
  {
    $this->_file = "views/$module/view$action.php";
  }

  //crée une fonction qui va
  //générer et afficher la vue de tous les articles
  public function generate($data = null){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file, $data);

    //template
    $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }

  //générer la vue d'un article
  public function generatePost(?array $data){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file, $data);

    //template
    $view = $this->generateFile('views/templateSingle.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }

  //générer la vue du forulaire
  //de création d'un article
  public function generateForm(mixed $data = null){
    //définir le contenu à envoyer
    $content = $this->generateFile($this->_file, $data);

    //template
    $view = $this->generateFile('views/templateForm.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }


  private function generateFile($file, array|ToArrayable $data = null){
    if (file_exists($file)) {

      foreach($data as $key => $object){
        if($object instanceof ToArrayable){
          $data[$key] = $object->toArray();
        }
      }
      
      if(!empty($data))
        extract($data);

      //commencer la temporisation
      ob_start();

      require $file;

      //arreter la temporisation
     return ob_get_clean();
    }
    else {
      throw new \Exception("Fichier ".$file." introuvable", 1);

    }
  }


}









 ?>
