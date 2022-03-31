<?php
namespace App\Manager;

use App\Service\DbConnect;

abstract class AbstractManager
{

  static $_bdd;

  //connexion a la bdd
  public function __construct(){
    self::$_bdd = DbConnect::getInstance();
  }


  //creation de la methode
  //de récupération de liste d'elements
  //dans la bdd

  protected function getAll(string $table,string $obj){

    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
    $req->execute();

    //on crée la variable data qui
    //va contenir les données
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }
   
    return $var;
    $req->closeCursor();


  }

  protected function getOne($table, $obj, $id)
  {
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM ".$table." WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  

  

 

 



}