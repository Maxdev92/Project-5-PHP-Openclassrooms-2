<?php
namespace App;

use App\Controllers\ControllerAccueil;
use App\Service\View;


/**
 *
 */
class Router
{
  private $ctrl;
  private $view;

  public function routeReq(){

    try {

      //on va determiner le controleur en
      //fonction de la valeur de cette variable
      if (isset($_GET['action']) && isset($_GET['module']) ) {
        //on décompose l'url et on lui applique un filtre
        $action = filter_var($_GET['action'], FILTER_SANITIZE_URL);
        $module = ucfirst(filter_var($_GET['module'], FILTER_SANITIZE_URL));
        $controller = "App\\Controllers\\Controller".$module;
        $this->_ctrl = (new $controller);
        $this->_ctrl->$action();
      }

      else {
     
        $this->ctrl = (new ControllerAccueil())->accueil();
      }

    } catch (\Exception $e) {
      $errorMsg = $e->getMessage();

      (new ControllerAccueil())->error($errorMsg);
    }
  }
}












 ?>
