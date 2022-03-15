<?php
namespace App\Models;

use App\DbConnect;

abstract class Model
{

  private static $_bdd;

  //connexion a la bdd
  public function __construct(){
    self::$_bdd = DbConnect::getInstance();
  }


  //creation de la methode
  //de récupération de liste d'elements
  //dans la bdd

  protected function getAll($table, $obj){

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

  protected function getPost($table, $obj, $id)
  {
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, title, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  protected function createPost($table, $obj)
  {
    $req = self::$_bdd->prepare("INSERT INTO ".$table." (title, content, creation_date) VALUES (?, ?, ?)");
    $req->execute(array($_POST['title'], $_POST['content'], date("d.m.Y")));

    $req->closeCursor();
  }

  protected function getCom($table, $obj, $id)
  {
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, author, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(\PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }

  protected function createCom($table, $obj)
  {
    $req = self::$_bdd->prepare("INSERT INTO ".$table." (post_id, content, author, creation_date) VALUES (?, ?, ?, ?)");
    $req->execute(array($_POST['author'], $_POST['content'], date("d.m.Y")));

    $req->closeCursor();
  }

}