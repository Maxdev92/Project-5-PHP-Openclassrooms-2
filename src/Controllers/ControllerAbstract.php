<?php
namespace App\Controllers;

use App\Service\View;

abstract class ControllerAbstract{
  public function __call($action, $params){
   (new ControllerAccueil)->error( "l'action : $action, n'existe pas");
  }

}